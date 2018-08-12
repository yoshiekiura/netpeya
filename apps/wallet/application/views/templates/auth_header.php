<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/vendors/font-awesome/css/fontawesome-all.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
        <script type="text/javascript" src="/assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="auth <?= $pageTitle ?>" ng-app="">
        <header>
            <div class="container">
                <div class="webkit-box">
                    <div class="col-md-2 left">
                        <a href="" class="logo"><img src="/assets/svg/logos/logo.svg" /></a>
                    </div>
                    <div class="col-md-6 center">
                    </div>
                    <div class="col-md-4 right">
                        <nav>
                            <ul>
                                <li class="pr-3">
                                    <a href="">Go to <strong>merchant portal</strong></a>
                                </li>
                                <li class="pl-3">
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
        <main>
            <div class="container">
