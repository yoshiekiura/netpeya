<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');
    ?>
<div class="row">
    <div class="content">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6 col-md-offset-3 login-container">
                <div class="text-center">
                    <a class="btn btn-clear-green" href="/login">Login here <i class="fa fa-arrow-right"></i></a>
                </div>
                <form id="reset_password_form" class="box">
	            	<?php if($link_expired): ?>
	            		<h4 class="form-title text-center">Recovery Link Expired</h4>
						<div class="form-group text-center">
	                        <p>Please request another recovery link</p>
	                        <p>P.S Password recovery links expired after 30 minutes.</p>
	                        <a class="btn btn-success" href="" data-toggle="modal" data-target="#forgotPasswordModal">Send me new link</a>
	                    </div>
	            	<?php else: ?>
	                    <h4 class="form-title text-center">Password Recovery</h4>
	                    <p class="errors"></p>
	                    <div class="form-group">
	                        <label for="change_password">Create new password:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - At least 8 characters - Contain: at least 1 numeric character and an uppercase." class="validate-error pull-right"></span></label>
	                            <input type="password" tabindex="4" class="form-control validate" name="change_password" id="change_password" placeholder="Enter your new password" />
	                    </div>
	                    <div class="form-group">
	                        <label for="repeat_change_password">Repeat password:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - At least 8 characters - Contain: at least 1 numeric character and an uppercase." class="validate-error pull-right"></span></label>
	                            <input type="password" tabindex="4" class="form-control validate" name="repeat_change_password" id="repeat_change_password" placeholder="Repeat password" />
	                        <input type="hidden" id="user_email" value="<?= $user['email_address'] ?>" name="" />
	                    </div>
	                    <div class="form-group ajax-btn-holder">
	                        <button id="change_password_btn" class="ajax-btn btn btn-success full-width">Reset password <i class="fa fa-arrow-right"></i></button>
	                    </div>
	                <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('templates/auth_footer'); ?>