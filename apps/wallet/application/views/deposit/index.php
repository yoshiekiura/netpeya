<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
?>

<div class="deposit-form p-3">
    <form class="form" method="post" action="/deposit/pay">
        <div class="form-group">
            <input type="number" id="deposit_amount" value="<?= (double)$default_amount ?>" name="deposit_amount" class="form-control">
            <input type="hidden" id="method" name="method" value="creditcard">
            <span class="amount-label">Amount</span>
        </div>
        <div class="form-group">
            <div class="dropdown-holder method-select">
                <button class="dropdown-btn">
                    <img class="method-logo" src="<?= $default_method->logo ?>" />
                    <p>
                        <span class="label">Deposit method</span>
                        <span class="method-name"><?= $default_method->name ?></span>
                    </p>
                </button>
                <ul class="dropdown-content">
                    <?php foreach($this->depositmethod_model->getAll() as $method): ?>
                    <li class="<?= strtolower($method->slug) == 'creditcard' ? 'active' : '' ?>"  data-fee="<?= (double)($method->internal_fee + $method->external_fee) ?>" data-method="<?= strtolower($method->name) ?>" data-method-slug="<?= strtolower($method->slug) ?>"><img class="method-logo" src="<?= $method->logo ?>" /><span class="method-name"><strong><?= $method->name ?></strong> - <?= ($method->internal_fee + $method->external_fee) ?>%</span></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="form-group">
            <p class="text-center"><strong>Fees: <span id="selected-method-fees"><?= ($default_method->internal_fee + $default_method->external_fee) ?></span><span>%</span></strong></p>
            <button id="deposit_continue_btn" class="submit btn-green">Continue - <?= $user->currency_simbol ?><span id="btn_deposit_amount" class="btn-amount"><?= $default_payment_with_charges ?></span></button>
        </div>
    </form>
</div>
<?php $CI->load->view('templates/footer'); ?>