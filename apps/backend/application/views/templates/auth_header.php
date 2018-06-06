<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>XanniaPay | <?= $title ?></title>
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
<body class="auth">
	<div id="notification">
                <button class="close"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="message-text"></p>
        </div>
