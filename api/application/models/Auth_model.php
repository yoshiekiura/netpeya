<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends My_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->model('merchant_model');
	}

	public function authenticate($merchant_id, $signature, $ip) {
		$merchant = $this->merchant_model->getMerchantByXanniaNumber($this->request['merchant_id']);

        if($merchant) {
        	$merchant_info = $this->merchant_model->getMerchantInfo($merchant['id']);
        	$expected_signature = hash('SHA512', $merchant_info['xannia_number'] . $merchant_info['api_key'] . $merchant_info['secret_key']);

			if($signature == $expected_signature) {
				if(in_array($ip, $merchant_info['allowed_ips'])) {
					return array('success' => true, 'response' => $merchant_info);
				} else {
					return array('success' => false, 'response' => Response::UNAUTHORIZED_IP);
				}
			} else {
				return array('success' => false, 'response' => Response::AUTH_FAILED);
			}
        } else {
        	return array('success' => false, 'response' => Response::MERCHANT_NOT_FOUND);
        }


	}
}
