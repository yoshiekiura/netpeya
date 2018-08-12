<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');

?>
<section class="">
    <div class="card webkit-box">
        <div class="col-md-4 blue-bg left">
            <a href="" class="active">Log into my<br/> wallet</a>
            <a href="/forgot-password">Forgot your<br/> password?</a>
            <a href="/register">Create new<br/> wallet</a>
        </div>
        <div class="col-md-8 right app_content lazyload">
            <form id="login_form" action="/login" method="post" autocomplete="off">
                <h2 class="form-title">Login</h2>
                <div class="flash-errors shown">
                    <?php echo validation_errors('<p>', '</p>'); ?>
                    <?= $this->session->flashdata('flash_erros') ? $this->session->flashdata('flash_erros') : '' ?>
                </div>
                <div class="flash-success <?= $this->session->flashdata('flash_success') ? 'shown' : '' ?>">
                    <p><?= $this->session->flashdata('flash_success') ? $this->session->flashdata('flash_success') : '' ?></p>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="label-holder"><span>E-mail</span></div>
                        <input type="email" autocomplete="false" name="email" class="form-control input-translate" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="label-holder"><span>Password</span></div>
                        <input type="password" autocomplete="new-password" name="password" class="form-control input-translate" />
                    </div>
                </div>
                <div class="errors"></div>
                <div class="form-group">
                    <a href="/forgot-password">Forgot password?</a>
                    <a href="/register" class="pull-right">Signup</a>
                </div>
                <div class="form-group ajax-btn-holder">
                    <button id="login_btn" class="btn submit ajax-btn">Login  <img src="/assets/images/icons/arrow-right-white.png" /></button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>