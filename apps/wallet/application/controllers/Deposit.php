<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['pageTitle'] = "deposit";
	}

	public function index()
	{
		$this->load->view('deposit/index.php', $this->data);
	}
}
