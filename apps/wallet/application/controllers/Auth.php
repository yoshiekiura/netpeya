<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function login()
	{

		if ($this->netpeya_auth->logged_in())
		{
			redirect('dashboard');
		}
		$this->data['pageTitle'] = 'login';
		$this->load->view('auth/login', $this->data);
	}

	public function logout() {
		if($this->netpeya_auth->logout()) {
			redirect('login');
		}
	}

	public function register()
	{

		if ($this->netpeya_auth->logged_in())
		{
			redirect('dashboard');
		}
		
		$this->data['pageTitle'] = 'register';
		$this->load->model('country_model');
		$this->load->model('currency_model');
		$this->data['countries'] = $this->country_model->getAll();
		$this->data['currences'] = $this->currency_model->getAll();

		$userLoc = null;
		try {
			$userLoc = json_decode(file_get_contents("http://ipinfo.io/"));
		} catch(Exeption $e) {

		}

		$this->data['userCountry'] = isset($userLoc->country) ? $this->country_model->getByCode($userLoc->country) : null;
		$this->data['userCurrency'] = $this->data['userCountry'] ? $this->currency_model->getById($this->data['userCountry']->currency_id) : null;
		$this->load->view('auth/register', $this->data);
	}
}
