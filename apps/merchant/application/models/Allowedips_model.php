<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Allowedips_model extends MY_Model {
        public function __construct() {
             parent::__construct();

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

        public function getUserIPs($user_id) {
        	$sql = "
        		SELECT * FROM allowed_ips WHERE user_id = ? AND is_active = 1
        	";

        	$query = $this->xannia_db->query($sql, array((int)$user_id));

        	return $query->result_array();

        }

        public function addIP($user_id, $ip) {
            $sql = "INSERT INTO allowed_ips (user_id, ip) VALUES ({$user_id}, '{$ip}')";
            $query = $this->xannia_db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function deleteIP($id) {
            $sql = "DELETE FROM allowed_ips WHERE id = {$id}";
            $query = $this->xannia_db->query($sql);

            if ($query > 0) {
                return true;
            }

            return false;
        }
    }
 ?>