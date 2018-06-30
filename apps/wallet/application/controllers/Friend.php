<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->netpeya_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('currency_model');
		$this->data['pageTitle'] = "friends";
	}

	public function index()
	{
		$this->load->view('friend/list', $this->data);
	}

    public function add()
    {
        $this->load->view('friend/add', $this->data);
    }
}
