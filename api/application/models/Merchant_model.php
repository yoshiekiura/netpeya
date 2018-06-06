<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant_model extends My_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function getMerchantByXanniaNumber($xannia_number) {
		$sql = "SELECT * FROM users WHERE xannia_number = ?";

		$merchant = $this->merchant_db->query($sql, array($xannia_number))->row_array();

		return $merchant;
	}

	public function addFunds($amount, $user_id) {
		$sql = "UPDATE users SET account_balance = account_balance + ? WHERE id = ?";
		$query = $this->merchant_db->query($sql, array((double)$amount, $user_id));
		if ($query > 0) {
            return true;
        } else {
        	return false;
        }
	}

	public function deductFunds($amount, $user_id) {
		$sql = "UPDATE users SET account_balance = account_balance - ? WHERE id = ?";
		$query = $this->merchant_db->query($sql, array((double)$amount, $user_id));
		if ($query > 0) {
            return true;
        } else {
        	return false;
        }
	}

	public function getMerchantInfo($merchant_id) {
		$sql = "
			SELECT u.*, uak.api_key, uak.secret_key
			FROM users u 
			LEFT JOIN user_api_keys uak ON uak.user_id = u.id
			WHERE u.id = ?
		";

		$merchant_info = $this->merchant_db->query($sql, array($merchant_id))->row_array();
		$merchant_info['currency'] = $this->getMerchantCurrecy($merchant_info['currency_id']);

		$merchant_info['allowed_ips'] = $this->getMerchantAllowedIPs($merchant_id);

		return $merchant_info;

	}
	public function getMerchantCurrecy($currency_id) {
		$sql = "SELECT * FROM currencies WHERE id = ?";

		$currency = $this->merchant_db->query($sql, array($currency_id))->row_array();

		return $currency;
	}

	public function getMerchantAllowedIPs($merchant_id) {
		$merchant_ips = array();
		$sql = "
			SELECT ip
			FROM allowed_ips 
			WHERE user_id = ?
		";

		$ips = $this->merchant_db->query($sql, array($merchant_id))->result_array();

		foreach ($ips as $entry) {
			array_push($merchant_ips, $entry['ip']);
		}

		return $merchant_ips;
	}
}
