<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend_model extends MY_Model {

	private $table = 'friend';

	public function __construct() {
		parent::__construct();

		$this->user_id = $this->session->userdata('user')['user_id'];
	}

	public function add($friend) {
		$friend['user_id'] = $this->user_id;
		$user_data = $this->_filter_data($this->table, $friend);
		$this->db->insert($this->table, $user_data);
		$friend_id = $this->db->insert_id($this->table . '_id_seq');

		if($friend_id) {
			return $this->getById($friend_id);
		}

		return FALSE;
	}

	public function getAll()
	{
		$query = $this->db->order_by('ts_created', 'desc')->get_where($this->table, array('is_active' => 1, 'user_id' => $this->user_id));
		return $query->result();
	}

	public function getById($id)
	{
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'id' => $id));
		return $query->row();
	}

	public function getByNameEmail($id) {
		$query = $this->db->get_where($this->table, array('is_active' => 1, 'user_id' => $this->user_id));
		return $query->row();
	}
}
