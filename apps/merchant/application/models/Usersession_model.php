<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Usersession_model extends MY_Model {
        public function __construct() {
             parent::__construct();
        }

        public function getUserSession($id) {
        	$sql = "
        		SELECT * FROM user_session WHERE user_id = ?
        	";

        	$query = $this->xannia_db->query($sql, array((int)$id));

        	return $query->row_array();

        }

        public function updateUserSessionEnvironment($user_id, $environment_id) {
            $sql = '';

            if(!$this->getUserSession($user_id)) {
                $sql = "
                    INSERT INTO user_session (environment_id, user_id) VALUES (?, ?)
                ";
            } else {
                $sql = "
                    UPDATE user_session SET environment_id = ? WHERE user_id = ?
                ";
            }

        	$query = $this->xannia_db->query($sql, array((int)$environment_id, (int)$user_id));
            
            if ($query > 0) {
                return true;
            }

            return false;

        }
    }
 ?>