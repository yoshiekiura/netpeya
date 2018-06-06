<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Paymentmethod_model extends CI_Model {
        public function __construct() {
             parent::__construct();

             $this->load->database();

             $this->user_id = $this->session->userdata('user_id');
        }

        public function getAllMethods() {
        	$sql = "
        		SELECT * FROM payment_methods WHERE is_active = 1 ORDER BY html_form ASC
        	";

        	$query = $this->db->query($sql);

        	return $query->result_array();

        }

        public function getMethodsByCountryID($countryID) {

        }
    }
 ?>