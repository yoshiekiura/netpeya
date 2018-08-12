<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['pageTitle'] = 'send to email';
		$this->load->view('send/index', $this->data);
	}

	public function send_to_email() {
		$this->data['pageTitle'] = 'send to email';
		$this->load->view('send/to_email', $this->data);
	}

	public function send_to_cell() {
		$this->data['pageTitle'] = 'send to cell';
		$this->load->view('send/to_cell', $this->data);
	}
}