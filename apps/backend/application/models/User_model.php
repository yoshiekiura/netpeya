<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model {
        public function __construct() {
             parent::__construct();

             $this->load->database();

            $this->tables = $this->config->item('tables', 'xannia');


            $this->identity_column = $this->config->item('identity', 'xannia');
            $this->store_salt = $this->config->item('store_salt', 'xannia');
            $this->salt_length = $this->config->item('salt_length', 'xannia');
            $this->join = $this->config->item('join', 'xannia');

            $this->hash_method = $this->config->item('hash_method', 'xannia');
            $this->default_rounds = $this->config->item('default_rounds', 'xannia');
            $this->random_rounds = $this->config->item('random_rounds', 'xannia');
            $this->min_rounds = $this->config->item('min_rounds', 'xannia');
            $this->max_rounds = $this->config->item('max_rounds', 'xannia');
        }

        public function addUser($user) {
            $sql = "
                INSERT INTO users (
                    first_name,
                    last_name,
                    email_address,
                    password
                )

                VALUES (
                    ?, ?, ?, ?
                )
            ";

            $query = $this->db->query($sql, array(
                $user['first_name'],
                $user['last_name'],
                $user['email_address'],
                $user['password']
            ));

            return $this->db->insert_id();
        }

        public function create_automatic_user($recipient_email, $defaul_currency) {
            $this->load->model('currency_model');
            $this->load->model('auth_model');

            $currency_id = $this->currency_model->getCurrencyByCode($defaul_currency)['id'];
            $user = array(
                'register_country' => 0,
                'register_firstname' => '',
                'register_lastname' => '',
                'register_password' => '',
                'register_password' => '',
                'register_businessname' => '',
                'register_account_type' => 1,
                'email_address' => $recipient_email
            );

            $res = $this->auth_model->create_user($user, true);

            if($res) {
                return $this->getUserInfo($recipient_email);
            }

            return $res;
        }

        public function createUserXanniaNumber($user_id) {
            $xannia_number = str_pad(str_shuffle($user_id . time()), 12, '0', STR_PAD_BOTH);

            $sql = "UPDATE users SET xannia_number = 'XP" . $xannia_number . "' WHERE id = " . (int)$user_id;

            $query = $this->db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function is_merchant() {
            $user = $this->getUserByID($this->session->userdata('user_id'));
            if($user['account_type'] == 2) {
                return true;
            } else {
                return false;
            }
        }

        public function become_merchant() {
            $sql = "UPDATE users SET account_type = 2 WHERE id = ?";

            $query = $this->db->query($sql, array((int)$this->session->userdata('user_id')));

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function getAllUser() {
        	$sql = "
        		SELECT * FROM users
        	";

        	$query = $this->db->query($sql);

        	return $query->result_array();

        }

        //Gets user info $key can be email or Xannia ID
        public function getUserInfo($key) {
            $sql = "SELECT * FROM users WHERE xannia_number = '$key' OR email_address = '$key'";

            $result = array();

            $user = $this->db->query($sql)->row_array();

            $this->load->model('wallet_model');

            $user_wallets = $this->wallet_model->getUserWallets($user['id']);

            if($user && $user_wallets) {
                $result['user'] = $user;
                $result['wallets'] = $user_wallets;
            }

            return $result;
        }


        public function getUserByID($id) {
            $sql = "
                SELECT * FROM users WHERE id = ?
            ";

            $query = $this->db->query($sql, array((int)$id));

            $user = $query->row_array();

            unset($user['password']);
            unset($user['salt']);

            return $user;

        }

        public function getUserExtraData($id) {
            $user = $this->getUserByID($id);

            $sql = "
                SELECT c.name country_name FROM countries c WHERE id = ?
            ";

            $query = $this->db->query($sql, array((int)$user['country_id']));

            return $query->row_array();
        }

        public function finish_setup($user) {
            $ip_address = $this->_prepare_ip($this->input->ip_address());

            $created = $this->auth_model->complete_setup($user);

            if($created) {
                return $this->getUserByID($user['id']);
            }

            return FALSE;
        }

        public function hash_password($password, $salt = FALSE, $use_sha1_override = FALSE) {
            if (empty($password))
            {
                return FALSE;
            }

            // bcrypt
            if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
            {
                return $this->bcrypt->hash($password);
            }


            if ($this->store_salt && $salt)
            {
                return sha1($password . $salt);
            }
            else
            {
                $salt = $this->salt();
                return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
            }
        }

        public function salt() {
            $raw_salt_len = 16;

            $buffer = '';
            $buffer_valid = FALSE;

            if (function_exists('random_bytes'))
            {
                $buffer = random_bytes($raw_salt_len);
                if ($buffer)
                {
                    $buffer_valid = TRUE;
                }
            }

            if (!$buffer_valid && function_exists('mcrypt_create_iv') && !defined('PHALANGER'))
            {
                $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
                if ($buffer)
                {
                    $buffer_valid = TRUE;
                }
            }

            if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes'))
            {
                $buffer = openssl_random_pseudo_bytes($raw_salt_len);
                if ($buffer)
                {
                    $buffer_valid = TRUE;
                }
            }

            if (!$buffer_valid && @is_readable('/dev/urandom'))
            {
                $f = fopen('/dev/urandom', 'r');
                $read = strlen($buffer);
                while ($read < $raw_salt_len)
                {
                    $buffer .= fread($f, $raw_salt_len - $read);
                    $read = strlen($buffer);
                }
                fclose($f);
                if ($read >= $raw_salt_len)
                {
                    $buffer_valid = TRUE;
                }
            }

            if (!$buffer_valid || strlen($buffer) < $raw_salt_len)
            {
                $bl = strlen($buffer);
                for ($i = 0; $i < $raw_salt_len; $i++)
                {
                    if ($i < $bl)
                    {
                        $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                    }
                    else
                    {
                        $buffer .= chr(mt_rand(0, 255));
                    }
                }
            }

            $salt = $buffer;

            // encode string with the Base64 variant used by crypt
            $base64_digits = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
            $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $base64_string = base64_encode($salt);
            $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

            $salt = substr($salt, 0, $this->salt_length);

            return $salt;
        }

        protected function _prepare_ip($ip_address) {
            return $ip_address;
        }
    }
 ?>