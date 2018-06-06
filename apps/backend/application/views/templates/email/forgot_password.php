<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('member/templates/email/email_header');
?>

<div style="width: 100%">
	<p style="text-align: center;">Hi <strong><?= $first_name != '' ? $first_name . ' ' . $last_name : $email_address ?></strong></p>
	<p style="text-align: center; margin-bottom: 20px 0">
		A password reset was requested on <strong>Xannia</strong> using your email address.
	</p>
	<p style="text-align: center; margin-bottom: 20px 0">
		To reset the password for your Xannia account, click the button below.
	</p>
	<p style="max-width: 500px; margin: 0 auto;text-align: center;">
		<a href="<?= $this->config->item('member_backend_url') ?>password-reset/<?= $id ?>/<?= $forgotten_password_code ?>" style="
		height: 60px;
	    line-height: 60px;
	    text-align: center;
	    background-color: #61D395;
	    font-size: 14px;
	    letter-spacing: 2px;
	    padding: 13px 26px;
	    text-decoration: none;
	    color: #444;
	    text-transform: uppercase;">Reset password</a>
	</p>
	<p style="text-align: center; margin-bottom: 20px 0">
		P.S. The password reset links are only valid for next 30 minutes.
	</p>
	<p style="text-align: center; margin-bottom: 20px 0">
		If you think you received this message by mistake, you can ignore it or contact support at support@xannia.com.
	</p>
</div>

<?php $CI->load->view('member/templates/email/email_footer'); ?>