<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property xannia_auth|xannia_auth_model $xannia_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	/**
	 * Log the user in
	 */
	public function login()
	{

		if ($this->xannia_auth->logged_in())
		{
			redirect('dashboard', 'refresh');
		}

		$data['title'] = 'Login';

		$this->load->view('member/auth/login', $data);
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		// log the user out
		$logout = $this->xannia_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->xannia_auth->messages());
		redirect('login', 'refresh');
	}

	public function email_activation($id, $hash) {
		if ($this->xannia_auth->logged_in())
		{
			redirect('dashboard', 'refresh');
		}

		$data['title'] = 'activation';
		$data['activation_status'] = 0;

        $result = $this->auth_model->activate($id, $hash);

        if($result) {
        	$data['activation_status'] = 1;
        }

		$this->load->view('member/auth/email_activation', $data);
	}

	public function finish_setup($id, $hash) {
		if ($this->xannia_auth->logged_in())
		{
			redirect('dashboard', 'refresh');
		}

		$data['title'] = 'activation';

		$data['already_activated'] = false;
		$data['user_not_found'] = false;
		$data['countries'] = $this->country_model->getAllCountries();

		$user = $this->user_model->getUserById($id);

		if($user) {
			if($user['activation_code'] == $hash && $user['is_active'] == 0) {
				$data['user'] = $user;
			} elseif($user['is_active'] == 1) {
				$data['already_activated'] = true;
			}
		} else {
			$data['user_not_found'] = true;
		}

		$this->load->view('member/auth/finish_setup', $data);
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'xannia_auth') . ']|max_length[' . $this->config->item('max_password_length', 'xannia_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->xannia_auth->logged_in())
		{
			redirect('login', 'refresh');
		}

		$user = $this->xannia_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'xannia_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['user_id'] = array(
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			// render
			$this->_render_page('member/auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->xannia_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->xannia_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->xannia_auth->errors());
				redirect('mamber/auth/change_password', 'refresh');
			}
		}
	}


	public function password_reset($id, $code) {
		if (!$code || !$id)
		{
			show_404();
		}

		$user = $this->user_model->getUserById($id);

		if ($user) {
			if($user['forgotten_password_code'] == $code) {
				$data['title'] = 'Reset password';
				$data['user'] = $user;
				if ($this->config->item('forgot_password_expiration', 'xannia') > 0) {
					$data['link_expired'] = false;
					//$expiration = $this->config->item('forgot_password_expiration', 'xannia');
					// var_dump(date("Y-m-d H:i:s"),$user['forgotten_password_time'],  abs(time() - strtotime($user['forgotten_password_time']))/60);die();
					// if (abs(time() - strtotime($user['forgotten_password_time'])) > $expiration)
					// {
					// 	$data['link_expired'] = true;
					// }
				}
				$this->load->view('member/auth/reset_password', $data);
			} else {
				redirect('login', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($id, $code)
	{
		if (!$code || !$id)
		{
			show_404();
		}

		$user = $this->xannia_auth->getUserById($id);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'xannia_auth') . ']|max_length[' . $this->config->item('max_password_length', 'xannia_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'xannia_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->_render_page('member/auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->xannia_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'xannia_auth')};

					$change = $this->xannia_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->xannia_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->xannia_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->xannia_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		if ($code !== FALSE)
		{
			$activation = $this->xannia_auth->activate($id, $code);
		}
		else if ($this->xannia_auth->is_admin())
		{
			$activation = $this->xannia_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->xannia_auth->messages());
			redirect("login", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->xannia_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->xannia_auth->logged_in() || !$this->xannia_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->xannia_auth->user($id)->row();

			$this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					return show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->xannia_auth->logged_in() && $this->xannia_auth->is_admin())
				{
					$this->xannia_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function register()
	{
		if ($this->xannia_auth->logged_in())
		{
			redirect('dashboard', 'refresh');
		}

		$this->load->model('member/country_model');
		$this->load->model('member/currency_model');

		$data = array();

		$data['title'] = $this->lang->line('registration_heading');

		$data['countries'] = $this->country_model->getAllCountries();
		$data['currencies'] = $this->currency_model->getAllCurrencies();

		$this->load->view('member/auth/register', $data);
	}

	public function registration_success() {
		if ($this->xannia_auth->logged_in())
		{
			redirect('dashboard', 'refresh');
		}

		$data = array();

		$data['title'] = 'registration success';

		$this->load->view('member/auth/registration_success', $data);
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->xannia_auth->logged_in() || (!$this->xannia_auth->is_admin() && !($this->xannia_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->xannia_auth->user($id)->row();
		$groups = $this->xannia_auth->groups()->result_array();
		$currentGroups = $this->xannia_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim|required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'xannia_auth') . ']|max_length[' . $this->config->item('max_password_length', 'xannia_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->xannia_auth->is_admin())
				{
					// Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
					{

						$this->xannia_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
						{
							$this->xannia_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->xannia_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->xannia_auth->messages());
					if ($this->xannia_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->xannia_auth->errors());
					if ($this->xannia_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->xannia_auth->errors() ? $this->xannia_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->_render_page('auth/edit_user', $this->data);
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->xannia_auth->logged_in() || !$this->xannia_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->xannia_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->xannia_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->xannia_auth->errors() ? $this->xannia_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->xannia_auth->logged_in() || !$this->xannia_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->xannia_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->xannia_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->xannia_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->xannia_auth->errors() ? $this->xannia_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'xannia_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

	private function formatData($data, $errors)
    {
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
        $this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
        //$this->output->set_header('Content-Type: application/json');
        $this->output->set_content_type( 'application/json' );
        $this->output->set_output(json_encode(array('data' => $data, 'errors' => $errors), JSON_NUMERIC_CHECK));
        //echo(json_encode(array('data' => $data, 'errors' => $errors), JSON_NUMERIC_CHECK));
    }

}
