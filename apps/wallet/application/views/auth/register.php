<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');

?>
<section class="">
    <div class="card webkit-box">
        <div class="col-md-4 blue-bg left">
            <a href="/login">Log into my<br/> wallet</a>
            <a href="" class="active">Create new<br/> wallet</a>
        </div>
        <div class="col-md-8 right">
            <form id="register_form">
                <div class="form-group">
                    <div class="input-group">
                        <div class="label-holder"><span>First name</span></div>
                        <input type="text" name="first_name" class="form-control validate input-translate" />
                        <span class="validate-message">First name is required</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="label-holder"><span>Last name</span></div>
                        <input type="text" name="last_name" class="form-control validate input-translate" />
                        <span class="validate-message">Last name is required</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="label-holder"><span>E-mail</span></div>
                        <input type="email" name="email" autocomplete="email" class="form-control validate input-translate" />
                        <span class="validate-message">A valid email address is required</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="label-holder"><span>Password</span></div>
                        <input type="password" name="password" autocomplete="new-password" class="form-control validate input-translate" />
                        <span class="validate-message">Your password must be at least 6 characters long and contain at least 1 uppercase letter and 1 digit</span>
                    </div>
                </div>
                <div class="webkit-box">
                    <div class="col-md-6 no-left no-right">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder focus"><span>Your country</span></div>
                                <select class="form-control validate input-translate" name="country_id">
                                    <?php foreach($countries as $country): ?>
                                        <option <?= $userCountry && ($country->id == $userCountry->id) ? 'selected' : '' ?> value="<?= $country->id ?>"><?= $country->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <img class="icon" src="/assets/images/icons/small-chevron-down.png" />
                                <span class="validate-message">Select your country.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 no-right no-left">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder focus"><span>Default currency</span></div>
                                <select class="form-control validate input-translate" name="currency_id">
                                    <?php foreach($currences as $currency): ?>
                                        <option <?= $userCurrency && ($currency->id == $userCurrency->id) ? 'selected' : '' ?> value="<?= $currency->id ?>"><?= $currency->code ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <img class="icon" src="/assets/images/icons/small-chevron-down.png" />
                                <span class="validate-message">Select a default wallet currency.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox-holder">
                        <input type="hidden" class="validate" name="agreed_to_terms" />
                        <p class="checkbox"></p>
                        <label class="checkbox-label">I accept and agree to the </label><a href="">term &amp; conditions </a>
                        <span class="validate-message">You need to agree to term</span>
                    </div>
                </div>
                <div class="errors"></div>
                <div class="form-group ajax-btn-holder">
                    <button id="register_btn" class="btn submit ajax-btn">Register  <img src="/assets/images/icons/arrow-right-white.png" /></button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>