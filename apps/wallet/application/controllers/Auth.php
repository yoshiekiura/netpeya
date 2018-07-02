<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function login()
	{

		$result = array();
        $errors = array();

        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        $user = array();
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if ($this->form_validation->run()) {
            $this->load->model('user_model');
            $login_res = $this->user_model->login($email, $password);
            if($login_res) {
                $this->load->model('activity_model');
                $this->activity_model->add(array(
                    'type' => 'login',
                    'description' => 'Account login'
                ));
                redirect('dashboard');
            } else {
	            
            }
        } else {
            
        }
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
