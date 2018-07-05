<form id="creditcard_form" class="deposit-method creditcard-form p-3">
    <a href="/deposit" class="back">Back</a>
    <div class="text-center method-info"><img src="<?= $method->logo ?>" /> <span class="fade-text"><?= $method->name ?></span></div>
    <div class="card-wrapper">
        <input type="hidden" name="amount" value="<?= $amount ?>" />
        <input type="hidden" name="method" value="creditcard" />
        <div class="card-side card-front">
            <div class="form-group">
                <input type="text" class="form-control" autofocus="" id="cc_number" placeholder="Card number" name="cc_number" format-card="" maxlength="23" tabindex="1">
                <i class="icon"></i>
            </div>
            <div class="form-group card-expiration">
                <label for="card-exp-month" class="advanced-form-label ng-scope" translate="">Expiry date</label>
                <div class="expiration-fields advanced-form-input" date-focus="">
                    <div class="advanced-form-input-wrapper">
                        <input type="text" id="card-exp-month" name="cc_exp_month" class="cc_exp_month form-control expiration-fields__input" tabindex="2" maxlength="2" placeholder="MM">
                    </div>
                    <span class="card-expiration-separator">&nbsp;/&nbsp;</span>
                    <div class="advanced-form-input-wrapper">
                        <input type="text" id="card-exp-year" tabindex="3" maxlength="4" name="cc_exp_year" class="cc_exp_year form-control expiration-fields__input" placeholder="YYYY">
                    </div>
                </div>
            </div>
            <div class="advanced-form-row">
                <div class="advanced-form-input-wrapper">
                    <input type="text" id="card_holder" tabindex="4" name="cc_holder" class="form-control" placeholder="Cardholder's name" minlength="2">
                </div>
            </div>
        </div>
        <div class="card-side card-back">
            <div class="pull-right clearfix">
                <label for="card-cvv" class="card-cvv-descr ng-scope" translate="">The last three digits on the reverse</label>
                <input type="text" id="card-cvv" tabindex="5" class="cc_cvv form-control cvv-input" name="cc_cvv" maxlength="4" placeholder="CVV">
            </div>
        </div>
    </div>
    <div class="form-group ajax-btn-holder">
        <p class="text-center"><strong>Fees: <span id="selected-method-fees"><?= $total_fee ?></span><span>%</span></strong></p>
        <button id="creditcard_pay_btn" style="margin-top: 40px;height: 60px" class="submit btn-green ajax-btn full-width">Pay - <span class="select-currency-code"><?= $user->currency_simbol ?></span><span class="btn-amount"><?= $total_charge ?></span></button>
    </div>
</form>