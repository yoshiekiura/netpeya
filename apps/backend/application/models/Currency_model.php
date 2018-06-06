<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Currency_model extends CI_Model {
        public function __construct() {
             parent::__construct();

             $this->load->database();
        }

        public function getAllCurrencies() {
        	$sql = "
        		SELECT * FROM currencies
        	";

        	$query = $this->db->query($sql);

        	return $query->result_array();

        }

        public function getCurrencyByID($currency_id) {
        	$sql = "SELECT * FROM currencies WHERE id = ?";

        	$query = $this->db->query($sql, array((int)$currency_id));

        	return $query->row_array();

        }

        public function getCurrencyByCode($code) {
            $sql = "SELECT * FROM currencies WHERE code = ?";

            $query = $this->db->query($sql, array($code));

            return $query->row_array();
        }
    }
 ?>