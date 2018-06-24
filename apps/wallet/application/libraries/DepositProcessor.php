<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class DepositProcessor
{
	
	public static function processCard($payment_data) {
		$errors = array();
		$success = false;
		if(
			!$payment_data['cc_number'] || !$payment_data['cc_holder'] ||
			!$payment_data['cc_exp_month'] || !$payment_data['cc_exp_year'] ||
			!$payment_data['cc_cvv'] || !$payment_data['total_charge']
		) {

			$errors[] = 'Please provide all required card details.';
			return array('success' => $success, 'errors' => $errors);
		}

        $payment_data['cc_number'] = str_replace(' ', '', $payment_data['cc_number']);

		$res = Braintree_Transaction::sale([
            'amount' => $payment_data['total_charge'],
            //'paymentMethodNonce' => nonceFromTheClient, TO-Do
            'options' => [
                'submitForSettlement' => True
            ],
            'customerId' => $payment_data['remote_user_id'],
            'creditCard' => [
                'cardholderName' => $payment_data['cc_holder'],
                'cvv' => $payment_data['cc_cvv'],
                'expirationMonth' => $payment_data['cc_exp_month'],
                'expirationYear' =>  $payment_data['cc_exp_year'],
                'number' => $payment_data['cc_number']
            ],
            'merchantAccountId' => 'XANNIA-PAY-' . strToUpper($payment_data['currency'])
        ]);

        if(isset($res->errors)) {
        	foreach($res->errors->deepAll() AS $error) {
        		$start_code = $error->code[0];
        		if($start_code != '9') {
        			$err = explode(',', $error->message);
			    	$errors[] = is_array($err) ? $err[0] : $error->message;
        		}
			}
        }

        return array('success' => $res->success, 'errors' => $errors);
	}

	public static function processPaypal($payment_data) {
		
	}
}