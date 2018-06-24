<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['pageTitle'] = "dashboard";
		if (!$this->netpeya_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('transaction_model');
	}

	public function index()
	{
		$this->load->view('app', $this->data);
	}

	public function dashboard()
	{
		$this->load->view('dashboard', $this->data);
	}
}
