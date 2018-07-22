<div class="header text-right">
    <a href="/deposit" class="back pull-left">Back</a>
    <span class="text-center title"><img class="method-logo" src="<?= $method->logo ?>" /><span>
</div>
<form id="creditcard_form" class="deposit-method creditcard-form p-3">
    <div class="card-wrapper">
        <input type="hidden" name="amount" value="<?= $amount ?>" />
        <input type="hidden" name="method" value="creditcard" />
        <div class="card-side card-front">
            <div class="form-group">
                <input type="number" class="form-control" id="cc_number" placeholder="Card number" name="cc_number" format-card="" maxlength="23" tabindex="1">
                <i class="icon"></i>
            </div>
            <div class="form-group">
                <div class="advanced-form-input-wrapper">
                    <input type="text" id="card_holder" tabindex="2" name="cc_holder" class="form-control" placeholder="Cardholder's name" minlength="2">
                </div>
            </div>
            <div class="form-group card-expiration">
                <label for="card-exp-month" class="advanced-form-label ng-scope" translate="">Expiry date</label>
                <div class="expiration-fields advanced-form-input" date-focus="">
                    <div class="advanced-form-input-wrapper">
                        <input type="number" id="card-exp-month" name="cc_exp_month" class="cc_exp_month form-control expiration-fields__input" tabindex="3" maxlength="2" placeholder="MM">
                    </div>
                    <div class="advanced-form-input-wrapper">
                        <input type="number" id="card-exp-year" tabindex="4" maxlength="4" name="cc_exp_year" class="cc_exp_year form-control expiration-fields__input" placeholder="YYYY">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="card-cvv" class="card-cvv-descr mt-3" translate="">The last three digits on the reverse</label>
                <input type="number" id="card-cvv" tabindex="5" class="cc_cvv form-control cvv-input" name="cc_cvv" maxlength="4" placeholder="CVV">
            </div>
            <div class="form-group text-center mt-3">
                <span><strong>Fees: <span id="selected-method-fees"><?= $total_fee ?></span><span>%</span></strong></span>
                <button id="creditcard_pay_btn" class="btn btn-submit btn-green"><i class="fa fa-lock mr-3"></i>Pay - <span class="select-currency-code"><?= $user->currency_simbol ?></span><span class="btn-amount"><?= $total_charge ?></span></button>
            </div>
        </div>
    </div>
    
</form>