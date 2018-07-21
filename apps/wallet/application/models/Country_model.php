<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends MY_Model {

	private $table = 'country';

	public function __construct() {
		parent::__construct();
	}

	public function getAll()
	{
		$query = $this->db->get_where($this->table, array('is_active' => 1));
		return $query->result();
	}

	public function getByCode($code) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'code' => $code));
		return $query->row();
	}

	public function getById($id) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'id' => $id));
		return $query->row();
	}
}
