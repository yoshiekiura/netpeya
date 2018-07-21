<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<section class="transactions app-top border-top">
    <div class="card lazyload app_content no-left no-right">
        <?php if(count($transactions) > 0): ?>
            <div class="side-search p-3">
                <form method="post" class="inline-form" action="/transactions">
                    <div class="form-group">
                        <div class="input-group-append input-group">
                            <button class="dropdown-btn">All Transactions</button>
                            <ul class="dropdown-content">
                                <li>All Transactions</li>
                                <li>Deposit</li>
                                <li>Withdraw</li>
                                <li>Send</li>
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" name="transaction_type" value="3">
                    <div class="form-group">
                        <input type="date" name="search_date_from" id="search_date_from" class="fomr-control"  format="yyyy-mm-dd" />
                    </div>
                        <label style="padding: 0 10px; margin: 0"><strong><i>to</i></strong></label>
                    <div class="form-group" style="margin: 0">
                        <input type="date" name="search_date_to" id="search_date_to" class="fomr-control"  format="yyyy-mm-dd" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-blue"><span>Search</span></button>
                    </div>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Transaction Type</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transactions as $trans): ?>
                        <tr>
                            <td><img class="icon" src="/assets/images/icons/<?= strtolower($trans->transaction_type) ?>.png" /><?= $trans->transaction_type ?></td>
                            <td class="fade-text"><?= $trans->date ?></td>
                            <td class="amount"><?= $user->currency_simbol . number_format($trans->amount, 2, '.', ',') ?></td>
                            <td class="fade-text"><?= $trans->status ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h4 class="text-center no-transactions">No transactions</h4>
        <?php endif; ?>
    </div>
    <?php if(count($transactions) > 0): ?>
        <p class="pt-3"><strong>Showing</strong> <?= $index + 1 ?> - <?= $index + $results_count ?> of <?= $total_results ?></p>
        <?php if (isset($links)): ?>
            <?= $links ?>
        <?php endif; ?>
    <?php endif; ?>
</section>
<?php $CI->load->view('templates/footer'); ?>
<script type="text/javascript">
    $(function() {
        var date = new Date();
        var today = new Date().toISOString().substring(0, 10);
        var last_30_days = new Date(date.setDate(date.getDate() - 30)).toISOString().substring(0, 10);

        $("#search_date_to").val(today);
        $("#search_date_from").val(last_30_days);
    })
</script>
            