<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Apikey_model extends MY_Model {
        public function __construct() {
             parent::__construct();

             $this->load->database();

             $this->user_id = $this->session->userdata('user_id');
            
            if($this->session->all_userdata()) {
                $this->load->model('usersession_model');

                $session = $this->usersession_model->getUserSession($this->session->userdata('user_id'));

                if(isset($session)) {
                    if(array_key_exists('environment_id', $session)) {
                        if($session['environment_id'] == MY_Controller::SANDBOX) {
                            $this->xannia_db = $this->load->database('merchant_sandbox', true);
                        }
                    }
                }
            }
        }

        public function getUserKey($user_id) {
        	$sql = "
        		SELECT * FROM user_api_keys WHERE user_id = ?
        	";

        	$query = $this->xannia_db->query($sql, array((int)$user_id));

        	return $query->row_array();

        }

        public function refreshKeys($user_id) {
            $api_key = Tools::generateKey(16);
            $secret_key = Tools::generateKey(28);

            $q = "DELETE FROM user_api_keys WHERE user_id = {$user_id}";
            $this->xannia_db->query($q);

            $sql = "INSERT INTO user_api_keys (user_id, api_key, secret_key) VALUES ({$user_id}, '{$api_key}', '{$secret_key}')";
            $query = $this->xannia_db->query($sql);

            if ($query > 0) {
                return $this->getUserKey($user_id);
            }

            return false;
        }
    }
 ?>