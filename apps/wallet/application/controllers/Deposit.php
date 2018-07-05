<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->netpeya_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('currency_model');
		$this->data['pageTitle'] = "deposit";
	}

	public function index()
	{
        $default_amount = 100; //minimum deposit is set to 10
        $default_method = $this->depositmethod_model->getDefault();
        $charges = (($default_method->internal_fee + $default_method->external_fee) / 100) * $default_amount;
        $this->data['default_amount'] = $default_amount;
        $this->data['default_method'] = $default_method;
        $this->data['default_payment_with_charges'] = number_format($default_amount + $charges, 2, '.', ' ');
		$this->load->view('deposit/index', $this->data);
	}

    public function forms($form) {
        $this->data['amount'] = $this->input->post("amount");
        $method = $this->depositmethod_model->getBySlug($form);
        $total_fees = $method->internal_fee + $method->external_fee;
        $total_fee_amount = ($total_fees / 100) * (double)$this->data['amount'];
        $this->data['method'] = $method;
        $this->data['total_fee'] = $total_fees;
        $this->data['total_charge'] = number_format($total_fee_amount + (double)$this->data['amount'], 2, '.', ' ');
        $this->load->view('templates/deposit_forms/' . $form, $this->data);
    }

	public function pay()
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules("deposit_amount", "Amount", "required");
			$this->form_validation->set_rules("deposit_currency", "Currency", "required");

        	$amount = $this->input->post("deposit_amount");
        	$currency = $this->input->post("deposit_currency");

        	if ($this->form_validation->run() && $amount != '' && $currency != '') {
        		$this->data['amount'] = $amount;
        		$this->data['currency'] = $this->currency_model->getByCode($currency);
        	} else {
        		redirect('deposit');
        	}

			$this->load->view('deposit/pay', $this->data);
		} else {
			redirect('deposit');
		}
	}

	public function complete() {

        $payment_data = $this->input->post();
        $deposit_method = $this->depositmethod_model->getBySlug($payment_data['method']);

        $charges = (($deposit_method->internal_fee + $deposit_method->external_fee) / 100) * $payment_data['amount'];
        $payment_data['total_charge'] = $payment_data['amount'] + $charges;
        $payment_data['remote_user_id'] = $this->session->userdata('card_proccessor_account_id');

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
                    $user_currency->id,
                    transaction_model::APPROVED,
                    (double)$payment_data['amount'],
                    'Deposit to ' . $user_currency->code
                );
                $this->data['user_currency'] = $user_currency;
                $this->data['amount'] = $payment_data['amount'];
                $this->load->view('deposit/confirm', $this->data);
            } else {
                $result['success'] = false;
                $errors = $res['errors'];
            }
        } else {
            $result['success'] = false;
            $errors = $this->user_model->get_errors();
        }

	}
}
