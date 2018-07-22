<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('mobile/templates/auth_header');
?>

<div class="login">
	<h2 class="header-title">Forgot Password</h2>
    <div class="flash-errors shown">
        <?php echo validation_errors('<p>', '</p>'); ?>
        <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
    </div>
    <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
        <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
    </div>
	<form  id="reset_form" action="/reset-password" method="post" autocomplete="off">
        <p>Enter your registred email and we will send you instructions.</p>
        <input type="hidden" name="email" value="<?= $email ?>"/>
        <div class="form-group">
            <div class="input-group">
                <input type="text" placeholder="Pass code" value="<?= set_value('code')?>" name="code" class="form-control validate input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" placeholder="New password" name="password" class="form-control validate input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" placeholder="Repeat password" name="repeat_password" class="form-control validate input-translate" />
                <button class="btn btn-submit btn-green">Reset password</button>
            </div>
        </div>
	</form>
</div>


<a class="bottom-bar" href="/login">Wait!, I remember!<span class="green-text">Log in</span></a>

<?php $CI->load->view('mobile/templates/auth_footer'); ?>