<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
        <script type="text/javascript" src="/assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                            <input type="text" class="form-control" placeholder="Search currencies">
                            <div class="input-group-append input-group">
                                <span class="input-group-text dropdown-btn dropdown-btn" >Currences<img class="icon" src="/assets/images/icons/small-chevron-down.png" /></span>
                                <ul class="dropdown-content">
								    <li>Currences</li>
								    <li>Crypto</li>
								</ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 right">
                        <nav>
                            <ul>
                                <li>
                                    <a class="dropdown-btn"><img class="user-pic" src="/assets/images/emmanuel.jpg" /><img class="icon" src="/assets/images/icons/menu.png" /></a>
                                    <ul class="dropdown-content">
									    <li>Preferences</li>
									    <li>Logout</li>
									</ul>
                                </li>
                                <li>
                                    <a class="nav-link notification"><img class="icon" src="/assets/images/icons/notification.png" /></a>
                                </li>
                                <li>
                                    <a class="nav-link balance">$42,615.83</a>
                                </li>
                                <li>
                                    <a class="nav-link lang dropdown-btn">
                                        <p class="lang-select" style="background-image: url('/assets/svg/countries/gbp.svg')"></p>
                                        <img class="icon" src="/assets/images/icons/small-chevron-down.png" />
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
        <nav class="secondary-nav">
            <div class="container">
                <ul class="pull-left left">
                    <li>
                        <a href="/dashboard" class="<?= $pageTitle == 'dashboard' ? 'active' : '' ?> nav-dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a href="/transactions" class="<?= $pageTitle == 'transactions' ? 'active' : '' ?> nav-transactions">Transactions</a>
                    </li>
                    <li>
                        <a href="" class="nav-send-request">Send/Request</a>
                    </li>
                    <li>
                        <a href="" class="nav-exchange">Exchange</a>
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
        <?php if($pageTitle == "transactions"): ?>
            <nav class="third-nav">
                <div class="container">
                    <ul class="pull-left left">
                        <li>
                            <a href="/dashboard" class="active">All Transactions</a>
                        </li>
                        <li>
                            <a href="">Sent</a>
                        </li>
                        <li>
                            <a href="">Received</a>
                        </li>
                        <li>
                            <a href="">Deposit</a>
                        </li>
                        <li>
                            <a href="">Withdraw</a>
                        </li>
                        <li>
                            <input type="date" name="" id="search_date_from" class="fomr-control"  format="yyyy-mm-dd" />
                        </li>
                        <li><i>-to-</i></li>
                        <li>
                            <input type="date" name="" id="search_date_to" class="fomr-control"  format="yyyy-mm-dd" />
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
        <main>
            <div class="container">