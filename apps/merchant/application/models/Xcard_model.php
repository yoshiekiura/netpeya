<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Xcard_model extends MY_Model {
        public function __construct() {
            parent::__construct();
            $this->load->model('currency_model');
            $this->load->model('sale_model');

            $this->user_id = $this->session->userdata('user_id');
        }

        public function addCard($wallet_id) {

            $card = $this->createCard();
            $sql = "INSERT INTO xannia_cards (user_id, wallet_id, card_number, expiry_month, expiry_year, cvv) VALUES ({$this->user_id}, {$wallet_id}, '{$card['number']}', '{$card['ex_month']}', '{$card['ex_year']}', '{$card['cvv']}')";
            $query = $this->xannia_db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function editWallet($wallet_id, $wallet_name = '') {
            $sql = "UPDATE merchant_accounts SET name = '{$wallet_name}' WHERE id = {$wallet_id}";
            $query = $this->xannia_db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function deleteCard($card_id) {
            $sql = "UPDATE xannia_cards SET is_deleted = 1 WHERE id = ?";
            $query = $this->xannia_db->query($sql, array((int)$card_id));

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function makeDefault($wallet_id) {
            $sql = 'UPDATE merchant_accounts SET is_default = 0 WHERE user_id = ?';
            $query = $this->xannia_db->query($sql, array((int)$this->session->userdata('user_id')));

            if ($query > 0) {
                $sql2 = 'UPDATE merchant_accounts SET is_default = 1 WHERE id = ? AND user_id = ?';
                $query2 = $this->xannia_db->query($sql2, array($wallet_id, (int)$this->session->userdata('user_id')));

                if($query2 > 0) {
                    return true;
                }
            }

            return false;
        }

        public function addFunds($id, $amount) {
            $sql = "UPDATE merchant_accounts SET balance = balance + ? WHERE id = ?";
            $query = $this->xannia_db->query($sql, array((float)$amount, (int)$id));

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function deductFunds($wallet_id, $amount) {
            $sql = "UPDATE merchant_accounts SET balance = balance - $amount WHERE id = $wallet_id";
            $query = $this->xannia_db->query($sql);

            if ($query) {
                return TRUE;
            }

            return FALSE;
        }

        public function transferMoney($sender_wallet, $recipient_id, $amount, $recipient_wallet) {

            if($this->addFunds($recipient_wallet, $amount) && $this->deductFunds($sender_wallet, $amount)) {
                return TRUE;
            }

            return FALSE;
        }

        public function getWalletByID($id) {
            $sql = "SELECT uw.id as wallet_id,
                uw.code as wallet_code,
                uw.currency_id as wallet_currency_id,
                uw.user_id as wallet_user_id,
                uw.balance as wallet_balance,
                uw.name as wallet_name,
                c.code as wallet_currency_code,
                c.simbol as wallet_currency_simbol,
                c.name as wallet_currency_name
            FROM merchant_accounts uw INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND uw.user_id = ? AND uw.id = ? ORDER BY uw.balance DESC";

            $query = $this->xannia_db->query($sql, array((int)$this->session->userdata('user_id'), $id));
            $wallet = $query->row_array();

            return $wallet;
        }

        public function getWalletByCurrencyCode($currency_code) {
            $sql = "SELECT uw.id as wallet_id,
                uw.code as wallet_code,
                uw.currency_id as wallet_currency_id,
                uw.user_id as wallet_user_id,
                uw.balance as wallet_balance,
                uw.name as wallet_name,
                c.code as wallet_currency_code,
                c.simbol as wallet_currency_simbol,
                c.name as wallet_currency_name
            FROM merchant_accounts uw INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND uw.user_id = ? AND c.code = ? ORDER BY uw.balance DESC";

            $query = $this->xannia_db->query($sql, array((int)$this->session->userdata('user_id'), $currency_code));
            $wallet = $query->row_array();

            return $wallet;
        }

        public function getUserCards($user_id) {
            $sql = "SELECT xc.id as card_id,
                    uw.code as wallet_code,
                    uw.currency_id as wallet_currency_id,
                    uw.user_id as wallet_user_id,
                    uw.balance as wallet_balance,
                    uw.name as wallet_name,
                    uw.is_default as wallet_is_default,
                    xc.card_number as card_number,
                    xc.expiry_year as expiry_year,
                    xc.expiry_month as expiry_month,
                    xc.cvv as cvv,
                    c.code as wallet_currency_code,
                    c.simbol as wallet_currency_simbol,
                    c.name as wallet_currency_name
                 FROM xannia_cards xc INNER JOIN merchant_accounts uw on xc.wallet_id = uw.id INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND xc.is_deleted = 0 AND xc.user_id = ?";
            $query = $this->xannia_db->query($sql, array((int)$user_id));
            $usermerchant_accounts = $query->result_array();

            return $usermerchant_accounts;
        }

        public function getNoneUsedmerchant_accounts($user_id) {
            $sql = "SELECT c.id, c.code, c.simbol, c.name FROM currencies c WHERE c.id NOT IN (SELECT currency_id FROM merchant_accounts WHERE user_id = ?)";
            $query = $this->xannia_db->query($sql, array((int)$user_id));
            $noneUsedmerchant_accounts = $query->result_array();

            return $noneUsedmerchant_accounts;
        }

        private function createCard() {
            $card = array();

            $card['number'] = $this->generateNumber(16);
            $card['cvv'] = $this->generateNumber(4);
            $card['ex_year'] = date('Y', strtotime('+1 years'));
            $card['ex_month'] = date('m');

            $sql = "SELECT * FROM xannia_cards WHERE card_number = ?";
            $query = $this->xannia_db->query($sql, array($card['number']));

            if(count($query->result_array()) > 0) {
                $this->createCard();
            } else {
                return $card;
            }
        }

        private function generateNumber($length) {
            $length = intval($length, 10);
            $output = '';
            for ($i = 0; $i < $length; $i++) {
                $output .= mt_rand(0, 9);
            }

            return $output;
        }
    }
 ?>