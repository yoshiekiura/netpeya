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
		$this->dashboard();
	}

	public function dashboard()
	{
		$this->load->model('activity_model');
		$this->data['activities'] = $this->activity_model->getAll(5);
		$this->renderView('dashboard', $this->data);
	}
}
