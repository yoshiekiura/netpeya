<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');
    ?>
<header>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <a href="http://xannia.com"><img src="/assets/images/xannia_green_logo.png" /></a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</header>
<div class="row">
    <div class="content">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6 col-md-offset-3 login-container">
            	<div class="text-center">
            		<a class="btn btn-clear-green" href="/register">Create an account, it's free! <i class="fa fa-arrow-right"></i></a>
            	</div>
                <form id="login_form" class="box">
                    <h4 class="form-title text-center">Log in to your account</h4>
                    <p class="errors"></p>
                    <div class="form-group">
                        <label for="login_email">Email address:<span data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be a valid email address" class="validate-error pull-right"></span></label>
                        <input type="text" class="form-control validate email" name="login_email" id="login_email" placeholder="Enter email address" />
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password: <span class="pull-right"><a class="forgot-password-link pull-right" href="" data-toggle="modal" data-target="#forgotPasswordModal">forgot password?</a></span></label>
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter your password" />
                    </div>
                    <div class="form-group ajax-btn-holder">
                        <button id="login_btn" class="ajax-btn btn btn-success full-width">Log in <i class="fa fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('templates/auth_footer'); ?>
