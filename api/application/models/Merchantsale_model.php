<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchantsale_model extends My_Model
{
	const PENDING = 1;
    const APPROVED = 2;
    const DECLINED = 3;

	public function __construct() {
		parent::__construct();
	}

	public function saveTransaction(array $sale) {
		$order_ref = $this->createOrderRef();

		$sql = "INSERT INTO transactions (user_id, transaction_type_id, payment_method_id, external_transaction_id, order_reference, description, amount_before_charges, total_charges, amount_after_charges, opening_balance, closing_balance, transaction_status_id, processor_response, card_type, card_bin, card_last_4, card_exp_month, card_exp_year, cardholder_name)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$query = $this->merchant_db->query(
			$sql,
			array(
				$sale['merchant_id'],
				$sale['transaction_type_id'],
				$sale['payment_method_id'],
				$sale['external_transaction_id'],
				$order_ref,
				$sale['description'],
				(double)$sale['amount_before_charges'],
				(double)$sale['total_charges'],
				(double)$sale['amount_after_charges'],
				(double)$sale['opening_balance'],
				(double)$sale['closing_balance'],
				$sale['transaction_status'],
				$sale['processor_response'],
				$sale['card_type'],
				$sale['card_bin'],
				$sale['card_last_4'],
				$sale['card_exp_month'],
				$sale['card_exp_year'],
				$sale['cardholder_name']
			)
		);

		if ($query > 0) {
            return $order_ref;
        } else {
        	return false;
        }

	}

	public function saveLog($bt_res) {
		$sql = "INSERT INTO braintree_log (response) VALUES ('{$bt_res}')";
		$query = $this->merchant_db->query($sql);
		if ($query > 0) {
            return true;
        } else {
        	return false;
        }
	}

	private function getOrderByRef($ref) {
		$sql = "SELECT * FROM transactions WHERE order_reference = ?";

		$order = $this->merchant_db->query($sql, array($ref))->row_array();

		return $order;
	}

	private function createOrderRef() {
		$str = Tools::generateKey(12);
		$ref = implode("-", str_split($str, 4));

		if($this->getOrderByRef($ref)) {
			$this->createOrderRef();
		} else {
			return $ref;
		}
	}
}
