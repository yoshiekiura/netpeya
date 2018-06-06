<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<section class="border-top dashboard-top">
    <div class="webkit-box">
        <div class="col-md-4 no-left request-send">
            <div class="webkit-box">
                <div class="col-md-6 no-left no-right">
                    <a class="small-header nav-link active text-center">Send</a>
                </div>
                <div class="col-md-6 no-left no-right">
                    <a class="small-header nav-link text-center">Request</a>
                </div>
            </div>
            <div class="tab-content card">
                <div id="sendTab" class="tab-pane active">
                    <div class="send-form-toggle">
                        <a class="btn active" href="">To e-mail</a>
                        <a class="btn" href="">To cell</a>
                    </div>
                    <form>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="send_amount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Recipient</label>
                            <input type="text" name="send_email" class="form-control" placeholder="E-mail" />
                        </div>
                        <div class="form-group">
                            <p class="pt-3">
                                <span class="pull-left">Total</span>
                                <strong class="pull-right">$240.00</strong>
                            </p>
                        </div>
                        <div class="form-group pt-6">
                            <button id="send_to_email_btn" class="btn">Send $240.00</button>
                        </div>
                    </form>
                </div>
                <div id="requestTab" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 no-right balances ">
            <div class="webkit-box">
                <div class="col-md-6 no-left">
                    <h2 class="small-header">Your Currences</h2>
                </div>
                <div class="col-md-6 no-right">
                    <h2 class="small-header text-right"><strong>Total Balance: <span class="green-text pl-2">$42,615.83</span></strong></h2>
                </div>
            </div>
            <div class="card">
                <a class="add-currency"><img class="icon mr-4" src="/assets/images/icons/add.png" /></a>
                <div class="dashboard-currency-slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6000">
                        <div class="carousel-inner text-center">
                            <div class="carousel-item active">
                                <div class="currency-holder">
                                	<div class="flag-outer-circle low-balance">
                                    	<div class="currency-flag" style="background-image: url('/assets/svg/countries/usd.svg');">
                                    		
                                    	</div>
                                        <div class="currency-name">
                                        	<span class="thin-text">USD</span><br/>
                                        	<span>US Dollar</span>
                                        </div>
                                        <div class="currency-balance">
                                        	<span>$ 10.20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="currency-holder">
                                	<div class="flag-outer-circle">
                                    	<div class="currency-flag" style="background-image: url('/assets/svg/countries/gbp.svg');"></div>
                                        <div class="currency-name">
                                        	<span class="thin-text">GBP</span><br/>
                                        	<span>British Pound</span>
                                        </div>
                                        <div class="currency-balance">
                                        	<span>$ 563, 251.20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="currency-holder">
                                	<div class="flag-outer-circle">
                                    	<div class="currency-flag" style="background-image: url('/assets/svg/countries/zar.svg');">
                                    		
                                    	</div>
                                        <div class="currency-name">
                                        	<span class="thin-text">ZAR</span><br/>
                                        	<span>South African Rand</span>
                                        </div>
                                        <div class="currency-balance">
                                        	<span>R 563, 251.20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev text-left" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        	<img class="icon" src="/assets/images/icons/chevron-left.png" />
                        </a>
                        <a class="carousel-control-next text-right" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <img class="icon ml-2" src="/assets/images/icons/chevron-right.png" />
                        </a>
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
                    <td><img class="icon" src="/assets/images/icons/exchange.png" /> Exchange</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$1372.12</td>
                    <td class="fade-text">-</td>
                </tr>
                <tr>
                    <td><img class="icon" src="/assets/images/icons/arrows-up-down.png" /> Received</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$300.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
                <tr>
                    <td><img class="icon" src="/assets/images/icons/arrow-up.png" /> Deposit</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$100.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
                <tr>
                    <td><img class="icon" src="/assets/images/icons/arrow-down.png" /> Withdraw</td>
                    <td class="fade-text">Jan 28, 2018</td>
                    <td class="fade-text">USD</td>
                    <td class="amount">$300.00</td>
                    <td class="fade-text">Approved</td>
                </tr>
                <tr>
                    <td><img class="icon" src="/assets/images/icons/arrows-up-down.png" /> Send</td>
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
            