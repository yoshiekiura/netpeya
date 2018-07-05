<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends MY_Controller {

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
		$this->load->view('friends/all', $this->data);
	}

	public function all() {
		redirect('friends/all');
	}

    public function add() {
		$this->data['pageTitle'] = "friends add";
        $this->load->view('friends/add', $this->data);
    }

    public function edit($id) {
		$this->data['pageTitle'] = "friends edit";
    	$this->data['friend'] = $this->friend_model->getById($id);
        $this->load->view('friends/edit', $this->data);
    }
}
