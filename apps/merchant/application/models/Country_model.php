<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Country_model extends MY_Model {
        public function __construct() {
             parent::__construct();
        }

        public function getAllCountries() {
        	$sql = "
        		SELECT * FROM countries
        	";

        	$query = $this->xannia_db->query($sql);

        	return $query->result_array();

        }

        public function getCountryByID($countryID) {
        	$sql = "
        		SELECT * FROM countries WHERE id = ?
        	";

        	$query = $this->xannia_db->query($sql, array((int)$countryID));

        	return $query->row_array();

        }
    }
 ?>