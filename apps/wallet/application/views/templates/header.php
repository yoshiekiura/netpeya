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
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/mobile.css" />
    </head>
    <body class="<?= $pageTitle ?>" ng-app="">
        <header>
            <div class="container">
                <div class="webkit-box">
                    <div class="col-md-2 col-sm-4 left">
                        <a href="" class="logo"><img src="/assets/svg/logos/logo.svg" /></a>
                    </div>
                    <div class="col-md-7 center border-right border-left d-md-block d-sm-none">
                        <div class="top-search-holder">
                            <div class="input-group-prepend input-group icon">
                                <span class="input-group-text"><img class="icon" src="/assets/images/icons/search.png" /></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Transactions, friends or help">
                            <div class="input-group-append input-group">
                                <span class="input-group-text dropdown-btn" >Currences</span>
                                <ul class="dropdown-content">
								    <li>Currency</li>
								    <li>Crypto</li>
								</ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-8 right">
                        <nav>
                            <ul>
                                <li class="user-menu">
                                    <a class="dropdown-btn"><img class="user-pic" src="/assets/svg/icons/user.svg" /><img class="icon" src="/assets/svg/icons/sort.svg" /></a>
                                    <ul class="dropdown-content">
                                        <li><img src="/assets/svg/icons/settings.svg" /> Settings</li>
									    <li><img src="/assets/svg/icons/chat.svg" /> Activity</li>
									    <li><a href="/logout"><img src="/assets/svg/icons/logout.svg" /> Logout</a></li>
									</ul>
                                </li>
                                <li class="notification alerts">
                                    <a class="nav-link dropdown-btn"></a>
                                    <p>2</p>
                                    <ul class="dropdown-content">
                                        <li class="success">You have received money from Oleen!</li>
                                        <li class="warning">Upload FICA documents.</li>
                                    </ul>
                                </li>
                                <!-- <li>
                                    <a class="nav-link balance"><?= $user->currency_simbol . ' ' .number_format($user->account_balance, 2, '.', ',') ?></a>
                                </li> -->
                                <li>
                                    <a class="nav-link lang dropdown-btn">
                                        <p class="lang-select" style="background-image: url('/assets/svg/languages/<?= $language ?>.svg')"></p>
                                    </a>
                                    <ul class="dropdown-content language-switch">
									    <li data-value="en">English</li>
									    <li data-value="es">Spanish</li>
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
                        <a href="/transactions" class="<?= $pageTitle == 'transactions' ? 'active' : '' ?> nav-history">Transactions</a>
                    </li>
                    <li>
                        <a href="/friends" class="<?= ($pageTitle == 'friends' || $pageTitle == 'friends add' || $pageTitle == 'friends edit') ? 'active' : '' ?> nav-friends">Friends</a>
                    </li>
                    <li>
                        <a href="" class="nav-send-receive">Send/Request</a>
                    </li>
                    <!-- <li>
                        <a href="" class="nav-exchange">Exchange</a>
                    </li> -->
                    <!-- <li>
                        <a href="/settings" class="<?= $pageTitle == 'settings' ? 'active' : '' ?> nav-settings">Settings</a>
                    </li> -->
                </ul>
                <ul class="pull-right right">
                    <li>
                        <a href="/deposit" class="deposit"><img class="icon" src="/assets/images/icons/deposit-white.png" /> Deposit</a>
                    </li>
                    <li>
                        <a href="" class="withdraw"><img class="icon" src="/assets/images/icons/withdraw-white.png" /> Withdraw</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if($pageTitle == 'friends' || $pageTitle == 'friends add' || $pageTitle == 'friends edit'): ?>
            <nav class="third-nav">
                <div class="container">
                    <ul class="pull-left left">
                        <li>
                            <a href="/friends" class="<?= ($pageTitle == 'friends' || $pageTitle == 'friends edit') ? 'active' : '' ?> nav-list">My friends</a>
                        </li>
                        <li>
                            <a href="/friends/add" class="<?= $pageTitle == 'friends add' ? 'active' : '' ?> nav-add">Add a friend</a>
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
        <main class="<?= $pageTitle ?>">
            <div class="container">
                <?php if($pageTitle != 'transactions'): ?>
                    <section class="app-top border-top">
                        <div class="webkit-box">
                            <div class="col-md-4 no-left request-send full-mobile">
                                <div class="card user-summary">
                                    <div class="user-profile">
                                        <div class="user-pic"><?= $user->first_name[0] . $user->last_name[0] ?></div>
                                        <div class="user-details">
                                            <span class="user-name"><?= $user->first_name . ' ' . $user->last_name ?></span>
                                            <span class="user-account-id"><strong>ID: </strong><?= $user->np_id ?></span>
                                        </div>
                                    </div>
                                    <div class="user-balance mt-3 border-top pt-3">
                                        <div class="user-currency" style="background-image: url('/assets/svg/countries/<?= strtolower($user->currency_code) ?>.svg');"></div>
                                        <div class="balance-details">
                                            <strong class="balance-title">Your Balance:</strong>
                                            <span class="balance-amount green-text"><?= $user->currency_simbol . number_format($user->account_balance, 2, '.', ' ') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 no-right no-left hidden-mobile">
                                <div class="app_content card lazyload">
                <?php endif;?>