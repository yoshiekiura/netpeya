<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model
{

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->config->load('xannia', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('xannia');
		$this->load->library('session');

		$this->load->library('email', $this->config->item('email_account', 'xannia'));
		$this->email->set_header('Content-Type', 'image/jpeg');
		$this->email->set_header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
		$this->email->set_header('Cache-Control', 'post-check=0, pre-check=0', false);
		$this->email->set_header('Pragma', 'no-cache');

		$this->xannia_db = $this->db;
	}
}