<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/vendors/font-awesome/css/fontawesome-all.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/vendors/animate/animate.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
    </head>
    <body class="<?= $pageTitle ?>" ng-app="">
        <header>
            <div class="container">
                <div class="webkit-box">
                    <div class="col-md-2 left">
                        <a href="" class="logo"><img src="/assets/svg/logos/logo.svg" /></a>
                    </div>
                    <div class="col-md-6 center border-right border-left">
                        <div class="top-search-holder">
                            <div class="input-group-prepend input-group icon">
                                <span class="input-group-text"><img class="icon" src="/assets/images/icons/search.png" /></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search transactions or help">
                            <div class="input-group-append input-group">
                                <span class="input-group-text dropdown-btn dropdown-btn" >Currences</span>
                                <ul class="dropdown-content">
								    <li>Currency</li>
								    <li>Crypto</li>
								</ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 right">
                        <nav>
                            <ul>
                                <li class="user-menu">
                                    <a class="dropdown-btn"><img class="user-pic" src="/assets/images/emmanuel.jpg" /><img class="icon" src="/assets/images/icons/menu.png" /></a>
                                    <ul class="dropdown-content">
									    <li>Preferences</li>
									    <li><a href="/logout">Logout <i style="margin-left: 6px;" class="fas fa-power-off"></i></a></li>
									</ul>
                                </li>
                                <li>
                                    <a class="nav-link notification"><img class="icon" src="/assets/images/icons/notification.png" /></a>
                                </li>
                                <li>
                                    <a class="nav-link balance"><?= $user->currency_simbol . ' ' .number_format($user->account_balance, 2, '.', ',') ?></a>
                                </li>
                                <li>
                                    <a class="nav-link lang dropdown-btn">
                                        <p class="lang-select" style="background-image: url('/assets/svg/countries/gbp.svg')"></p>
                                    </a>
                                    <ul class="dropdown-content">
									    <li>English</li>
									    <li>Spanish</li>
									    <li>Xhosa</li>
									</ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="notification-holder"></div>
        </div>
        <nav class="secondary-nav">
            <div class="container">
                <ul class="pull-left left">
                    <li>
                        <a href="/dashboard" class="<?= $pageTitle == 'dashboard' ? 'active' : '' ?> nav-dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a href="/transactions" class="<?= $pageTitle == 'transactions' ? 'active' : '' ?> nav-history">History</a>
                    </li>
                    <li>
                        <a href="" class="nav-send">Send</a>
                    </li>
                    <li>
                        <a href="" class="nav-request">Request</a>
                    </li>
                    <!-- <li>
                        <a href="" class="nav-exchange">Exchange</a>
                    </li> -->
                    <li>
                        <a href="" class="nav-friends">Friends</a>
                    </li>
                    <li>
                        <a href="" class="nav-settings">Settings</a>
                    </li>
                </ul>
                <ul class="pull-right right">
                    <li>
                        <a href="/deposit" class="deposit"><img class="icon" src="/assets/images/icons/arrow-up-white.png" /> Deposit</a>
                    </li>
                    <li>
                        <a href="" class="withdraw"><img class="icon" src="/assets/images/icons/arrow-down-white.png" /> Withdraw</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            <div class="container">