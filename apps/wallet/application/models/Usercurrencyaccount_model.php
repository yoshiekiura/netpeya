<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercurrencyaccount_model extends MY_Model {

	private $table = 'user_currency_account';

	public function __construct() {
		parent::__construct();
	}

	public function getAllUserAccounts($user_id)
	{
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'user_id' => $user_id));
		return $query->result();
	}

	public function getById($id) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'id' => $id));
		return $query->row();
	}

	public function getByCurrencyId($currency_id, $user_id) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'currency_id' => $currency_id, 'user_id' => $user_id));
		return $query->row();
	}

	public function createUserDefaultAccounts($user_id) {
		$this->load->model('currency_model');
		$this->load->model('user_model');
		$user_info = $this->user_model->getUserFullInfo($user_id);

		$default_currencies = $this->currency_model->getAllInitial();

		$default_created = false;

		foreach($default_currencies as $currency) {
			if($currency->id == $user_info->currency_id) $default_created = true;

			$this->createCurrencyAccount($user_id, $currency->id);
		}

		if(!$default_created) $this->createCurrencyAccount($user_id, $user_info->currency_id);
	}

	public function createCurrencyAccount($user_id, $currency_id) {
		$account_data = array(
			'user_id' => $user_id,
			'currency_id' => $currency_id,
			'account_number' => $this->createAccountNumber($user_id, $currency_id),
			'sec_code' => mt_rand(1111, 9999),
			'balance' => 0
		);

		$data = $this->_filter_data($this->table, $account_data);

		$this->db->insert($this->table, $data);
		$account_id = $this->db->insert_id($this->table . '_id_seq');

		if($account_id) return $account_id;

		return false;
	} 

	public function createAccountNumber($user_id, $currency_id) {
		return str_pad($user_id , 11, '0', STR_PAD_RIGHT) . $currency_id;
	}
}
