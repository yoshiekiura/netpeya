  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  <footer>
    <!-- Lists -->
    <div class="container u-space-2">
      <div class="row justify-content-md-between">
        <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0">
          <h3 class="h6">
            <strong>About</strong>
          </h3>

          <!-- List -->
          <ul class="list-unstyled mb-0">
            <li><a class="u-list__link" href="../pages/about-agency.html">Agency</a></li>
            <li><a class="u-list__link" href="../pages/about-start-up.html">Start-Up</a></li>
            <li><a class="u-list__link" href="#">Business</a></li>
          </ul>
          <!-- End List -->
        </div>

        <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0">
          <h3 class="h6">
            <strong>Services</strong>
          </h3>

          <!-- List -->
          <ul class="list-unstyled mb-0">
            <li><a class="u-list__link" href="../pages/services-agency.html">Agency</a></li>
            <li><a class="u-list__link" href="../pages/services-start-up.html">Start-Up</a></li>
            <li><a class="u-list__link" href="#">Business</a></li>
          </ul>
          <!-- End List -->
        </div>

        <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0">
          <h3 class="h6">
            <strong>Account</strong>
          </h3>

          <!-- List -->
          <ul class="list-unstyled mb-0">
            <li><a class="u-list__link" href="#">Profile</a></li>
            <li><a class="u-list__link" href="#">User Contacts</a></li>
            <li><a class="u-list__link" href="#">Projects</a></li>
          </ul>
          <!-- End List -->
        </div>

        <div class="col-md-6 col-lg-4">
          <h3 class="h6 mb-4">
            <strong>We are driven to deliver results for all your businesses.</strong>
          </h3>

          <!-- Button -->
          <button type="button" class="btn btn-xs btn-dark u-btn-dark u-btn-wide transition-3d-hover text-left mb-2">
            <span class="media align-items-center">
              <span class="d-flex mr-3">
                <span class="fab fa-apple font-size-26"></span>
              </span>
              <span class="media-body">
                <span class="d-block">Download on the</span>
                <strong class="font-size-14">App Store</strong>
              </span>
            </span>
          </button>
          <!-- End Button -->

          <!-- Button -->
          <button type="button" class="btn btn-xs btn-dark u-btn-dark u-btn-wide transition-3d-hover text-left mb-2">
            <span class="media align-items-center">
              <span class="d-flex mr-3">
                <span class="fab fa-google-play font-size-26"></span>
              </span>
              <span class="media-body">
                <span class="d-block">Get it on</span>
                <strong class="font-size-14">Google Play</strong>
              </span>
            </span>
          </button>
          <!-- End Button -->
        </div>
      </div>
    </div>
    <!-- End Lists -->

    <hr>

    <!-- Copyright -->
    <div class="container text-center u-space-1">
      <!-- Logo -->
      <a class="d-inline-block mb-2" href="index.html" aria-label="Xannia">
        <img src="/assets/svg/logos/logo.svg" alt="Logo" style="width: 120px;">
      </a>
      <!-- End Logo -->

      <p class="small text-muted">&copy; Xannia. <?= date('Y') ?>. All rights reserved.</p>
    </div>
    <!-- End Copyright -->
  </footer>
  <!-- ========== END FOOTER ========== -->
  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Account Sidebar Navigation -->
  <aside id="sidebarContent" class="u-sidebar u-unfold--css-animation u-unfold--hidden" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
      <div class="u-sidebar__container">
        <div class="u-header-sidebar__footer-offset">
          <!-- Toggle Button -->
          <div class="d-flex align-items-center pt-4 px-7">
            <button type="button" class="close ml-auto"
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
              <span aria-hidden="true">&times;</span            </button>>

          </div>
          <!-- End Toggle Button -->

          <!-- Content -->
          <div class="js-scrollbar u-sidebar__body">
            <div class="u-sidebar__content u-header-sidebar__content">
              <div>
                <!-- Signup -->
                <form id="wallet_signup_form" class="js-validate" style="display: none; opacity: 0;" data-target-group="idForm">
                  <!-- Title -->
                  <header class="text-center mb-7">
                    <h2 class="h4 mb-0">Welcome to Xannia.</h2>
                    <p>Fill out the form to get started.</p>
                  </header>
                  <!-- End Title -->

                  <!-- Input -->
                  <div class="js-form-message mb-4">
                    <div class="js-focus-state input-group u-form">
                      <div class="input-group-prepend u-form__prepend">
                        <span class="input-group-text u-form__text">
                          <span class="fa fa-user u-form__text-inner"></span>
                        </span>
                      </div>
                      <input type="email" class="form-control u-form__input" name="email" required
                             placeholder="Email"
                             aria-label="Email"
                             data-msg="Please enter a valid email address."
                             data-error-class="u-has-error"
                             data-success-class="u-has-success">
                    </div>
                  </div>
                  <!-- End Input -->

                  <!-- Input -->
                  <div class="js-form-message mb-4">
                    <div class="js-focus-state input-group u-form">
                      <div class="input-group-prepend u-form__prepend">
                        <span class="input-group-text u-form__text">
                          <span class="fa fa-lock u-form__text-inner"></span>
                        </span>
                      </div>
                      <input type="password" class="form-control u-form__input" name="password" required
                             placeholder="Password"
                             aria-label="Password"
                             data-msg="Your password is invalid. Please try again."
                             data-error-class="u-has-error"
                             data-success-class="u-has-success">
                    </div>
                  </div>
                  <!-- End Input -->

                  <!-- Input -->
                  <div class="js-form-message mb-4">
                    <div class="js-focus-state input-group u-form">
                      <div class="input-group-prepend u-form__prepend">
                        <span class="input-group-text u-form__text">
                          <span class="fa fa-key u-form__text-inner"></span>
                        </span>
                      </div>
                      <input type="password" class="form-control u-form__input" name="confirmPassword" required
                             placeholder="Confirm Password"
                             aria-label="Confirm Password"
                             data-msg="Password does not match the confirm password."
                             data-error-class="u-has-error"
                             data-success-class="u-has-success">
                    </div>
                  </div>
                  <!-- End Input -->

                  <div class="mb-2">
                    <button type="submit" class="btn btn-block btn-primary u-btn-primary transition-3d-hover">Get Started</button>
                  </div>

                  <div class="text-center mb-4">
                    <span class="small text-muted">Already have an account?</span>
                    <a class="js-animation-link small" href="javascript:;"
                       data-target="#wallet_login_form"
                       data-link-group="idForm"
                       data-animation-in="slideInUp">Login
                    </a>
                  </div>

                  <div class="text-center">
                    <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                  </div>

                  <!-- Login Buttons -->
                  <div class="d-flex">
                    <a class="btn btn-block btn-sm u-btn-facebook--air transition-3d-hover mr-1" href="#">
                      <span class="fab fa-facebook-square mr-1"></span>
                      Facebook
                    </a>
                    <a class="btn btn-block btn-sm u-btn-google--air transition-3d-hover ml-1 mt-0" href="#">
                      <span class="fab fa-google mr-1"></span>
                      Google
                    </a>
                  </div>
                  <!-- End Login Buttons -->
                </form>
                <!-- End Signup -->
                <!-- Login -->
                <form id="wallet_login_form" action="http://local.wallet.netpeya.com/login" method="post" class="js-validate" data-target-group="idForm">
                  <!-- Title -->
                  <header class="text-center mb-7">
                    <h2 class="h4 mb-0">Welcome Back!</h2>
                    <p>Login to manage your account.</p>
                  </header>
                  <!-- End Title -->

                  <!-- Input -->
                  <div class="js-form-message mb-4">
                    <div class="js-focus-state input-group u-form">
                      <div class="input-group-prepend u-form__prepend">
                        <span class="input-group-text u-form__text">
                          <span class="fa fa-user u-form__text-inner"></span>
                        </span>
                      </div>
                      <input type="email" class="form-control u-form__input" name="email" required
                             placeholder="Email"
                             aria-label="Email"
                             data-msg="Please enter a valid email address."
                             data-error-class="u-has-error"
                             data-success-class="u-has-success">
                    </div>
                  </div>
                  <!-- End Input -->

                  <!-- Input -->
                  <div class="js-form-message mb-2">
                    <div class="js-focus-state input-group u-form">
                      <div class="input-group-prepend u-form__prepend">
                        <span class="input-group-text u-form__text">
                          <span class="fa fa-lock u-form__text-inner"></span>
                        </span>
                      </div>
                      <input type="password" class="form-control u-form__input" name="password" required
                             placeholder="Password"
                             aria-label="Password"
                             data-msg="Your password is invalid. Please try again."
                             data-error-class="u-has-error"
                             data-success-class="u-has-success">
                    </div>
                  </div>
                  <!-- End Input -->

                  <div class="clearfix mb-4">
                    <a class="js-animation-link float-right small u-link-muted" href="javascript:;"
                       data-target="#forgotPassword"
                       data-link-group="idForm"
                       data-animation-in="slideInUp">Forgot Password?</a>
                  </div>

                  <div class="mb-2">
                    <button id="wallet_login_btn" type="submit" class="btn btn-block btn-success u-btn-success transition-3d-hover">Login</button>
                  </div>

                  <div class="text-center mb-4">
                    <span class="small text-muted">Do not have an account?</span>
                    <a class="js-animation-link small" href="javascript:;"
                       data-target="#wallet_signup_form"
                       data-link-group="idForm"
                       data-animation-in="slideInUp">Signup
                    </a>
                  </div>

                  <div class="text-center">
                    <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                  </div>

                  <!-- Login Buttons -->
                  <div class="d-flex">
                    <a class="btn btn-block btn-sm u-btn-facebook--air transition-3d-hover mr-1" href="#">
                      <span class="fab fa-facebook-square mr-1"></span>
                      Facebook
                    </a>
                    <a class="btn btn-block btn-sm u-btn-google--air transition-3d-hover ml-1 mt-0" href="#">
                      <span class="fab fa-google mr-1"></span>
                      Google
                    </a>
                  </div>
                  <!-- End Login Buttons -->
                </form>


                <!-- Forgot Password -->
                <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
                  <!-- Title -->
                  <header class="text-center mb-7">
                    <h2 class="h4 mb-0">Recover Password.</h2>
                    <p>Enter your email address and an email with instructions will be sent to you.</p>
                  </header>
                  <!-- End Title -->

                  <!-- Input -->
                  <div class="js-form-message mb-4">
                    <div class="js-focus-state input-group u-form">
                      <div class="input-group-prepend u-form__prepend">
                        <span class="input-group-text u-form__text">
                          <span class="fas fa-envelope u-inner-form__text"></span>
                        </span>
                      </div>
                      <input type="email" class="form-control u-form__input" name="email" required
                             placeholder="Your email"
                             aria-label="Your email"
                             data-msg="Please enter a valid email address."
                             data-error-class="u-has-error"
                             data-success-class="u-has-success">
                    </div>
                  </div>
                  <!-- End Input -->

                  <div class="mb-2">
                    <button type="submit" class="btn btn-block btn-primary u-btn-primary transition-3d-hover">Recover Password</button>
                  </div>

                  <div class="text-center mb-4">
                    <span class="small text-muted">Remember your password?</span>
                    <a class="js-animation-link small" href="javascript:;"
                       data-target="#login"
                       data-link-group="idForm"
                       data-animation-in="slideInUp">Login
                    </a>
                  </div>
                </div>
                <!-- End Forgot Password -->
              </div>
            </div>
          </div>
          <!-- End Content -->
        </div>

        <!-- Footer -->
        <footer class="u-sidebar__footer u-sidebar__footer--account">
          <ul class="list-inline mb-0">
            <li class="list-inline-item pr-3">
              <a class="u-sidebar__footer--account__text" href="privacy.html">Privacy</a>
            </li>
            <li class="list-inline-item pr-3">
              <a class="u-sidebar__footer--account__text" href="terms.html">Terms</a>
            </li>
            <li class="list-inline-item">
              <a class="u-sidebar__footer--account__text" href="help.html">
                <i class="fa fa-info-circle"></i>
              </a>
            </li>
          </ul>

          <!-- SVG Background Shape -->
          <div class="position-absolute-bottom-0">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 300 126.5" style="margin-bottom: -5px; enable-background:new 0 0 300 126.5;" xml:space="preserve">
              <path fill="#00c9a7" opacity=".6" d="M0,58.9c0-0.9,5.1-2,5.8-2.2c6-0.8,11.8,2.2,17.2,4.6c4.5,2.1,8.6,5.3,13.3,7.1C48.2,73.3,61,73.8,73,69
                c43-16.9,40-7.9,84-2.2c44,5.7,83-31.5,143-10.1v69.8H0C0,126.5,0,59,0,58.9z"/>
              <path fill="#00c9a7" d="M300,68.5v58H0v-58c0,0,43-16.7,82,5.6c12.4,7.1,26.5,9.6,40.2,5.9c7.5-2.1,14.5-6.1,20.9-11
                c6.2-4.7,12-10.4,18.8-13.8c7.3-3.8,15.6-5.2,23.6-5.2c16.1,0.1,30.7,8.2,45,16.1c13.4,7.4,28.1,12.2,43.3,11.2
                C282.5,76.7,292.7,74.4,300,68.5z"/>
              <circle class="u-fill-danger" cx="259.5" cy="17" r="13"/>
              <circle class="u-fill-primary" cx="290" cy="35.5" r="8.5"/>
              <circle class="u-fill-success" cx="288" cy="5.5" r="5.5"/>
              <circle class="u-fill-warning" cx="232.5" cy="34" r="2"/>
            </svg>
          </div>
          <!-- End SVG Background Shape -->
        </footer>
        <!-- End Footer -->
      </div>
    </div>
  </aside>
  <!-- End Account Sidebar Navigation -->
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- Go to Top -->
  <a class="js-go-to u-go-to" href="#"
    data-position='{"bottom": 15, "right": 15 }'
    data-type="fixed"
    data-offset-top="400"
    data-compensation="#header"
    data-show-effect="slideInUp"
    data-hide-effect="slideOutDown">
    <span class="fa fa-arrow-up u-go-to__inner"></span>
  </a>
  <!-- End Go to Top -->

  <!-- JS Global Compulsory -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
  <script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
  <script src="/assets/vendor/typed.js/lib/typed.min.js"></script>
  <script src="/assets/vendor/slick-carousel/slick/slick.js"></script>

  <!-- JS Xannia -->
  <script src="/assets/js/hs.core.js"></script>
  <script src="/assets/js/components/hs.header.js"></script>
  <script src="/assets/js/components/hs.unfold.js"></script>
  <script src="/assets/js/helpers/hs.focus-state.js"></script>
  <script src="/assets/js/components/hs.malihu-scrollbar.js"></script>
  <script src="/assets/js/components/hs.validation.js"></script>
  <script src="/assets/js/components/hs.fancybox.js"></script>
  <script src="/assets/js/components/hs.slick-carousel.js"></script>
  <script src="/assets/js/components/hs.show-animation.js"></script>
  <script src="/assets/js/components/hs.go-to.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(window).on('load', function () {
      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767,
        hideTimeOut: 0
      });
    });

    $(document).on('ready', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#header'));

      // initialization of unfold component
      $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
        afterOpen: function () {
          $(this).find('input[type="search"]').focus();
        }
      });

      // initialization of malihu scrollbar
      $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

      // initialization of forms
      $.HSCore.helpers.HSFocusState.init();

      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate', {
        rules: {
          confirm_password: {
            equalTo: '#password'
          }
        }
      });

      // initialization of show animations
      $.HSCore.components.HSShowAnimation.init('.js-animation-link');

      // initialization of fancybox
      $.HSCore.components.HSFancyBox.init('.js-fancybox');

      // initialization of text animation (typing)
      if($('.u-text-animation.u-text-animation--typing').length > 0) {
        var typed = new Typed(".u-text-animation.u-text-animation--typing", {
          strings: ["more professional.", "perfect in every way.", "astonishing."],
          typeSpeed: 60,
          loop: true,
          backSpeed: 25,
          backDelay: 1500
        });
      }

      // initialization of slick carousel
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });
  </script>
</body>
</html>