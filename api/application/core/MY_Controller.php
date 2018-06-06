<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	public $request,
			$signature,
			$merchant_id,
			$sender_ip,
			$merchant_info,
			$payment_method,
            $db_payment_method,
			$response_data,
			$response_status;

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'language'));
		$this->load->library('session');

		$this->load->model('merchant_model');
		$this->load->model('auth_model');

		$this->response_data = array();
        $this->response_status = array();

        foreach ($this->input->post() as $key => $value) {
        	$arr = explode('_', $key);
        	$new_key = '';
        	if(count($arr) > 1) {
        		$r = array();
        		foreach ($arr as $ar) {
        			array_push($r, strtolower($ar));
        		}

        		$new_key = implode('_', $r);
        	} else {
        		$new_key = strtolower($key);
        	}

        	$this->request[$new_key] = $value;
        }

        $this->signature = array_key_exists('signature', $this->request) ? $this->request['signature'] : NULL;
        $this->merchant_id = array_key_exists('merchant_id', $this->request) ? $this->request['merchant_id'] : NULL;
        $this->payment_method = array_key_exists('payment_method', $this->request) ? $this->request['payment_method'] : NULL;
        $this->sender_ip = $this->input->ip_address();

        $this->acceptedCurrencies = array('USD', 'ZAR', 'JPY', 'EUR');

	}

	protected function formatData()
    {
    	$response = array_merge($this->response_status, $this->response_data);
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header( "Access-Control-Allow-Methods: POST" );
        $this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
        $this->output->set_content_type( 'application/json' );
        $this->output->set_output(json_encode(array('response' => $response)));
    }
}