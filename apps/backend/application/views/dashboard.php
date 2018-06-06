<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<div class="row dashboard-top">
    <div class="overlay">
        <div class="container">
            <div class="col-md-10 no-left" style="padding-top:15px">
                <?php if($this->user_model->is_merchant()): ?>
                    <div class="col-md-12 no-right">
                        <div class="col-md-4 no-left no-right block-container">
                            <div class="block blue">
                                <p class="top">Total Sales Volume</p>
                                <p class="center number"><?= $this->user['default_wallet']['wallet_currency_simbol'] ?><?= number_format($this_month_money_in, 2, '.', ' ') ?></p>
                                <p class="bottom">
                                    <?php if($money_in_perc > 0): ?>
                                        <span class="icon-change up"></span>
                                    <?php else: ?>
                                        <span class="icon-change flat"></span>
                                    <?php endif; ?>
                                    <span class="perc"><?= number_format($money_in_perc, 4, '.', ' ') ?>%</span> <br/>of <span><strong><?= $this->user['default_wallet']['wallet_currency_simbol'] ?></strong><?= number_format($last_month_money_in, 2, '.', ' ') ?></span> last month
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 no-left no-right block-container">
                            <div class="block blue">
                                <p class="top">Avarage Sale Amount</p>
                                <p class="center number"><?= $this->user['default_wallet']['wallet_currency_simbol'] ?><?= number_format($ava_sale_this_month, 2, '.', ' ') ?></p>
                                <p class="bottom">
                                    <?php if($ava_sale_perc > 0): ?>
                                        <span class="icon-change up"></span>
                                    <?php else: ?>
                                        <span class="icon-change flat"></span>
                                    <?php endif; ?>
                                    <span class="perc"><?= number_format($ava_sale_perc, 4, '.', ' ') ?>%</span> <br/>of <span><strong><?= $this->user['default_wallet']['wallet_currency_simbol'] ?></strong><?= number_format($ava_sale_last_month, 2, '.', ' ') ?></span> last month
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 no-left no-right block-container">
                            <div class="block">
                                <p class="top">Total Payout Volume</p>
                                <p class="center number"><?= $this->user['default_wallet']['wallet_currency_simbol'] ?><?= number_format($this_month_money_out, 2, '.', ' ') ?></p>
                                <p class="bottom">
                                    <?php if($money_out_perc > 0): ?>
                                        <span class="icon-change up"></span>
                                    <?php else: ?>
                                        <span class="icon-change flat"></span>
                                    <?php endif; ?>
                                    <span class="perc"><?= number_format($money_out_perc, 4, '.', ' ')  ?>%</span> <br/>of <span><strong><?= $this->user['default_wallet']['wallet_currency_simbol'] ?></strong><?= number_format($last_month_money_out, 2, '.', ' ') ?></span> last month
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="graphs-container">
                        <div class="graph-holder">
                            <span class="graph-title">Money In</span>
                            <div id="money_in_chart" class="dashboard-graph">
                                <div class="loader">Loading...</div>
                            </div>
                        </div>
                        <hr style="margin: 0 15px" />
                        <div class="graph-holder">
                            <span class="graph-title">Money Out</span>
                            <div id="money_out_chart" class="dashboard-graph">
                                <div class="loader">Loading...</div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-12 no-right">
                        <div class="col-md-6 no-left no-right block-container">
                            <div class="block blue">
                                <p class="top">Total Money In</p>
                                <p class="center number"><?= $this->user['default_wallet']['wallet_currency_simbol'] ?><?= number_format($this_month_money_in, 2, '.', ' ') ?></p>
                                <p class="bottom">
                                    <?php if($money_in_perc > 0): ?>
                                        <span class="icon-change up"></span>
                                    <?php else: ?>
                                        <span class="icon-change flat"></span>
                                    <?php endif; ?>
                                    <span class="perc"><?= number_format($money_in_perc, 4, '.', ' ') ?>%</span> <br/>of <span><strong><?= $this->user['default_wallet']['wallet_currency_simbol'] ?></strong><?= number_format($last_month_money_in, 2, '.', ' ') ?></span> last month
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 no-left no-right block-container">
                            <div class="block">
                                <p class="top">Total Money Out</p>
                                <p class="center number"><?= $this->user['default_wallet']['wallet_currency_simbol'] ?><?= number_format($this_month_money_out, 2, '.', ' ') ?></p>
                                <p class="bottom">
                                    <?php if($money_out_perc > 0): ?>
                                        <span class="icon-change up"></span>
                                    <?php else: ?>
                                        <span class="icon-change flat"></span>
                                    <?php endif; ?>
                                    <span class="perc"><?= number_format($money_out_perc, 4, '.', ' ') ?>%</span> <br/>of <span><strong><?= $this->user['default_wallet']['wallet_currency_simbol'] ?></strong><?= number_format($last_month_money_out, 2, '.', ' ') ?></span> last month
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="history col-md-12 no-right">
                        <section class="content-header">
                            <h1>Recent transactions<span class="line"></span></h1>
                        </section>
                        <?php if(count($history) > 0): ?>
                            <table class="table display table-bordered table-striped table-responsive">
                                <tbody>
                                    <?php foreach($history as $entry): ?>
                                        <tr>
                                            <td>
                                                <div class="<?= $entry['transaction_type_id'] == 2 ? 'money_out' : 'money_in' ?>"><?= $entry['formated_date'] ?></div>
                                            </td>
                                            <td>
                                                <div class="<?= $entry['transaction_type_id'] == 2 ? 'money_out' : 'money_in' ?>"><?= $entry['description'] ?></div>
                                            </td>
                                            <td>
                                                <div class="<?= $entry['transaction_type_id'] == 2 ? 'money_out' : 'money_in' ?>"><?= $entry['payment_status'] ?></div>
                                            </td>
                                            <td>
                                                <div class="<?= $entry['transaction_type_id'] == 2 ? 'money_out' : 'money_in' ?>"><?= $entry['currency_code'] . ' ' . number_format($entry['amount'], 2, '.', ' ') ?></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="background-color: #f5f5f5; padding: 15px!important" class="text-center"><a href="/history" class="btn btn-success"><img src="/assets/images/icons/time_icon.svg" /> View history</a></td>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php else: ?>
                            <div class="box no-content text-center">
                                <p>Your transactions will show here.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-2 right-sidebar">
                <div class="dashboard-wallet-selector">
                    <select class="select2 form-control graph-wallet-selector">
                        <option vlaue="0">All Wallets</option>
                        <?php foreach($this->user['user_wallets'] as $wallet): ?>
                            <option value="<?= $wallet['wallet_id'] ?>">(<?= $wallet['wallet_currency_code'] ?>) - <?= $wallet['wallet_currency_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="text-center" style="padding-top: 22px">
                    <input type="text" id="diff_donut" readonly class="knob" data-thickness="0.2" data-angleOffset="-125" value="" data-width="120" data-height="120" data-bgColor="#61D395" style="background-color:transparent; border:1px solid #fff" data-fgColor="#444">
                </div>
                <div class="dashboard-sidebar-balances">
                    <p style="padding-top: 10px" class="tiny-text"><img src="/assets/images/icons/time_icon.svg" />- last 30 days <span class="pull-right">In <strong><?= $this->user['default_wallet']['wallet_currency_code'] ?></strong></span></p>
                    <p class="money-in-graph-label tiny-text">Money In: <span id="total_money_in" class="pull-right"></span></p>
                    <p class="money-out-graph-label tiny-text">Money Out: <span id="total_money_out" class="pull-right"></span></p>
                    <p class="available_balance-graph-label tiny-text">Available: <span id="total_available_balance" class="pull-right"></span></p>
                </div>
                <?php if(!$this->user_model->is_merchant()): ?>
                    <button id="become_merchant_btn" class="btn btn-success">Become a merchant</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?= $this->user['default_wallet']['wallet_currency_simbol'] ?>" id="user_default_currency_code" />
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/Flot/jquery.flot.time.js"></script>
<!-- jQuery Knob -->
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- Sparkline -->
<script src="<?= $this->config->item('base_url') ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/dashboard.js"></script>
<?php $CI->load->view('templates/footer'); ?>