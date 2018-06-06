<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends My_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->model('customerwallet_model');
	}

	public function getCustomerInfo($email) {
		$sql = "SELECT * FROM users WHERE email_address = '$email'";

            $result = array();

            $user = $this->wallet_db->query($sql)->row_array();

            $user_wallets = $this->customerwallet_model->getUserWallets($user['id']);

            if($user && $user_wallets) {
                $result['user'] = $user;
                $result['wallets'] = $user_wallets;
            } 

        return $result;

	}
}
