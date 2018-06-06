<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Settings
class Settings extends MY_Controller {
	public function __construct() {
		parent::__construct();

		if (!$this->xannia_auth->logged_in())
		{
			redirect('login');
		}
	}
	public function index()
	{
		redirect('settings/profile');
	}

	public function profile()
	{
		$data = array();
		$data['title'] = 'settings - profile';

		$data['countries'] = $this->country_model->getAllCountries();
		$data['currencies'] = $this->currency_model->getAllCurrencies();
		
		$this->load->view('settings/profile', $data);
	}

	public function api()
	{
		$this->load->model('apikey_model');
		$data = array();
		$data['title'] = 'settings - api';
		
		$data['api'] = $this->apikey_model->getUserKey($this->user['id']);
		$this->load->view('settings/api', $data);
	}

	public function verification()
	{
		$data = array();
		$data['title'] = 'settings - verify';

		$this->load->view('settings/verify', $data);
	}

	public function security()
	{
		$this->load->model('allowedips_model');
		$data = array();
		$data['title'] = 'settings - security';

		$data['allowed_ips'] = $this->allowedips_model->getUserIPs($this->user['id']);
		$this->load->view('settings/security', $data);
	}
}
