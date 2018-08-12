<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<div class="header text-right">
    <a href="/friends" class="back pull-left">Back</a>
    <span class="text-center title">Send to email<span>
    	<div class="deposit-form p-3">
<form class="form" method="post" action="/deposit/pay">
        <div class="form-group">
            <input type="text" id="deposit_amount" value="10" name="deposit_amount" class="form-control amount">
            <span class="amount-label">Amount</span>
        </div>
        <div class="form-group">
        	<input type="email" id="email" name="email" placeholder="Recipient e-mail" class="form-control">
        </div>
        <div class="form-group">
            <div class="dropdown-holder method-select pt-3">
                <button class="dropdown-btn">
                    <img class="method-logo" src="/assets/svg/countries/usd.svg" />
                    <p>
                    	<span class="label">Send currency</span>
                        <span class="method-name">USD</span>
                    </p>
                </button>
                <ul class="dropdown-content">
                    <?php foreach($this->currency_model->getAll() as $currency): ?>
                    <li><img class="method-logo" src="" /><strong><?= $currency->code ?></strong></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="form-group">
            <p class="text-center"><strong>Fees: <span id="selected-method-fees">5</span><span>%</span></strong></p>
            <button id="deposit_continue_btn" class="submit btn-green">Continue - <?= $user->currency_simbol ?><span id="btn_deposit_amount" class="btn-amount">10</span></button>
        </div>
    </form>
</div>
<?php $CI->load->view('templates/footer'); ?>