<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Main
class Balance extends MY_Controller {
	public function __construct() {
		parent::__construct();

		if (!$this->xannia_auth->logged_in())
		{
			redirect('login');
		}
		$this->load->library('pagination');
	}
	public function index()
	{
		redirect('balances/summary');
	}

	public function summary() {
		$data = array();
		$data['title'] = 'balance - summary';
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['filters'] = array();

		if ($this->input->server('REQUEST_METHOD') == 'POST' || isset($_COOKIE["balance_statement_filter"])) {

			if($this->input->post()) {
				$filters = $this->input->post();
				if($start_index == 0) {
					setcookie("balance_statement_filter", json_encode($filters));
				}
			} elseif(isset($_COOKIE["balance_statement_filter"])) {
				$filters = (array)json_decode($_COOKIE["balance_statement_filter"]);
			}

		}

		if($start_index == 0 && $this->input->server('REQUEST_METHOD') != 'POST' && !isset($_COOKIE["balance_statement_filter"])) {
			$from = new DateTime();
			$from = $from->sub(DateInterval::createFromDateString('30 days'));
			$from =  $from->format('Y/m/d');
			$to = new DateTime();
			$to = $to->format('Y/m/d');

			$data['filters']['search_date_30_days'] = 'last_30_days';
			$data['search_criteria']['search_date_range_from'] = $from;
			$data['search_criteria']['search_date_range_to'] = $to;

			$data['summary_entries'] = $this->transaction_model->getBalanceSummary();
		} else {
			$pagination_config = $this->config->item('pagination');

			$data['filters'] = $filters;

			if($filters['search_date_range_from'] && $filters['search_date_range_to']) {
				$t_f = strtotime($filters['search_date_range_from']);
				$t_t = strtotime($filters['search_date_range_to']);

				$filters['search_date_range_from'] = date('Y/m/d', $t_f);
				$filters['search_date_range_to'] = date('Y/m/d', $t_t);
			}

			$data['summary_entries'] = $this->transaction_model->getBalanceSummary($filters, $pagination_config['per_page'], $start_index);
            $pagination_config['total_rows'] = $this->transaction_model->getBalanceSummaryTotalRowsCount($filters);
            $pagination_config['base_url'] = base_url() . 'balance/summary';
            $this->pagination->initialize($pagination_config);
            $data["links"] = $this->pagination->create_links();
			$data['search_criteria']['search_date_range_from'] = $filters['search_date_range_from'];
			$data['search_criteria']['search_date_range_to'] = $filters['search_date_range_to'];
		}

		$this->load->view('balance/summary', $data);
	}

	public function statement() {
		$data = array();
		$data['title'] = 'balance - statement';
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['filters'] = array();

		if ($this->input->server('REQUEST_METHOD') == 'POST' || isset($_COOKIE["balance_statement_filter"])) {

			if($this->input->post()) {
				$filters = $this->input->post();
				if($start_index == 0) {
					setcookie("balance_statement_filter", json_encode($filters));
				}
			} elseif(isset($_COOKIE["balance_statement_filter"])) {
				$filters = (array)json_decode($_COOKIE["balance_statement_filter"]);
			}

		}

		if($start_index == 0 && $this->input->server('REQUEST_METHOD') != 'POST' && !isset($_COOKIE["balance_statement_filter"])) {
			$from = new DateTime();
			$from = $from->sub(DateInterval::createFromDateString('30 days'));
			$from =  $from->format('Y/m/d');
			$to = new DateTime();
			$to = $to->format('Y/m/d');

			$data['filters']['search_date_30_days'] = 'last_30_days';
			$data['search_criteria']['search_date_range_from'] = $from;
			$data['search_criteria']['search_date_range_to'] = $to;

			$data['entries'] = $this->transaction_model->getUserTransactions();
		} else {
			$pagination_config = $this->config->item('pagination');

			$data['filters'] = $filters;

			if($filters['search_date_range_from'] && $filters['search_date_range_to']) {
				$t_f = strtotime($filters['search_date_range_from']);
				$t_t = strtotime($filters['search_date_range_to']);

				$filters['search_date_range_from'] = date('Y/m/d', $t_f);
				$filters['search_date_range_to'] = date('Y/m/d', $t_t);
			}

			$data['entries'] = $this->transaction_model->getUserTransactions($filters, $pagination_config['per_page'], $start_index);
            $pagination_config['total_rows'] = $this->transaction_model->getTotalTransactionsRowsCount($filters);
            $pagination_config['base_url'] = base_url() . 'balance/statement';
            $this->pagination->initialize($pagination_config);
            $data["links"] = $this->pagination->create_links();
			$data['search_criteria']['search_date_range_from'] = $filters['search_date_range_from'];
			$data['search_criteria']['search_date_range_to'] = $filters['search_date_range_to'];
		}

		$this->load->view('balance/statement', $data);
	}
}
