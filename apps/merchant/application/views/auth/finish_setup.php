<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');
    ?>
<div class="row">
    <div class="content">
        <div class="col-md-10 col-md-offset-3">
            <div class="col-md-7">
                <form id="finish_setup_form" class="box">
                    <?php if(isset($user)): ?>
                        <h4 class="form-title text-center">Finish Account Setup</h4>
                        <p class="errors"></p>
                        <div class="col-md-6 no-left">
                            <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
                            <div class="form-group">
                                <label for="finish_setup_firstname">Your first name:<span data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate name" tabindex="1" name="finish_setup_firstname" id="finish_setup_firstname" placeholder="Enter first name" />
                            </div>
                            <div class="form-group">
                                <label for="register_country">Your country:</label>
                                <select class="select2 form-control" id="finish_setup_country" name="finish_setup_country">
                                    <?php foreach($countries as $country): ?>
                                    <option value="<?= $country['id'] ?>"><?= $country['name'] . ' - ' . $country['code'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p class="terms-text">By clicking <strong>Finish setup</strong> you agree to Xannia's <a href="#"> terms &amp; conditions</a></p>
                            </div>
                        </div>
                        <div class="col-md-6 no-right">
                            <div class="form-group">
                                <label for="finish_setup_lastname">Your last name:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long" class="validate-error pull-right"></span></label>
                                <input type="text" tabindex="2" class="form-control validate name" name="finish_setup_lastname" id="finish_setup_lastname" placeholder="Enter last name" />
                            </div>
                            <div class="form-group">
                                <label for="finish_setup_password">Create password:<span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - At least 8 characters - Contain: at least 1 numeric character and an uppercase." class="validate-error pull-right"></span></label>
                                <input type="password" tabindex="4" class="form-control validate" name="finish_setup_password" id="finish_setup_password" placeholder="Create your password" />
                            </div>
                            <div class="form-group ajax-btn-holder">
                                <button id="finish_setup_btn" class="ajax-btn btn btn-success full-width">Finish setup <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php if($user_not_found): ?>
                            <div class="form-group text-center">
                                <p style="padding: 20px 0">Account not found, please contact support.</p>
                                <p style="padding: 20px 0"><strong><a hre="tel:+27217805674">+27 21 789 5674</a></strong> Or <strong><a hre="mailto:support@xannia.com">Email support</a></strong></p>
                                <a class="btn btn-success" href="/login">Login <i class="fa fa-arrow-right"></i></a>
                            </div>
                        <?php elseif($already_activated): ?>
                            <div class="form-group text-center">
                                <p style="padding: 30px 0">This account is already active.</p>
                                <a class="btn btn-success" href="/login">Login <i class="fa fa-arrow-right"></i></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('templates/auth_footer'); ?>
