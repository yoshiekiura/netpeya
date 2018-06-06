<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Country_model extends CI_Model {
        public function __construct() {
             parent::__construct();

             $this->load->database();
        }

        public function getAllCountries() {
        	$sql = "
        		SELECT * FROM countries
        	";

        	$query = $this->db->query($sql);

        	return $query->result_array();

        }

        public function getCountryByID($countryID) {
        	$sql = "
        		SELECT * FROM countries WHERE id = ?
        	";

        	$query = $this->db->query($sql, array((int)$countryID));

        	return $query->row_array();

        }
    }
 ?>