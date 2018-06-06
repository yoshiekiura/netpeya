<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		if (!$this->xannia_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
	}
	public function index($currency_code)
	{
		$data = array();
		$data['title'] = 'deposit';
		$this->load->model('wallet_model');

		$data['wallet_details'] = $this->wallet_model->getWalletByCurrencyCode($currency_code);
		$this->load->view('deposit', $data);
	}
}
