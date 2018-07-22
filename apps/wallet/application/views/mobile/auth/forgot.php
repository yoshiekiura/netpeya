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
	<form id="forgot_form" action="/forgot-password" method="post" autocomplete="off">
        <p class="mb-3">Enter your registred email and we will send you instructions.</p>
        <div class="form-group mt-3">
            <div class="input-group">
                <input type="email" name="email" placeholder="email" class="form-control validate input-translate" />
                <button id="forgot_btn" class="btn btn-submit btn-green">Next step</button>
            </div>
        </div>
	</form>
</div>


<a class="bottom-bar" href="/login">Wait!, I remember!<span class="green-text">Log in</span></a>

<?php $CI->load->view('mobile/templates/footer'); ?>