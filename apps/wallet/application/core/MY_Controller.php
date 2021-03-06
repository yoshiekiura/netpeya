<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Johannesburg');
		
		$this->load->helper(array('form', 'url', 'language'));
		$this->load->library('form_validation');
		$this->load->model('depositmethod_model');
		$this->load->model('currency_model');
		$this->load->model('user_model');
		$this->load->library('session');

		if ($this->netpeya_auth->logged_in())
		{
			$this->data['user'] = $this->user_model->getUserFullInfo();
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST' && !isset($_POST['payment_data']) && !isset($_POST['friend'])) {
			foreach ($_POST as $key => $value) {
				$_POST[$key] = trim(htmlspecialchars($value));
			}
		}

		$language = (isset($this->session->get_userdata('lang')['lang'])) ? $this->session->get_userdata('lang')['lang'] : 'en';

		$this->data['language'] = $language;

		$this->lang->load('netpeya_lang', $language);
	}

	public function renderView($str, $data) {
		if(Device::is_mobile()){
			$this->load->view('mobile/' . $str, $data);
		} else {
			$this->load->view($str, $data);
		}
	}
}