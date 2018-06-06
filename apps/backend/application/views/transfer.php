<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="container">
                <!-- /.col -->
                <div class="col-md-10 border-right">
                    <section class="content-header">
                        <h1>Transfer funds
                            <span class="line"></span>
                        </h1>
                    </section>
                    <form id="transfer_form">
                        <div class="col-md-6 col-sm-12 col-xs-12 no-left">
                            <input type="hidden" id="fees" value="<?= $fees ?>" />
                            <fieldset class="transfer-top">
                                <div class="col-md-6 col-sm-6 col-xs-12 no-left">
                                    <div class="form-group">
                                        <label>From wallet</label>
                                        <select name="sender_wallet_id" id="sender_wallet_id" class="form-control select2">
                                            <option value="0">Select from wallet</option>
                                            <?php foreach ($this->user['user_wallets'] as $wallet): ?>
                                            <option value="<?=$wallet['wallet_id'] ?>" data-wallet-currency="<?= $wallet['wallet_currency_code'] ?>"><?= $wallet['wallet_currency_code'] ?> - <?= $wallet['wallet_currency_name'] ?>
                                                <i class="fa fa-arrow-left"></i>
                                            </option>
                                            <!-- /.col -->
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 no-left">
                                    <div class="form-group">
                                        <label>Recipient</label>
                                            <?php if(count($this->user['user_recipients']) > 0): ?>
                                                <div class="input-group">
                                                    <select class="select2 form-control" id="user_recipients_list">
                                                        <option>Select recipient</option>
                                                        <?php foreach ($this->user['user_recipients'] as $recipient): ?>
                                                            <option value="<?=$recipient['recipient_email'] ?>"><?= $recipient['recipient_first_name'] . ' ' . $recipient['recipient_last_name'] ?>
                                                            </option>
                                                            <!-- /.col -->
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="input-group-addon recipient-addon">
                                                        <a href="" data-toggle="modal" data-target="#addRecipientModal"><img data-toggle="tooltip" data-container="body" data-placement="left" title="New recipient" src="/assets/images/icons/black_plus_icon.svg" /></a>
                                                    </span>
                                                </div>
                                            <?php else: ?>
                                                <input type="text" id="recipient_identity" class="form-control" placeholder="Enter recipient email" />
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="col-md-6 col-sm-12 col-xs-12 no-left">
                                    <div class="form-group">
                                        <label>Transfer amount</label>
                                        <div class="input-group">
                                            <span class="input-group-addon amount-addon">
                                                <select class="select2 form-control" id="to_currency">
                                                    <?php foreach($currencies as $currency): ?>
                                                    <option value="<?= $currency['id'] ?>"><?= $currency['code'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </span>
                                            <input type="text" id="amount"  placeholder="Amount" class="text-right form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 no-left">
                                    <div class="form-group sm-text-center">
                                        <label>Includes fees</label>
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="include_fees">
                                            <label class="onoffswitch-label" for="include_fees">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-left">
                                    <div class="col-md-6 col-sm-12 col-xs-6 no-left">
                                        <div class="form-group">
                                            <label>Recipient gets</label>
                                            <p id="total_received">0.00</p>
                                            <label>You will be charged</label>
                                            <p id="total_charge">0.00</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group sm-text-right">
                                            <label>Rates &amp; fees</label>
                                            <p id="exchange_rates"></p>
                                            <p id="exchange_fee"><strong>Fees: </strong><?= number_format($fees, 2, '.', ' ') ?>%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-left ajax-btn-holder">
                                    <button id="do_transfer" class="ajax-btn btn btn-success top-30">Transfer <i class="fa fa-check"></i></button>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <section class="content-header">
                        <h1>Help center <span class="line"></span></h1>
                    </section>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
<script src="assets/js/transfer.js"></script>
<?php $CI->load->view('templates/footer'); ?>