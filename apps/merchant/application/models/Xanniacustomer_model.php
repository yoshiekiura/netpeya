<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Xanniacustomer_model extends CI_Model {
        public function __construct() {
            parent::__construct();

            $this->wallet_db = $this->load->database('xannia_wallet', true);
        }

        public function getTransaction($id) {
            $sql = "SELECT * FROM user_transactions WHERE id = {$id}";
            $query = $this->wallet_db->query($sql);

            return $query->row_array();
        }

        public function doRefund($id) {
            $trans = $this->getTransaction($id);
            $description = "Refund from " . $this->user['business_name'];

            $sql = "INSERT INTO user_transactions (transaction_type_id, user_id, wallet_id, description, amount, status) VALUES (1, ?, ?, ?, ?, 2)";
            $query1 = $this->wallet_db->query($sql, array(
                $trans['user_id'],
                $trans['wallet_id'],
                $description,
                $trans['amount']
            ));

            $sql = "UPDATE user_wallets SET balance = balance + ? WHERE id = ?";
            $query2 = $this->wallet_db->query($sql, array((float)$trans['amount'], (int)$trans['wallet_id']));

            if ($query1 > 0 && $query2 > 0) {
                return true;
            }

            return false;
        }
    }
 ?>