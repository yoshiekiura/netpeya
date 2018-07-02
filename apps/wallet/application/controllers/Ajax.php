<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function register() {
		$result = array();
        $errors = array();

        $this->form_validation->set_rules("user", "User", "required");

        $user = json_decode($this->input->post("user"), TRUE);
        $user['email'] = strtolower($user['email']);

        if ($this->form_validation->run()) {
            $this->load->model('user_model');
            $reg_res = $this->user_model->add($user);
            if($reg_res) {
            	$this->user_model->login($user['email'], $user['password']);
                $result['success'] = true;
            } else {
	            $result['success'] = false;
	            $errors = $this->user_model->get_errors();
            }
        } else {
            $result['success'] = false;
            $errors = $this->user_model->get_errors();
        }

        return $this->formatData($result, $errors);
	}

	public function login() {
		$result = array();
        $errors = array();

        $this->form_validation->set_rules("user", "User", "required");

        $user = json_decode($this->input->post("user"), TRUE);
        $user['email'] = strtolower($user['email']);

        if ($this->form_validation->run()) {
            $this->load->model('user_model');
            $login_res = $this->user_model->login($user['email'], $user['password']);
            if($login_res) {
                $this->load->model('activity_model');
                $this->activity_model->add(array(
                    'type' => 'login',
                    'description' => 'Account login'
                ));
                $result['success'] = true;
            } else {
	            $result['success'] = false;
	            $errors = $this->user_model->get_errors();
            }
        } else {
            $result['success'] = false;
            $errors = $this->user_model->get_errors();
        }

        return $this->formatData($result, $errors);
	}

    public function proccess_deposit() {
        $result = '';

        $this->form_validation->set_rules("payment_data", "Data", "required");

        $payment_data = json_decode($this->input->post("payment_data"), TRUE);
        $deposit_method = $this->depositmethod_model->getBySlug($payment_data['method']);

        $charges = (($deposit_method->internal_fee + $deposit_method->external_fee) / 100) * $payment_data['amount'];
        $payment_data['total_charge'] = $payment_data['amount'] + $charges;
        $payment_data['remote_user_id'] = $this->session->userdata('card_proccessor_account_id');
        $payment_data['currency'] = $this->data['user']->currency_code;

        $payment_data['user'] = $this->data['user'];

        if ($this->form_validation->run()) {
            $this->load->model('transaction_model');
            $res = array();
            switch ($deposit_method->slug) {
                case 'creditcard':
                    $res = DepositProcessor::processCard($payment_data);
                    break;
                case 'paypal':
                    $res = DepositProcessor::processPaypal($payment_data);
                    break;
                
                default:
                    # code...
                    break;
            }

            if ($res['success']) {
                $update = $this->user_model->addFunds($payment_data['amount']);
                $this->transaction_model->createTransaction(
                    transaction_model::DEPOSIT,
                    $this->session->userdata('user')['user_id'],
                    transaction_model::APPROVED,
                    (double)$payment_data['amount'],
                    'Funds deposit'
                );

                if($update) {
                    $this->load->model('activity_model');
                    $this->activity_model->add(array(
                        'type' => 'deposit',
                        'description' => $deposit_method->name . ' deposit -  '. $this->data['user']->currency_simbol . $payment_data['amount']
                    ));
                    return $this->load->view('deposit/success', $payment_data);
                }
            }
        }

        return $this->load->view('deposit/failed', $payment_data);
    }

    public function add_friend() {
        $this->form_validation->set_rules("friend", "Friend", "required");

        $friend = json_decode($this->input->post("friend"), TRUE);
        $friend['email'] = strtolower($friend['email']);

        if ($this->form_validation->run()) {
            $this->load->model('friend_model');
            $added_friend = $this->friend_model->add($friend);
            if($added_friend) {
                $data = array();
                $data['friend'] = $added_friend;
                $this->load->model('activity_model');
                $this->activity_model->add(array(
                    'type' => 'friend',
                    'description' => 'Added friend -  '. $added_friend->email
                ));
                return $this->load->view('friend/add_success', $data);
            }
        }

        return $this->load->view('friend/add_failed');
    }

	private function formatData($data, $errors)
    {
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
        $this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
        //$this->output->set_header('Content-Type: application/json');
        $this->output->set_content_type( 'application/json' );
        $this->output->set_output(json_encode(array('data' => $data, 'errors' => $errors), JSON_NUMERIC_CHECK));
        //echo(json_encode(array('data' => $data, 'errors' => $errors), JSON_NUMERIC_CHECK));
    }
}
