<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<!-- Main content -->
<section class="content white-bg">
    <div class="row">
        <div class="container">
            <div class="col-md-10 border-right">
                <form id="deposit_form">
                    <section class="content-header">
                        <h1><?= lang('deposit') ?>
                            <span class="line"></span>
                        </h1>
                    </section>
                    <div class="col-md-3 no-left">
                        <div class="form-group">
                            <select name="wallet_currency" id="wallet_currency" class="form-control select2">
                                <option>Select a wallet</option>
                                <?php foreach ($this->user['merchant_accounts'] as $wallet): ?>
                                <option value="<?=$wallet['wallet_currency_code'] ?>"><?= $wallet['wallet_currency_code'] ?> - <?= $wallet['wallet_currency_name'] ?>
                                    <i class="fa fa-arrow-left"></i>
                                </option>
                                <!-- /.col -->
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 no-left">
                        <div class="form-group">
                            <input type="text" id="amount" class="form-control validate-input" placeholder="Amount" />
                        </div>
                    </div>
                    <div class="col-md-12 no-left">
                        <fieldset class="payment_methods">
                            <div class="form-group">
                                <label>Select deposit method</label>
                                <?php foreach($this->payment_methods as $method): ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12 no-left">
                                        <div class="info-box payment-method" data-method="<?= $method['html_form'] ?>" data-name="Visa card">
                                            <span class="info-box-icon"><img src="<?= $this->config->item('shared_resources_source') ?>images/payment_methods/<?= strtolower(str_replace('-', '', $method['slag'])) ?>.svg"></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?= $method['name'] ?></span>
                                                <span class="info-box-number"><small>Fee: <?= $method['internal_fee'] ?>%</small></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                <?php endforeach; ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12 no-left">
                        <fieldset class="payment-forms">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-left no-right">
                                <div class="col-md-6 col-sm-12 payment-form card no-left
                                    ">
                                    <div class="form-group">
                                        <label>Card details</label>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 no-left no-right">
                                        <div class="col-md-6 col-sm-12 no-left">
                                            <input type="text" id="cardNumber" class="form-control validate-input" placeholder="Card number" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 no-left no-right">
                                        <div class="col-md-4 col-sm-6 no-left">
                                            <select name="expiryMonth" class="form-control select2 validate-input" required="" id="expiryMonth" aria-invalid="false">
                                                <option value="">Expiry month</option>
                                                <option value="01">01 - Jan</option>
                                                <option value="02">02 - Feb</option>
                                                <option value="03">03 - Mar</option>
                                                <option value="04">04 - Apr</option>
                                                <option value="05">05 - May</option>
                                                <option value="06">06 - Jun</option>
                                                <option value="07">07 - Jul</option>
                                                <option value="08">08 - Aug</option>
                                                <option value="09">09 - Sept</option>
                                                <option value="10">10 - Oct</option>
                                                <option value="11">11 - Nov</option>
                                                <option value="12">12 - Dec</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <select id="expiryYear" class="form-control select2 validate-input"><?php $this->load->view('templates/card_expiry_dates', $wallet_details); ?></select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <input type="text" id="cvv" class="form-control validate-input" placeholder="CVV" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 payment-form neteller no-left">
                                    <div class="form-group">
                                        <label>Neteller details</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12 no-left">
                                        <input type="email" id="neteller_email" class="form-control" placeholder="Neteller email" name="">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" id="neteller_secret" class="form-control" placeholder="Secure id" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 no-left ajax-btn-holder">
                                        <button id="do_deposit" class="ajax-btn btn btn-success">Deposit <i class="ion ion-checkmark"></i></button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-12">
                <section class="content-header">
                    <h1>Help center <span class="line"></span></h1>
                </section>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="gap"></div>
</section>
<script src="assets/js/deposit.js"></script>
<?php $CI->load->view('templates/footer'); ?>