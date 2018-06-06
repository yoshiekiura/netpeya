<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>Coming Soon | Xannia - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">

  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/fontawesome-all.min.css">

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
  <header id="header" class="u-header u-header--bg-transparent u-header--abs-top mt-3">
    <div class="u-header__section">
      <div class="container">
        <!-- Nav -->
        <nav class="navbar navbar-expand u-header__navbar py-2">
          <!-- Logo -->
          <a class="navbar-brand u-header__navbar-brand" href="../home/index.html" aria-label="Xannia">
            <img src="/assets/svg/logos/logo.svg" alt="Logo">
          </a>
          <!-- End Logo -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="container u-space-4-top u-space-2-bottom u-space-0--lg">
      <div class="row align-items-lg-center min-height-100vh">
        <!-- SVG Icon -->
        <div class="col-lg-6">
          <img src="/assets/svg/flat-icons/coming-soon-flat-concept-illustration.svg" alt="SVG Illustration">
        </div>
        <!-- End SVG Icon -->

        <div class="col-lg-6">
          <div class="pl-lg-4">
            <!-- Title -->
            <div class="mb-4">
              <h1 class="text-primary font-weight-normal">We're coming <span class="font-weight-bold">soon</span>.</h1>
              <p>Our website is under construction. We'll be here soon with our new awesome site!.</p>
            </div>
            <!-- End Title -->

            <!-- Countdown -->
            <div class="js-countdown row mb-5"
                 data-end-date="2018/09/01"
                 data-month-format="%m"
                 data-days-format="%D"
                 data-hours-format="%H"
                 data-minutes-format="%M"
                 data-seconds-format="%S">
              <div class="col-3">
                <strong class="js-cd-days h3 text-primary font-weight-bold mb-0"></strong>
                <span class="h5 font-weight-normal mb-0">Days</span>
              </div>
              <div class="col-3">
                <strong class="js-cd-hours h3 text-primary font-weight-bold mb-0"></strong>
                <span class="h5 font-weight-normal mb-0">Hours</span>
              </div>
              <div class="col-3">
                <strong class="js-cd-minutes h3 text-primary font-weight-bold mb-0"></strong>
                <span class="h5 font-weight-normal mb-0">Mins</span>
              </div>
              <div class="col-3">
                <strong class="js-cd-seconds h3 text-primary font-weight-bold mb-0"></strong>
                <span class="h5 font-weight-normal mb-0">Secs</span>
              </div>
            </div>
            <!-- End Countdown -->

            <a href="<?= $this->config->item('wallet_login_page') ?>" class="btn u-btn-primary--air u-btn-wide transition-3d-hover">Login</a>
            -Or- 
            <a href="<?= $this->config->item('wallet_register_page') ?>" class="btn btn-primary u-btn-wide transition-3d-hover">Join for free</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->
  </main>
  <!-- ========== END MAIN ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="position-absolute-bottom-0--lg">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center u-space-1">
        <!-- Copyright -->
        <p class="small text-muted mb-0">&copy; Xannia. <?= date('Y') ?>. All rights reserved.</p>
        <!-- End Copyright -->

        <!-- Social Networks -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="u-bg-transparent u-icon u-icon-secondary--air" href="#">
              <span class="fab fa-facebook-f u-icon__inner"></span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="u-bg-transparent u-icon u-icon-secondary--air" href="#">
              <span class="fab fa-google u-icon__inner"></span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="u-bg-transparent u-icon u-icon-secondary--air" href="#">
              <span class="fab fa-twitter u-icon__inner"></span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="u-bg-transparent u-icon u-icon-secondary--air" href="#">
              <span class="fab fa-github u-icon__inner"></span>
            </a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- JS Global Compulsory -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="/assets/vendor/jquery.countdown.min.js"></script>

  <!-- JS Xannia -->
  <script src="/assets/js/hs.core.js"></script>
  <script src="/assets/js/components/hs.validation.js"></script>
  <script src="/assets/js/helpers/hs.focus-state.js"></script>
  <script src="/assets/js/components/hs.countdown.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate');

      // initialization of forms
      $.HSCore.helpers.HSFocusState.init();

      // initialization of countdowns
      var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
        yearsElSelector: '.js-cd-years',
        daysElSelector: '.js-cd-days',
        hoursElSelector: '.js-cd-hours',
        minutesElSelector: '.js-cd-minutes',
        secondsElSelector: '.js-cd-seconds'
      });
    });
  </script>
</body>
</html>