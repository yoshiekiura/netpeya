<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-xs-12">
                <section class="content-header">
                    <h1>Payouts report
                        <span id="list_actions" class="pull-right">
                            <span class="pagination-result-counter">Found: <strong><?= $total_results ?></strong> payout(s)</span>
                            <button class="btn btn-success">Download</button>
                            <button class="btn btn-default">Send to email</button>
                            <button class="btn btn-default">Print</button>
                        </span>
                        <span class="line"></span>
                    </h1>
                </section>
                <?php if(count($payouts) > 0): ?>
                    <?php if (isset($links)): ?>
                        <?= $links ?>
                    <?php endif; ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order Reference</th>
                                <th>Transaction Date</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Before charges (<strong><?= $this->user['currency']['code'] ?></strong>)</th>
                                <th>Charges (<strong><?= $this->user['currency']['code'] ?></strong>)</th>
                                <th>After charges (<strong><?= $this->user['currency']['code'] ?></strong>)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($payouts as $payout): ?>
                            <tr style="cursor: pointer;" onclick="showOrderDetails('<?= $payout['order_reference'] ?>')" id="<?= $payout['order_reference'] ?>_holder" class="payout-entry">
                                <td><a><?= $payout['order_reference'] ?></a></td>
                                <td><?= date('d M Y H:i:s', strtotime($payout['payout_date'])) ?></td>
                                <td id="payout_status_<?= $payout['id'] ?>" class="<?= $payout['payout_status'] == 'Approved' ? 'green-text' : 'red-text' ?>"><?= $payout['payout_status'] ?></td>
                                <td><?= $payout['payment_method_name'] ?></td>
                                <td id="payout_amount_<?= $payout['id'] ?>" class="<?= $payout['payout_status'] == 'Approved' ? '' : 'red-text' ?>"><?= number_format($payout['amount_before_charges'], 2, '.', ' ') ?></td>
                                <td id="payout_amount_<?= $payout['id'] ?>" class="<?= $payout['payout_status'] == 'Approved' ? '' : 'red-text' ?>"><?= number_format($payout['total_charges'], 2, '.', ' ') ?></td>
                                <td id="payout_amount_<?= $payout['id'] ?>" class="<?= $payout['payout_status'] == 'Approved' ? '' : 'red-text' ?>"><?= number_format($payout['amount_after_charges'], 2, '.', ' ') ?></td>
                            </tr>
                            <tr id="<?= $payout['order_reference'] ?>" class="order-details">
                                <td colspan="7">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="green-text close-report-details"><i class="fa fa-list-ul"></i> Back to list</span>
                                            <div class="pull-right">
                                                <!-- <?php if($payout['payout_status'] == 'Approved' && $payout['method_can_refund'] && !$payout['is_refunded']): ?>
                                                    <div class="ajax-btn-holder">
                                                        <button id="refund_btn_<?= $payout['id']?>" data-id="<?= $payout['id']?>" class="btn btn-danger refund-btn">Refund</button>
                                                    </div>
                                                <?php endif; ?> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6 payment-method-details border-right">
                                            <h3 class="form-title black-text">Payment Method Details</h3>
                                            <?php if($payout['card_type']): ?>
                                                <img src="<?= $this->config->item('shared_resources_source') ?>images/payment_methods/<?= strtolower($payout['card_type']) ?>.svg" />
                                            <?php else: ?>
                                                <img src="<?= $this->config->item('shared_resources_source') ?>images/payment_methods/<?= $payout['payment_method_slag'] ?>.svg" />
                                            <?php endif; ?>
                                            <div class="group">
                                                Payment method: <strong><?= $payout['payment_method_name'] ?></strong>
                                            </div>
                                            <div class="group">
                                                Fee: <strong><?= $payout['external_fee'] + $payout['internal_fee'] ?>%</strong>
                                            </div>
                                            <?php if($payout['card_type']): ?>
                                                <div class="group">
                                                    Processor response: <strong><?= $payout['processor_response'] ?></strong>
                                                </div>
                                                <div class="group">
                                                    Cardholder name: <strong><?= $payout['cardholder_name'] ?></strong>
                                                </div>
                                                <div class="group">
                                                    Card bin: <strong><?= $payout['card_bin'] ?>****</strong>
                                                </div>
                                                <div class="group">
                                                    Card last4: <strong>****<?= $payout['card_last_4'] ?></strong>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="form-title black-text">Payout Details</h3>
                                            <div class="group top-30">
                                                Date: <strong><?= $payout['payout_date'] ?></strong>
                                            </div>
                                            <div class="group">
                                                Order Ref: <strong><?= $payout['order_reference'] ?></strong>
                                            </div>
                                            <div class="group">
                                                Status: <strong id="payout_details_status_<?= $payout['id']?>" class="<?= $payout['payout_status'] == 'Approved' ? 'green-text' : 'red-text' ?>"><?= $payout['payout_status'] ?></strong>
                                            </div>
                                            <div class="group">
                                                Amount before charges: <strong><?= $this->user['currency']['code'] . ' ' . number_format($payout['amount_before_charges'], 2, '.', ' ') ?></strong>
                                            </div>
                                            <div class="group">
                                                Total charges: <strong><?= $this->user['currency']['code'] . ' ' . number_format($payout['total_charges'], 2, '.', ' ') ?></strong>
                                            </div>
                                            <div class="group">
                                                Amount after charges: <strong><?= $this->user['currency']['code'] . ' ' . number_format($payout['amount_after_charges'], 2, '.', ' ') ?></strong>
                                            </div>
                                            <?php if($payout['description']): ?>
                                                <div class="group">
                                                    <strong>Description:</strong> <?= $payout['description'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (isset($links)): ?>
                        <?= $links ?>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="col-md-12 no-right" id="no-transaction-holder">
                        <div class="box no-content text-center">
                            <p>No sales found.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-2 right-sidebar search">
                <h3 class="form-title">Search filters</h3>

                <form class="side-filter-form" action="/payouts/report" method="post">
                    <div class="col-md-12 active-search-holder">
                        <p><strong>Payment methods</strong></p>
                        <ul class="search_active_filters">
                            <?php foreach($methods as $method): ?>
                                    <li>
                                        <input type="checkbox" name="search_payment_method[]" id="search_payment_method_<?= strtolower($method['name']) ?>" value="<?= $method['id'] ?>" class="search_status search_criteria_value" <?= array_key_exists($method['name'], $search_criteria['search_payment_methods']) ? 'checked' : '' ?>>
                                        <label for="search_payment_method_<?= strtolower($method['name']) ?>" class="search_criteria"><?= $method['name'] ?></label>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                        <p><strong>Sale status</strong></p>
                        <ul class="search_active_filters status">
                            <?php foreach($statuses as $status): ?>
                                    <?php if($status['id'] == Transaction_model::REFUNDED) continue; ?>
                                    <li>
                                        <input type="checkbox" name="search_status[]" id="search_status_<?= strtolower($status['name']) ?>" value="<?= $status['id'] ?>" class="search_status search_criteria_value" <?= array_key_exists($status['name'], $search_criteria['search_status']) ? 'checked' : '' ?>>
                                        <label for="search_status_<?= strtolower($status['name']) ?>" class="search_criteria"><?= $status['name'] ?></label>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                        <div id="hidden_filters">
                            <p><strong>Order reference</strong></p>
                            <div class="form-group">
                                <input type="text" name="search_order_ref" id="search_order_ref" value="<?= $search_criteria['search_order_ref'] ?>" placeholder="Order refrence" class="form-control" />
                            </div>
                            <p><strong>Amount range</strong></p>
                            <div class="form-group">
                                <input type="text" name="search_amount_from" id="search_amount_from" placeholder="<?= $this->user['currency']['simbol']?> 0.00" value="<?= $search_criteria['search_amount_from'] ?>" class="form-control" />
                                <span><i>-to-</i></span>
                                <input type="text" name="search_amount_to" value="<?= $search_criteria['search_amount_to'] ?>" id="search_amount_from" placeholder="<?= $this->user['currency']['simbol']?> 0.00" class="form-control" />
                            </div>
                            <p><strong>Date range</strong></p>
                            <div class="form-group">
                                <input type="date" name="search_date_range_from" id="search_date_from" value="<?= str_replace('/', '-', $search_criteria['search_date_range_from']) ?>" class="form-control" />
                                <span><i>-to-</i></span>
                                <input type="date" name="search_date_range_to" id="search_date_to" value="<?= str_replace('/', '-', $search_criteria['search_date_range_to']) ?>" class="form-control" />
                            </div>
                        </div>
                        <p class="btn-more-filters">More filters <img src="/assets/images/icons/chevron_down.svg"></p>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success full-width top-30">Appy filters</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<?php $CI->load->view('templates/footer'); ?>
<script type="text/javascript">
    function showOrderDetails(id) {
        if($('.close-report-details').is(":visible")) {
            $('.close-report-details').click();
        } else {
            $('thead, .payout-entry, .order-details, #list_actions, .pagination').hide();
            $('#' + id + ', #' + id + '_holder, .close-report-details').show();
        }
    }

    $('.btn-more-filters').on('click', function() {
        if($('#hidden_filters').is(":visible")) {
            $(this).html('Show more filters <img src="/assets/images/icons/chevron_down.svg">');
            $('body').scrollTo('.form-title', 1000);
        } else {
            $(this).html('Show less filters <img src="/assets/images/icons/chevron_up.svg">');
            $('body').scrollTo('.btn-more-filters', 1000);
        }

        $('#hidden_filters').animate({
            height: "toggle"
        });
    })

    $('.close-report-details').on('click', function() {
        $('thead, .payout-entry, #list_actions, .pagination').show();
        $('.order-details, .close-report-details').hide();
    })
</script>