<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->netpeya_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('currency_model');
		$this->data['pageTitle'] = "settings";
	}

	public function index()
	{
		$this->load->view('settings/details', $this->data);
	}

    public function security()
    {
        $this->load->view('settings/security', $this->data);
    }
}
