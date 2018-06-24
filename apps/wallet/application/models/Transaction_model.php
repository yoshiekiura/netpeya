<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends MY_Model {
	//const EXCHANGE = 1;
	const RECEIVED = 2;
	const DEPOSIT = 3;
	const WITHDRAW = 4;
	const PAYMENT = 5;
	const SEND = 6;


	const APPROVED = 1;
	const DECLINED = 2;
	const PENDING = 3;

	private $table = 'transaction';

	public function __construct() {
		parent::__construct();

		$this->user_id = $this->session->userdata('user')['user_id'];
	}

	public function get($filters = null, $limit = 0, $start = 0)
	{
		$limit = $limit == 0 ? 1 : $limit;

        $filter_str = $filters ? $this->createExtraSQL($filters) : '';

        $where = "transaction.user_id = {$this->user_id}";
        $search_filters = $where . $filter_str;

		$this->db->select('transaction.*, transaction_status.name as status, transaction_type.name as transaction_type, DATE_FORMAT(transaction.ts_created, "%d-%b-%Y") as date')
				->from($this->table)
				->join('transaction_type', 'transaction_type.id = ' . $this->table . '.transaction_type_id')
				->join('transaction_status', 'transaction_status.id = ' . $this->table . '.transaction_status_id')
				->where($search_filters)
				->offset($start)
				->order_by($this->table.'.ts_created', 'desc')
				->limit($limit);
		$query = $this->db->get();
		//echo($this->db->last_query());die();
		return $query->result();
	}

	public function getTransactionRows($filters)
	{
        $filter_str = $filters ? $this->createExtraSQL($filters) : '';

        $where = "transaction.user_id = {$this->user_id}";
        $search_filters = $where . $filter_str;

		$this->db->select('transaction.*, transaction_status.name as status, transaction_type.name as transaction_type, DATE_FORMAT(transaction.ts_created, "%d-%b-%Y") as date')
				->from($this->table)
				->join('transaction_type', 'transaction_type.id = ' . $this->table . '.transaction_type_id')
				->join('transaction_status', 'transaction_status.id = ' . $this->table . '.transaction_status_id')
				->where($search_filters)
				->order_by($this->table.'.ts_created', 'desc');
		$query = $this->db->get();
		return count($query->result());
	}

	public function createTransaction($type, $user_id, $status, $amount, $description) {
		$data = array(
			'transaction_type_id' => $type,
			'user_id' => $user_id,
			'transaction_status_id' => $status,
			'amount' => $amount,
			'description' => $description
		);

		$transaction_data = $this->_filter_data($this->table, $data);

		$this->db->insert($this->table, $transaction_data);
		$transaction_id = $this->db->insert_id($this->table . '_id_seq');

		if ($transaction_id) {
			return true;
		}

		return false;
	}

	private function createExtraSQL($filters) {

		$filter_str = '';
		if($filters && is_array($filters)) {
			if(array_key_exists('search_date_from', $filters) && $filters['search_date_from'] != '') {
				$search_date_from = $filters['search_date_from'];
			}
			if(array_key_exists('search_date_to', $filters) && $filters['search_date_to'] != '') {
	            $search_date_to = $filters['search_date_to'];
	        }
            if(isset($search_date_from) && isset($search_date_to)) {
                $filter_str .= " AND DATE(transaction.ts_created) BETWEEN STR_TO_DATE('{$search_date_from}', '%Y/%m/%d') AND STR_TO_DATE('{$search_date_to}', '%Y/%m/%d') ";
            }

			if(array_key_exists('transaction_type', $filters) && $filters['transaction_type'] != '') {
	            $transaction_type = $filters['transaction_type'];
	            $filter_str .= " AND transaction.transaction_type_id = {$transaction_type}";
	        }
		}

        return $filter_str;
	}
}