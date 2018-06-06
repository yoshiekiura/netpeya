<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/email/email_header');
?>

<div style="width: 100%">
	<p style="text-align: center;">Hi <strong><?= $first_name != '' ? $first_name . ' ' . $last_name : $email_address ?></strong></p>
	<p style="text-align: center; margin-bottom: 30px">Thank you for registering on <strong>xannia.com</strong>, click the button below to activate your account.</p>
	<p style="max-width: 500px; margin: 0 auto;text-align: center;">
		<a href="<?= $this->config->item('base_url') ?>email-activation/<?= $id ?>/<?= $activation_code ?>" style="
		height: 60px;
	    line-height: 60px;
	    text-align: center;
	    background-color: #61D#22b66e
	    text-decoration: none;
	    color: #fff;
	    text-transform: uppercase;">Activate account</a>
	</p>
</div>

<?php $CI->load->view('templates/email/email_footer'); ?>