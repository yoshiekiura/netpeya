<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Main
class Dispatcher extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		if($_SERVER['HTTP_HOST'] == 'member.xanniapay.com' || $_SERVER['HTTP_HOST'] == 'app.xannia.com') {
			if (!$this->xannia_auth->logged_in())
			{
				redirect('login', 'refresh');
			} else {
				redirect('dashboard', 'refresh');
			}

		} elseif($_SERVER['HTTP_HOST'] == 'xannia.com') {
			redirect('welcome', 'refresh');
		}
	}
}
