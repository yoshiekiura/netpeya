<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');

?>
<section class="">
    <div class="card webkit-box">
        <div class="col-md-4 blue-bg left">
            <a href="/login">Log into my<br/> wallet</a>
            <a href="/forgot-password">Forgot your<br/> password?</a>
            <a href="" class="active">Create new<br/> wallet</a>
        </div>
        <div class="col-md-8 right app_content lazyload">
            <form id="register_form" action="/register" method="post">
                <h2 class="form-title"><?= $this->lang->line('create_a_wallet', FALSE); ?></h2>
                <div class="flash-errors shown">
                    <?php echo validation_errors('<p>', '</p>'); ?>
                    <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
                </div>
                <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
                    <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
                </div>
                <div class="webkit-box">
                    <div class="col-md-6 no-left no-left no-right">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder <?= set_value('first_name') ? 'focus' : '' ?>"><span><?= $this->lang->line('first_name', FALSE); ?></span></div>
                                <input type="text" name="first_name" value="<?= set_value('first_name')?>" tabindex="1" class="form-control validate input-translate" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder <?= set_value('email') ? 'focus' : '' ?>"><span><?= $this->lang->line('email', FALSE); ?></span></div>
                                <input type="email" value="<?= set_value('email')?>" name="email" tabindex="3" autocomplete="email" class="form-control validate input-translate" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder focus"><span><?= $this->lang->line('your_country', FALSE); ?></span></div>
                                <select tabindex="5" class="form-control validate input-translate" name="country_id">
                                    <?php foreach($countries as $country): ?>
                                        <option <?= ($country->id == set_value('country_id')) ? 'selected' : '' ?> value="<?= $country->id ?>"><?= $country->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <img class="icon" src="/assets/images/icons/small-chevron-down.png" />
                                <span class="validate-message">Select your country.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 no-right">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder <?= set_value('last_name') ? 'focus' : '' ?>"><span><?= $this->lang->line('last_name', FALSE); ?></span></div>
                                <input value="<?= set_value('last_name')?>" type="text" tabindex="2" name="last_name" class="form-control validate input-translate" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder"><span><?= $this->lang->line('password', FALSE); ?></span></div>
                                <input type="password" tabindex="4" name="password" autocomplete="new-password" class="form-control validate input-translate" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="label-holder focus"><span><?= $this->lang->line('default_currency', FALSE); ?></span></div>
                                <select tabindex="6" class="form-control validate input-translate" name="currency_id">
                                    <?php foreach($currences as $currency): ?>
                                        <option <?= ($currency->id == set_value('currency_id')) ? 'selected' : '' ?> value="<?= $currency->id ?>"><?= $currency->code ?></option>
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
                        <input type="hidden" class="validate" name="terms" />
                        <p class="checkbox"></p>
                        <label class="checkbox-label">I accept and agree to the <a href="">term &amp; conditions </a></label>
                    </div>
                </div>
                <div class="errors"></div>
                <div class="form-group ajax-btn-holder">
                    <button class="btn submit ajax-btn">Register  <img src="/assets/images/icons/arrow-right-white.png" /></button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>