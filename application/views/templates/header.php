<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>Xannia - Pay with confidence</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/icons/icon.png">

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsparallaxer.css">
  <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.css">
  <link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">

  <!-- CSS Xannia Template -->
  <link rel="stylesheet" href="/assets/css/front.css">
</head>

<body>
  <!-- Skippy -->
  <a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
    <div class="container">
      <span class="u-skiplink-text">Skip to main content</span>
    </div>
  </a>
  <!-- End Skippy -->

  <!-- ========== HEADER ========== -->
  <header id="header" class="u-header u-header--abs-top-md <?= $title == 'home' ? 'u-header--bg-transparent' : '' ?> u-header--show-hide-md"
          data-header-fix-moment="500"
          data-header-fix-effect="slide">
    <!-- Search -->
    <div id="searchPushTop" class="u-search-push-top">
      <div class="container position-relative">
        <div class="u-search-push-top__content mx-auto">
          <!-- Close Button -->
          <button type="button" class="close u-search-push-top__close-btn"
                  aria-haspopup="true"
                  aria-expanded="false"
                  aria-controls="searchPushTop"
                  data-unfold-type="jquery-slide"
                  data-unfold-target="#searchPushTop">
            <span aria-hidden="true">&times;</span>
          </button>
          <!-- End Close Button -->

          <!-- Input -->
          <form class="js-focus-state input-group input-group-lg u-form u-form--lg u-form--no-brd">
            <input type="search" class="form-control u-form__input" placeholder="Search Xannia" aria-label="Search Xannia">
            <div class="input-group-append">
              <button type="button" class="btn btn-primary u-btn-primary">Search</button>
            </div>
          </form>
          <!-- End Input -->

          <!-- Link Lists -->
          <div class="row d-none d-md-flex mt-7">
            <div class="col-sm-6">
              <strong class="d-block mb-2">Quick Links</strong>

              <div class="row">
                <!-- List -->
                <ul class="col-sm-6 list-unstyled u-list">
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Search Results List
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Search Results Grid
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="../pages/about-agency.html">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      About
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="../pages/services-agency.html">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Services
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Invoice
                    </a>
                  </li>
                </ul>
                <!-- End List -->

                <!-- List -->
                <ul class="col-sm-6 list-unstyled u-list">
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Profile
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      User Contacts
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Reviews
                    </a>
                  </li>
                  <li>
                    <a class="u-list__link" href="#">
                      <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                      Settings
                    </a>
                  </li>
                </ul>
                <!-- End List -->
              </div>
            </div>

            <div class="col-sm-6">
              <!-- Banner -->
              <div class="rounded u-search-push-top__banner">
                <div class="d-flex align-items-center">
                  <div class="u-search-push-top__banner-container">
                    <img class="img-fluid u-search-push-top__banner-img" src="/assets/img/mockups/img3.png" alt="Image Description">
                    <img class="img-fluid u-search-push-top__banner-img" src="/assets/img/mockups/img2.png" alt="Image Description">
                  </div>

                  <div>
                    <div class="mb-4">
                      <strong class="d-block mb-2">Featured Item</strong>
                      <p>Create astonishing web sites and pages.</p>
                    </div>
                    <a class="btn btn-xs u-btn-success--air transition-3d-hover" href="index.html">Apply Now <span class="fa fa-angle-right ml-2"></span></a>
                  </div>
                </div>
              </div>
              <!-- End Banner -->
            </div>
          </div>
          <!-- End Link Lists -->
        </div>
      </div>
    </div>
    <!-- End Search -->

    <div class="u-header__section">
      <!-- Topbar -->
      <div class="container u-header__hide-content pt-2">
        <div class="d-flex align-items-center mb-0">
          <!-- Language -->
          <div class="position-relative text-uppercase">
            <a id="languageDropdownInvoker" class="d-flex align-items-center u-unfold-wrapper" href="javascript:;" role="button"
               aria-controls="languageDropdown"
               aria-haspopup="true"
               aria-expanded="false"
               data-unfold-event="hover"
               data-unfold-target="#languageDropdown"
               data-unfold-type="css-animation"
               data-unfold-duration="300"
               data-unfold-delay="300"
               data-unfold-hide-on-scroll="true"
               data-unfold-animation-in="slideInUp"
               data-unfold-animation-out="fadeOut">
               <img class="u-unfold__icon" src="/assets/vendor/flag-icon-css/flags/4x3/us.svg" alt="SVG">
              <span class="d-inline-block d-sm-none">US</span>
              <span class="d-none d-sm-inline-block">English</span>
              <span class="fa fa-angle-down u-unfold__icon-pointer"></span>
            </a>

            <div id="languageDropdown" class="u-unfold mt-2" aria-labelledby="languageDropdownInvoker">
              <a class="active u-list__link" href="#">English</a>
              <a class="u-list__link" href="#">Deutsch</a>
              <a class="u-list__link" href="#">Español‎</a>
            </div>
          </div>
          <!-- End Language -->

          <div class="ml-auto">
            <!-- Jump To -->
            <div class="d-inline-block d-sm-none position-relative mr-2">
              <a id="jumpToDropdownInvoker" class="d-flex align-items-center u-unfold-wrapper" href="javascript:;" role="button"
                 aria-controls="jumpToDropdown"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-unfold-event="hover"
                 data-unfold-target="#jumpToDropdown"
                 data-unfold-type="css-animation"
                 data-unfold-duration="300"
                 data-unfold-delay="300"
                 data-unfold-hide-on-scroll="true"
                 data-unfold-animation-in="slideInUp"
                 data-unfold-animation-out="fadeOut">
                Jump to
                <span class="fa fa-angle-down u-unfold__icon-pointer"></span>
              </a>

              <div id="jumpToDropdown" class="u-unfold mt-2 text-uppercase" aria-labelledby="jumpToDropdownInvoker">
                <a class="u-list__link" href="/help">Help</a>
                <a class="u-list__link" href="/contacts">Contacts</a>
              </div>
            </div>
            <!-- End Jump To -->

            <!-- Links -->
            <div class="d-none d-sm-inline-block ml-sm-auto text-uppercase">
              <ul class="list-inline mb-0">
                <li class="list-inline-item mr-0">
                  <a class="u-header__topbar-nav-link" href="/help">Help</a>
                </li>
                <li class="list-inline-item mr-0">
                  <a class="u-header__topbar-nav-link" href="/contacts">Contacts</a>
                </li>
              </ul>
            </div>
            <!-- End Links -->
          </div>

          <ul class="list-inline ml-2 mb-0">
            <!-- Search -->
            <li class="list-inline-item">
              <a class="btn btn-xs u-btn--icon u-btn-text-secondary" href="javascript:;" role="button"
                      aria-haspopup="true"
                      aria-expanded="false"
                      aria-controls="searchPushTop"
                      data-unfold-type="jquery-slide"
                      data-unfold-target="#searchPushTop">
                <span class="fa fa-search u-btn--icon__inner"></span>
              </a>
            </li>
            <!-- End Search -->
          </ul>
        </div>
      </div>
      <!-- End Topbar -->

      <div id="logoAndNav" class="container">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar">
          <!-- Logo -->
          <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-top-space" href="/" aria-label="Xannia">
            <img src="/assets/svg/logos/logo.svg" alt="Logo">
          </a>
          <!-- End Logo -->

          <!-- Responsive Toggle Button -->
          <button type="button" class="navbar-toggler btn u-hamburger"
                  aria-label="Toggle navigation"
                  aria-expanded="false"
                  aria-controls="navBar"
                  data-toggle="collapse"
                  data-target="#navBar">
            <span id="hamburgerTrigger" class="u-hamburger__box">
              <span class="u-hamburger__inner"></span>
            </span>
          </button>
          <!-- End Responsive Toggle Button -->

          <!-- Navigation -->
          <div id="navBar" class="collapse navbar-collapse py-0">
            <ul class="navbar-nav u-header__navbar-nav ml-lg-auto">
              <!-- Home -->
              <li class="nav-item hs-has-mega-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="slideInUp"
                  data-animation-out="fadeOut"
                  data-position="left">
                <a id="homeMegaMenu" class="nav-link u-header__nav-link pl-0" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false">
                  Home
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Home - Mega Menu -->
                <div class="hs-mega-menu u-header__sub-menu u-header__mega-menu-width-v1 u-header__mega-menu-wrapper-v2" aria-labelledby="homeMegaMenu">
                  <div class="row p-0 mr-0">
                    <div class="col-lg-6 pr-0">
                      <!-- Banner Image -->
                      <div class="d-none d-lg-block u-header__banner-v1" data-bg-img-src="/assets/img/750x750/img1.jpg">
                        <div class="w-100 text-center u-header__banner-v1-content u-content-centered-y p-4">
                          <div class="mb-4">
                            <strong class="d-block u-header__banner-v1-title mb-2">Branding Works</strong>
                            <span class="u-header__banner-v1-text">Experience a level of our quality in both design &amp; customization works.</span>
                          </div>
                          <a class="btn btn-primary u-btn-primary btn-sm transition-3d-hover" href="#">Learn More <span class="fa fa-angle-right ml-2"></span></a>
                        </div>
                      </div>
                      <!-- End Banner Image -->
                    </div>

                    <div class="col-lg-6 u-header__mega-menu-wrapper-v3">
                      <div class="row u-header__mega-menu-wrapper-v1">
                        <div class="col-sm-6">
                          <strong class="d-block mb-2">Classic</strong>

                          <!-- Links -->
                          <ul class="list-unstyled mb-4">
                            <li><a class="nav-link u-list__link py-2 px-0" href="index.html">Classic Agency</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="classic-crypto.html">Classic Crypto</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="classic-business.html">Classic Business</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="classic-marketing.html">Classic Marketing</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="classic-consulting.html">Classic Consulting</a></li>
                          </ul>
                          <!-- End Links -->

                          <strong class="d-block mb-2">Corporate</strong>

                          <!-- Links -->
                          <ul class="list-unstyled mb-4">
                            <li><a class="nav-link u-list__link py-2 px-0" href="corporate-agency.html">Corporate Agency</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="corporate-start-up.html">Corporate Start-Up</a></li>
                          </ul>
                          <!-- End Links -->
                        </div>

                        <div class="col-sm-6">
                          <strong class="d-block mb-2">Blog</strong>

                          <!-- Links -->
                          <ul class="list-unstyled mb-4">
                            <li><a class="nav-link u-list__link py-2 px-0" href="blog-agency.html">Blog Agency</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="blog-start-up.html">Blog Start-Up</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="blog-business.html">Blog Business</a></li>
                          </ul>
                          <!-- End Links -->

                          <strong class="d-block mb-2">Portfolio</strong>

                          <!-- Links -->
                          <ul class="list-unstyled u-list">
                            <li><a class="nav-link u-list__link py-2 px-0" href="portfolio-agency.html">Portfolio Agency</a></li>
                            <li><a class="nav-link u-list__link py-2 px-0" href="portfolio-profile.html">Portfolio Profile</a></li>
                          </ul>
                          <!-- End Links -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Home - Mega Menu -->
              </li>
              <!-- End Home -->

              <!-- Pages -->
              <li class="nav-item hs-has-sub-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="slideInUp"
                  data-animation-out="fadeOut">
                <a id="pagesMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false"
                   aria-labelledby="pagesSubMenu">
                  Pages
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Pages - Submenu -->
                <ul id="pagesSubMenu" class="list-inline hs-sub-menu u-header__sub-menu py-3 mb-0" style="min-width: 220px;"
                    aria-labelledby="pagesMegaMenu">
                  <!-- About -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkPagesAbout" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuPagesAbout">
                      About
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuPagesAbout" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkPagesAbout">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/about-agency.html">About Agency</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/about-start-up.html">About Start-Up</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- About -->

                  <!-- Services -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkPagesServices" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuPagesServices">
                      Services
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuPagesServices" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkPagesServices">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/services-agency.html">Services Agency</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/services-start-up.html">Services Start-Up</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Services -->

                  <!-- Careers -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkPagesCareers" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuPagesCareers">
                      Careers
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuPagesCareers" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkPagesCareers">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/careers.html">Careers</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/careers-single.html">Careers Single</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/hire-us.html">Hire Us</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Careers -->

                  <!-- Login -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkPagesLogin" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuPagesLogin">
                      Login &amp; Signup
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuPagesLogin" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkPagesLogin">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/login-simple.html">Login Simple</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/signup-simple.html">Signup Simple</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/recover-account.html">Recover Account</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Signup -->

                  <!-- Contacts -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkContactsServices" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuContactsServices">
                      Contacts
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuContactsServices" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkContactsServices">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/contacts-agency.html">Contacts Agency</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/contacts-start-up.html">Contacts Start-Up</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Contacts -->

                  <!-- Utilities -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkPagesUtilities" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuPagesUtilities">
                      Utilities
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuPagesUtilities" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkPagesUtilities">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/help.html">Help</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/pricing.html">Pricing</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/terms.html">Terms &amp; Conditions</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/privacy.html">Privacy &amp; Policy</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Utilities -->

                  <!-- Specialty -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkPagesSpecialty" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuPagesSpecialty">
                      Specialty
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuPagesSpecialty" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkPagesSpecialty">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/cover-page.html">Cover Page</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/coming-soon.html">Coming Soon</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/maintenance-mode.html">Maintenance Mode</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../pages/error-404.html">Error 404</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Specialty -->
                </ul>
                <!-- End Pages - Submenu -->
              </li>
              <!-- End Pages -->

              <!-- Works -->
              <li class="nav-item hs-has-mega-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="slideInUp"
                  data-animation-out="fadeOut"
                  data-position="right">
                <a id="worksMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false">
                  Work
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Works - Mega Menu -->
                <div class="hs-mega-menu w-100 u-header__sub-menu u-header__mega-menu-wrapper-v1" aria-labelledby="worksMegaMenu">
                  <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                      <strong class="d-block mb-2">Boxed Layouts</strong>

                      <!-- Links -->
                      <ul class="list-unstyled u-list">
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/boxed-classic.html">Portfolio Classic</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/boxed-grid.html">Portfolio Grid</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/boxed-masonry.html">Portfolio Masonry</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/boxed-modern.html">Portfolio Modern</a></li>
                      </ul>
                      <!-- End Links -->
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                      <strong class="d-block mb-2">Full Width Layouts</strong>

                      <!-- Links -->
                      <ul class="list-unstyled u-list">
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/fullwidth-classic.html">Portfolio Classic</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/fullwidth-grid.html">Portfolio Grid</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/fullwidth-masonry.html">Portfolio Masonry</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/fullwidth-modern.html">Portfolio Modern</a></li>
                      </ul>
                      <!-- End Links -->
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-3 mb-sm-0">
                      <strong class="d-block mb-2">Single Pages</strong>

                      <!-- Links -->
                      <ul class="list-unstyled u-list">
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/single-page-simple.html">Single Page Simple</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/single-page-grid.html">Single Page Grid</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/single-page-masonry.html">Single Page Masonry</a></li>
                      </ul>
                      <!-- End Links -->
                    </div>

                    <div class="col-sm-6 col-lg-3">
                      <strong class="d-block mb-2">Case Studies</strong>

                      <!-- Links -->
                      <ul class="list-unstyled u-list">
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/case-studies-simple.html">Case Studies Simple</a></li>
                        <li><a class="nav-link u-list__link py-2 px-0" href="../portfolio/case-studies-modern.html">Case Studies Modern</a></li>
                      </ul>
                      <!-- End Links -->
                    </div>
                  </div>
                </div>
                <!-- End Works - Mega Menu -->
              </li>
              <!-- End Works -->

              <!-- Blog -->
              <li class="nav-item hs-has-sub-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="slideInUp"
                  data-animation-out="fadeOut">
                <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false"
                   aria-labelledby="blogSubMenu">
                  Blog
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Blog - Submenu -->
                <ul id="blogSubMenu" class="list-inline hs-sub-menu u-header__sub-menu py-3 mb-0" style="min-width: 220px;"
                    aria-labelledby="blogMegaMenu">
                  <!-- Classic -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkBlogClassic" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuBlogClassic">
                      Classic
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuBlogClassic" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkBlogClassic">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/classic-left-sidebar.html">Left Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/classic-right-sidebar.html">Right Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/classic-full-width.html">Full Width</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Classic -->

                  <!-- Grid -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkBlogGrid" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuBlogGrid">
                      Grid
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuBlogGrid" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkBlogGrid">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/grid-left-sidebar.html">Left Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/grid-right-sidebar.html">Right Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/grid-full-width.html">Full Width</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Grid -->

                  <!-- List -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkBlogList" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuBlogList">
                      List
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuBlogList" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkBlogList">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/list-left-sidebar.html">Left Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/list-right-sidebar.html">Right Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/list-full-width.html">Full Width</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- List -->

                  <!-- Modern -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkBlogCard" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuBlogCard">
                      Modern
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuBlogCard" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkBlogCard">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/modern-left-sidebar.html">Left Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/modern-right-sidebar.html">Right Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/modern-full-width.html">Full Width</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Grid Modern -->

                  <!-- Masonry -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkBlogGridMinimal" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuBlogGridMinimal">
                      Masonry
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuBlogGridMinimal" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkBlogGridMinimal">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/masonry-left-sidebar.html">Left Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/masonry-right-sidebar.html">Right Sidebar</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/masonry-full-width.html">Full Width</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Masonry -->

                  <!-- Single Article -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkBlogGridMasonry" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuBlogGridMasonry">
                      Single Article
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuBlogGridMasonry" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkBlogGridMasonry">
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/single-article-classic.html">Classic</a>
                      </li>
                      <li class="dropdown-item px-0">
                        <a class="nav-link u-list__link px-4" href="../blog/single-article-simple.html">Simple</a>
                      </li>
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Single Article -->
                </ul>
                <!-- End Submenu -->
              </li>
              <!-- End Blog -->

              <!-- Shop -->
              <li class="nav-item hs-has-mega-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="slideInUp"
                  data-animation-out="fadeOut"
                  data-max-width="440px"
                  data-position="right">
                <a id="shopMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false">
                  Shop
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Shop - Mega Menu -->
                <div class="hs-mega-menu u-header__sub-menu" aria-labelledby="shopMegaMenu">
                  <div class="u-header__mega-menu-wrapper-v1">
                    <strong class="d-block mb-2">Shop Elements</strong>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- Links -->
                        <ul class="list-unstyled u-list">
                          <li><a class="nav-link u-list__link py-2 px-0" href="../shop/classic.html">Classic</a></li>
                          <li><a class="nav-link u-list__link py-2 px-0" href="../shop/masonry.html">Masonry</a></li>
                          <li><a class="nav-link u-list__link py-2 px-0" href="../shop/single-product.html">Single Product</a></li>
                        </ul>
                        <!-- End Links -->
                      </div>

                      <div class="col-sm-6">
                        <!-- Links -->
                        <ul class="list-unstyled u-list">
                          <li><a class="nav-link u-list__link py-2 px-0" href="../shop/cart.html">Cart</a></li>
                          <li><a class="nav-link u-list__link py-2 px-0" href="../shop/checkout.html">Checkout</a></li>
                        </ul>
                        <!-- End Links -->
                      </div>
                    </div>
                  </div>

                  <!-- Mega Menu Banner -->
                  <div class="d-none d-md-block u-header__banner-v2 pr-4">
                    <div class="d-flex align-items-end">
                      <img class="img-fluid mr-4" src="/assets/img/mockups/img4.png" alt="Image Description" style="width: 200px;">
                      <div class="py-4">
                        <div class="mb-4">
                          <strong class="d-block u-header__banner-v2-title mb-2">Win T-shirt</strong>
                          <span class="d-block u-header__banner-v2-text">Win one of our Xannia brand T-shirts.</span>
                        </div>
                        <a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="../shop/classic.html">Learn More <span class="fa fa-angle-right ml-2"></span></a>
                      </div>
                    </div>
                  </div>
                  <!-- End Mega Menu Banner -->
                </div>
                <!-- End Shop - Mega Menu -->
              </li>
              <!-- End Shop -->
              <!-- Button -->
              <li class="nav-item d-none d-md-inline-block pl-3 pr-0">
                <a id="sidebarNavToggler" class="btn btn-sm u-btn-success--air u-btn-primary u-sidebar__toggler" href="javascript:;" role="button"
                   aria-controls="sidebarContent"
                   aria-haspopup="true"
                   aria-expanded="false"
                   data-unfold-event="click"
                   data-unfold-hide-on-scroll="false"
                   data-unfold-target="#sidebarContent"
                   data-unfold-type="css-animation"
                   data-unfold-animation-in="fadeInRight"
                   data-unfold-animation-out="fadeOutRight"
                   data-unfold-duration="500">
                  Get Started
                </a>
              </li>
              <!-- End Button -->
            </ul>
          </div>
          <!-- End Navigation -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">