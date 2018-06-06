<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends MY_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library("braintree_lib");

        $this->blockedCards = array(); // get these from db
        $this->load->model('merchantsale_model');

    }

    public function init() {
       if ($this->input->server('REQUEST_METHOD') == 'POST') {
       		if(!$this->validateCompusoryPayoutFields()['success']) {
       			$this->response_status = $this->validateCompusoryPayoutFields()['response'];
       			return $this->formatData();
       		} else {
       			$result = $this->auth_model->authenticate($this->merchant_id, $this->signature, $this->sender_ip);

		    	if($result['success']) {
		        	$this->merchant_info = $result['response'];
		        	switch ($this->payment_method) {
		        		case 'visa':
		        		case 'mastercard':
                        case 'jcb':
		        			$this->proccessCardPayment();
		        			break;
                        case 'xannia':
                            $this->proccessXanniaPayment();
                            break;
                        default:
                            $this->response_status = Response::UNSUPPORTED_REQUEST_METHOD;

		        	}
		        } else {
		        	$this->response_status = $result['response'];
		        }
       		}
	        
	    } else {
	    	$this->response_status = Response::UNSUPPORTED_REQUEST_METHOD;
	    }

        return $this->formatData();
    }

    private function proccessCardPayment() {
    	if(!$this->validateCardFields()['success']) {
    		$this->response_status = $this->validateCardFields()['response'];
       		return $this->formatData();
    	} else {
            $settlement_amount = $this->request['amount'];
            $settlement_currency = $this->request['currency'];
            $total_charges = 0;
            $bt_merchant_currency_exists = TRUE;

            try{
    			Braintree_MerchantAccount::find('XANNIA-PAY-' . strToUpper($this->request['currency']));
            } catch(Braintree\Exception\NotFound $e) {
            	$bt_merchant_currency_exists = FALSE;
            }

            $bt_request = [
                'options' => [
                    'submitForSettlement' => True
                ],
                'creditCard' => [
                    'cardholderName' =>  $this->request['card_holder'],
                    'cvv' => $this->request['card_cvv'],
                    'expirationMonth' => $this->request['card_expiry_month'],
                    'expirationYear' =>  $this->request['card_expiry_year'],
                    'number' => $this->request['card_number']
                ],
                'descriptor' => [
                    'name' => 'company*my product',
                    'url' => 'company.com'
                ]
            ];

    		if(!$bt_merchant_currency_exists) {
    			$cc = new CurrencyConverter();
    			$settlement_currency = strtoupper($this->config->item('settlement_currency'));
    			$settlement_amount = $cc->convert(
    				$this->request['currency'],
    				$settlement_currency,
    				(double)$this->request['amount']
    			);

    			$settlement_amount = number_format($settlement_amount, 2, '.', '');
    		} else {
    			$bt_request['merchantAccountId'] = 'XANNIA-PAY-' . strToUpper($this->request['currency']);
    		}

    		$bt_request['amount'] = $settlement_amount;

    		$bt_res = Braintree_Transaction::credit($bt_request);
    		

            if($bt_res->success == true && strtolower($bt_res->transaction->processorResponseText) == 'approved') {
            	if($this->merchant_info['currency']['code'] != $settlement_currency) {
            		$cc = new CurrencyConverter();
            		$settlement_amount = $cc->convert(
	    				$settlement_currency,
	    				$this->merchant_info['currency']['code'],
	    				(double)$settlement_amount
	    			);
            	}

            	$total_fees = $this->db_payment_method['external_fee'] + $this->db_payment_method['internal_fee'];
            	$total_charges = (double)(($total_fees / 100) * $settlement_amount);
            	$amount_before_charges = $settlement_amount;
            	$amount_after_charges = $settlement_amount + $total_charges;

            	$bt_log_card = $bt_res->transaction->creditCard;
            	$sale = array(
            		'merchant_id' => $this->merchant_info['id'],
                    'transaction_type_id' => 2,
					'payment_method_id' => $this->db_payment_method['id'],
					'external_transaction_id' => $bt_res->transaction->id,
					'description' => $this->request['description'] !== NULL ? $this->request['description'] : '',
					'amount_before_charges' => $amount_before_charges,
					'total_charges' => $total_charges,
					'amount_after_charges' => $amount_after_charges,
                    'opening_balance' => $this->merchant_info['account_balance'],
                    'closing_balance' => $this->merchant_info['account_balance'] - $amount_after_charges,
					'transaction_status' => merchantsale_model::APPROVED,
					'processor_response' => $bt_res->transaction->processorResponseText,
					'card_type' => $bt_log_card['cardType'],
					'card_bin' => $bt_log_card['bin'],
					'card_last_4' => $bt_log_card['last4'],
					'card_exp_month' => $bt_log_card['expirationMonth'],
					'card_exp_year' => $bt_log_card['expirationYear'],
					'cardholder_name' => $bt_log_card['cardholderName']
				);

            	$sale_res = $this->merchantsale_model->saveTransaction($sale);

            	if($sale_res) {
            		//DO SOME FEES HERE
            		$this->merchant_model->deductFunds($amount_after_charges, $this->merchant_info['id']);
	            	$this->response_data = array(
	            		'order_reference' => $sale_res,
	            		'amount' => $this->request['amount'],
	            		'settlement_amount' => $settlement_amount,
	            		'currency' => $this->request['currency'],
	            		'payment_method' => $this->request['payment_method']
	            	);

	            	$this->response_status = Response::SALE_APPROVED;
	            	$this->formatData();
            	} else {
            		$this->response_status = Response::FAILED;
	            	$this->formatData();
            	}
            } else {
            	//$bt_log_card = $bt_res->transaction->creditCard;
            	$sale = array(
            		'merchant_id' => $this->merchant_info['id'],
                    'transaction_type_id' => 2,
					'payment_method_id' => $this->db_payment_method['id'],
                    'external_transaction_id' => null,
					'description' => $this->request['description'],
					'amount_before_charges' => $settlement_amount,
					'total_charges' => $total_charges,
					'amount_after_charges' => $settlement_amount,
                    'opening_balance' => $this->merchant_info['account_balance'],
                    'closing_balance' => $this->merchant_info['account_balance'] - $settlement_amount,
					'transaction_status' => merchantsale_model::DECLINED,
					'processor_response' => null,
					'card_type' => null,
					'card_bin' => null,
					'card_last_4' => null,
					'card_exp_month' => null,
					'card_exp_year' => null,
					'cardholder_name' => null
				);

            	$sale_res = $this->merchantsale_model->saveTransaction($sale);

            	$this->response_data = array(
            		'order_reference' => $sale_res,
            		'amount' => $this->request['amount'],
            		'currency' => $this->request['currency'],
            		'payment_method' => $this->request['payment_method']
            	);

            	$this->response_status = Response::SALE_FAILED;
            	$this->formatData();
            }
    	}
    }

    private function validateCardFields() {
    	if(!array_key_exists('card_number', $this->request)) {
    		return array('success' => false, 'response' => Response::CARD_NUMBER_FIELD_MISSING);
    	} elseif($this->request['card_number'] != NULL) {
    		if(strlen($this->request['card_number']) < 12 || strlen($this->request['card_number']) > 19) {
    			return array('success' => false, 'response' => Response::CARD_NUMBER_FIELD_LENGTH);
    		} elseif(in_array(strtoupper($this->request['card_number']), $this->blockedCards)) {
    			return array('success' => false, 'response' => Response::CARD_NUMBER_BLACKLISTED);
    		}
    	}

    	if(!array_key_exists('card_holder', $this->request)) {
    		return array('success' => false, 'response' => Response::CARD_HOLDER_FIELD_MISSING);
    	}

    	if(!array_key_exists('card_expiry_month', $this->request)) {
    		return array('success' => false, 'response' => Response::CARD_EXP_MONTH_FIELD_MISSING);
    	} elseif(array_key_exists('card_expiry_month', $this->request)) {
    		if(!is_numeric($this->request['card_expiry_month']) || strlen($this->request['card_expiry_month']) != 2) {
    			return array('success' => false, 'response' => Response::CARD_EXP_MONTH_FIELD_WRONG_TYPE);
    		}
    	}

    	if(!array_key_exists('card_expiry_year', $this->request)) {
    		return array('success' => false, 'response' => Response::CARD_EXP_YEAR_FIELD_MISSING);
    	} elseif(array_key_exists('card_expiry_year', $this->request)) {
    		if(!is_numeric($this->request['card_expiry_year']) || strlen($this->request['card_expiry_year']) != 4) {
    			return array('success' => false, 'response' => Response::CARD_EXP_YEAR_FIELD_WRONG_TYPE);
    		}
    	}

    	if(!array_key_exists('card_cvv', $this->request)) {
    		return array('success' => false, 'response' => Response::CARD_CVV_FIELD_MISSING);
    	} elseif(array_key_exists('card_cvv', $this->request)) {
    		if(!is_numeric($this->request['card_cvv']) || (strlen($this->request['card_cvv']) < 3 || strlen($this->request['card_cvv']) > 4)) {
    			return array('success' => false, 'response' => Response::CARD_CVV_FIELD_WRONG_TYPE);
    		}
    	}

    	return array('success' => true, 'response' => array());
    }

    private function proccessXanniaPayment() {
    	if(!$this->validateXanniaFields()['success']) {
    		$this->response_status = $this->validateXanniaFields()['response'];
       		return $this->formatData();
    	} else {
            $this->load->model('customer_model');
            $this->customer = $this->customer_model->getCustomerInfo($this->request['xannia_email']);
            
            if($this->customer) {
                $merchant_settlement_currency = $customer_settlement_currency = $this->request['currency'];
                $merchant_settlement_amount = $customer_settlement_amount = $this->request['amount'];
                $cc = new CurrencyConverter();
                
                if($merchant_settlement_currency != $this->merchant_info['currency']['code']) {
                    $merchant_settlement_amount = $cc->convert($merchant_settlement_currency, $this->merchant_info['currency']['code'], $merchant_settlement_amount);
                    $merchant_settlement_currency = $this->merchant_info['currency']['code'];
                }

                $wallet_to_use = $this->selectXanniaWallet($customer_settlement_amount, $this->customer['wallets'], $customer_settlement_currency);

                if(!$wallet_to_use['wallet']) {
                    $this->response_status = Response::NO_XANNIA_WALLET_WITH_ENOUGH_FUNDS;
                    $this->formatData();
                } else {
                    $this->load->model('customertransaction_model');

                    $description = 'Payment from ' . $this->merchant_info['business_name'] . ' [ ' . $this->request['currency'] . number_format($this->request['amount'], 2, '.', ' ') . ']';

                    $total_fees = $this->db_payment_method['external_fee'] + $this->db_payment_method['internal_fee'];
                    $total_charges = (double)(($total_fees / 100) * $merchant_settlement_amount);
                    $amount_before_charges = $merchant_settlement_amount;
                    $amount_after_charges = $merchant_settlement_amount + $total_charges;

                    if($this->merchant_info['account_balance'] >= $amount_after_charges) {

                        $res = $this->customertransaction_model->payout(
                            $this->customer['user']['id'],
                            Customertransaction_model::MONEY_IN,
                            $wallet_to_use['wallet']['wallet_id'],
                            $description,
                            $wallet_to_use['pay_amount'],
                            Customertransaction_model::APPROVED
                        );

                        if($res) {

                            $sale = array(
                                'merchant_id' => $this->merchant_info['id'],
                                'transaction_type_id' => 2,
                                'payment_method_id' => $this->db_payment_method['id'],
                                'external_transaction_id' => $res,
                                'description' => $this->request['description'],
                                'amount_before_charges' => $merchant_settlement_amount,
                                'total_charges' => $total_charges,
                                'amount_after_charges' => $amount_after_charges,
                                'opening_balance' => $this->merchant_info['account_balance'],
                                'closing_balance' => $this->merchant_info['account_balance'] - $amount_after_charges,
                                'transaction_status' => merchantsale_model::APPROVED,
                                'processor_response' => '',
                                'card_type' => '',
                                'card_bin' => '',
                                'card_last_4' => '',
                                'card_exp_month' => '',
                                'card_exp_year' => '',
                                'cardholder_name' => ''
                            );

                            $sale_res = $this->merchantsale_model->saveTransaction($sale);

                            $this->merchant_model->deductFunds($amount_after_charges, $this->merchant_info['id']);
                            $this->response_data = array(
                                'order_reference' => $sale_res,
                                'amount' => $this->request['amount'],
                                'settlement_amount' => number_format($merchant_settlement_amount, 2, '.', ''),
                                'currency' => $this->request['currency'],
                                'payment_method' => $this->request['payment_method']
                            );

                            $email_data = array();
                            $email_data['recipient'] = $this->customer['user'];
                            $email_data['currency'] = $wallet_to_use['wallet']['wallet_currency_code'];
                            $email_data['sender'] = $this->merchant_info;
                            $email_data['amount'] =  $wallet_to_use['pay_amount'];
                            $this->postmark->from('no-reply@xannia.com', 'Xannia');
                            $this->postmark->to($email_data['recipient']['email_address'], $email_data['recipient']['first_name'] . ' ' . $email_data['recipient']['last_name']);
                            $this->postmark->subject('Payment Successful');
                            $this->postmark->message_html($this->load->view('templates/email/received_funds', $email_data, true)); 
                            $this->postmark->send();

                            $this->response_status = Response::SALE_APPROVED;
                            $this->formatData();

                        } else {
                            $this->response_status = Response::FAILED_TO_CHARGE_XANNIA_CUSTOMER;
                            $this->formatData();
                        }

                    } else {
                        $this->response_status = Response::MERCHANT_NO_ENOUGH_FUNDS;
                        $this->formatData();
                    }
                } 
            } else {
                $this->response_status = Response::XANNIA_CUSTOMER_NOT_FOUND;
                $this->formatData();
            }

    	}
    }

    private function selectXanniaWallet($customer_settlement_amount, $user_wallets, $customer_settlement_currency) {
        $wallet_to_use = array();
        $pay_amount = 0;
        $found_wallet = false;
        $cc = new CurrencyConverter();

        foreach($user_wallets as $wallet) {
            if($wallet['wallet_currency_code'] == $customer_settlement_currency) {
                $wallet_to_use = $wallet;
                $pay_amount = $customer_settlement_amount;
                $found_wallet = true;
                break;
            }
        }

        if(!$found_wallet) {
            foreach($user_wallets as $wallet) {
                if($wallet['wallet_is_default'] == 1) {
                    $amount = $cc->convert($customer_settlement_currency, $wallet['wallet_currency_code'], $customer_settlement_amount);
                    $found_wallet = true;
                    $wallet_to_use = $wallet;
                    $pay_amount = $amount;
                    break;
                }
            }
        }

        return array('wallet' => $wallet_to_use, 'pay_amount' => $pay_amount);
    }

    private function validateXanniaFields() {
        if(!array_key_exists('xannia_email', $this->request)) {
            return array('success' => false, 'response' => Response::XANNIA_EMAIL_FIELD_MISSING);
        }

        return array('success' => true, 'response' => array());
    }

    private function validateCompusoryPayoutFields() {
    	if(!array_key_exists('signature', $this->request)) {
    		return array('success' => false, 'response' => Response::SIGNATURE_FIELD_MISSING);
    	}

    	if(!array_key_exists('merchant_id', $this->request)) {
    		return array('success' => false, 'response' => Response::MERCHANT_ID_FIELD_MISSING);
    	}

    	if(!array_key_exists('payment_method', $this->request)) {
    		return array('success' => false, 'response' => Response::PAYMENT_METHOD_FIELD_MISSING);
    	} else {
    		$this->load->model('paymentmethod_model');
    		$method = $this->paymentmethod_model->getMethodBySlag($this->payment_method);
    		if(!$method && $this->payment_method) {
    			return array('success' => false, 'response' => Response::PAYMENT_METHOD_INVALID);
    		} else {
    			$this->db_payment_method = $method;
    		}
    	}

    	if(!array_key_exists('amount', $this->request)) {
    		return array('success' => false, 'response' => Response::AMOUNT_FIELD_MISSING);
    	} elseif($this->request['amount'] != NULL) {
    		if(!is_numeric($this->request['amount'])) {
    			return array('success' => false, 'response' => Response::AMOUNT_FIELD_WRONG_TYPE);
    		} elseif((double)$this->request['amount'] < 0.5) {
    			return array('success' => false, 'response' => Response::AMOUNT_FIELD_BELOW_MIN);
    		}
    	}

    	if(!array_key_exists('currency', $this->request)) {
    		return array('success' => false, 'response' => Response::CURRENCY_FIELD_MISSING);
    	} elseif($this->request['currency'] != NULL) {
    		if(strlen($this->request['currency']) != 3) {
    			return array('success' => false, 'response' => Response::CURRENCY_FIELD_WRONG_LENGTH);
    		} elseif(!in_array(strtoupper($this->request['currency']), $this->acceptedCurrencies)) {
    			return array('success' => false, 'response' => Response::CUREENCY_FIELD_VALUE_UNSUPPORTED);
    		}

    		$this->request['currency'] = strToUpper($this->request['currency']);
    	}

    	if(!array_key_exists('description', $this->request)) {
    		$this->request['description'] = '';
    	}

    	return array('success' => true, 'response' => array());
    }

}