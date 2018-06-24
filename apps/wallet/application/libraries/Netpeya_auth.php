<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Netpeya_auth
{
	private $_ci;

	public function __construct() {
		$this->_ci = get_instance();
		$this->_ci->load->model('user_model');
		$this->_ci->load->library('session');
	}

	public function logged_in()
	{
		$recheck = $this->_ci->user_model->recheck_session();
		return $recheck;
	}

	public function logout()
	{
		if (substr(CI_VERSION, 0, 1) == '2')
		{
			$this->_ci->session->unset_userdata(array('user' => NULL));
		} else {
			$this->_ci->session->unset_userdata(array('user'));
		}

		// Destroy the session
		$this->_ci->session->sess_destroy();

		//Recreate the session
		if (substr(CI_VERSION, 0, 1) == '2')
		{
			$this->_ci->session->sess_create();
		} else {
			if (version_compare(PHP_VERSION, '7.0.0') >= 0)
			{
				session_start();
			}
			$this->_ci->session->sess_regenerate(TRUE);
		}

		//$this->set_message('logout_successful');
		return TRUE;
	}
}