<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'home';
		$this->load->view('home', $data);

		//$this->load->view('coming-soon');
	}

	public function not_found()
	{
		$data['title'] = 'not-found';
		$this->load->view('not_found', $data);
		
		//$this->load->view('coming-soon');
	}

	public function about()
	{
		$data['title'] = 'about';
		$this->load->view('about', $data);
	}

	public function privacy()
	{
		$data['title'] = 'privacy';
		$this->load->view('privacy', $data);
	}

	public function terms()
	{
		$data['title'] = 'terms';
		$this->load->view('terms', $data);
	}

	public function services()
	{
		$data['title'] = 'services';
		$this->load->view('services', $data);
	}

	public function contacts()
	{
		$data['title'] = 'contacts';
		$this->load->view('contacts', $data);
	}
}
