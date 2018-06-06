<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Main
class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();

		if (!$this->xannia_auth->logged_in())
		{
			redirect('login');
		}
	}
	public function index()
	{
		redirect('dashboard');
	}

	public function dashboard()
	{
		$data = array();
		$data['title'] = 'dashboard';
		$default_currency = $this->user['default_wallet']['wallet_currency_code'];

		$all_last_month_money_in = $this->transaction_model->getLastMonthMoneyIn();
		$all_this_month_money_in = $this->transaction_model->getThisMonthMoneyIn();
		$all_last_month_money_out = $this->transaction_model->getLastMonthMoneyOut();
		$all_this_month_money_out = $this->transaction_model->getThisMonthMoneyOut();

		$data['last_month_money_in'] = Tools::loopDashboardStats($all_last_month_money_in, $default_currency);
		$data['this_month_money_in'] = Tools::loopDashboardStats($all_this_month_money_in, $default_currency);
		$data['last_month_money_out'] = Tools::loopDashboardStats($all_last_month_money_out, $default_currency);
		$data['this_month_money_out'] = Tools::loopDashboardStats($all_this_month_money_out, $default_currency);

		$data['ava_sale_this_month'] = count($all_this_month_money_in) > 0 ? $data['this_month_money_in'] / count($all_this_month_money_in) : 0;
		$data['ava_sale_last_month'] = count($all_last_month_money_in) > 0 ? $data['last_month_money_in'] / count($all_last_month_money_in) : 0;

		$data['ava_sale_perc'] = Tools::calculatePercent($data['ava_sale_this_month'], $data['ava_sale_last_month']);

		$data['money_in_perc'] = Tools::calculatePercent($data['this_month_money_in'], $data['last_month_money_in']);

		$data['money_out_perc'] = Tools::calculatePercent($data['this_month_money_out'], $data['last_month_money_out']);

		$data['history'] = $this->transaction_model->getUserTransactions(0, 0, 0, 0, 0, 5);
		$this->load->view('dashboard', $data);
	}

	public function settings()
	{
		$data = array();
		$data['title'] = 'settings';
		$this->load->view('settings', $data);
	}

	public function transfer()
	{
		$data = array();
		$data['title'] = 'transfer';
		$data['fees'] = $this->config->item('internal_transfer_fee', 'xannia');
		$data['currencies'] = $this->currency_model->getAllCurrencies();
		$this->load->view('transfer', $data);
	}

	public function deposit()
	{
		$data = array();
		$data['title'] = 'deposit';
		$this->load->view('deposit', $data);
	}

	public function wallets()
	{
		$data = array();
		$data['title'] = 'wallets';
		$this->load->view('wallets', $data);
	}

	public function xannia_cards()
	{
		$data = array();
		$data['title'] = 'xannia-cards';
		$this->load->model('xcard_model');

		$data['cards'] = $this->xcard_model->getUserCards($this->session->userdata('user_id'));
		//var_dump(($data['cards']));die();
		$this->load->view('xannia_cards', $data);
	}

	public function history()
	{
		$this->load->model('transaction_model');
		$data = array();
		$data['title'] = 'history';
		$this->load->view('history', $data);
	}
}
