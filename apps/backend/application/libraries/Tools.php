<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools {
	public static function calculatePercent($in, $of) {
		$value = 0;

		if($of > 0) {
			$value = ($in / $of) * 100;
		} elseif($of == 0 && $in) {
			$value = 100;
		}

		return $value;
	}

	public static function loopDashboardStats($arr, $default_currency) {
		$total = 0;

		$cc = new CurrencyConverter();
		foreach($arr as $v) {
			if($v['currency_code'] != $default_currency) {
				$total += $cc->convert($v['currency_code'], $default_currency, (double)$v['amount'])['amount'];
			} else {
				$total += (double)$v['amount'];
			}
		}

		return $total;
	}

	public static function createUriHash($str) {
		$hsh = "";
		if (function_exists("openssl_random_pseudo_bytes")) {
			$hsh = openssl_random_pseudo_bytes(128);
		}

		for ($i = 0; $i < 1024; $i++) {
			$hsh = sha1($hsh . mt_rand() . microtime());
		}

		$key = hash('sha256', $hsh.$str);

		// If enable query strings is set, then we need to replace any unsafe characters so that the code can still work
		if ($key) {
			// preg_quote() in PHP 5.3 escapes -, so the str_replace() and addition of - to preg_quote() is to maintain backwards
			// compatibility as many are unaware of how characters in the permitted_uri_chars will be parsed as a regex pattern
			if (!preg_match("|^[" . str_replace(array('\\-', '\-'), '-', preg_quote('a-z 0-9~%.:_\-', '-')) . "]+$|i", $key)) {
				$key = preg_replace("/[^a-z 0-9~%.:_\-]+/i", "-", $key);
			}
		}

		return substr($key, 0, 40);
	}
}