<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Recipient_model extends MY_Model {
        public function __construct() {
             parent::__construct();
        }

        public function addRecipient($recipient_id, $user_id = '') {
            $user_id = $user_id == '' ? $this->session->userdata('user_id') : $user_id;
        	$sql = "
        		INSERT INTO recipients (user_id, recipient_id)
                VALUES(?, ?)
        	";

        	$query = $this->xannia_db->query($sql, array($user_id, $recipient_id));

        	if ($query > 0) {
                return true;
            }

            return false;

        }

        public function getUserRecipients($user_id) {
            $sql = "
                SELECT u.id as recipient_id, u.first_name as recipient_first_name, u.last_name as recipient_last_name, u.email_address as recipient_email
                FROM users u INNER JOIN recipients r ON r.recipient_id = u.id
                WHERE u.is_active = 1 AND r.user_id = ?
            ";

            $query = $this->xannia_db->query($sql, array((int)$user_id));

            return $query->result_array();
        }

        public function getByRecipientId($id) {
            $sql = "
                SELECT * FROM recipients WHERE recipient_id = ?
            ";

            $query = $this->xannia_db->query($sql, array($id));

            return $query->row_array();
        }
    }
 ?>