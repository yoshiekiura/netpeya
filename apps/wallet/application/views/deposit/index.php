 <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
 <section class="border-top dashboard-top">
    <div class="webkit-box">
        <div class="col-md-4 no-left no-right request-send">
            <div class="webkit-box">
                <div class="col-md-6 no-left no-right">
                    <p class="small-header">Quick amounts</p>
                </div>
            </div>
            <div class="card grey-bg">
                <div class="quick-pick">
                    <p data-value="5000"><span class="select-currency-code">$</span>5000</p>
                    <p data-value="2500"><span class="select-currency-code">$</span>2500</p>
                    <p data-value="1000"><span class="select-currency-code">$</span>1000</p>
                    <p data-value="500"><span class="select-currency-code">$</span>500</p>
                    <p data-value="250"><span class="select-currency-code">$</span>250</p>
                    <p data-value="100"><span class="select-currency-code">$</span>100</p>
                    <p data-value="50"><span class="select-currency-code">$</span>50</p>
                    <p data-value="10" class="active"><span class="select-currency-code">$</span>10</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 no-left no-right">
            <div class="webkit-box">
                <div class="col-md-6 no-left">
                    <h2 class="small-header">Deposit</h2>
                </div>
                <div class="col-md-6 no-right">
                    <h2 class="small-header text-right"><strong>Total Balance: <span class="green-text pl-2">$42,615.83</span></strong></h2>
                </div>
            </div>
            <div class="card">
                <div class="deposit-form">
                    <div class="form">
                        <div class="form-group">
                            <input type="text" id="deposit_amount" value="10" name="" class="form-control">
                            <span class="amount-label">Amount</span>
                        </div>
                        <div class="form-group">
                            <div class="dropdown-holder method-select">
                                <button class="dropdown-btn">
                                    <img class="method-logo" src="assets/images/payment_methods/neteller.svg" />
                                    <p>
                                        <span class="label">Deposit method</span>
                                        <span class="deposit-method-name">Neteller - <span class="id">ati2&middot;&middot;&middot;&middot;@gmail.com</span></span>
                                    </p>
                                    <img class="icon" src="assets/images/icons/small-chevron-down.png" />
                                </button>
                                <ul class="dropdown-content">
                                    <li class="text-center add-new"><a href=""><img src="/assets/images/icons/add.png" /> Add new</a></li>
                                    <li><img class="method-logo" src="assets/images/payment_methods/neteller.svg" /> Neteller -  <span class="id">ati2&middot;&middot;&middot;&middot;@gmail.com</span></li>
                                    <li><img class="method-logo" src="assets/images/payment_methods/card.svg" /> Visa card -  <span class="id">4242&middot;&middot;&middot;&middot;444444</span></li>
                                    <li><img class="method-logo" src="assets/images/payment_methods/paypal.svg" /> Paypal -  <span class="id">ati2&middot;&middot;&middot;&middot;@gmail.com</span></li>
                                </ul>
                            </div>
                        </div>
                        <p>Fees: <span id="selected-method-fees">10</span><span>%</span></p>
                        <div class="webkit-box text-center">
                            <div class="col-md-6 no-left">
                                <div class="dropdown-holder currency-select pull-right">
                                    <button class="dropdown-btn">
                                        <img class="currency-logo" src="assets/svg/countries/usd.svg" />
                                        <p>
                                            <span class="label">Currency wallet</span>
                                            <span class="currency-name">USD</span>
                                        </p>
                                        <img class="icon" src="assets/images/icons/small-chevron-down.png" />
                                    </button>
                                    <ul class="dropdown-content">
                                        <li><img class="currency-logo" src="assets/svg/countries/usd.svg" /><span class="currency-name">USD - $</span></li>
                                        <li><img class="currency-logo" src="assets/svg/countries/zar.svg" /><span class="currency-name">ZAR - R</span></li>
                                        <li><img class="currency-logo" src="assets/svg/countries/gbp.svg" /><span class="currency-name">GBP - P</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 no-right">
                                <button id="deposit_continue_btn" class="submit pull-left">Continue - <span class="select-currency-code">$</span><span id="btn_deposit_amount" class="btn-amount">10.00</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="transactions">
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
</section>
<?php $CI->load->view('templates/footer'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            calculateTotalAmount();

            $('#deposit_amount').on('keyup', function() {
                var amount = $(this).val().trim();
                $('#btn_deposit_amount').text(amount);
                calculateTotalAmount();
            });

            $('.quick-pick p').on('click', function() {
                $('.quick-pick p').removeClass('active');
                $(this).addClass('active');

                var amount = $(this).data('value');
                $('#deposit_amount').val(amount);
                calculateTotalAmount();
            })

            $('.deposit-method').on('click', function() {
                var value = $(this).data('value');
                var src = $(this).data('src');
                var name = $(this).data('name');
                var fees = $(this).data('fees');
                $('#deposit_method').val(value);
                $('.custom-dropdown').removeClass('active');
                $('.u-unfold').addClass('u-unfold--hidden');

                $('.selected-method-fees').text(fees);

                $('#dropdownMethodsButtonInvoker img').attr('src', '/assets/img/payment_methods/' + src + '.svg');
                $('#dropdownMethodsButtonInvoker .method-name').text(name);
                calculateTotalAmount();
            })

            $('.deposit-currency').on('click', function() {
                var value = $(this).data('value');
                var src = $(this).data('src');
                var name = $(this).data('name');
                var simbol = $(this).data('simbol');
                $('#deposit_currency').val(value);
                $('.custom-dropdown').removeClass('active');
                $('.u-unfold').addClass('u-unfold--hidden');

                $('.selected-currency-simbol').text(simbol);

                $('#dropdownCurrencesButtonInvoker img').attr('src', '/assets/svg/countries/' + src + '.svg');
                $('#dropdownCurrencesButtonInvoker .method-name').text(name);
            })
        })

        function calculateTotalAmount() {
            var fees = parseFloat($('#selected-method-fees').text());
            var amount = $('#deposit_amount').val().trim();

            if(amount == '' || amount == '0') {
                amount = 0;
                $('#deposit_continue_btn').attr('disabled', 'disabled');
            } else {
                $('#deposit_continue_btn').removeAttr('disabled');
            }

            amount = parseFloat(amount);

            var total_fees = (fees / 100) * amount;

            var total_amount = parseFloat(total_fees + amount).toFixed(2);

            console.log(fees);

            $('#btn_deposit_amount').text(myFormatNumber(total_amount));
        }
    })
</script>