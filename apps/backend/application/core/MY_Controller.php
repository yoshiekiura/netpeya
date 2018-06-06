<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->library(array('xannia_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->load->library('session');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'xannia'), $this->config->item('error_end_delimiter', 'xannia'));

		$this->lang->load('xannia');
		$this->load->model('user_model');
		$this->load->model('wallet_model');
		$this->load->model('transaction_model');
		$this->load->model('paymentmethod_model');
		$this->load->model('recipient_model');
		$this->load->model('country_model');

        $this->load->library('email', $this->config->item('email_account', 'xannia'));
        $this->email->set_header('Content-Type', 'image/jpeg');
		$this->email->set_header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
		$this->email->set_header('Cache-Control', 'post-check=0, pre-check=0', false);
		$this->email->set_header('Pragma', 'no-cache');

		if($this->session->all_userdata()) {
			$this->payment_methods = $this->paymentmethod_model->getAllMethods();
			$this->user = $this->user_model->getUserByID($this->session->userdata('user_id'));
			$this->user['noneUsedWallets'] = $this->wallet_model->getNoneUsedWallets($this->session->userdata('user_id'));
			//$this->user['account_balance'] =  number_format((float)$this->user['account_balance'], 2, '.', ' ');
			$this->user['user_wallets'] = $this->wallet_model->getUserWallets($this->session->userdata('user_id'));
			$this->user['user_recipients'] = $this->recipient_model->getUserRecipients($this->session->userdata('user_id'));
			$this->user['default_wallet'] = $this->wallet_model->getDefaultWallet();
			$this->user['unused_wallets'] = $this->wallet_model->getNoneUsedWallets($this->session->userdata('user_id'));

			//var_dump($this->session->all_userdata());die(0);
		}
	}
}