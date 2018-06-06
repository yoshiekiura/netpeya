<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Transactionstatus_model extends MY_Model {
        public function __construct() {
             parent::__construct();
        }

        public function getAllTransactionStatuses() {
        	$sql = "
        		SELECT * FROM transaction_statuses
        	";

        	$query = $this->xannia_db->query($sql);

        	return $query->result_array();

        }
    }
 ?>