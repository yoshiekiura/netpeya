<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Customerwallet_model extends MY_Model {
        public function __construct() {
            parent::__construct();

            $this->load->database();
            // $this->load->model('currency_model');
            // $this->load->model('transaction_model');

            $this->user_id = $this->session->userdata('user_id');
        }

        public function addWallet($currency_id, $user_id = null, $wallet_name = '', $is_init = false) {

            $user_id = $user_id ? $user_id : $this->user_id;

            $currency = $this->currency_model->getCurrencyByID($currency_id);
            $wallet_code = strtoupper($currency['code']) . $this->session->userdata('xannia_number');
            $sql = '';
            if($is_init) {
                $sql = "INSERT INTO user_wallets (user_id, currency_id, `name`, code, is_default) VALUES ({$user_id}, {$currency_id}, '{$wallet_name}', '{$wallet_code}', 1)";
            } else {
                $sql = "INSERT INTO user_wallets (user_id, currency_id, `name`, code) VALUES ({$user_id}, {$currency_id}, '{$wallet_name}', '{$wallet_code}')";
            }
            $query = $this->wallet_db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function editWallet($wallet_id, $wallet_name = '') {
            $sql = "UPDATE user_wallets SET name = '{$wallet_name}' WHERE id = {$wallet_id}";
            $query = $this->wallet_db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function deleteWallet($wallet_id) {
            $sql = "DELETE FROM user_wallets WHERE id = {$wallet_id}";
            $query = $this->wallet_db->query($sql);

            if ($query > 0) {
                $this->transaction_model->deleteWalletTransactions($wallet_id);
                return true;
            }

            return false;
        }

        public function makeDefault($wallet_id) {
            $sql = 'UPDATE user_wallets SET is_default = 0 WHERE user_id = ?';
            $query = $this->wallet_db->query($sql, array((int)$this->session->userdata('user_id')));

            if ($query > 0) {
                $sql2 = 'UPDATE user_wallets SET is_default = 1 WHERE id = ? AND user_id = ?';
                $query2 = $this->wallet_db->query($sql2, array($wallet_id, (int)$this->session->userdata('user_id')));

                if($query2 > 0) {
                    return true;
                }
            }

            return false;
        }

        public function createDefaultWallets($user_id, $currency_ids) {
            $this->load->model('user_model');

            $user = $this->user_model->getUserByID($user_id);

            $sql = "SELECT * FROM currencies WHERE id IN ?";
            $query = $this->wallet_db->query($sql, array($currency_ids));
            $currencies = $query->result_array();

            $insertSQL = "INSERT INTO user_wallets (user_id, currency_id, code) VALUES ";
            for($i = 0; $i < count($currencies); $i++) {
                if ($i == count($currencies) - 1) {
                    $insertSQL .= "(" . (int)$user_id . ", " . (int)$currencies[$i]['id'] . ", '" . $currencies[$i]['code'] . $user['xannia_number'] . "')";
                } else {
                    $insertSQL .= "(" . (int)$user_id . ", " . (int)$currencies[$i]['id'] . ", '" . $currencies[$i]['code'] . $user['xannia_number'] . "'),";
                }
            }

            $query = $this->wallet_db->query($insertSQL);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function addFunds($id, $amount) {
            $sql = "UPDATE user_wallets SET balance = balance + ? WHERE id = ?";
            $query = $this->wallet_db->query($sql, array((float)$amount, (int)$id));

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function deductFunds($wallet_id, $amount) {
            $sql = "UPDATE user_wallets SET balance = balance - $amount WHERE id = $wallet_id";
            $query = $this->wallet_db->query($sql);

            if ($query) {
                return TRUE;
            }

            return FALSE;
        }

        public function transferMoney($sender_wallet, $recipient_id, $amount, $recipient_amount, $recipient_wallet) {

            if($this->addFunds($recipient_wallet, $recipient_amount) && $this->deductFunds($sender_wallet, $amount)) {
                return TRUE;
            }

            return FALSE;
        }

        public function getDefaultWallet($user_id = '') {
            $user_id = $user_id == '' ? $this->session->userdata('user_id') : $user_id;

            $sql = "SELECT uw.id as wallet_id,
                uw.code as wallet_code,
                uw.currency_id as wallet_currency_id,
                uw.user_id as wallet_user_id,
                uw.balance as wallet_balance,
                uw.name as wallet_name,
                c.code as wallet_currency_code,
                c.simbol as wallet_currency_simbol,
                c.name as wallet_currency_name
            FROM user_wallets uw INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND uw.is_default = 1 AND uw.user_id = ? ORDER BY uw.balance DESC";

            $query = $this->wallet_db->query($sql, array((int)$user_id));
            $wallet = $query->row_array();

            return $wallet;
        }

        public function getWalletByID($id, $user_id = '') {
            $user_id = $user_id == '' ? $this->session->userdata('user_id') : $user_id;
            $sql = "SELECT uw.id as wallet_id,
                uw.code as wallet_code,
                uw.currency_id as wallet_currency_id,
                uw.user_id as wallet_user_id,
                uw.balance as wallet_balance,
                uw.name as wallet_name,
                c.code as wallet_currency_code,
                c.simbol as wallet_currency_simbol,
                c.name as wallet_currency_name
            FROM user_wallets uw INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND uw.user_id = ? AND uw.id = ? ORDER BY uw.balance DESC";

            $query = $this->wallet_db->query($sql, array((int)$user_id, $id));
            $wallet = $query->row_array();

            return $wallet;
        }

        public function getWalletByCurrencyCode($currency_code, $user_id = '') {
            $user_id = $user_id == '' ? $this->session->userdata('user_id') : $user_id;

            $sql = "SELECT uw.id as wallet_id,
                uw.code as wallet_code,
                uw.currency_id as wallet_currency_id,
                uw.user_id as wallet_user_id,
                uw.balance as wallet_balance,
                uw.name as wallet_name,
                c.code as wallet_currency_code,
                c.simbol as wallet_currency_simbol,
                c.name as wallet_currency_name
            FROM user_wallets uw INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND uw.user_id = ? AND c.code = ? ORDER BY uw.balance DESC";

            $query = $this->wallet_db->query($sql, array((int)$user_id, $currency_code));
            $wallet = $query->row_array();

            return $wallet;
        }

        public function getUserWallets($user_id) {
            $sql = "SELECT uw.id as wallet_id,
                    uw.code as wallet_code,
                    uw.currency_id as wallet_currency_id,
                    uw.user_id as wallet_user_id,
                    uw.balance as wallet_balance,
                    uw.name as wallet_name,
                    uw.is_default as wallet_is_default,
                    c.code as wallet_currency_code,
                    c.simbol as wallet_currency_simbol,
                    c.name as wallet_currency_name
                 FROM user_wallets uw INNER JOIN currencies c on c.id = uw.currency_id  WHERE uw.is_active = 1 AND uw.user_id = ? ORDER BY uw.is_default DESC, uw.balance DESC,  c.code ASC";
            $query = $this->wallet_db->query($sql, array((int)$user_id));
            $userWallets = $query->result_array();

            return $userWallets;
        }

        public function getNoneUsedWallets($user_id) {
            $sql = "SELECT c.id, c.code, c.simbol, c.name FROM currencies c WHERE c.id NOT IN (SELECT currency_id FROM user_wallets WHERE user_id = ?)";
            $query = $this->wallet_db->query($sql, array((int)$user_id));
            $noneUsedWallets = $query->result_array();

            return $noneUsedWallets;
        }
    }
 ?>