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
            <div class="col-md-12">
                <section class="content-header">
                    <h1>Sales Report - advanced search <span class="line"></span></h1>
                </section>
                <form id="advanced_search_form" action="/sales/report" method="post">
                    <div class="col-md-3 no-left">
                        <h3 class="form-title black-text">Sale Status</h3>
                        <div class="form-group">
                            <input type="checkbox" id="search_status_all" value="0" class="search_status search_criteria_value" checked="checked">
                            <label for="search_status_all" class="search_criteria">All</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="search_status[]" id="search_status_pending" value="1" class="search_status search_criteria_value" checked="checked">
                            <label for="search_status_pending" class="search_criteria">Pending</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="search_status[]" id="search_status_approved" value="2" class="search_status search_criteria_value" checked="checked">
                            <label for="search_status_approved" class="search_criteria">Approved</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="search_status[]" id="search_status_declined" value="3" class="search_status search_criteria_value" checked="checked">
                            <label for="search_status_declined" class="search_criteria">Declined</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="search_status[]" id="search_status_refunded" value="4" class="search_status search_criteria_value" checked="checked">
                            <label for="search_status_refunded" class="search_criteria">Refunded</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 class="form-title black-text">Payment Method</h3>
                        <div class="form-group">
                            <input type="checkbox" id="search_payment_method_all" value="0" class="search_payment_method search_criteria_value" checked="checked">
                            <label for="search_payment_method_all" class="search_criteria">All</label>
                        </div>
                        <?php foreach($payment_methods as $method): ?>
                        <div class="form-group">
                            <input type="checkbox" name="search_payment_method[]" id="search_payment_method_<?= $method['slag'] ?>" value="<?= $method['id'] ?>" class="search_payment_method search_criteria_value" checked="checked">
                            <label for="search_payment_method_<?= $method['slag'] ?>" class="search_criteria"><?= $method['name'] ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-3">
                        <h3 class="form-title black-text">Sale details</h3>
                        <div class="col-md-6 no-left">
                            <div class="form-group">
                                <label for="search_amount_from" class="search_criteria">Order Ref</label>
                                <input type="text" name="search_order_ref" id="search_order_ref" placeholder="Order refrence" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12 no-left">
                            <label for="search_amount_from" class="search_criteria">Amount</label>
                        </div>
                        <div class="col-md-6 no-left">
                            <div class="form-group">
                                <label for="search_amount_from" class="search_criteria">From</label>
                                <input type="text" name="search_amount_from" id="search_amount_from" placeholder="<?= $this->user['currency']['simbol']?> 0.00" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="search_amount_from" class="search_criteria">To</label>
                                <input type="text" name="search_amount_to" id="search_amount_from" placeholder="<?= $this->user['currency']['simbol']?> 0.00" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 class="form-title black-text">Sale date</h3>
                        <div class="form-group">
                            <input type="radio" id="search_date_today" value="today" class="search_date search_criteria_value">
                            <label for="search_date_today" class="search_criteria">Today</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="search_date_30_days" value="last_30_days" class="search_date search_criteria_value" checked="checked">
                            <label for="search_date_30_days" class="search_criteria">Last 30 days</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="search_date_last_month" value="last_month" class="search_date search_criteria_value">
                            <label for="search_date_last_month" class="search_criteria">Last month</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="search_date_this_month" value="this_month" class="search_date search_criteria_value">
                            <label for="search_date_this_month" class="search_criteria">This month</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="search_date_this_year" value="this_year" class="search_date search_criteria_value">
                            <label for="search_date_this_year" class="search_criteria">This year</label>
                        </div>
                        <div class="col-md-12 no-left">
                            <label for="" class="search_criteria">Date range</label>
                        </div>
                        <div class="col-md-6 no-left">
                            <div class="form-group">
                                <label for="search_date_from" class="search_criteria">From</label>
                                <input type="date" name="search_date_range_from" id="search_date_from" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="search_date_to" class="search_criteria">To</label>
                                <input type="date" name="search_date_range_to" id="search_date_to" format="yyyy-mm-dd" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 no-right">
                        <div class="form-group top-30 text-center">
                            <button id="advanced_search_btn" class="btn btn-success">Search Sales <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<?php $CI->load->view('templates/footer'); ?>
<script type="text/javascript">
    $(function() {
        var date = new Date();
        var today = new Date().toISOString().substring(0, 10);
        var last_30_days = new Date(date.setDate(date.getDate() - 30)).toISOString().substring(0, 10);
        var this_month = new Date(new Date().setDate(1)).toISOString().substring(0, 10);
        var begining_of_year = new Date(date.setMonth(0));
        begining_of_year = new Date(begining_of_year.setDate(1)).toISOString().substring(0, 10);
        var last_month_first_day = new Date(new Date().getFullYear() - (new Date().getMonth() > 0 ? 0 : 1), (new Date().getMonth() - 1 + 12) % 12, 2).toISOString().substring(0, 10);
        var last_month_last_day = new Date(new Date().getFullYear(), new Date().getMonth(), 0).toISOString().substring(0, 10);

        $("#search_date_to").val(today);
        $("#search_date_from").val(last_30_days);

        $('#search_date_today').on('change', function() {
            if($(this).prop("checked", true)) {
                $('.search_date').prop('checked', false);
                $(this).prop("checked", true);
                $("#search_date_to").val(today);
                $("#search_date_from").val(today);
            }
        });
        
        $('#search_date_30_days').on('change', function() {
            if($(this).prop("checked", true)) {
                $('.search_date').prop('checked', false);
                $(this).prop("checked", true);
                $("#search_date_to").val(today);
                $("#search_date_from").val(last_30_days);
            }
        });

        $('#search_date_last_month').on('change', function() {
            if($(this).prop("checked", true)) {
                $('.search_date').prop('checked', false);
                $(this).prop("checked", true);
                $("#search_date_to").val(last_month_last_day);
                $("#search_date_from").val(last_month_first_day);
            }
        });

        $('#search_date_this_month').on('change', function() {
            if($(this).prop("checked", true)) {
                $('.search_date').prop('checked', false);
                $(this).prop("checked", true);
                $("#search_date_to").val(today);
                $("#search_date_from").val(this_month);
            }
        });

        $('#search_date_this_year').on('change', function() {
            if($(this).prop("checked", true)) {
                $('.search_date').prop('checked', false);
                $(this).prop("checked", true);
                $("#search_date_to").val(today);
                $("#search_date_from").val(begining_of_year);
            }
        });

        $('.search_status').on('change', function() {
            if($(this).val() == '0') {
                $('.search_status').prop("checked", true);
            } else if($(this).val() != '0') {
                $('#search_status_all').prop("checked", false);
            }
        });

        $('.search_payment_method').on('change', function() {
            if($(this).val() == '0') {
                $('.search_payment_method').prop("checked", true);
            } else if($(this).val() != '0') {
                $('#search_payment_method_all').prop("checked", false);
            }
        });
    })
</script>