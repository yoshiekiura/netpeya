<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['pageTitle'] = "dashboard";
	}

	public function index()
	{
		$this->load->view('dashboard', $this->data);
	}

	public function transactions()
	{
		$this->data['pageTitle'] = "transactions";
		$this->load->view('transactions', $this->data);
	}
}
