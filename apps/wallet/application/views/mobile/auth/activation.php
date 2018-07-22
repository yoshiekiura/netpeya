<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('mobile/templates/auth_header');
?>

<div class="login">
	<h2 class="header-title">Account activation</h2>
    <div class="flash-errors shown">
        <?php echo validation_errors('<p>', '</p>'); ?>
        <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
    </div>
    <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
        <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
    </div>
	<form id="activation_form" action="/activation" method="post" autocomplete="off">
		<input type="hidden" name="np_id" value="<?= $np_id ?>" class="form-control validate input-translate" />
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="activation_code" placeholder="CODE" style="font-size: 30px;letter-spacing: 10px;color:#666" class="form-control validate input-translate text-center" />
                <a href="/resend-activation/<?= $np_id ?>" class="btn btn-submit btn-green-trans">Resend code</a>
                <button id="activation_btn" class="btn btn-submit btn-green">Activate wallet</button>
            </div>
        </div>
	</form>
</div>


<a class="bottom-bar" href="/login">Already have an account?<span class="green-text">Log in</span></a>

<?php $CI->load->view('mobile/templates/footer'); ?>