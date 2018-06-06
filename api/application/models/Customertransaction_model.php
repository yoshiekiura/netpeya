<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Customertransaction_model extends MY_Model {

        const MONEY_IN = 1;
        const MONEY_OUT = 2;
        const PENDING = 1;
        const APPROVED = 2;
        const DECLINED = 3;

        public function __construct() {
             parent::__construct();
        }

        public function sale($user_id, $transaction_type, $wallet_id, $description, $amount, $status) {

            $sql = "INSERT INTO user_transactions (transaction_type_id, user_id, wallet_id, description, amount, status) VALUES ({$transaction_type}, {$user_id}, {$wallet_id}, '{$description}', {$amount}, {$status})";
            $query1 = $this->wallet_db->query($sql);

            $trans_id = $this->wallet_db->insert_id();

            $sql = "UPDATE user_wallets SET balance = balance - ? WHERE id = ?";
            $query2 = $this->wallet_db->query($sql, array((float)$amount, (int)$wallet_id));

            if ($query1 > 0 && $query2 > 0) {
                return $trans_id;
            }

            return false;
        }

        public function payout($user_id, $transaction_type, $wallet_id, $description, $amount, $status) {

            $sql = "INSERT INTO user_transactions (transaction_type_id, user_id, wallet_id, description, amount, status) VALUES ({$transaction_type}, {$user_id}, {$wallet_id}, '{$description}', {$amount}, {$status})";
            $query1 = $this->wallet_db->query($sql);

            $trans_id = $this->wallet_db->insert_id();

            $sql = "UPDATE user_wallets SET balance = balance + ? WHERE id = ?";
            $query2 = $this->wallet_db->query($sql, array((float)$amount, (int)$wallet_id));

            if ($query1 > 0 && $query2 > 0) {
                return $trans_id;
            }

            return false;
        }
    }
 ?>