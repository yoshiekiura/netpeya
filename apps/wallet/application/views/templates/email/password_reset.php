<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/email/email_header');
?>

<div style="width: 100%">
	<p style="text-align: center;">Hi <strong><?= $user->first_name != '' ? $user->first_name . ' ' . $user->last_name : $user->email ?></strong></p>
	<p style="text-align: center; margin-bottom: 30px">You have requested to reset your password at <strong>netpeya.com</strong>, below is your pass code <strong>valid for 30 minutes</strong>.</p>
	<p style="max-width: 500px; margin: 0 auto;text-align: center;font-size: 30px; font-weight: bold; letter-spacing: 10px;"><?= $user->pass_code ?></p>
</div>

<?php $CI->load->view('templates/email/email_footer'); ?>