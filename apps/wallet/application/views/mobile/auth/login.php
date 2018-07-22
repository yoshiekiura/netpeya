<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('mobile/templates/auth_header');
?>

<div class="login">
	<h2 class="header-title">Sign in</h2>
    <div class="flash-errors shown">
        <?php echo validation_errors('<p>', '</p>'); ?>
        <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
    </div>
    <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
        <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
    </div>
	<form id="login_form" action="/login" method="post" autocomplete="off">
		<div class="form-group">
            <div class="input-group">
                <input type="email" autocomplete="false" placeholder="E-mail" name="email" class="form-control input-translate" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" autocomplete="new-password" placeholder="Password" name="password" class="form-control input-translate" />
            </div>
        </div>
        <div class="errors"></div>
        <div class="form-group">
            <a href="/forgot-password">Forgot password?</a>
        </div>
        <div class="form-group ajax-btn-holder">
            <button class="btn btn-submit btn-green">Log in</button>
        </div>
	</form>
</div>


<a class="bottom-bar" href="/register">Don't have an account?<span class="green-text">Sign up</span></a>

<?php $CI->load->view('mobile/templates/footer'); ?>