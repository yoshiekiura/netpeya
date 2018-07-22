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
            <div class="container">
                <div class="left text-left">
                    <span class="page-title"><?= ucfirst($pageTitle) ?></span>
                </div>
                <div class="right text-right">
                    <p><img class="user-pic" src="/assets/svg/icons/user-green.svg" /><img class="icon" src="/assets/svg/icons/sort.svg" /></p>
                </div>
            </div>
        </header>