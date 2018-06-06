<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Transaction_model extends CI_Model {

        const MONEY_IN = 1;
        const MONEY_OUT = 2;
        const PENDING = 1;
        const APPROVED = 2;
        const DECLINED = 3;

        public function __construct() {
             parent::__construct();

             $this->load->database();

             $this->user_id = $this->session->userdata('user_id');
        }

        public function addTransaction($user_id, $transaction_type, $wallet_id, $description, $amount, $status) {

            $sql = "INSERT INTO user_transactions (transaction_type_id, user_id, wallet_id, description, amount, status) VALUES ({$transaction_type}, {$user_id}, {$wallet_id}, '{$description}', {$amount}, {$status})";
            $query = $this->db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function deleteWalletTransactions($wallet_id) {
            $sql = 'DELETE FROM user_transactions WHERE wallet_id = ? AND user_id = ?';

            $query = $this->db->query($sql, array((int)$wallet_id, (int)$this->user_id));

            if($query > 0) {
                return true;
            }

            return false;
        }

        public function getUserTransactions($transaction_type = 0, $wallet_id = 0, $status = 0, $date_from = 0, $date_to = 0, $limit = 100) {

            $filters = '';
            if($transaction_type != 0) {
                $filters .= "AND ut.transaction_type_id = {$transaction_type} ";
            }
            if($wallet_id != 0) {
                $filters .= "AND uw.id = {$wallet_id} ";
            }
            if($status != 0) {
                $filters .= "AND ut.status = {$status} ";
            }
            if($date_from != 0 && $date_to != 0) {
                $filters .= "AND DATE(ut.ts_created) BETWEEN STR_TO_DATE('{$date_from}', '%Y/%m/%d') AND STR_TO_DATE('{$date_to}', '%Y/%m/%d') ";
            }

            $sql = "SELECT ut.*, ut.id as transaction_id, DATE_FORMAT(ut.ts_created, '%d/%m/%Y') as formated_date, c.code as currency_code, c.name as currency_name, c.simbol as currency_simbol, ps.name as payment_status
                 FROM user_transactions ut INNER JOIN payment_statuses ps on ps.status_code = ut.status INNER JOIN user_wallets uw ON uw.id = ut.wallet_id INNER JOIN currencies c ON c.id = uw.currency_id WHERE ut.user_id = {$this->user_id} " . $filters . " ORDER BY ut.id DESC LIMIT {$limit}";
            $query = $this->db->query($sql);
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getMoneyInForGraph($wallet_id) {
            $extra_where = $wallet_id > 0 ? 'AND uw.id = ' . $wallet_id : '';
            $sql = "
                    SELECT ut.*, ut.amount as amount, DATE_FORMAT(ut.ts_created, '%m/%d/%Y') as formated_date, c.simbol as currency_simbol, uw.code as wallet_code, c.code as currency_code
                    FROM user_transactions ut JOIN user_wallets uw ON uw.id = ut.wallet_id
                    JOIN currencies c ON c.id = uw.currency_id
                    WHERE ut.user_id = ?
                    AND ut.transaction_type_id = 1
                    AND ut.status = 2
                    {$extra_where}
                    AND ut.ts_created BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
                    ORDER BY ut.id DESC";
            $query = $this->db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getLastMonthMoneyIn() {
            $sql = "
                SELECT ut.*, ut.amount as amount, DATE_FORMAT(ut.ts_created, '%m/%d/%Y') as formated_date, c.simbol as currency_simbol, uw.code as wallet_code, c.code as currency_code
                FROM user_transactions ut JOIN user_wallets uw ON uw.id = ut.wallet_id
                JOIN currencies c ON c.id = uw.currency_id
                WHERE ut.user_id = ?
                AND ut.transaction_type_id = ?
                AND ut.status = 2
                AND ut.ts_created BETWEEN DATE_SUB(DATE_SUB(CURDATE(), INTERVAL (DAY(CURDATE())-1) DAY), INTERVAL 1 MONTH) AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                ORDER BY ut.id DESC";
            $query = $this->db->query($sql, array((int)$this->user_id, self::MONEY_IN));
            $transactions = $query->result_array();

            //var_dump($transactions);die();

            return $transactions;
        }

        public function getLastMonthMoneyOut() {
            $sql = "
                SELECT ut.*, ut.amount as amount, DATE_FORMAT(ut.ts_created, '%m/%d/%Y') as formated_date, c.simbol as currency_simbol, uw.code as wallet_code, c.code as currency_code
                FROM user_transactions ut JOIN user_wallets uw ON uw.id = ut.wallet_id
                JOIN currencies c ON c.id = uw.currency_id
                WHERE ut.user_id = ?
                AND ut.transaction_type_id = ?
                AND ut.status = 2
                AND ut.ts_created BETWEEN DATE_SUB(DATE_SUB(CURDATE(), INTERVAL (DAY(CURDATE())-1) DAY), INTERVAL 1 MONTH) AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                ORDER BY ut.id DESC";
            $query = $this->db->query($sql, array((int)$this->user_id, self::MONEY_OUT));
            $transactions = $query->result_array();

            //var_dump($transactions);die();

            return $transactions;
        }

        public function getThisMonthMoneyIN() {
            $sql = "
                SELECT ut.*, ut.amount as amount, DATE_FORMAT(ut.ts_created, '%m/%d/%Y') as formated_date, c.simbol as currency_simbol, uw.code as wallet_code, c.code as currency_code
                FROM user_transactions ut JOIN user_wallets uw ON uw.id = ut.wallet_id
                JOIN currencies c ON c.id = uw.currency_id
                WHERE ut.user_id = ?
                AND ut.transaction_type_id = ?
                AND ut.status = 2
                AND MONTH(ut.ts_created) = MONTH(NOW())
                ORDER BY ut.id DESC";
            $query = $this->db->query($sql, array((int)$this->user_id, self::MONEY_IN));
            $transactions = $query->result_array();

            //var_dump($transactions);die();

            return $transactions;
        }

        public function getThisMonthMoneyOut() {
            $sql = "
                SELECT ut.*, ut.amount as amount, DATE_FORMAT(ut.ts_created, '%m/%d/%Y') as formated_date, c.simbol as currency_simbol, uw.code as wallet_code, c.code as currency_code
                FROM user_transactions ut JOIN user_wallets uw ON uw.id = ut.wallet_id
                JOIN currencies c ON c.id = uw.currency_id
                WHERE ut.user_id = ?
                AND ut.transaction_type_id = ?
                AND ut.status = 2
                AND MONTH(ut.ts_created) = MONTH(NOW())
                ORDER BY ut.id DESC";
            $query = $this->db->query($sql, array((int)$this->user_id, self::MONEY_OUT));
            $transactions = $query->result_array();

            //var_dump($transactions);die();

            return $transactions;
        }

        public function getMoneyOutForGraph($wallet_id) {
            $extra_where = $wallet_id > 0 ? 'AND uw.id = ' . $wallet_id : '';
            $sql = "
                    SELECT ut.*, ut.amount as amount, DATE_FORMAT(ut.ts_created, '%m/%d/%Y') as formated_date, c.simbol as currency_simbol, uw.code as wallet_code, c.code as currency_code
                    FROM user_transactions ut JOIN user_wallets uw ON uw.id = ut.wallet_id
                    JOIN currencies c ON c.id = uw.currency_id
                    WHERE ut.user_id = ?
                    AND ut.status = 2
                    {$extra_where}
                    AND ut.transaction_type_id = 2
                    AND ut.ts_created BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
                    ORDER BY ut.id DESC";
            $query = $this->db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }
    }
 ?>