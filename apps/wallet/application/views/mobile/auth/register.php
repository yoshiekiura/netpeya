<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('mobile/templates/auth_header');
?>

<div class="register">
    <h2 class="header-title">Register</h2>
    <div class="flash-errors shown">
        <?php echo validation_errors('<p>', '</p>'); ?>
        <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
    </div>
    <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
        <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
    </div>
	<form id="register_form" action="/register" method="post" autocomplete="off">
		<div class="form-group">
            <div class="input-group">
                <input type="text" name="first_name" placeholder="<?= $this->lang->line('first_name', FALSE); ?>" value="<?= set_value('first_name')?>" tabindex="1" class="form-control validate input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input value="<?= set_value('last_name')?>" placeholder="<?= $this->lang->line('last_name', FALSE); ?>" type="text" tabindex="2" name="last_name" class="form-control validate input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="email" placeholder="<?= $this->lang->line('email', FALSE); ?>" value="<?= set_value('email')?>" name="email" tabindex="3" autocomplete="email" class="form-control validate input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" placeholder="<?= $this->lang->line('password', FALSE); ?>" tabindex="4" name="password" autocomplete="new-password" class="form-control validate input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <select tabindex="5" class="form-control validate input-translate" name="country_id">
                    <option><?= $this->lang->line('your_country', FALSE); ?></option>
                    <?php foreach($countries as $country): ?>
                        <option <?= ($country->id == set_value('country_id')) ? 'selected' : '' ?> value="<?= $country->id ?>"><?= $country->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <select tabindex="6" class="form-control validate input-translate" name="currency_id">
                    <option><?= $this->lang->line('default_currency', FALSE); ?></option>
                    <?php foreach($currences as $currency): ?>
                        <option <?= ($currency->id == set_value('currency_id')) ? 'selected' : '' ?> value="<?= $currency->id ?>"><?= $currency->code ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group ajax-btn-holder">
            <button class="btn btn-submit btn-green">Register  <img src="/assets/images/icons/arrow-right-white.png" /></button>
        </div>
	</form>
</div>


<a class="bottom-bar" href="/login">Already have an account?<span class="green-text">Log in</span></a>

<?php $CI->load->view('mobile/templates/footer'); ?>