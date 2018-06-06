<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>XanniaPay</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/x-icon" href="<?= $this->config->item('base_url') ?>assets/images/xannia_icon.png">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/Ionicons/css/ionicons.min.css">
        <link href="<?= $this->config->item('shared_resources_source') ?>bower_components/fuelux/css/fuelux.min.css" rel="stylesheet">
        <link href="<?= $this->config->item('shared_resources_source') ?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">

        <link href="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <!-- Pace style -->
        <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/plugins/pace/pace.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/global.css">
        <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/skins/blue.css">
        <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/mobile.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- jQuery 3 -->
        <script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= $this->config->item('shared_resources_source') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script defer src="<?= $this->config->item('shared_resources_source') ?>bower_components/font-awesome/svg-with-js/js/fontawesome-all.min.js"></script>
    </head>
    <body class="loading skin-blue sidebar-mini fixed <?= $title ?>">
        <div class="wrapper">
        <header class="main-header">
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle hidden-md hidden-lg hidden-xl" data-toggle="push-menu" role="button">
                <img src="<?= $this->config->item('base_url') ?>assets/images/icons/bars.svg">
                <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="side-logo hidden-lg hidden-md">
                    <img src="/assets/images/xannia_white_logo.png" />
                </div>
                <ul class="nav navbar-nav header-wallet-balance-holder hidden-sm hidden-xs">
                    <?php $count = 1; foreach($this->user['user_wallets'] as $wallet): ?>
                        <?php if($count <= 3): ?>
                            <li class="header-wallet-balance">
                                    <span class="wallet-currency-balance">
                                        <sup><?= $wallet['wallet_currency_code'] ?></sup>
                                        <span class="" id="wallet_balance_<?= $wallet['wallet_id'] ?>"><?= number_format($wallet['wallet_balance'], 2, '.', ' ') ?></span>
                                    </span>
                            </li>
                        <?php $count++; endif; ?>
                    <?php endforeach; ?>
                    <?php if(count($this->user['user_wallets']) < $this->config->item('max_wallets', 'xannia') && count($this->user['unused_wallets']) > 0): ?>
                        <li data-toggle="tooltip" data-container="body" data-placement="left" title="Add wallet"><a href="#" class="show_add_menu" data-toggle="modal" data-target="#addWalletModal">
                            <img src="/assets/images/icons/black_plus_icon.svg" /></a>
                        </li>
                    <?php endif; ?>
                    <li><a href="/wallets" class="black-text text-upper" data-toggle="tooltip" data-container="body" data-placement="left" title="View all wallets">View all...</a></li>
                </ul>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <span class="hidden-sm hidden-xs">
                            <span class="xannia-account-number">
                                        <?= $this->user['xannia_number'] ?>
                                        <span class="account-user-name">
                                            <?php if($this->user['first_name'] != null): ?>
                                                <?= $this->user['first_name'] ?>&nbsp;<?= $this->user['last_name'] ?></span>
                                            <?php else: ?>
                                                <?= $this->user['email_address'] ?>
                                            <?php endif; ?>
                                        </span>
                                    </span>
                            </span>
                        </li>
                        <li><a href="/settings" data-toggle="tooltip" data-container="body" data-placement="left" title="Settings"><img src="/assets/images/icons/black_settings_icon.svg" /></a></li>
                        <li><a href="#" data-toggle="tooltip" data-container="body" data-placement="left" title="Help"><img src="/assets/images/icons/black_help_icon.svg" /></a></li>
                        <li ><a href="/logout" data-toggle="tooltip" data-container="body" data-placement="left" title="Sign out"><img src="/assets/images/icons/black_sign_out_icon.svg" /></a></li>

                    </ul>
                </div>
            </nav>
        </header>
        <?php $CI->load->view('templates/side_menu'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div id="notification">
                <button class="close"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="message-text"></p>
            </div>