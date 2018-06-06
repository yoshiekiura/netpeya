<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	const SANDBOX = 1;
	const PRODUCTION = 2;

	public function __construct() {
		parent::__construct();

		$this->load->library(array('xannia_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->load->library('session');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'xannia'), $this->config->item('error_end_delimiter', 'xannia'));

		$this->lang->load('xannia');
		$this->load->model('user_model');
		$this->load->model('account_model');
		$this->load->model('transaction_model');
		$this->load->model('paymentmethod_model');
		$this->load->model('usersession_model');
		$this->load->model('country_model');
		$this->load->model('currency_model');

        $this->load->library('email', $this->config->item('email_account', 'xannia'));
        $this->email->set_header('Content-Type', 'image/jpeg');
		$this->email->set_header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
		$this->email->set_header('Cache-Control', 'post-check=0, pre-check=0', false);
		$this->email->set_header('Pragma', 'no-cache');

		if($this->session->all_userdata()) {
			$this->payment_methods = $this->paymentmethod_model->getAllMethods();
			$this->user = $this->user_model->getUserByID($this->session->userdata('user_id'));
			$this->user_session = $this->usersession_model->getUserSession($this->session->userdata('user_id'));
			$this->user['currency'] = $this->currency_model->getCurrencyByID($this->user['currency_id']);
		}
	}
}