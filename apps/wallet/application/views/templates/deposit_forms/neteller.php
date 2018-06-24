<form id="neteller_form" class="deposit-method neteller-form" autocomplete="new-all">
    <a href="/deposit" class="back"><img src="/assets/images/icons/arrow-left.png" /> Back</a>
    <div class="text-center method-info"><img src="<?= $method->logo ?>" /> <span class="fade-text"><?= $method->name ?></span></div>
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
        <button id="neteller_pay_btn" style="margin-top: 40px;height: 60px" class="submit btn-green ajax-btn full-width">Pay - <span class="select-currency-code"><?= $user->currency_simbol ?></span><span class="btn-amount"><?= $total_charge ?></span></button>
    </div>
</form>