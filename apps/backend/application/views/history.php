<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<!-- DataTables -->
<link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-sm-12 col-xs-12 border-right">
                <section class="content-header">
                    <h1>Account history<span class="line"></span></h1>
                </section>
                <form class="form-inline">
                    <select id="filter_transaction_type" class="select2">
                        <option value="0">All Transactions</option>
                        <option value="<?= transaction_model::MONEY_IN ?>">Money In</option>
                        <option value="<?= transaction_model::MONEY_OUT ?>">Money Out</option>
                    </select>
                    <select id="filter_wallet_id" class="select2">
                        <option value="0">All Wallet</option>
                        <?php foreach($this->user['user_wallets'] as $wallet): ?>
                        <option value="<?=$wallet['wallet_id'] ?>"><?= $wallet['wallet_currency_code'] ?> - <?= $wallet['wallet_currency_name'] ?>
                            <i class="fa fa-arrow-left"></i>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <select id="filter_status" class="select2 status-select">
                        <option value="0">All Status</option>
                        <option value="<?= transaction_model::APPROVED ?>">Approved</option>
                        <option value="<?= transaction_model::DECLINED ?>">Declined</option>
                        <option value="<?= transaction_model::PENDING ?>">Pending</option>
                    </select>
                    <button id="filter_date_range" type="button" class="btn btn-default pull-right daterange-btn">
                    <span>
                    <?= date('Y/m/d', strtotime('-29 days')) . ' - ' . date('Y/m/d'); ?>
                    </span>
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <button id="history_filter_btn" class="btn btn-success">Apply</button>
                </form>
                <table data-order='[[ 0, "desc" ]]' id="transaction_history" class="table display table-bordered table-striped table-responsive"></table>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12 dashboard-bottom">
                <section class="content-header">
                    <h1>Help center <span class="line"></span></h1>
                </section>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<?php $CI->load->view('templates/footer'); ?>
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        getTransactions();
        if($('#history_filter_btn').length > 0) {
            $('#history_filter_btn').on('click', function(e) {
                e.preventDefault();
                getTransactions();
            })
        }

        function getTransactions() {
            var dataSet = [];
            var transaction_type = $('#filter_transaction_type').val().trim(),
            wallet_id = $('#filter_wallet_id').val().trim(),
            status = $('#filter_status').val().trim(),
            date_range = $('#filter_date_range').text().trim();

            $(this).html('<i class="fa fa-circle-notch fa-spin"></i>');

            $.ajax({
                url: '/api/get_transactions',
                type: 'POST',
                dataType: 'json',
                data: {
                    'transaction_type': transaction_type,
                    'wallet_id': wallet_id,
                    'status': status,
                    'date_range': date_range
                },
                success: function (data, textStatus, xhr) {

                    if (data.data.success && data['errors'].length == 0) {
                        $.each(data.data.transactions, function(i, v) {
                            var td_open_tag = '<div class="money_in">';
                            if(v.transaction_type_id == 2) {
                                td_open_tag = '<div class="money_out">';
                            }
                            var inv = "" + v.transaction_id;
                            var pad = "00000000";
                            dataSet.push([
                                td_open_tag + '<a class="black-text" style="text-decoration:underline" href=""> #' + (pad.substring(0, pad.length - inv.length) + inv) + '</a></div>',
                                td_open_tag + v.formated_date + '</div>',
                                td_open_tag + v.description + '</div>',
                                td_open_tag + v.payment_status + '</div>',
                                td_open_tag + v.currency_code + ' ' + myFormatNumber(v.amount.toFixed(2)) + '</div>'
                            ]);
                        });


                        if ( $.fn.dataTable.isDataTable( '#transaction_history' ) ) {
                            $('#transaction_history').DataTable().destroy();
                        }

                        $('#transaction_history').DataTable({
                            "data": dataSet,
                            "columns": [
                                { "title": "Invoice" },
                                { "title": "Date" },
                                { "title": "Description" },
                                { "title": "Status" },
                                { "title": "Amount" }
                            ]
                        });
                    } else {
                        $(this).html('Delete card <i class="fa fa-trash"></i>');
                        NOTIFY.show('Something is wrong, please try again later.', 'error');
                    }
                }
            })
        }
    });

</script>