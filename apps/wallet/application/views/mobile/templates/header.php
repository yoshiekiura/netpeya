<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/vendors/font-awesome/css/fontawesome-all.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/vendors/animate/animate.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/mobile.css" />
    </head>
    <body class="<?= $pageTitle ?> app" ng-app="">
        <header>
            <div class="left text-left">
                <span class="page-title"><?= ucfirst($pageTitle) ?></span>
            </div>
            <div class="right">
                <span id="sidebar_close" class="pull-left"><img src="/assets/svg/icons/close.svg" /></span>
                <span id="sidebar_opener" class="pull-right"><img class="user-pic" src="/assets/svg/icons/user-green.svg" /><img class="icon" src="/assets/svg/icons/sort.svg" /></span>
                <div class="sidebar">
                    <aside class="main-sidebar">
                        <nav>
                            <ul>
                                <li>
                                    <a href="">Dashboard</a>
                                </li>
                                <li>
                                    <a href="">Transactions</a>
                                </li>
                                <li>
                                    <a href="">Send/Request</a>
                                </li>
                                <li>
                                    <a href="">Friends</a>
                                </li>
                                <li>
                                    <a href="/deposit">Deposit</a>
                                </li>
                                <li>
                                    <a href="">Withdraw</a>
                                </li>
                            </ul>
                        </nav>
                        <a href="/auth/logout" class="logout">Log out  <img class="pl-3" src="/assets/svg/icons/logout.svg" /></a>
                    </aside>
                </div>
            </div>
        </header>
        <main>