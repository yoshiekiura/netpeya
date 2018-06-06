<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Main
class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('frontend/home');
	}

	public function welcome() {
		$this->load->view('frontend/home');
	}
}
