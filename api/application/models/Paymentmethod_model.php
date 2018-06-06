<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentmethod_model extends My_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function getMethodBySlag($slag) {
		$sql = "SELECT * FROM payment_methods WHERE slag = ?";

		$method = $this->merchant_db->query($sql, array($slag))->row_array();

		return $method;
	}
}
