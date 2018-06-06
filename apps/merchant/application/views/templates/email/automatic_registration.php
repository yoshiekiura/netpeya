<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/email/email_header');
?>

<div style="width: 100%">
	<p style="text-align: center; margin-bottom: 20px 0">
		Hi <strong><?= $recipient['first_name'] != '' ? $recipient['first_name'] . ' ' . $recipient['last_name'] : $recipient['email_address'] ?></strong>
	</p>
	<p style="text-align: center; margin-bottom: 20px 0">
		You have recieved funds from <strong><?= $sender['first_name'] . ' ' . $sender['last_name'] ?></strong>.
	</p>
	<div style="text-align: center; margin-bottom: 20px 0;">
		<table style="max-width: 600px; margin: 20px auto;text-align: center;border: 1px solid #ccc;">
			<tr>
				<td style="text-align: center; padding:5px 40px; border-right: 1px solid #ccc; border-bottom: 1px solid #ccc"><strong>Amount</strong></td>
				<td style="text-align: center; padding:5px 40px; border-bottom: 1px solid #ccc"><strong>Date</strong></td>
			</tr>
			<tr>
				<td style="text-align: center; padding:5px 40px; border-right: 1px solid #ccc"><?= $currency . ' ' . number_format((double)$amount, 2, '.', ' ') ?></td>
				<td style="text-align: center; padding:5px 40px"><?= date("Y/m/d") . ' at '  . date("H:i")?></td>
			</tr>
		</table>
	</div>
	<p style="text-align: center; margin-bottom: 20px 0">
		You need to complete account setup to redeem these funds. To do so, please click the button below.
	</p>
	<p style="max-width: 500px; margin: 0 auto;text-align: center;">
		<a href="<?= $this->config->item('member_backend_url') ?>finish-setup/<?= $recipient['id'] ?>/<?= $recipient['activation_code'] ?>" style="
		height: 60px;
	    line-height: 60px;
	    text-align: center;
	    background-color: #61D395;
	    font-size: 14px;
	    letter-spacing: 2px;
	    padding: 13px 26px;
	    text-decoration: none;
	    color: #444;
	    text-transform: uppercase;">Finish account setup</a>
	</p>
</div>

<?php $CI->load->view('templates/email/email_footer'); ?>