<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Main content -->
<section class="content report">
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-xs-12">
                <section class="content-header">
                    <h1>Payment methods summary
                        <span id="list_actions" class="pull-right">
                            <button class="btn btn-success">Download</button>
                            <button class="btn btn-default">Send to email</button>
                            <button class="btn btn-default">Print</button>
                        </span>
                        <span class="line"></span>
                    </h1>
                </section>
                <?php if(count($summary_entries) > 0):?>
                    <?php if (isset($links)): ?>
                        <?= $links ?>
                    <?php endif; ?>
                    <?php foreach($summary_entries as $entry): ?>
                        <div class="col-md-12 no-left no-right">
                            <div class="col-md-12 no-right no-left">
                                <span class="small-title"><?= $entry['method'] ?></span>
                            </div>
                            <div class="block-container">
                                <div class="col-md-3 block">
                                    <p class="top">Usage</p>
                                    <p class="center number"><?= $entry['sales_count'] ?></p>
                                    <p class="bottom"><?= date('d M Y', strtotime($search_criteria['search_date_range_from'])) ?> - <?= date('d M Y', strtotime($search_criteria['search_date_range_to'])) ?></p>
                                </div>
                                <div class="col-md-3 block">
                                    <p class="top">Gross Income</p>
                                    <p class="center number"><?= $this->user['currency']['simbol'] . number_format($entry['gross_income'], 2, '.', ' ') ?></p>
                                    <p class="bottom"><?= date('d M Y', strtotime($search_criteria['search_date_range_from'])) ?> - <?= date('d M Y', strtotime($search_criteria['search_date_range_to'])) ?></p>
                                </div>
                                <div class="col-md-3 block">
                                    <p class="top">Charges</p>
                                    <p class="center number"><?= $this->user['currency']['simbol'] . number_format($entry['total_charges'], 2, '.' , ' ') ?></p>
                                    <p class="bottom"><?= date('d M Y', strtotime($search_criteria['search_date_range_from'])) ?> - <?= date('d M Y', strtotime($search_criteria['search_date_range_to'])) ?></p>
                                </div>
                                <div class="col-md-3 block">
                                    <p class="top">Net Income</p>
                                    <p class="center number"><?= $this->user['currency']['simbol'] . number_format($entry['net_income'], 2, '.', ' ') ?></p>
                                    <p class="bottom"><?= date('d M Y', strtotime($search_criteria['search_date_range_from'])) ?> - <?= date('d M Y', strtotime($search_criteria['search_date_range_to'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if (isset($links)): ?>
                        <?= $links ?>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="col-md-12 no-left no-right" id="no-transaction-holder">
                        <div class="box no-content text-center">
                            <p>No records found.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-2 right-sidebar search">
                <h3 class="form-title">Search filters</h3>
                <form class="side-filter-form" action="/method/summary" method="post">
                    <div class="col-md-12 active-search-holder">
                        <p><strong>Date range</strong></p>
                        <ul class="search_active_filters">
                             <li>
                                <input type="radio" id="search_date_today" name="search_date_today" value="today" class="search_date search_criteria_value" <?= array_key_exists('search_date_today', $filters) ? 'checked' : '' ?>>
                                <label for="search_date_today" class="search_criteria">Today</label>
                            </li>
                            <li>
                                <input type="radio" id="search_date_30_days" name="search_date_30_days" value="last_30_days" class="search_date search_criteria_value" <?= array_key_exists('search_date_30_days', $filters) ? 'checked' : '' ?>>
                                <label for="search_date_30_days" class="search_criteria">Last 30 days</label>
                            </li>
                            <li>
                                <input type="radio" id="search_date_last_month" name="search_date_last_month" value="last_month" class="search_date search_criteria_value" <?= array_key_exists('search_date_last_month', $filters) ? 'checked' : '' ?>>
                                <label for="search_date_last_month" class="search_criteria">Last month</label>
                            </li>
                            <li>
                                <input type="radio" id="search_date_this_month" name="search_date_this_month" value="this_month" class="search_date search_criteria_value" <?= array_key_exists('search_date_this_month', $filters) ? 'checked' : '' ?>>
                                <label for="search_date_this_month" class="search_criteria">This month</label>
                            </li>
                            <li>
                                <input type="radio" id="search_date_this_year" name="search_date_this_year" value="this_year" class="search_date search_criteria_value" <?= array_key_exists('search_date_this_year', $filters) ? 'checked' : '' ?>>
                                <label for="search_date_this_year" class="search_criteria">This year</label>
                            </li>
                        </ul>
                        <span><i>-from-</i></span>
                        <input type="date" name="search_date_range_from" id="search_date_from" value="<?= str_replace('/', '-', $search_criteria['search_date_range_from']) ?>" class="form-control" />
                        <span><i>-to-</i></span>
                        <input type="date" name="search_date_range_to" id="search_date_to" value="<?= str_replace('/', '-', $search_criteria['search_date_range_to']) ?>" class="form-control" />
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
</script>