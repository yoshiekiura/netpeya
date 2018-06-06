<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

    ?>
<div class="row dashboard-top">
    <div class="overlay">
        <div class="container">
            <div class="col-md-10" style="padding-top:32px">
                <div class="col-md-12">
                    <span>Volume in chart</span>
                    <span class="small-title"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/time_icon.svg" />- current month</span>
                </div>
                <div class="col-md-12">
                    <div class="graphs-container text-center">
                        <div class="graph-holder">
                            <div id="sales_chart" class="dashboard-graph">
                                <div class="ajax-btn-holder"><span class="btn-loading'"><span class="ajax-loading"><i class="fa fa-circle-notch fa-spin"></i> Loading chart...</span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 hidden" id="no-transaction-holder">
                    <div class="box no-content text-center">
                        <p>Your chart metrics will show here.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 no-right no-left">
                        <span>Volume figures (summary)</span>
                        <span class="small-title"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/time_icon.svg" />- current month</span>
                    </div>
                    <div class="block-container">
                        <div class="col-md-3 block">
                            <p class="top">Total Sales Volume</p>
                            <p class="center number"><?= $this->user['currency']['simbol'] ?><?= number_format($this_month_money_in, 2, '.', ' ') ?></p>
                            <p class="bottom">
                                <?php if($money_in_perc > 0): ?>
                                    <span class="icon-change up"></span>
                                <?php else: ?>
                                    <span class="icon-change flat"></span>
                                <?php endif; ?>
                                <span class="perc"><?= number_format($money_in_perc, 4, '.', ' ') ?>%</span> <br/>of <span><strong><?= $this->user['currency']['simbol'] ?></strong><?= number_format($last_month_money_in, 2, '.', ' ') ?></span> last month
                            </p>
                        </div>
                        <div class="col-md-3 block">
                            <p class="top">Avarage Sale Amount</p>
                            <p class="center number"><?= $this->user['currency']['simbol'] ?><?= number_format($ava_sale_this_month, 2, '.', ' ') ?></p>
                            <p class="bottom">
                                <?php if($ava_sale_perc > 0): ?>
                                    <span class="icon-change up"></span>
                                <?php else: ?>
                                    <span class="icon-change flat"></span>
                                <?php endif; ?>
                                <span class="perc"><?= number_format($ava_sale_perc, 4, '.', ' ') ?>%</span> <br/>of <span><strong><?= $this->user['currency']['simbol'] ?></strong><?= number_format($ava_sale_last_month, 2, '.', ' ') ?></span> last month
                            </p>
                        </div>
                        <div class="col-md-3 block">
                            <p class="top">Total Payout Volume</p>
                            <p class="center number"><?= $this->user['currency']['simbol'] ?><?= number_format($this_month_money_out, 2, '.', ' ') ?></p>
                            <p class="bottom">
                                <?php if($money_out_perc > 0): ?>
                                    <span class="icon-change up"></span>
                                <?php else: ?>
                                    <span class="icon-change flat"></span>
                                <?php endif; ?>
                                <span class="perc"><?= number_format($money_out_perc, 2, '.', ' ')  ?>%</span> <br/>of <span><strong><?= $this->user['currency']['simbol'] ?></strong><?= number_format($last_month_money_out, 2, '.', ' ') ?></span> last month
                            </p>
                        </div>
                        <div class="col-md-3 block button-holder pull-right">
                            <a class="btn btn-success" href="/balance/summary">View balance summary <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php if($most_used_methods): ?>
                        <div class="col-md-12 no-right no-left">
                            <span>Payment methods (top 3)</span>
                            <span class="small-title"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/time_icon.svg" />- current month</span>
                        </div>
                        <div class="block-container">
                            <?php foreach($most_used_methods as $method): ?>
                                <div class="col-md-3 block">
                                    <p class="top"><?= $method['name']?></p>
                                    <p class="center number"><?= $method['total_sales'] ?></p>
                                    <p class="bottom">
                                        <?php if((int)$method['sales_perc'] > 0): ?>
                                            <span class="icon-change up"></span>
                                        <?php else: ?>
                                            <span class="icon-change flat"></span>
                                        <?php endif; ?>
                                        <span class="perc"><?= number_format((int)$method['sales_perc'], 2, '.', ' ') ?>%</span> <br/>of <span><strong><?= $method['last_month_sales'] ?></strong></span> sale(s) last month
                                    </p>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-md-3 block button-holder pull-right">
                                <a class="btn btn-success" href="/method/summary">Analytics on methods <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-2 right-sidebar">
                <div class="text-center" style="padding-top: 30px">
                    <input type="text" id="diff_donut" readonly class="knob" data-thickness="0.2" data-angleOffset="-125" value="" data-width="120" data-height="120" data-bgColor="#82d2a6" style="background-color:transparent; border:1px solid #fff" data-fgColor="#444">
                </div>
                <div class="dashboard-sidebar-balances">
                    <p style="padding-top: 10px" class="tiny-text"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/time_icon.svg" />- last 30 days <span class="pull-right">In <strong><?= $this->user['currency']['code'] ?></strong></span></p>
                    <p class="money-in-graph-label tiny-text">Sales: <span id="total_money_in" class="pull-right"></span></p>
                    <p class="money-out-graph-label tiny-text">Payouts: <span id="total_money_out" class="pull-right"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?= $this->user['currency']['simbol'] ?>" id="user_default_currency_code" />
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/Flot/jquery.flot.categories.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/Flot/jquery.flot.time.js"></script>
<!-- jQuery Knob -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- Sparkline -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="assets/js/dashboard.js"></script>
<?php $CI->load->view('templates/footer'); ?>