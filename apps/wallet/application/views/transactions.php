<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<section class="transactions">
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
    <div class="pagination">
        <div class="pull-right">
            <button class="prev-btn">Prev</button>
            <button class="next-btn">Next <img src="assets/images/icons/small-chevron-right.png"></button>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>
            