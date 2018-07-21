<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');
?>
<section class="">
    <div class="card webkit-box">
        <div class="col-md-4 blue-bg left">
            <a href="/login">Log into my<br/> wallet</a>
            <a href="" class="active">Forgot your<br/> password</a>
            <a href="/register">Create new<br/> wallet</a>
        </div>
        <div class="col-md-8 right app_content lazyload">
            <form id="forgot_form" action="/forgot-password" method="post">
                <h2 class="form-title">Forgot Password</h2>
                <p>Enter your registred email and we will send you instructions.</p>
                <div class="flash-errors shown">
                    <?php echo validation_errors('<p>', '</p>'); ?>
                    <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
                </div>
                <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
                    <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
                </div>
                <div class="webkit-box">
                <div class="flash-errors <?= $this->session->flashdata('flash_erros') ? 'shown' : '' ?>">
                    <p><?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?></p>
                </div>
                <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
                    <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
                </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="label-holder"><span>E-mail address</span></div>
                            <input type="text" name="email" class="form-control validate input-translate" />
                            <span class="validate-message">Enter valid email</span>
                            <button class="btn submit ajax-btn mt-3">Send code  <img src="/assets/images/icons/arrow-right-white.png" /></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>