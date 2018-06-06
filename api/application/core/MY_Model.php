<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model
{

	public function __construct() {
		parent::__construct();

		parent::__construct();
		$this->load->database();
		$this->merchant_db = $this->load->database('merchant', true);
		$this->wallet_db = $this->load->database('wallet', true);
		$this->load->model('auth_model');

		// $this->load->library('email', $this->config->item('email_account', 'xannia'));
		// $this->email->set_header('Content-Type', 'image/jpeg');
		// $this->email->set_header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
		// $this->email->set_header('Cache-Control', 'post-check=0, pre-check=0', false);
		// $this->email->set_header('Pragma', 'no-cache');
	}
}