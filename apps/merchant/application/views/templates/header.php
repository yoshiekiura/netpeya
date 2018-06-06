<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>XanniaPay | <?= $title ? ucwords($title) : '' ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/x-icon" href="/assets/images/xannia_icon.ico">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>bower_components/Ionicons/css/ionicons.min.css">
        <link href="<?= $this->config->item('shared_resources_source') ?>bower_components/fuelux/css/fuelux.min.css" rel="stylesheet">
        <link href="<?= $this->config->item('shared_resources_source') ?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <!-- Pace style -->
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>plugins/pace/pace.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?= $this->config->item('shared_resources_source') ?>plugins/iCheck/all.css">
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
    <body class="loading skin-blue sidebar-mini fixed">
        <div class="wrapper">
        <header class="main-header">
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle hidden-md hidden-lg hidden-xl" data-toggle="push-menu" role="button">
                <img src="<?= $this->config->item('shared_resources_source') ?>images/icons/bars.svg">
                <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="side-logo hidden-lg hidden-md">
                    <img src="<?= $this->config->item('shared_resources_source') ?>images/xannia_white_logo.png" />
                </div>
                <ul class="nav navbar-nav header-left hidden-sm hidden-xs">
                    <li><?= $this->user['business_name'] ?></li>
                    <li>
                        <div class="onoffswitch">
                            <input type="checkbox" class="onoffswitch-checkbox" id="user_environment_session_switch" <?= $this->user_session['environment_id'] == MY_Controller::PRODUCTION ? 'checked':''?>>
                            <label class="onoffswitch-label" for="user_environment_session_switch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </li>
                </ul>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <span class="hidden-sm hidden-xs">
                            <span class="xannia-account-number">
                            Balance <strong class="black-text"><?= $this->user['currency']['code'] . ' ' . number_format($this->user['account_balance'], 2, '.', ' ') ?></strong>
                            </span>
                            </span>
                        </li>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span data-toggle="tooltip" data-container="body" data-placement="left" title="Settings"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/black_settings_icon.svg" /></span>
                                <?php if($this->user['is_verified'] == 0):?>
                                    <span class="label"><i class="fa fa-exclamation-circle red-text"></i></span>
                                <?php elseif($this->user['is_verified'] == 1): ?>
                                    <span class="label"><i class="fa fa-check-circle red-text"></i></span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="/settings/profile">Profile settings</a>
                                        </li>
                                        <li>
                                            <a href="/settings/api">API settings</a>
                                        </li>
                                        <li>
                                            <a href="/settings/verify">Verification
                                                <?php if($this->user['is_verified'] == 0):?>
                                                    <i class="fa fa-exclamation-circle red-text"></i>
                                                <?php elseif($this->user['is_verified'] == 1): ?>
                                                    <i class="fa fa-check-circle red-text"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-check-circle green-text"></i>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/settings/security">Security</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#" data-toggle="tooltip" data-container="body" data-placement="left" title="Help"><span><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/black_help_icon.svg" /></span></a></li>
                        <li ><a href="/logout" data-toggle="tooltip" data-container="body" data-placement="left" title="Sign out"><span><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/black_sign_out_icon.svg" /></span></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php $CI->load->view('templates/side_menu'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper <?= $title ?>">
        <div id="notification">
            <button class="close"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/close_icon.svg" /></button>
            <p class="message-text"></p>
        </div>