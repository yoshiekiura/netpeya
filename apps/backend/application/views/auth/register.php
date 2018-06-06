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
        <div class="col-md-10 col-md-offset-3">
            <div class="col-md-7">
            	<div class="text-center">
            		<a class="btn btn-clear-green" href="/login"><i class="fa fa-arrow-left"></i> Login</a>
            	</div>
                <form id="register_form" class="box">
                    <h4 class="form-title text-center">Create an account, it's free!</h4>
                    <p class="errors"></p>
                    <div class="col-md-12 no-left no-right">
                        <div class="col-md-4 col-md-offset-4 no-left no-right">
                            <div class="form-group text-center">
                                <label for="register_account_type">Account type:</label>
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" id="register_account_type">
                                    <label class="onoffswitch-label" for="register_account_type">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                                <input type="hidden" id="register_account_type_id" name="register_account_type"  value="1" />
                            </div>
                        </div>
                        <div class="col-md-12 no-left no-right">
                            <div class="form-group" style="display: none;" id="business_name_holder">
                                <label for="register_businessname">Business name:<span data-toggle="tooltip" data-container="body" data-placement="left" title="Required" class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate name" tabindex="1" name="register_businessname" id="register_businessname" placeholder="Enter business name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 no-left">
                        <div class="form-group">
                            <label for="register_firstname">Your first name:<span data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long." class="validate-error pull-right"></span></label>
                            <input type="text" class="form-control validate name" tabindex="1" name="register_firstname" id="register_firstname" placeholder="Enter first name" />
                        </div>
                        <div class="form-group">
                            <label for="register_email">Email address:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be a valid email address." class="validate-error pull-right"></span></label>
                            <input type="text" tabindex="3" class="form-control validate email" name="register_email" id="register_email" placeholder="Enter email address" />
                        </div>
                        <div class="form-group">
                            <label id="currency_lbl" for="register_currency">Default wallet:</label>
                            <select class="select2 form-control" id="register_currency" name="register_currency">
                                <?php foreach($currencies as $currency): ?>
                                <option value="<?= $currency['id'] ?>"><?= $currency['code'] . ' - ' . $currency['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="terms-text">By clicking <strong>Create my account</strong> you agree to Xannia's <a href="#"> terms &amp; conditions</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 no-right">
                        <div class="form-group">
                            <label for="register_lastname">Your last name:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long" class="validate-error pull-right"></span></label>
                            <input type="text" tabindex="2" class="form-control validate name" name="register_lastname" id="register_lastname" placeholder="Enter last name" />
                        </div>
                        <div class="form-group">
                            <label for="register_password">Create password:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - At least 8 characters - Contain: at least 1 numeric character and an uppercase." class="validate-error pull-right"></span></label>
                            <input type="password" tabindex="4" class="form-control validate" name="register_password" id="register_password" placeholder="Create your password" />
                        </div>
                        <div class="form-group">
                            <label for="register_country">Your country:</label>
                            <select class="select2 form-control" id="register_country" name="register_country">
                                <?php foreach($countries as $country): ?>
                                <option value="<?= $country['id'] ?>"><?= $country['name'] . ' - ' . $country['code'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group ajax-btn-holder">
                            <button id="register_btn" class="ajax-btn btn btn-success full-width">Create my account <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('templates/auth_footer'); ?>
