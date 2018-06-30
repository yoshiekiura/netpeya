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
                            <input type="text" class="form-control" placeholder="Transactions, friends or help">
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
                        <a href="/friend" class="<?= $pageTitle == 'friends' ? 'active' : '' ?> nav-friends">Friends</a>
                    </li>
                    <li>
                        <a href="" class="nav-send-receive">Send/Request</a>
                    </li>
                    <!-- <li>
                        <a href="" class="nav-exchange">Exchange</a>
                    </li> -->
                    <li>
                        <a href="/settings" class="<?= $pageTitle == 'settings' ? 'active' : '' ?> nav-settings">Settings</a>
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
        <?php if($pageTitle == 'friends'): ?>
            <nav class="third-nav">
                <div class="container">
                    <ul class="pull-left left">
                        <li>
                            <a href="/dashboard" class="<?= $pageTitle == 'friends' ? 'active' : '' ?> nav-list">My friends</a>
                        </li>
                        <li>
                            <a id="add_friend_btn" href="" class="nav-add">Add a friend</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif;?>
        <?php if($pageTitle == 'settings'): ?>
            <nav class="third-nav">
                <div class="container">
                    <ul class="pull-left left">
                        <li>
                            <a href="/dashboard" class="<?= $pageTitle == 'settings' ? 'active' : '' ?> nav-details">My details</a>
                        </li>
                        <li>
                            <a id="add_friend_btn" href="" class="nav-security">Security</a>
                        </li>
                        <li>
                            <a id="add_friend_btn" href="" class="nav-prefs">Preferences</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif;?>
        <main>
            <div class="container">
                <?php if($pageTitle != 'transactions'): ?>
                    <section class="app-top border-top">
                        <div class="webkit-box">
                            <div class="col-md-4 no-left request-send">
                                <div class="card user-summary">
                                    <div class="user-profile">
                                        <div class="user-pic"><?= $user->first_name[0] . $user->last_name[0] ?></div>
                                        <div class="user-details">
                                            <span class="user-name"><?= $user->first_name . ' ' . $user->last_name ?></span>
                                            <span class="user-account-id"><?= $user->country ?></span>
                                        </div>
                                    </div>
                                    <div class="user-balance mt-3 border-top pt-3">
                                        <div class="user-currency" style="background-image: url('/assets/svg/countries/<?= strtolower($user->currency_code) ?>.svg');"></div>
                                        <div class="balance-details">
                                            <span class="balance-title">Your Balance:</span>
                                            <span class="balance-amount"><?= $user->currency_simbol . number_format($user->account_balance, 2, '.', ' ') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 no-right no-left">
                                <div class="app_content card lazyload">
                <?php endif;?>