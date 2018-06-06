<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Paymentmethod_model extends MY_Model {
        public function __construct() {
             parent::__construct();

             $this->user_id = $this->session->userdata('user_id');
        }

        public function getAllMethods() {
        	$sql = "
        		SELECT * FROM payment_methods WHERE is_active = 1 ORDER BY html_form ASC
        	";

        	$query = $this->xannia_db->query($sql);

        	return $query->result_array();

        }

        public function getAllUserMethods() {
            $sql = "SELECT * FROM user_methods WHERE user_id = {$this->user_id}";

            $query = $this->xannia_db->query($sql);

            return $query->result_array();

        }

        public function getMethodByID($id) {
            $sql = "SELECT * FROM payment_methods WHERE id = {$id}";

            $query = $this->xannia_db->query($sql);

            return $query->row_array();
        }
    }
 ?>