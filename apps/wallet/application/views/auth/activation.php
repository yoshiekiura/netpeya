<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');
?>
<section class="">
    <div class="card webkit-box">
        <div class="col-md-4 blue-bg left">
            <a href="/login">Log into my<br/> wallet</a>
            <a href="" class="active">Activate your<br/> wallet</a>
        </div>
        <div class="col-md-8 right app_content lazyload">
            <form id="activation_form" action="/activation" method="post">
                <h2 class="form-title">Activate your wallet</h2>
                <p>Enter the activation code that was sent to your email</p>
                <?php if(count($errors) > 0): ?>
                    <?php foreach($errors as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="webkit-box">
                    <input type="hidden" name="np_id" value="<?= $np_id ?>" class="form-control validate input-translate" />
                    <div class="form-group">
                        <div class="input-group">
                            <div class="label-holder"><span>Activation code</span></div>
                            <input type="text" name="activation_code" style="font-size: 40px;letter-spacing: 10px;color:#666" class="form-control validate input-translate" />
                            <span class="validate-message">Enter valid code</span>
                            <button id="activation_btn" class="btn submit ajax-btn mt-3">Activate wallet  <img src="/assets/images/icons/arrow-right-white.png" /></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>