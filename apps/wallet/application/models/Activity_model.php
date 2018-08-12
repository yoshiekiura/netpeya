<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends MY_Model {

	private $table = 'activity_feed';

	public function __construct() {
		parent::__construct();

		$this->user_id = $this->session->userdata('user')['user_id'];
	}

	public function add($activity, $user_id = '') {
		$activity['user_id'] = $user_id != '' ? $user_id : $this->user_id;
		$activity_data = $this->_filter_data($this->table, $activity);
		$this->db->insert($this->table, $activity_data);
		$activity_id = $this->db->insert_id($this->table . '_id_seq');

		if($activity_id) {
			return TRUE;
		}

		return FALSE;
	}

	public function getAll($limit = 5)
	{
		$query = $this->db->select('*, DATE_FORMAT(ts_created, "%Y-%m-%d") as date')->from($this->table)
		        ->group_start()
		                ->where('DATE_FORMAT(ts_created, "%Y-%m-%d") = DATE_FORMAT(ts_created, "%Y-%m-%d")')
		        ->group_end()
		        ->where(array('user_id' => $this->user_id))
		        ->limit($limit)
		        ->order_by('ts_created', 'desc')
				->get();
		$res = $query->result();

		$result = array();

		foreach($res as $r) {
			$date = $r->date;
			$now = time();
			$db_time = strtotime($date);
			$datediff = ($now - $db_time) / (60 * 60 * 24);
			if($datediff < 1) {
				$date = 'Today';
			} elseif($datediff <= 30) {
				$date = $datediff < 2 ? 'Yesterday' : intval($datediff) . ' days ago';
			}

			$r->time = date("H:i", strtotime($r->ts_created));

			$result[$date][] = $r;
		}

		return $result;
	}

	public function getById($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		return $query->row();
	}
}
