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
                    <a class="btn btn-clear-green" href="/login">Login here <i class="fa fa-arrow-right"></i></a>
                </div>
                <form id="activation_form" class="box text-center">
                    <h4 class="form-title">Hi, Welcome!</h4>
                    <p>We have sent an activation email to your inbox, <br/>please confirm it before continuing.</p>
                    <div class="form-group">
                        <p class="text-center" style="font-size: 60px; color:#61D395; padding-top: 50px"><i class="fa fa-check"></i></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('templates/auth_footer'); ?>