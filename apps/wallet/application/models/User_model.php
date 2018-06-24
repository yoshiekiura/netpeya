<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	protected $table = 'user';

	protected $errors;

	public function __construct() {
		parent::__construct();

		$this->user_id = $this->session->userdata('user')['user_id'];
	}

	public function get_errors() {
		return $this->errors;
	}

	public function getUserFullInfo() {
		$this->db->select('user.*,
				currency.name as currency,
				currency.code as currency_code,
				currency.simbol as currency_simbol,
				country.name as country,
				country.code as country_code')
				->from($this->table)
				->join('currency', 'currency.id = ' . $this->table . '.currency_id')
				->join('country', 'country.id = ' . $this->table . '.country_id')
				->where(array($this->table . '.id' => $this->user_id));
		$query = $this->db->get();

		return $query->row();
	}

	public function addFunds($amount) {
		$sql = "UPDATE user SET account_balance = account_balance + ? WHERE id = ?";
        $query = $this->db->query($sql, array((float)$amount, (int)$this->user_id));
        if ($query > 0) {
            return true;
        }
        return false;
	}

	public function add($user) {

		if($this->identity_check($user['email'])) {
			$this->set_error('Account already exists, please <a href="/login">Login</a>');
			return FALSE;
		}

		$user['password'] = $this->create_password($user['password']);

		$user['balance'] = 0;

		$card_proccessor_account_id = '';
		$result = '';

		try {
			$result = Braintree_Customer::create([
			    'firstName' => $user['first_name'],
			    'lastName' => $user['last_name'],
			    'company' => '',
			    'email' => $user['email'],
			    'phone' => '',
			    'website' => ''
			]);
		}
		catch(Exeption $e) {
			return FALSE;
		}

		$card_proccessor_account_id = str_replace('Braintree\Customerid', '', str_replace(array('[', '='), '',explode(',', $result->customer->__toString())[0]));

		$user['card_proccessor_account_id'] = $card_proccessor_account_id;

		$user_data = $this->_filter_data($this->table, $user);

		$this->db->insert($this->table, $user_data);
		$user_id = $this->db->insert_id($this->table . '_id_seq');

		if($user_id) {
			return TRUE;
		}

		return FALSE;
	}

	public function login($email, $password) {
		if (empty($email) || empty($password))
		{
			$this->set_error('login failed');
			return FALSE;
		}

		$query = $this->db->select('*')
						  ->where('email', $email)
						  ->limit(1)
						  ->order_by('id', 'desc')
						  ->get($this->table);

		if ($this->is_max_login_attempts_exceeded($email))
		{

			$left = $this->get_remaining_lockout($email);
			if($left <= 0) {
				$this->clear_login_attempts($email);
				$this->increase_login_attempts($email);
				$this->set_error('Invalid login or password');
				$this->set_error('You will be locked out after ' . ($this->config->item('maximum_login_attempts') - $this->get_attempts_num($email)) . ' attempts');
			} else {
				$this->set_error('You have been locked out, please try again after <br/> ' . $this->get_remaining_lockout($email) . ' minutes');
			}

			return FALSE;
		}

		if ($query->num_rows() === 1)
		{
			$user = $query->row();
			//$user->extraData = $this->user_model->getUserExtraData($user->id);

			if (password_verify($password , $user->password))
			{
				if ($user->is_active == 0)
				{
					$this->set_error('Account is not active');
					return FALSE;
				}

				$this->set_session($user);

				$this->update_last_login($user->id);
				$this->clear_login_attempts($email);

				// if ($remember && $this->config->item('remember_users', 'xannia'))
				// {
				// 	$this->remember_user($user->id);
				// }

				return TRUE;
			}
		}

		// Hash something anyway, just to take up time
		$this->create_password($password);

		$this->set_error('Invalid login or password');
		$this->set_error('You will be locked out after ' . ($this->config->item('maximum_login_attempts') - $this->get_attempts_num($email)) . ' attempts');
		$this->increase_login_attempts($email);

		return FALSE;
	}

	public function identity_check($identity = '')
	{
		if (empty($identity))
		{
			return FALSE;
		}

		return $this->db->where('email', $identity)
						->limit(1)
						->count_all_results($this->table) > 0;
	}

	public function is_max_login_attempts_exceeded($identity, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts'))
		{
			$max_attempts = $this->config->item('maximum_login_attempts');
			if ($max_attempts > 0)
			{
				$attempts = $this->get_attempts_num($identity, $ip_address);
				return $attempts >= $max_attempts;
			}
		}
		return FALSE;
	}

	public function increase_login_attempts($identity)
	{
		if ($this->config->item('track_login_attempts'))
		{
			$data = array('ip_address' => '', 'login' => $identity, 'time' => date("Y-m-d H:i:s"));
			if ($this->config->item('track_login_ip_address'))
			{
				$data['ip_address'] = $this->_prepare_ip($this->input->ip_address());
			}
			return $this->db->insert('login_attempts', $data);
		}
		return FALSE;
	}

	public function get_attempts_num($identity, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts'))
		{
			$this->db->select('1', FALSE);
			$this->db->where('login', $identity);
			if ($this->config->item('track_login_ip_address'))
			{
				if (!isset($ip_address))
				{
					$ip_address = $this->_prepare_ip($this->input->ip_address());
				}
				$this->db->where('ip_address', $ip_address);
			}
			$this->db->where('time >', time() - $this->config->item('lockout_time'), FALSE);
			$qres = $this->db->get('login_attempts');
			return $qres->num_rows();
		}
		return 0;
	}

	public function set_error($error)
	{
		$this->errors[] = $error;

		return $error;
	}

	public function set_session($user)
	{
		$user = $array = json_decode(json_encode($user), True);
		$user['user_id'] = $user['id'];

		unset($user['id']);
		unset($user['password']);
		unset($user['forgotten_password_code']);
		unset($user['activation_code']);

		$session_data = array(
			'user' => $user,
			'last_check' => date("Y-m-d H:i:s")
		);

		$this->session->set_userdata($session_data);

		return TRUE;
	}

	public function update_last_login($id)
	{
		$this->load->helper('date');

		$this->db->update($this->table, array('last_login' => date("Y-m-d H:i:s")), array('id' => $id));

		return $this->db->affected_rows() == 1;
	}

	public function clear_login_attempts($identity, $old_attempts_expire_period = 180, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts'))
		{
			// Make sure $old_attempts_expire_period is at least equals to lockout_time
			$old_attempts_expire_period = $this->config->item('lockout_time');

			$this->db->where('login', $identity);
			if ($this->config->item('track_login_ip_address'))
			{
				if (!isset($ip_address))
				{
					$ip_address = $this->_prepare_ip($this->input->ip_address());
				}
				$this->db->where('ip_address', $ip_address);
			}
			// Purge obsolete login attempts
			$this->db->or_where('time <', time() - $old_attempts_expire_period, FALSE);

			return $this->db->delete('login_attempts');
		}
		return FALSE;
	}

	public function get_remaining_lockout($email) {
		$query = $this->db->select('time')
				 ->where(array('login' => $email))
				 ->limit(1)
				 ->order_by('id', 'desc')
				 ->get('login_attempts');
		$last_attempt = $query->row();

		$remaining_time = time() - strtotime($last_attempt->time);

		$left = ($this->config->item('lockout_time') - $remaining_time) / 60;

		return number_format($left, 2, '.', '');
	}

	public function recheck_session()
	{
		$recheck = (NULL !== $this->config->item('recheck_timer')) ? $this->config->item('recheck_timer') : 0;

		if ($recheck !== 0)
		{
			$last_login = $this->session->userdata('last_check');
			if ($last_login + $recheck < time())
			{
				$query = $this->db->select('id')
								  ->where(array('email' => $this->session->userdata('user')['email'], 'active' => 1))
								  ->limit(1)
								  ->order_by('id', 'desc')
								  ->get($this->table);
				if ($query->num_rows() === 1)
				{
					$this->session->set_userdata('last_check', time());
				}
				else
				{
					if (substr(CI_VERSION, 0, 1) == '2')
					{
						$this->session->unset_userdata(array('user_currences' => NULL, 'user' => NULL));
					}
					else
					{
						$this->session->unset_userdata(array('user_currences', 'user'));
					}
					return FALSE;
				}
			}
		}

		return (bool)$this->session->userdata('user');
	}

	protected function _prepare_ip($ip_address) {
		return $ip_address;
	}

	protected function randAlphNumeric() {
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		return strtoupper(str_shuffle($chars));
	}

	private function create_password($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
