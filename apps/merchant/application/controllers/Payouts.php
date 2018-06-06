<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Main
class Payouts extends MY_Controller {
	public function __construct() {
		parent::__construct();

		if (!$this->xannia_auth->logged_in())
		{
			redirect('login');
		}
	}
	public function index()
	{
		redirect('payout/search');
	}

	public function search() {

		$data = array();
		$data['title'] = 'payouts - search';
		$data['payouts'] = array();

		$data['payment_methods'] = $this->paymentmethod_model->getAllMethods();
		$this->load->view('payouts/search', $data);
	}

	public function report()
	{
		$this->load->library('pagination');
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data = array();
		$data['title'] = 'payouts - report';
		$data['payouts'] = array();
		if ($this->input->server('REQUEST_METHOD') == 'POST' || $_COOKIE["sale_search_filter"]) {
			$pagination_config = $this->config->item('pagination');
			$filters = $this->input->post() ? $this->input->post() : (array)json_decode($_COOKIE["sale_search_filter"]);
			if($start_index == 0) {
				setcookie("sale_search_filter", json_encode($filters));
			}

			$filters['search_amount_to'] = array_key_exists('search_amount_to', $filters) ? $filters['search_amount_to'] : '';
			$filters['search_amount_from'] = array_key_exists('search_amount_from', $filters) ? $filters['search_amount_from'] : '';
			$filters['search_order_ref'] = array_key_exists('search_order_ref', $filters) ? $filters['search_order_ref'] : '';

			$data['filters'] = $filters;
			if($filters['search_date_range_from'] && $filters['search_date_range_to']) {
				$t_f = strtotime($filters['search_date_range_from']);
				$t_t = strtotime($filters['search_date_range_to']);

				$filters['search_date_range_from'] = date('Y/m/d', $t_f);
				$filters['search_date_range_to'] = date('Y/m/d', $t_t);
			}

			if($filters['search_amount_to'] && $filters['search_amount_from']) {
				if($filters['search_amount_to'] < $filters['search_amount_from']) {
					$filters['search_amount_to'] = '';
				}
			}
			$data['payouts'] = $this->transaction_model->getUserPayouts($filters, $pagination_config['per_page'], $start_index);
            $pagination_config['total_rows'] = $this->transaction_model->getTotalPayoutsRowsCount($filters);
            $pagination_config['base_url'] = base_url() . 'payouts/report';
            $this->pagination->initialize($pagination_config);
            $data['total_results'] = count($data['payouts']);
            $data["links"] = $this->pagination->create_links();

			$data['search_criteria']['search_payment_methods'] = array();
			$data['search_criteria']['search_status'] = array();

			$db_methods = $this->paymentmethod_model->getAllMethods();
			foreach($filters['search_payment_method'] as $search_method) {
				foreach($db_methods as $db_method) {
					if($db_method['id'] == $search_method) {
						$data['search_criteria']['search_payment_methods'][$db_method['name']] = $db_method['id'];
					}
				}
			}

			$this->load->model('transactionstatus_model');

			$db_statuses = $this->transactionstatus_model->getAllTransactionStatuses();

			$data['methods'] = $db_methods;
			foreach($filters['search_status'] as $search_status) {
				foreach($db_statuses as $db_status) {
					if($db_status['id'] == $search_status) {
						$data['search_criteria']['search_status'][$db_status['name']] = $db_status['id'];
					}
				}
			}

			$data['statuses'] = $db_statuses;
			$data['search_criteria']['search_order_ref'] = $filters['search_order_ref'];
			$data['search_criteria']['search_amount_from'] = $filters['search_amount_from'];
			$data['search_criteria']['search_amount_to'] = $filters['search_amount_to'];
			$data['search_criteria']['search_date_range_from'] = $filters['search_date_range_from'];
			$data['search_criteria']['search_date_range_to'] = $filters['search_date_range_to'];


		} else {
			redirect('payouts/search');
		}

		$this->load->view('payouts/report', $data);
	}
}
