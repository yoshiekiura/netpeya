<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function login() {
		
		if ($this->netpeya_auth->logged_in())
		{
			redirect('dashboard');
		}

		$this->data['pageTitle'] = 'login';

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
	        if ($this->form_validation->run('login')) {

		        $email = $this->input->post("email");
		        $password = $this->input->post("password");

	            $this->load->model('user_model');
	            $login_res = $this->user_model->login($email, $password);
	            if($login_res) {
	                $this->load->model('activity_model');
	                $this->activity_model->add(array(
	                    'type' => 'Authentication',
	                    'description' => 'Account login'
	                ));
	                redirect('dashboard');
	            } else {
	            	$this->session->set_flashdata('flash_erros', implode('', $this->user_model->get_errors()));
	            }
	        }
	    }

	    $this->renderView('auth/login', $this->data);
	}

	public function logout() {
		if($this->netpeya_auth->logout()) {
			redirect('login', 'refresh');
		}
	}

	public function register() {
		if ($this->netpeya_auth->logged_in())
		{
			redirect('dashboard');
		}

		$this->data['pageTitle'] = 'register';

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			if ($this->form_validation->run('register')) {
				$user = array();
				$user['first_name'] = $this->input->post("first_name");
		        $user['last_name'] = $this->input->post("last_name");
				$user['email'] = strtolower($this->input->post("email"));
		        $user['password'] = $this->input->post("password");
		        $user['country_id'] = $this->input->post("country_id");
		        $user['currency_id'] = $this->input->post("currency_id");
		        $user['terms'] = $this->input->post("terms");

		        $this->load->model('user_model');
	            $reg_user = $this->user_model->add($user);
	            if($reg_user) {
	                redirect('activation/' . $reg_user['np_id']);
	            } else {
		            $this->session->set_flashdata('flash_erros', implode('', $this->user_model->get_errors()));
		    		$this->renderView('auth/register', $this->data);
	            }

			} else {

			}
		}

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
		$this->renderView('auth/register', $this->data);
	}

	public function forgot_password() {
		$this->data['pageTitle'] = 'forgot';
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			if($this->form_validation->run('forgot_password')) {
				$email = $this->input->post("email");
				$user = $this->user_model->getUserFullInfoByEmail($email);
				if($user) {
	           		$res = $this->user_model->setForgotPasswordCode($user);

	           		if($res) {
	           			$this->data['email'] = $user->email;
	           			$this->renderView('auth/reset_password', $this->data);
	           		} else {
		           		$this->session->set_flashdata('flash_erros', '<p>An error occured, please try again.</p>');
		           		$this->renderView('auth/forgot', $this->data);
	           		}

	           	} else {
	           		$this->session->set_flashdata('flash_erros', '<p>You do not have an account, please create one.</p>');
		           	redirect('register');
	           	}
			} else {
				$this->renderView('auth/forgot', $this->data);
			}
		} else {
			$this->renderView('auth/forgot', $this->data);
		}
	}

	public function reset_password() {
		$this->data['pageTitle'] = 'reset';
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$email = $this->input->post("email");
			$this->data['email'] = $email;
			if($this->form_validation->run('reset_password')) {
				$code = $this->input->post("code");
				$password = $this->input->post("password");
				$repeat_password = $this->input->post("repeat_password");
				$user = $this->user_model->getUserFullInfoByEmail($email);
				if($user && $user->forgot_password_code) {

					if($user->forgot_password_code == $code) {
						if($password == $repeat_password) {
							if($this->user_model->reset_password($email, $password)) {
				                $this->load->model('activity_model');
				                $this->activity_model->add(array(
				                    'type' => 'Authentication',
				                    'description' => 'Password reset'
				                ), $user->id);
								$this->session->set_flashdata('flash_success', '<p>You password was reset, please use it to login.</p>');
			           			$this->renderView('auth/login', $this->data);
							} else {
								$this->session->set_flashdata('flash_erros', '<p>An error occured, please try again.</p>');
	        					$this->renderView('auth/reset_password', $this->data);
							}
						} else {
							$this->session->set_flashdata('flash_erros', '<p>Passwords do not match, please try again.</p>');
	        				$this->renderView('auth/reset_password', $this->data);
						}
					} else {
		           		$this->session->set_flashdata('flash_erros', '<p>Wrong pass code, please refer to your email.</p>');
	        			$this->renderView('auth/reset_password', $this->data);
	           		}

	           	} else {
	           		$this->session->set_flashdata('flash_erros', '<p>You do not have an account, please create one.</p>');
		           	redirect('register');
	           	}
			}
		} else {
	        $this->renderView('auth/reset_password', $this->data);
		}
	}

	public function resend_activation($np_id) {
		if($this->user_model->resendActivationCode($np_id)) {
	        $this->session->set_flashdata('flash_success', 'We have sent you a new activation code.');
		} else {
	    	$this->session->set_flashdata('flash_erros', 'Failed to send activation code, please try again.');
		}
		redirect('activation/' . $np_id);
	}

	public function activation($np_id = '') {
		$this->data['pageTitle'] = 'activation';
 		$this->data['np_id'] = $np_id;
 		$this->data['errors'] = array();
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules("np_id", "NP ID", "required");
			$this->form_validation->set_rules("activation_code", "Activation Code", "required");
			$np_id = $this->input->post("np_id");
			$code = $this->input->post("activation_code");
			if($this->form_validation->run()) {
	 			$user = $this->user_model->getUserFullInfoByNPNumber($np_id);
	           	if($user && $user->activation_code) {
	           		if($user->activation_code == $code) {
	 					$res = $this->user_model->complete_registration($user->email, $code);
	 					if(!$res) $this->load->view('auth/activation', $this->data);
		           		$this->load->model('activity_model');
		                $this->activity_model->add(array(
		                    'type' => 'Authentication',
		                    'description' => 'Registration'
		                ), $user->id);
		                $this->session->set_flashdata('flash_success', 'Account activated, you can now login.');
		           		redirect('login');
	           		} else {
	           			$this->data['errors'][] = 'Wrong activation code';
	           		}
	           	} else {
 					$this->data['np_id'] = '';
	           	}
			}
		}

		$this->renderView('auth/activation', $this->data);
	}
}
