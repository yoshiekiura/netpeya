<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Currency_model extends MY_Model {
        public function __construct() {
             parent::__construct();
        }

        public function getAllCurrencies() {
        	$sql = "
        		SELECT * FROM currencies
        	";

        	$query = $this->xannia_db->query($sql);

        	return $query->result_array();

        }

        public function getCurrencyByID($currency_id) {
        	$sql = "SELECT * FROM currencies WHERE id = ?";

        	$query = $this->xannia_db->query($sql, array((int)$currency_id));

        	return $query->row_array();

        }

        public function getCurrencyByCode($code) {
            $sql = "SELECT * FROM currencies WHERE code = ?";

            $query = $this->xannia_db->query($sql, array($code));

            return $query->row_array();
        }
    }
 ?>