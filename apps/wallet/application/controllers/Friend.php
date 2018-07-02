<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->netpeya_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('friend_model');
		$this->data['pageTitle'] = "friends";
	}

	public function index() {
		$this->data['friends'] = $this->friend_model->getAll();
		$this->load->view('friend/all', $this->data);
	}

	public function all() {
		redirect('friend/all');
	}

    public function add() {
        $this->load->view('friend/add', $this->data);
    }
}
