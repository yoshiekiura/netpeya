<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device {
	public static function get_name() {
		if(isset($_SESSION['is_desktop']) && $_SESSION['is_desktop']) return 'desktop';
		if(isset($_SESSION['is_mobile']) && $_SESSION['is_mobile']) return 'mobile';
	}

	public static function is_desktop() {
		if(isset($_SESSION['is_desktop']) && $_SESSION['is_desktop']) return $_SESSION['is_desktop'];
	}

	public static function is_mobile() {
		if(isset($_SESSION['is_mobile']) && $_SESSION['is_mobile']) return $_SESSION['is_mobile'];
	}
}