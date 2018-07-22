
<div class="header text-right">
    <a href="/deposit" class="back pull-left">Back</a>
    <span class="text-center title"><?= $method->name ?><span>
</div>
<form id="neteller_form" class="deposit-method neteller-form p-3" autocomplete="new-all">
    <div class="form-group">
        <div class="input-group">
            <div class="label-holder"><span>Neteller e-mail</span></div>
            <input type="email" autocomplete="new-email" name="neteller_email" class="form-control input-translate" />
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="label-holder"><span>Secure code</span></div>
            <input type="password" autocomplete="new-password" name="neteller_secure_code" class="form-control input-translate" />
        </div>
    </div>
    <div class="form-group ajax-btn-holder">
        <p class="text-center"><strong>Fees: <span id="selected-method-fees"><?= $total_fee ?></span><span>%</span></strong></p>
        <button id="neteller_pay_btn" class="submit btn-green ajax-btn full-width"><i class="fa fa-lock mr-3"></i>Pay - <span class="select-currency-code"><?= $user->currency_simbol ?></span><span class="btn-amount"><?= $total_charge ?></span></button>
    </div>
</form>