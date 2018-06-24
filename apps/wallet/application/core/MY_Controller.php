<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->helper(array('url', 'language'));
		$this->load->model('depositmethod_model');
		$this->load->model('user_model');

		if ($this->netpeya_auth->logged_in())
		{
			$this->data['user'] = $this->user_model->getUserFullInfo();
		}
	}
}