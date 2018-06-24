<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    
    ?>
<section class="app-top border-top">
    <div class="app_content card lazyload">
        <div class="deposit-form">
            <form class="form" method="post" action="/deposit/pay">
                <div class="form-group">
                    <input type="text" id="deposit_amount" value="10" name="deposit_amount" class="form-control">
                    <input type="hidden" id="method" name="method" value="creditcard">
                    <span class="amount-label">Amount</span>
                </div>
                <div class="form-group">
                    <div class="dropdown-holder method-select">
                        <button class="dropdown-btn">
                            <img class="method-logo" src="assets/images/payment_methods/creditcard.svg" />
                            <p>
                                <span class="label">Deposit method</span>
                                <span class="method-name">Credit/Debit card</span>
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
                    <p class="text-center"><strong>Fees: <span id="selected-method-fees">10</span><span>%</span></strong></p>
                    <button id="deposit_continue_btn" class="submit btn-green">Continue - <?= $user->currency_simbol ?><span id="btn_deposit_amount" class="btn-amount">10.00</span></button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- <section class="transactions">
    <div class="webkit-box">
        <div class="col-md-12 no-left no-right">
            <h2 class="small-header">Recent transactions</h2>
        </div>
    </div>
    <div class="card no-left no-right">
        <table>
            <thead>
                <tr>
                    <th>Transaction Type</th>
                    <th>Date</th>
                    <th>Currency</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img class="icon" src="assets/images/icons/exchange.png" /> Exchange</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$1372.12</td>
                    <td class="fade-text">-</td>
                </tr>
                <tr>
                    <td><img class="icon" src="assets/images/icons/arrows-up-down.png" /> Received</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$300.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
                <tr>
                    <td><img class="icon" src="assets/images/icons/arrow-up.png" /> Deposit</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$100.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
                <tr>
                    <td><img class="icon" src="assets/images/icons/arrow-down.png" /> Withdraw</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$300.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
                <tr>
                    <td><img class="icon" src="assets/images/icons/arrows-up-down.png" /> Send</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">ZAR</td>
                    <td class="amount">R5,200.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
            </tbody>
        </table>
    </div>
</section> -->
<?php $CI->load->view('templates/footer'); ?>