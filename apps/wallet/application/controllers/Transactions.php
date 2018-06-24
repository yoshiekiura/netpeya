<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->netpeya_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('transaction_model');
	}

	public function all()
	{
		$this->load->library('pagination');
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['pageTitle'] = "transactions";

		$filters = array();

		$pagination_config = $this->config->item('pagination');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$filters = $this->input->post();
		}

		$filters['transaction_type'] = array_key_exists('transaction_type', $filters) ? $filters['transaction_type'] : '';
		$filters['search_date_from'] = array_key_exists('search_date_from', $filters) ? $filters['search_date_from'] : '';
		$filters['search_date_to'] = array_key_exists('search_date_to', $filters) ? $filters['search_date_to'] : '';

		if($filters['search_date_from'] && $filters['search_date_to']) {
			$t_f = strtotime($filters['search_date_from']);
			$t_t = strtotime($filters['search_date_to']);

			$filters['search_date_from'] = date('Y/m/d', $t_f);
			$filters['search_date_to'] = date('Y/m/d', $t_t);
		}

		$this->data['transactions'] = $this->transaction_model->get($filters, $pagination_config['per_page'], $start_index);
		$pagination_config['total_rows'] = $this->transaction_model->getTransactionRows($filters);

		$this->pagination->initialize($pagination_config);
        $this->data['results_count'] = count($this->data['transactions']);
        $this->data['total_results'] = $pagination_config['total_rows'];
        $this->data['index'] = $start_index;
        $this->data["links"] = $this->pagination->create_links();

		$this->load->view('transactions/index', $this->data);
	}
}
