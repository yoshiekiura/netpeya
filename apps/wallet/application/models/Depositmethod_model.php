<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depositmethod_model extends MY_Model {

	private $table = 'deposit_method';

	public function __construct() {
		parent::__construct();
	}

	public function getAll()
	{
		$query = $this->db->get_where($this->table, array('is_active' => 1));
		return $query->result();
	}

	public function getById($id) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'id' => $id));
		return $query->row();
	}

	public function getDefault() {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'is_default' => 1));
		return $query->row();
	}

	public function getBySlug($slug) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'slug' => $slug));
		return $query->row();
	}
}
