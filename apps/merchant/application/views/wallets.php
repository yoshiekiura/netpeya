<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="container">
            <div class="col-md-10">
                <section class="content-header">
                    <h1>Active merchant_accounts
                        <?php if(count($this->user['merchant_accounts']) < $this->config->item('max_merchant_accounts', 'xannia') && count($this->user['unused_merchant_accounts']) > 0): ?>
                        <span class="pull-right link circle-btn" data-toggle="tooltip" data-container="body" data-placement="left" title="Add new wallet"><img data-toggle="modal" data-target="#addWalletModal" src="/assets/images/icons/black_plus_icon.svg" /></span>
                        <?php else: ?>
                        <span class="pull-right">You have reached your maximum merchant_accounts.</span>
                        <?php endif; ?>
                        <span class="line"></span>
                    </h1>
                </section>
                <?php foreach($this->user['merchant_accounts'] as $wallet): ?>
                <div class="col-md-4 no-left">
                    <div class="small-box single-wallet <?= $wallet['wallet_is_default'] == 1 ? 'default' : 'not-default' ?>">
                        <div>
                            <div class="inner">
                                <p class="wallet-balance text-center">
                                    <span><sup><?= $wallet['wallet_currency_code'] ?></sup></span>
                                    <?= number_format($wallet['wallet_balance'], 2, '.', ' ') ?>
                                </p>
                            </div>
                            <div class="icon currency">
                                <?= $wallet['wallet_currency_simbol'] ?>
                            </div>
                            <?php //if($wallet['wallet_is_default'] != 1): ?>
                            <p class="action-tab small-box-footer text-center">
                                <span class="delete-wallet" data-balance="<?= $wallet['wallet_balance'] ?>" data-wallet-id="<?= $wallet['wallet_id'] ?>" data-wallet-code="<?= $wallet['wallet_currency_code'] ?>"><img src="/assets/images/icons/close_icon.svg" /> Delete</span>
                                <span class="make-default" data-balance="<?= $wallet['wallet_balance'] ?>" data-wallet-id="<?= $wallet['wallet_id'] ?>" data-wallet-code="<?= $wallet['wallet_currency_code'] ?>"><img src="/assets/images/icons/new_history_icon.svg" /> Make default</span>
                            </p>
                            <?php //endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-2 right-sidebar">
                <section class="content-header">
                    <h1>Help center <span class="line"></span></h1>
                </section>
                <ul class="help-guide-list">
                    <li>
                        <span class="heading">For actions on a single wallet</span>
                        <span class="description">Hover over the wallet</span>
                    </li>
                    <li>
                        <span class="heading">To delete a wallet</span>
                        <span class="description">Click on <strong>'DELETE'</strong> link and confirm from the popup window.</span>
                    </li>
                    <li>
                        <span class="heading">To make a wallet default</span>
                        <span class="description">Click on <strong>'MAKE DEFAULT'</strong> link and confirm from the popup window.</span>
                        <span class="description">The new deafult wallet will be used for unspeciafied transactions.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>