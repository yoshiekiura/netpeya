<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
?>
    <!-- Hero Section -->
    <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll"
         data-options='{direction: "normal"}'>
      <!-- Apply your Parallax background image here -->
      <div class="divimage dzsparallaxer--target u-bg-overlay-v3" style="height: 120%; background-image: url(/assets/img/pages/about/header.jpg);"></div>

      <div class="d-flex align-items-center min-height-100vh--lg">
        <!-- Content -->
        <div class="container position-relative u-space-5-top u-space-4-bottom z-index-2">
          <div class="w-lg-80 text-center mx-auto">
            <h1 class="display-3 font-size-48--md-down text-white font-weight-bold mb-0">Your business needs a little push.</h1>
          </div>
        </div>
        <!-- End Content -->

        <!-- Clients Section -->
        <div class="container position-absolute-bottom-0 z-index-2 mb-3">
          <div class="u-gradient-half-primary-v1 u-space-1 rounded-pill">
            <!-- Clients Carousel -->
            <div class="js-slick-carousel u-slick"
                 data-infinite="true"
                 data-slides-show="7"
                 data-responsive='[{
                   "breakpoint": 1200,
                   "settings": {
                     "slidesToShow": 6
                   }
                 }, {
                   "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 5
                   }
                 }, {
                   "breakpoint": 768,
                   "settings": {
                     "slidesToShow": 4
                   }
                 }, {
                   "breakpoint": 576,
                   "settings": {
                     "slidesToShow": 4
                   }
                 }, {
                   "breakpoint": 480,
                   "settings": {
                     "slidesToShow": 3
                   }
                 }, {
                   "breakpoint": 380,
                   "settings": {
                     "slidesToShow": 2
                   }
                 }]'>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/lenovo-white.svg" alt="Image Description">
              </div>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/stripe-white.svg" alt="Image Description">
              </div>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/paypal-white.svg" alt="Image Description">
              </div>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/spotify-white.svg" alt="Image Description">
              </div>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/slack-white.svg" alt="Image Description">
              </div>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/shopify-white.svg" alt="Image Description">
              </div>
              <div class="js-slide">
                <img class="u-clients" src="/assets/svg/clients-logo/google-white.svg" alt="Image Description">
              </div>
            </div>
            <!-- End Clients Carousel -->
          </div>
        </div>
        <!-- End Clients Section -->
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Video Section -->
    <div class="container u-space-3-top">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 text-center mx-auto mb-9">
        <span class="u-label u-label--sm u-label--success mb-2">What We Do?</span>
        <h2 class="text-primary"><strong class="font-weight-bold">Enjoyable</strong> usage</h2>
        <p>Experience a level of our quality in both design &amp; customization works.</p>
      </div>
      <!-- End Title -->

      <div class="row justify-content-sm-center">
        <div class="col-lg-9 col-xl-8">
          <!-- Video Block -->
          <div id="video" class="u-video-player">
            <!-- Cover Image -->
            <img class="img-fluid u-video-player__preview" src="/assets/img/pages/about/about_video_image.jpg" alt="Image">
            <!-- End Cover Image -->

            <!-- Play Button -->
            <a class="js-classes-toggle u-video-player__btn u-video-player__centered" href="javascript:;"
               data-target="#video"
               data-classes="u-video-player__played">
              <span class="u-video-player__icon u-video-player__icon--lg text-primary">
                <span class="fa fa-play u-video-player__icon-inner"></span>
              </span>
            </a>
            <!-- End Play Button -->

            <!-- Video Iframe -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe id="youTubeVideo" class="embed-responsive-item"
                      data-src="//www.youtube.com/embed/0qisGSwZym4?autoplay=1&showinfo=0&rel=0">
              </iframe>
            </div>
            <!-- End Video Iframe -->
          </div>
          <!-- End Video Block -->
        </div>
      </div>
    </div>
    <!-- End Video Section -->

    <!-- Icon Blocks Section -->
    <div class="container u-space-3">
      <div class="row">
        <div class="col-lg-6 mb-7 mb-lg-0">
          <div class="media d-block d-sm-flex pr-md-4">
            <!-- SVG Icon -->
            <figure class="w-40 mr-4 mb-4 mb-sm-0">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 204.1 102.4" style="enable-background:new 0 0 204.1 102.4;" xml:space="preserve">
                <g id="XMLID_415_1">
                  <g id="XMLID_391_1">
                    <path id="XMLID_394_1" class="u-fill-white" d="M162.3,45.3c0-1.9-1.6-3.5-3.5-3.5l-35.3,0.2c-2.5,0-4.5,2.3-4.5,5.1v54.6l43.4-0.2
                      L162.3,45.3z"/>
                    <path id="XMLID_393_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M162.3,101.4l0-56.2c0-1.9-1.6-3.5-3.5-3.5l-35.3,0.2"/>
                    <line id="XMLID_199_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="118.9" y1="49.1" x2="118.9" y2="61.9"/>
                    <path id="XMLID_387_1" class="u-fill-primary-lighter" opacity=".2" d="M130.1,60.1c3.7-3.7,9.6-3.7,13.3,0c3.7,3.7,3.7,9.6,0,13.3c-3.7,3.7-9.6,3.7-13.3,0
                      C126.4,69.7,126.4,63.7,130.1,60.1z"/>
                    <g id="XMLID_358_1">
                      <g id="XMLID_411_1">
                        <circle id="XMLID_413_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="1.9681,1.9681" cx="141.2" cy="71.2" r="9.4"/>
                      </g>
                    </g>
                    <path id="XMLID_213_1" class="u-fill-primary" opacity=".6" d="M117.4,41.7h41.2c0,0-3.7,0.2-3.7,3.7c0,0.5,0,2.2,0,2.2h-41.2v-2.2
                      C113.7,43.4,115.3,41.7,117.4,41.7z"/>
                    <path id="XMLID_390_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M117.4,41.7h41.2c0,0-3.7,0.2-3.7,3.7c0,0.5,0,2.2,0,2.2h-41.2v-2.2
                      C113.7,43.4,115.3,41.7,117.4,41.7z"/>
                  </g>
                  <g id="XMLID_210_1">
                    <path id="XMLID_253_1" class="u-fill-primary-lighter" opacity=".2" d="M33.7,35H23.6c-0.8,0-1.4,0.6-1.4,1.4v63.8c0,0.8,0.6,1.4,1.4,1.4h10.1
                      c0.8,0,1.4-0.6,1.4-1.4V36.4C35.1,35.6,34.5,35,33.7,35z"/>
                    <path id="XMLID_163_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M35.1,42.2v-5.8c0-0.8-0.6-1.4-1.4-1.4H23.6c-0.8,0-1.4,0.6-1.4,1.4v63.8
                      c0,0.8,0.6,1.4,1.4,1.4"/>
                    <line id="XMLID_247_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="95.1" x2="30.1" y2="95.1"/>
                    <line id="XMLID_246_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="89.5" x2="26.2" y2="89.5"/>
                    <line id="XMLID_245_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="84" x2="26.2" y2="84"/>
                    <line id="XMLID_254_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="78.5" x2="26.2" y2="78.5"/>
                    <line id="XMLID_244_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="72.9" x2="30.1" y2="72.9"/>
                    <line id="XMLID_243_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="67.4" x2="26.2" y2="67.4"/>
                    <line id="XMLID_239_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="61.9" x2="26.2" y2="61.9"/>
                    <line id="XMLID_238_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.2" y1="56.4" x2="26.2" y2="56.4"/>
                    <line id="XMLID_193_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.4" y1="50.8" x2="30.1" y2="50.8"/>
                    <line id="XMLID_383_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.6" y1="45.3" x2="26.5" y2="45.3"/>
                    <line id="XMLID_386_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="22.8" y1="39.8" x2="26.7" y2="39.8"/>
                  </g>
                  <g id="XMLID_116_1">
                    <path id="XMLID_751_1" class="u-fill-white" d="M81.9,101.6V46.8c0-1.7-1.3-3-3-3H34.7c-1.7,0-3,1.3-3,3v54.8L81.9,101.6z"/>
                    <path id="XMLID_739_1" class="u-fill-primary-lighter" opacity=".2" d="M31.7,51.6v-5.2c0-1.4,1.1-2.5,2.5-2.5h45.2c1.4,0,2.5,1.1,2.5,2.5v5.2H31.7z"/>
                    <line id="XMLID_735_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="31.7" y1="51.7" x2="81.9" y2="51.7"/>
                    <line id="XMLID_734_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="37.4" y1="48.1" x2="39.4" y2="48.1"/>
                    <line id="XMLID_727_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="42.1" y1="48.1" x2="44.1" y2="48.1"/>
                    <line id="XMLID_726_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="46.7" y1="48.1" x2="48.7" y2="48.1"/>
                    <rect id="XMLID_725_1" x="38.4" y="57.5" class="u-fill-primary-lighter" opacity=".2" width="36.8" height="14.5"/>
                    <rect id="XMLID_724_1" x="38.4" y="81.2" class="u-fill-primary-lighter" opacity=".2" width="11.2" height="14.5"/>
                    <rect id="XMLID_723_1" x="53.6" y="81.2" class="u-fill-primary-lighter" opacity=".2" width="11.2" height="14.5"/>
                    <path id="XMLID_164_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M81.9,66.2V46.8c0-1.7-1.3-3-3-3H34.7c-1.7,0-3,1.3-3,3v54.8"/>
                  </g>
                  <g id="XMLID_184_1">
                    <line id="XMLID_186_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="70.9" y1="8.4" x2="75.2" y2="8.4"/>
                    <line id="XMLID_185_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="73.1" y1="10.5" x2="73.1" y2="6.3"/>
                  </g>
                  <g id="XMLID_252_1">
                    <line id="XMLID_389_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="173.3" y1="43.3" x2="177.6" y2="43.3"/>
                    <line id="XMLID_388_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="175.5" y1="45.4" x2="175.5" y2="41.2"/>
                  </g>
                  <g id="XMLID_212_1">
                    <line id="XMLID_236_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="154.2" y1="15.5" x2="157.2" y2="12.5"/>
                    <line id="XMLID_235_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="157.2" y1="15.5" x2="154.2" y2="12.5"/>
                  </g>
                  <g id="XMLID_248_1">
                    <line id="XMLID_251_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="6.2" y1="49.8" x2="9.2" y2="46.8"/>
                    <line id="XMLID_250_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="9.2" y1="49.8" x2="6.2" y2="46.8"/>
                  </g>
                  <line id="XMLID_135_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="43.2" y1="8.4" x2="60.6" y2="8.4"/>
                  <line id="XMLID_403_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="176.5" y1="51.7" x2="204.1" y2="51.7"/>
                  <line id="XMLID_201_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="118.3" y1="14" x2="150.6" y2="14"/>
                  <line id="XMLID_414_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="0" y1="24.6" x2="51.3" y2="24.6"/>
                  <line id="XMLID_105_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="65.6" y1="8.4" x2="62.1" y2="8.4"/>
                  <path id="XMLID_143_1" class="u-fill-primary" d="M17.5,74.1c0,1-0.8,1.9-1.9,1.9c-1,0-1.9-0.8-1.9-1.9c0-1,0.8-1.9,1.9-1.9
                    C16.7,72.2,17.5,73,17.5,74.1z"/>
                  <path id="XMLID_404_1" class="u-fill-primary" d="M60.2,34.2c0,0.6-0.5,1-1,1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1C59.7,33.1,60.2,33.6,60.2,34.2z
                    "/>
                  <path id="XMLID_410_1" class="u-fill-primary" d="M158.3,2.6c0,0.6-0.5,1-1,1c-0.6,0-1-0.5-1-1s0.5-1,1-1C157.8,1.5,158.3,2,158.3,2.6z"/>
                  <path id="XMLID_407_1" class="u-fill-primary" d="M134.2,31.6c0,0.8-0.6,1.4-1.4,1.4c-0.8,0-1.4-0.6-1.4-1.4c0-0.8,0.6-1.4,1.4-1.4
                    C133.6,30.2,134.2,30.8,134.2,31.6z"/>
                  <path id="XMLID_408_1" class="u-fill-primary" d="M28.2,5c0,0.8-0.6,1.4-1.4,1.4c-0.8,0-1.4-0.6-1.4-1.4c0-0.8,0.6-1.4,1.4-1.4
                    C27.5,3.6,28.2,4.2,28.2,5z"/>
                  <path id="XMLID_406_1" class="u-fill-primary" d="M180.2,59.2c0,0.6-0.5,1-1,1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1
                    C179.7,58.2,180.2,58.6,180.2,59.2z"/>
                  <path id="XMLID_240_1" class="u-fill-primary" opacity=".3" d="M140,101.5c3.7-1.3,6.4-4.8,6.8-9.4c0.1-1,0-2-0.3-3c1.6-1.8,2.7-4.2,2.9-6.9
                    c0.2-2.5-0.6-5-2.4-6.9c-1.9-2-4.6-3.3-7.4-3.4c-1-1.7-2.8-2.8-4.8-2.8c-0.6,0-1.2,0.1-1.8,0.3c-0.5-0.8-1.1-1.6-1.7-2.3
                    c-2.1-2.1-4.8-3.2-7.8-3.2c-1.6,0-3.2,0.4-4.6,1v36.4h16.4c0.2,0,0.5,0,0.7,0c0.2,0,0.5,0,0.7,0h0v0.2L140,101.5z"/>
                  <path id="XMLID_237_1" class="u-fill-primary" opacity=".3" d="M81.9,80.1c-0.1,0-0.2-0.1-0.2-0.1c0.1-0.2,0.2-0.4,0.2-0.7v-7.9c-1.6-4.7-6.1-8-11.3-8
                    c-5.4,0-10,3.6-11.5,8.6c-1.1-0.2-2.2,0-3.2,0.5l0.4,0.7c-0.7,0.4-1.3,1-1.8,1.7c-0.1,0-0.3,0-0.4,0c-4,0-7.3,3.3-7.3,7.3
                    c0,0.9,0.2,1.7,0.4,2.5c-2.6,1.8-4.1,4.7-4.1,7.9c0,4.3,2.8,7.9,6.7,9.2h2.9v-0.3c1.4,0,2.7-0.3,3.9-0.9c1,0.6,2.2,0.9,3.5,0.9
                    h21.8V80.1z"/>
                  <g id="XMLID_15_1">
                    <path id="XMLID_162_1" class="u-fill-white" d="M156.2,101.4H38.8c-4.7,0,1.9-2.3,1.9-6.4l0,0c0-4.1,7.3-8.4,12-8.4h95.9
                      c4.7,0,8.5,3.3,8.5,7.4l0,0C157.2,98,158.3,101.4,156.2,101.4z"/>

                      <ellipse id="XMLID_161_1" transform="matrix(0.6971 -0.7169 0.7169 0.6971 -32.0582 74.8558)" class="u-fill-white" cx="72.6" cy="75.4" rx="11.3" ry="11.3"/>
                    <path id="XMLID_158_1" class="u-fill-white" d="M64.8,77.1c0,2.5-2,4.5-4.5,4.5c-2.5,0-4.5-2-4.5-4.5c0-2.5,2-4.5,4.5-4.5
                      C62.8,72.6,64.8,74.6,64.8,77.1z"/>
                    <path id="XMLID_157_1" class="u-fill-white" d="M62.6,82.1c0,3.6-2.9,6.6-6.6,6.6c-3.6,0-6.6-2.9-6.6-6.6c0-3.6,2.9-6.6,6.6-6.6
                      C59.6,75.6,62.6,78.5,62.6,82.1z"/>
                    <path id="XMLID_416_1" class="u-fill-white" d="M50.3,94.6c0,3.7-3,6.7-6.7,6.7c-3.7,0-6.7-3-6.7-6.7c0-3.7,3-6.7,6.7-6.7
                      C47.3,87.9,50.3,90.9,50.3,94.6z"/>
                    <path id="XMLID_417_1" class="u-fill-white" d="M43.2,95.9c0,3-2.5,5.5-5.5,5.5c-3,0-5.5-2.5-5.5-5.5c0-3,2.5-5.5,5.5-5.5
                      C40.8,90.4,43.2,92.9,43.2,95.9z"/>
                    <path id="XMLID_156_1" class="u-fill-white" d="M63.5,92.5c0,4.9-4,8.9-8.9,8.9c-4.9,0-8.9-4-8.9-8.9c0-4.9,4-8.9,8.9-8.9
                      C59.6,83.6,63.5,87.6,63.5,92.5z"/>
                    <path id="XMLID_419_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M45.8,92.5c0-3,1.5-5.7,3.8-7.3"/>
                    <path id="XMLID_151_1" class="u-fill-white" d="M86.3,84.3c0,2.1-1.7,3.7-3.7,3.7c-2.1,0-3.7-1.7-3.7-3.7c0-2.1,1.7-3.7,3.7-3.7
                      C84.7,80.6,86.3,82.3,86.3,84.3z"/>
                    <circle id="XMLID_150_1" class="u-fill-white" cx="121.5" cy="74.9" r="10.2"/>
                    <path id="XMLID_435_1" class="u-fill-white" d="M133.5,80.6c-0.3,3.6-2.9,6.6-6.6,6.6c-3.6,0-6.6-2.9-6.6-6.6c0-3.6,2.9-6.6,6.6-6.6
                      C130.6,74.1,133.8,77,133.5,80.6z"/>
                    <path id="XMLID_148_1" class="u-fill-white" d="M126.9,85.1c-0.3,3.6-2.9,6.6-6.6,6.6c-3.6,0-6.6-2.9-6.6-6.6c0-3.6,2.9-6.6,6.6-6.6
                      C124,78.6,127.3,81.5,126.9,85.1z"/>
                    <path id="XMLID_144_1" class="u-fill-white" d="M81.9,85.2c-0.6,3.6-5.6,6.6-12.5,6.6c-6.9,0-12.5-2.9-12.5-6.6c0-3.6,5.6-6.6,12.5-6.6
                      C76.3,78.7,82.5,81.6,81.9,85.2z"/>
                    <path id="XMLID_142_1" class="u-fill-white" d="M146.6,82.2c-0.5,5.3-4.3,9.6-9.6,9.6s-9.6-4.3-9.6-9.6c0-5.3,4.3-9.6,9.6-9.6
                      S147.1,76.9,146.6,82.2z"/>
                    <path id="XMLID_418_1" class="u-fill-white" d="M156.5,92.7c-0.4,4.8-3.9,8.6-8.6,8.6c-4.8,0-8.6-3.9-8.6-8.6s3.9-8.6,8.6-8.6
                      C152.6,84.1,156.9,88,156.5,92.7z"/>
                    <path id="XMLID_421_1" class="u-fill-white" d="M162.5,95.2c-0.3,3.4-2.8,6.2-6.2,6.2c-3.4,0-6.2-2.8-6.2-6.2c0-3.4,2.8-6.2,6.2-6.2
                      C159.7,89,162.8,91.8,162.5,95.2z"/>
                    <path id="XMLID_141_1" class="u-fill-white" d="M144,92.1c-0.5,5.1-4.1,9.2-9.2,9.2c-5.1,0-9.2-4.1-9.2-9.2c0-5.1,4.1-9.2,9.2-9.2
                      C139.8,82.9,144.4,87,144,92.1z"/>
                    <path id="XMLID_140_1" class="u-fill-white" d="M118.8,81.7c0,3.3-2.7,6-6,6c-3.3,0-6-2.7-6-6c0-3.3,2.7-6,6-6
                      C116.1,75.7,118.8,78.4,118.8,81.7z"/>
                    <path id="XMLID_139_1" class="u-fill-white" d="M111,87c0,1.9-1.6,3.5-3.5,3.5S104,88.9,104,87c0-1.9,1.6-3.5,3.5-3.5S111,85,111,87z"/>
                    <path id="XMLID_138_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M103.7,87.3c0-1.9,1.6-3.5,3.5-3.5"/>
                    <path id="XMLID_137_1" class="u-fill-white" d="M96.6,89.2c0,2.2-3.1,4.1-7,4.1c-3.9,0-7-1.8-7-4.1s3.1-4.1,7-4.1
                      C93.5,85.1,96.6,87,96.6,89.2z"/>
                    <path id="XMLID_434_1" class="u-fill-white" d="M137.2,72.9c0,2.6-4.4,9.5-4.4,6.4c0-2.6-4.7-2.1-4.7-4.7c0-2.6,2.1-4.7,4.7-4.7
                      C135.4,69.9,137.2,70.3,137.2,72.9z"/>
                    <path id="XMLID_136_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M130.9,70.2c0.6-0.3,1.2-0.4,1.9-0.4c1.9,0,3.6,1.1,4.3,2.8"/>
                    <path id="XMLID_133_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M114.2,82.1c-1.9-1.9-3-4.4-3-7.2s1.1-5.4,3-7.2c1.9-1.9,4.4-3,7.2-3c2.8,0,5.4,1.1,7.2,3
                      c1.9,1.9,3,4.4,3,7.2"/>
                    <path id="XMLID_440_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M112.8,87.7c-3.3,0-6-2.7-6-6c0-2.8,1.9-5.1,4.5-5.8"/>
                    <path id="XMLID_115_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M61.3,75.4c0-6.2,5-11.3,11.3-11.3c6.2,0,11.3,5,11.3,11.3c0,4.2-2.3,7.8-5.7,9.8"/>
                    <path id="XMLID_112_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M58.2,73.1c0.6-0.3,1.3-0.5,2.1-0.5c0.5,0,0.9,0.1,1.3,0.2"/>
                    <path id="XMLID_109_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M82.6,80.6c2.1,0,3.7,1.7,3.7,3.7c0,2.1-1.7,3.7-3.7,3.7"/>
                    <path id="XMLID_106_1" class="u-fill-white" d="M111,93H84.5l7.7-8.6V52.4h8.2L100,81.6c0,1.8,0.8,3.4,2.2,4.5L111,93z"/>
                    <path id="XMLID_514_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M100.2,52.4v30.4c0,1.8,1.4,3.2,3.2,3.2h0.9"/>
                    <path id="XMLID_512_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M86.3,85.2h2.9c1.6,0,2.9-1.3,2.9-2.9V52.4"/>
                    <path id="XMLID_104_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M88.5,99.1c0-0.6,0.1-1.2,0.3-1.8c0.2-0.6,0.6-1.1,1-1.5c0.4-0.5,1-0.8,1.6-1.1
                      c0.6-0.3,1.2-0.4,1.9-0.4c0.6,0,1.2,0.1,1.8,0.3c0.6,0.2,1.1,0.6,1.5,1"/>
                    <path id="XMLID_103_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M64.8,87.6c0-0.6,0.1-1.2,0.3-1.8c0.2-0.6,0.6-1.1,1-1.5c0.4-0.4,1-0.8,1.6-1.1
                      c0.6-0.3,1.2-0.4,1.9-0.4c0.6,0,1.2,0.1,1.8,0.3c0.6,0.2,1.1,0.6,1.5,1"/>
                    <path id="XMLID_102_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M118.8,78.7c0.6-0.2,1.2-0.4,1.8-0.4c0.6,0,1.2,0.1,1.8,0.3c0.6,0.2,1.1,0.6,1.6,1
                      c0.5,0.5,0.8,1,1.1,1.6c0.2,0.6,0.4,1.2,0.4,1.8c0,0.6-0.1,1.2-0.3,1.8"/>
                    <path id="XMLID_101_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M93.9,94.4c0.1-0.6,0.3-1.2,0.6-1.8c0.3-0.6,0.8-1,1.3-1.4c0.5-0.4,1.1-0.6,1.7-0.8
                      c0.6-0.2,1.2-0.2,1.8-0.1"/>
                    <path id="XMLID_98_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M125.5,95.4c0.1-0.6,0.3-1.2,0.6-1.8c0.3-0.6,0.8-1,1.3-1.4s1.1-0.6,1.7-0.8
                      c0.6-0.2,1.2-0.2,1.8-0.1"/>
                    <path id="XMLID_97_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M110,100.7c-0.6-0.2-1.2-0.5-1.6-0.9c-0.5-0.4-0.9-0.9-1.2-1.5c-0.3-0.6-0.4-1.2-0.5-1.8
                      c0-0.6,0-1.2,0.2-1.8"/>
                    <path id="XMLID_96_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M51.4,86.8c-1.2-1.2-1.9-2.8-1.9-4.6c0-3.6,2.9-6.6,6.6-6.6c1.6,0,3,0.6,4.2,1.5"/>
                    <path id="XMLID_95_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M134.7,72.9c0.7-0.2,1.5-0.3,2.3-0.3c5.3,0,10.1,4.3,9.6,9.6c-0.3,3.8-2.4,7.1-5.6,8.7"/>
                    <path id="XMLID_155_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M36.8,94.6c0-3.7,3-6.7,6.7-6.7c1.1,0,2.1,0.3,3,0.7"/>
                    <path id="XMLID_420_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M37.8,101.4c-3,0-5.5-2.5-5.5-5.5c0-3,3-5.5,6-5.5"/>
                    <path id="XMLID_423_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M146.1,84.3c0.6-0.1,1.2-0.2,1.8-0.2c4.8,0,9,3.9,8.6,8.6c-0.2,2.2-1,4.1-2.3,5.6"/>
                    <path id="XMLID_64_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M156.3,89c3.4,0,6.5,2.8,6.2,6.2c-0.3,3.4-2.8,6.2-6.2,6.2"/>
                  </g>
                  <g id="XMLID_166_1">
                    <path id="XMLID_192_1" class="u-fill-primary" opacity=".6" d="M97.4,53.6h-2.8c-0.5,0-1-0.5-1-1v-5.3c0-0.5,0.5-1,1-1h2.8c0.5,0,1,0.5,1,1v5.3
                      C98.4,53.1,97.9,53.6,97.4,53.6z"/>
                    <path id="XMLID_190_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M97.4,53.6h-2.8c-0.5,0-1-0.5-1-1v-5.3c0-0.5,0.5-1,1-1h2.8c0.5,0,1,0.5,1,1v5.3
                      C98.4,53.1,97.9,53.6,97.4,53.6z"/>
                    <path id="XMLID_183_1" class="u-fill-white" d="M112,16.7c0-8.8-7.1-15.9-15.9-15.9c-8.8,0-15.9,7.1-15.9,15.9c0,5.9,3.2,11,8,13.8v15.7
                      l2.3,4.3h10.9l2.7-4.3V30.5C108.8,27.7,112,22.6,112,16.7z"/>
                    <polygon id="XMLID_580_1" class="u-fill-primary-lighter" opacity=".2" points="88.2,30.5 88.2,46.1 90.5,50.4 101.4,50.4 104.1,46.1 104.1,30.5     "/>
                    <polygon id="XMLID_181_1" class="u-fill-primary" opacity=".6" points="104.1,46.1 101.4,50.4 90.5,50.4 88.2,46.1    "/>
                    <path id="XMLID_180_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M84,6.4c-2.3,2.8-3.7,6.3-3.7,10.3c0,5.9,3.2,11,8,13.8v15.7l2.3,4.3h10.9l2.7-4.3V30.5
                      c4.8-2.7,8-7.9,8-13.8c0-8.8-7.1-15.9-15.9-15.9c-2.1,0-4.1,0.4-6,1.2"/>
                    <path id="XMLID_179_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M88.2,2.9c-1.2,0.7-1.7,0.9-2.7,1.9"/>
                    <line id="XMLID_566_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="85.8" y1="35.3" x2="106.5" y2="35.3"/>
                    <line id="XMLID_178_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="85.8" y1="38.9" x2="106.5" y2="38.9"/>
                    <line id="XMLID_177_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="85.8" y1="42.5" x2="106.5" y2="42.5"/>
                    <line id="XMLID_176_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="85.8" y1="46.1" x2="106.5" y2="46.1"/>

                      <ellipse id="XMLID_175_1" transform="matrix(0.9925 -0.1225 0.1225 0.9925 -1.2608 11.8852)" class="u-fill-primary-lighter" opacity=".2" cx="96" cy="16.2" rx="11.2" ry="11.2"/>
                    <path id="XMLID_576_1" class="u-fill-primary" opacity=".6" d="M99.5,13.7c0-1.9-1.5-3.4-3.4-3.4c-1.9,0-3.4,1.5-3.4,3.4c0,0.9,0.4,1.8,1,2.4l-1,5.9h6.5
                      l-1-5.7C99,15.7,99.5,14.8,99.5,13.7z"/>
                    <path id="XMLID_174_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M99.5,13.7c0-1.9-1.5-3.4-3.4-3.4c-1.9,0-3.4,1.5-3.4,3.4c0,0.9,0.4,1.8,1,2.4l-1,5.9h6.5
                      l-1-5.7C99,15.7,99.5,14.8,99.5,13.7z"/>
                  </g>
                  <g id="XMLID_43_1">
                    <line id="XMLID_189_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="13.8" y1="101.6" x2="177.6" y2="101.6"/>
                    <line id="XMLID_188_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="9.2" y1="101.6" x2="11.9" y2="101.6"/>
                    <line id="XMLID_187_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="179.2" y1="101.6" x2="185.2" y2="101.6"/>
                  </g>
                  <g id="XMLID_395_1">
                    <path id="XMLID_405_1" class="u-fill-white" d="M166,101.6h3.4c0.3,0,0.5-0.2,0.5-0.5V52.6c0-0.1,0-0.1,0-0.2l-1.7-3.7
                      c-0.2-0.4-0.7-0.4-0.8,0l-1.7,3.7c0,0.1,0,0.1,0,0.2v48.6C165.5,101.4,165.7,101.6,166,101.6z"/>
                    <rect id="XMLID_402_1" x="165.5" y="54.1" class="u-fill-primary" opacity=".6" width="4.3" height="42.9"/>
                    <rect id="XMLID_401_1" x="165.5" y="54.1" class="u-fill-white" opacity=".6" width="2.2" height="42.9"/>
                    <path id="XMLID_400_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M165.5,101.6h4.3V52.5l-1.9-4.1c-0.1-0.2-0.4-0.2-0.5,0l-1.9,4.1V101.6z"/>
                    <line id="XMLID_399_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="170" y1="54.1" x2="165.5" y2="54.1"/>
                    <line id="XMLID_398_1" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="170.2" y1="97" x2="165.2" y2="97"/>
                  </g>
                </g>
              </svg>
            </figure>
            <!-- End SVG Icon -->

            <div class="media-body">
              <h3 class="h5">Xannia Strategy</h3>
              <p class="mb-1">We strive to figure out ways to help your audience grow.</p>
              <a class="font-size-14" href="#">Read More <span class="fa fa-angle-right align-middle ml-2"></span></a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="media d-block d-sm-flex pr-md-4">
            <!-- SVG Icon -->
            <figure class="w-40 mr-4 mb-4 mb-sm-0">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 190.5 97.7" style="enable-background:new 0 0 190.5 97.7;" xml:space="preserve">
                <g id="XMLID_144_">
                  <g id="XMLID_373_">
                    <g id="XMLID_374_">
                      <path id="XMLID_463_" class="u-fill-white" d="M156.6,94.1V20.5c0-2.2-1.6-4-3.6-4h-52.7c-2,0-3.6,1.8-3.6,4v73.6L156.6,94.1z"/>
                      <path id="XMLID_460_" class="u-fill-primary" opacity=".15" d="M96.8,25.7v-6.2c0-1.7,1.3-3,3-3h53.9c1.7,0,3,1.3,3,3v6.2H96.8z"/>
                      <line id="XMLID_429_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="97.1" y1="25.9" x2="156.6" y2="25.9"/>
                      <line id="XMLID_428_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="103.6" y1="21.6" x2="105" y2="21.6"/>
                      <line id="XMLID_427_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="107.7" y1="21.6" x2="109.1" y2="21.6"/>
                      <line id="XMLID_414_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="111.7" y1="21.6" x2="113.1" y2="21.6"/>
                      <rect id="XMLID_413_" x="104.8" y="32.8" class="u-fill-primary-lighter" opacity=".4" width="43.8" height="17.3"/>
                      <rect id="XMLID_412_" x="104.8" y="61.1" class="u-fill-primary-lighter" opacity=".4" width="13.3" height="17.3"/>
                      <rect id="XMLID_411_" x="120" y="61.1" class="u-fill-primary" opacity=".15" width="13.3" height="17.3"/>
                      <rect id="XMLID_410_" x="135.3" y="61.1" class="u-fill-primary-lighter" width="13.3" height="17.3"/>
                      <line id="XMLID_409_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="117.4" y1="55.6" x2="136" y2="55.6"/>
                      <path id="XMLID_158_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M156.6,48.8V20.5c0-2.2-1.6-4-3.6-4h-52.7c-2,0-3.6,1.8-3.6,4v14.1"/>
                      <line id="XMLID_156_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="156.6" y1="94.1" x2="156.6" y2="68.3"/>
                    </g>
                  </g>
                  <g id="XMLID_184_">
                    <line id="XMLID_186_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="77.6" y1="2.9" x2="81.9" y2="2.9"/>
                    <line id="XMLID_185_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="79.8" y1="5" x2="79.8" y2="0.8"/>
                  </g>
                  <g id="XMLID_137_">
                    <line id="XMLID_140_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="3.9" y1="57.2" x2="8.2" y2="57.2"/>
                    <line id="XMLID_138_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="6" y1="59.3" x2="6" y2="55.1"/>
                  </g>
                  <g id="XMLID_174_">
                    <line id="XMLID_176_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="181.2" y1="40.6" x2="184.2" y2="37.5"/>
                    <line id="XMLID_175_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="184.2" y1="40.6" x2="181.2" y2="37.5"/>
                  </g>
                  <g id="XMLID_210_">
                    <line id="XMLID_243_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="59.8" y1="17.3" x2="62.9" y2="14.3"/>
                    <line id="XMLID_213_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" x1="62.9" y1="17.3" x2="59.8" y2="14.3"/>
                  </g>
                  <line id="XMLID_201_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="21.6" y1="2.9" x2="72.3" y2="2.9"/>
                  <line id="XMLID_162_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="168.1" y1="50" x2="185.4" y2="50"/>
                  <line id="XMLID_136_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="0" y1="39.3" x2="25.2" y2="39.3"/>
                  <line id="XMLID_161_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="190.5" y1="50" x2="186.9" y2="50"/>
                  <line id="XMLID_135_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="67.6" y1="15.8" x2="85" y2="15.8"/>
                  <line id="XMLID_105_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="90.1" y1="15.8" x2="86.5" y2="15.8"/>
                  <path id="XMLID_212_" class="u-fill-primary" d="M8.7,32.4c0,0.7-0.6,1.3-1.3,1.3c-0.7,0-1.3-0.6-1.3-1.3c0-0.7,0.6-1.3,1.3-1.3
                    C8.1,31.1,8.7,31.7,8.7,32.4z"/>
                  <path id="XMLID_141_" class="u-fill-primary" d="M117.8,2.9c0,0.7-0.6,1.3-1.3,1.3c-0.7,0-1.3-0.6-1.3-1.3s0.6-1.3,1.3-1.3
                    C117.2,1.5,117.8,2.1,117.8,2.9z"/>
                  <path id="XMLID_142_" class="u-fill-primary" d="M172.5,56.5c0,0.7-0.6,1.3-1.3,1.3c-0.7,0-1.3-0.6-1.3-1.3c0-0.7,0.6-1.3,1.3-1.3
                    C171.9,55.1,172.5,55.7,172.5,56.5z"/>
                  <path id="XMLID_143_" class="u-fill-primary" d="M85.1,28.9c0,1-0.8,1.9-1.9,1.9c-1,0-1.9-0.8-1.9-1.9c0-1,0.8-1.9,1.9-1.9
                    C84.3,27.1,85.1,27.9,85.1,28.9z"/>
                  <g id="XMLID_106_">
                    <path id="XMLID_114_" class="u-fill-white" d="M38.5,94.1h-3.8c-0.3,0-0.5-0.2-0.5-0.5V39.1c0-0.1,0-0.1,0-0.2l1.9-4.1
                      c0.2-0.4,0.8-0.4,0.9,0l1.9,4.1c0,0.1,0,0.1,0,0.2v54.5C39,93.9,38.8,94.1,38.5,94.1z"/>
                    <rect id="XMLID_112_" x="34.2" y="40.8" class="u-fill-primary-lighter" width="4.8" height="48.1"/>
                    <path id="XMLID_151_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M34.2,55.5V39l2.1-4.6c0.1-0.2,0.4-0.2,0.6,0L39,39v55.1"/>
                    <line id="XMLID_109_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="34.2" y1="93.9" x2="34.2" y2="76.7"/>
                    <line id="XMLID_107_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="34" y1="40.8" x2="39" y2="40.8"/>
                  </g>
                  <g id="XMLID_567_">
                    <path id="XMLID_577_" class="u-fill-primary-lighter" opacity=".4" d="M53,22.7v70.6c0,0.4-0.4,0.8-0.8,0.8h-9.8c-0.4,0-0.8-0.4-0.8-0.8V22.7
                      c0-0.4,0.4-0.8,0.8-0.8h9.8C52.7,21.9,53,22.3,53,22.7z"/>
                    <path id="XMLID_115_" class="u-fill-white" opacity=".5" d="M42.4,94.1h4V21.9h-4c-0.4,0-0.7,0.3-0.7,0.7v70.7C41.7,93.8,42,94.1,42.4,94.1z"/>
                    <path id="XMLID_148_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M41.7,93.3V22.7c0-0.4,0.4-0.8,0.8-0.8h9.8c0.4,0,0.8,0.4,0.8,0.8v11.6"/>
                    <line id="XMLID_575_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="88.2" x2="46.9" y2="88.2"/>
                    <line id="XMLID_574_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="80.6" x2="46.9" y2="80.6"/>
                    <line id="XMLID_573_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="73" x2="46.9" y2="73"/>
                    <line id="XMLID_572_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="65.4" x2="46.9" y2="65.4"/>
                    <line id="XMLID_571_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="57.8" x2="46.9" y2="57.8"/>
                    <line id="XMLID_570_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="50.3" x2="46.9" y2="50.3"/>
                    <line id="XMLID_569_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="42.7" x2="46.9" y2="42.7"/>
                    <line id="XMLID_568_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="35.1" x2="46.9" y2="35.1"/>
                    <line id="XMLID_104_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="41.7" y1="27.6" x2="46.9" y2="27.6"/>
                  </g>
                  <g id="XMLID_41_">
                    <path id="XMLID_802_" class="u-fill-primary-lighter" d="M123,91.1H48.8c-0.5,0-1-0.4-1-1V37.3c0-0.5,0.5-1,1-1H123c0.6,0,1,0.5,1,1v52.8
                      C124,90.6,123.6,91.1,123,91.1z"/>
                    <line id="XMLID_801_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="102.8" y1="36.3" x2="108" y2="36.3"/>
                    <path id="XMLID_157_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M124,89.2c0,1-0.9,1.9-1.9,1.9H49.7c-1,0-1.9-0.9-1.9-1.9v-51c0-1,0.9-1.9,1.9-1.9h51.7"/>
                    <line id="XMLID_133_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="109.8" y1="36.3" x2="119.9" y2="36.3"/>
                    <rect id="XMLID_799_" x="51.5" y="40.6" class="u-fill-white" width="68.4" height="44.5"/>
                    <path id="XMLID_798_" class="u-fill-white" d="M122.7,94.1H48.3c-1.8,0-3.3-1.3-3.6-3.1l-0.5-3.2h34.5l1.3,1.9h9.5l1.4-1.9h36.3l-0.5,2.8
                      C126.5,92.6,124.7,94.1,122.7,94.1z"/>
                    <path id="XMLID_797_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M122.7,94.1H48.3c-1.8,0-3.3-1.3-3.6-3.1l-0.5-3.2h34.5l1.3,1.9h9.5l1.4-1.9h36.3l-0.5,2.8
                      C126.5,92.6,124.7,94.1,122.7,94.1z"/>
                  </g>
                  <path id="XMLID_166_" class="u-fill-primary" opacity=".3" d="M128.1,87.1H124V37.3c0-0.5-0.4-1-1-1h-3.1v-0.8h-0.8l3.3,10.4h-2.7v48.2h0.8v0h4.7
                    c1.2-0.7,2-1.9,2.2-3.4L128.1,87.1z"/>
                  <g id="XMLID_64_">
                    <path id="XMLID_101_" class="u-fill-white" d="M128.5,47.6L128.5,47.6l2.8,0l4.1-12.5l-5.6-10h-0.9l-0.1,9.5c0.2,0.1,0.9,0.4,1.1,0.6
                      c0.7,0.7,0.7,1.9,0,2.6c-0.7,0.7-1.9,0.7-2.6,0c-0.7-0.7-0.7-1.9,0-2.6c0.2-0.2,0.7-0.5,0.9-0.6l0.2-9.5h-0.9l-5.8,9.9l4,12.5
                      L128.5,47.6z"/>
                    <path id="XMLID_102_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M128.5,47.6L128.5,47.6l2.8,0l4.1-12.5l-5.6-10h-0.9l-0.1,9.5c0.2,0.1,0.9,0.4,1.1,0.6
                      c0.7,0.7,0.7,1.9,0,2.6c-0.7,0.7-1.9,0.7-2.6,0c-0.7-0.7-0.7-1.9,0-2.6c0.2-0.2,0.7-0.5,0.9-0.6l0.2-9.5h-0.9l-5.8,9.9l4,12.5
                      L128.5,47.6z"/>
                    <rect id="XMLID_98_" x="122.6" y="46.7" class="u-fill-white" width="12" height="47.4"/>
                    <rect id="XMLID_97_" x="128.6" y="46.7" class="u-fill-primary-lighter" width="5.9" height="47.4"/>
                    <line id="XMLID_96_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="128.6" y1="25.1" x2="128.6" y2="34.6"/>
                    <circle id="XMLID_95_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" cx="128.6" cy="36.6" r="2.1"/>
                    <line id="XMLID_164_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="134.6" y1="79.3" x2="134.6" y2="94.1"/>
                    <polyline id="XMLID_163_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" points="122.6,94.1 122.6,46.7 134.6,46.7 134.6,50     "/>
                  </g>
                  <g id="XMLID_865_">
                    <g id="XMLID_859_">
                      <path id="XMLID_868_" class="u-fill-primary" opacity=".15" d="M147,50h3.5l10.8,2.6c1,0.2,1.7,1.1,1.7,2.1v0.7H147V50z"/>
                      <path id="XMLID_866_" class="u-fill-primary" opacity=".15" d="M147,67.2h3.5l10.8-2.6c1-0.2,1.7-1.1,1.7-2.1v-0.7H147V67.2z"/>
                      <path id="XMLID_840_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M147,50h3.5l10.8,2.6c1,0.2,1.7,1.1,1.7,2.1v0.7H147V50z"/>
                      <path id="XMLID_837_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M147,67.2h3.5l10.8-2.6c1-0.2,1.7-1.1,1.7-2.1v-0.7H147V67.2z"/>
                      <path id="XMLID_864_" class="u-fill-primary" opacity=".15" d="M138.7,60.8h-2.5l-7.7,1.8c-0.7,0.2-1.2,0.8-1.2,1.5v0.5h11.5V60.8z"/>
                      <path id="XMLID_862_" class="u-fill-primary" opacity=".15" d="M138.7,55.5h-2.5l-7.7-1.8c-0.7-0.2-1.2-0.8-1.2-1.5v-0.5h11.5V55.5z"/>
                      <path id="XMLID_846_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M138.7,60.8h-2.5l-7.7,1.8c-0.7,0.2-1.2,0.8-1.2,1.5v0.5h11.5V60.8z"/>
                      <path id="XMLID_844_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M138.7,55.5h-2.5l-7.7-1.8c-0.7-0.2-1.2-0.8-1.2-1.5v-0.5h11.5V55.5z"/>
                      <rect id="XMLID_860_" x="138.2" y="50" class="u-fill-white" width="8.9" height="44.1"/>
                      <polyline id="XMLID_838_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" points="138.2,94.1 138.2,50 147,50 147,94.1       "/>
                      <line id="XMLID_858_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="138.2" y1="54.8" x2="142.2" y2="54.8"/>
                      <line id="XMLID_857_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="138.2" y1="58.5" x2="142.2" y2="58.5"/>
                      <line id="XMLID_856_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="138.2" y1="62.2" x2="142.2" y2="62.2"/>
                      <line id="XMLID_854_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="138.2" y1="84.5" x2="142.2" y2="84.5"/>
                      <line id="XMLID_851_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="138.2" y1="88.2" x2="142.2" y2="88.2"/>
                      <line id="XMLID_849_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="138.2" y1="91.9" x2="142.2" y2="91.9"/>
                      <rect id="XMLID_848_" x="136.2" y="67.3" class="u-fill-primary-lighter" width="11.4" height="14.8"/>
                      <rect id="XMLID_845_" x="136.2" y="67.3" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" width="11.4" height="14.8"/>
                      <rect id="XMLID_843_" x="132.5" y="71.7" class="u-fill-primary" opacity=".15" width="2.5" height="6"/>
                      <rect id="XMLID_839_" x="132.5" y="71.7" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" width="2.5" height="6"/>
                      <path id="XMLID_842_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M162.6,58.5c0,1.1-0.9,2-2,2c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2
                        C161.7,56.5,162.6,57.4,162.6,58.5z"/>
                    </g>
                  </g>
                  <g id="XMLID_103_">
                    <path id="XMLID_193_" class="u-fill-primary-lighter" d="M25.9,94.1h-1.6c-0.6,0-1-0.5-1-1v-3.5c0-0.6,0.4-1,1-1h1.6c0.6,0,1,0.4,1,1v3.5
                      C26.9,93.6,26.4,94.1,25.9,94.1z"/>
                    <path id="XMLID_192_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M25.9,94.1h-1.6c-0.6,0-1-0.5-1-1v-3.5c0-0.6,0.4-1,1-1h1.6c0.6,0,1,0.4,1,1v3.5
                      C26.9,93.6,26.4,94.1,25.9,94.1z"/>
                    <path id="XMLID_191_" class="u-fill-white" d="M37.2,66.2c0-6.6-5.4-12-12-12s-12,5.4-12,12c0,4.5,2.4,8.3,6,10.4v11.9l1.7,3.2h8.3l2-3.2
                      V76.6C34.8,74.5,37.2,70.6,37.2,66.2z"/>
                    <polygon id="XMLID_190_" class="u-fill-primary-lighter" opacity=".4" points="19.2,79.9 19.2,89.2 20.9,91.7 29.1,91.7 31.2,89.2 31.2,79.9    "/>
                    <polygon id="XMLID_183_" class="u-fill-primary-lighter" points="31.2,88.5 29.1,91.7 20.9,91.7 19.2,88.5    "/>
                    <path id="XMLID_182_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M16,58.4c-1.8,2.1-2.8,4.8-2.8,7.8c0,4.5,2.4,8.3,6,10.4v11.9l1.7,3.2h8.3l2-3.2V76.6
                      c3.6-2.1,6-6,6-10.4c0-6.6-5.4-12-12-12c-1.6,0-3.1,0.3-4.5,0.9"/>
                    <path id="XMLID_181_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" d="M19.2,55.7c-0.9,0.5-1.3,0.7-2,1.5"/>
                    <line id="XMLID_180_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="17.3" y1="80.3" x2="33" y2="80.3"/>
                    <line id="XMLID_179_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="17.3" y1="83" x2="33" y2="83"/>
                    <line id="XMLID_178_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="17.3" y1="85.7" x2="33" y2="85.7"/>
                    <line id="XMLID_177_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="17.3" y1="88.5" x2="33" y2="88.5"/>
                    <path id="XMLID_150_" class="u-fill-primary-lighter" opacity=".4" d="M31.5,66.2c0,3.5-2.8,6.3-6.3,6.3c-3.5,0-6.3-2.8-6.3-6.3c0-3.5,2.8-6.3,6.3-6.3
                      C28.7,59.9,31.5,62.7,31.5,66.2z"/>
                    <g id="XMLID_116_">
                      <g id="XMLID_278_">
                        <polygon id="XMLID_279_" class="u-fill-primary" points="26.8,58.3 23.2,66.1 22.5,65 27.6,65 28.9,65 28.3,66.1 23.8,74.4 23.2,74.1
                          26.9,65.4 27.6,66.5 22.5,66.5 21.2,66.5 21.9,65.4 26,57.9         "/>
                      </g>
                    </g>
                  </g>
                  <g id="XMLID_351_">
                    <circle id="XMLID_139_" class="u-fill-primary-lighter" cx="85.9" cy="63.6" r="8"/>
                    <circle id="XMLID_155_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" cx="85.9" cy="63.6" r="8"/>
                    <rect id="XMLID_199_" x="73.2" y="50.5" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" width="3.2" height="3.2"/>
                    <rect id="XMLID_235_" x="95.5" y="50.5" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" width="3.2" height="3.2"/>
                    <rect id="XMLID_237_" x="73.2" y="72.8" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" width="3.2" height="3.2"/>
                    <rect id="XMLID_236_" x="95.5" y="72.8" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" width="3.2" height="3.2"/>
                    <g id="XMLID_265_">
                      <line id="XMLID_257_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="77.3" y1="74.6" x2="78.8" y2="74.6"/>
                      <line id="XMLID_250_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="80" y1="74.6" x2="81.5" y2="74.6"/>
                      <line id="XMLID_251_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="82.7" y1="74.6" x2="84.2" y2="74.6"/>
                      <line id="XMLID_258_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="85.3" y1="74.6" x2="86.9" y2="74.6"/>
                      <line id="XMLID_259_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="88" y1="74.6" x2="89.6" y2="74.6"/>
                      <line id="XMLID_260_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="90.7" y1="74.6" x2="92.3" y2="74.6"/>
                      <line id="XMLID_264_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="93.4" y1="74.6" x2="95" y2="74.6"/>
                    </g>
                    <g id="XMLID_238_">
                      <line id="XMLID_248_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="77.3" y1="51.9" x2="78.8" y2="51.9"/>
                      <line id="XMLID_247_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="80" y1="51.9" x2="81.5" y2="51.9"/>
                      <line id="XMLID_246_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="82.7" y1="51.9" x2="84.2" y2="51.9"/>
                      <line id="XMLID_245_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="85.3" y1="51.9" x2="86.9" y2="51.9"/>
                      <line id="XMLID_244_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="88" y1="51.9" x2="89.6" y2="51.9"/>
                      <line id="XMLID_240_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="90.7" y1="51.9" x2="92.3" y2="51.9"/>
                      <line id="XMLID_239_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="93.4" y1="51.9" x2="95" y2="51.9"/>
                    </g>
                    <g id="XMLID_253_">
                      <line id="XMLID_333_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="72" x2="75" y2="70.4"/>
                      <line id="XMLID_325_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="69.3" x2="75" y2="67.7"/>
                      <line id="XMLID_270_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="66.6" x2="75" y2="65"/>
                      <line id="XMLID_266_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="63.9" x2="75" y2="62.3"/>
                      <line id="XMLID_256_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="61.2" x2="75" y2="59.6"/>
                      <line id="XMLID_255_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="58.5" x2="75" y2="56.9"/>
                      <line id="XMLID_254_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="75" y1="55.8" x2="75" y2="54.2"/>
                    </g>
                    <g id="XMLID_252_">
                      <line id="XMLID_342_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="72" x2="96.9" y2="70.4"/>
                      <line id="XMLID_340_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="69.3" x2="96.9" y2="67.7"/>
                      <line id="XMLID_339_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="66.6" x2="96.9" y2="65"/>
                      <line id="XMLID_338_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="63.9" x2="96.9" y2="62.3"/>
                      <line id="XMLID_337_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="61.2" x2="96.9" y2="59.6"/>
                      <line id="XMLID_336_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="58.5" x2="96.9" y2="56.9"/>
                      <line id="XMLID_334_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" stroke-dasharray="2" x1="96.9" y1="55.8" x2="96.9" y2="54.2"/>
                    </g>
                  </g>
                  <g id="XMLID_3_">
                    <line id="XMLID_189_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="7.4" y1="94.1" x2="171.2" y2="94.1"/>
                    <line id="XMLID_188_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="2.8" y1="94.1" x2="5.5" y2="94.1"/>
                    <line id="XMLID_187_" class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10" x1="172.7" y1="94.1" x2="178.8" y2="94.1"/>
                  </g>
                </g>
              </svg>
            </figure>
            <!-- End SVG Icon -->

            <div class="media-body">
              <h3 class="h5">Unlimited Power</h3>
              <p class="mb-1">Find what you need in one template.</p>
              <a class="font-size-14" href="#">Read More <span class="fa fa-angle-right align-middle ml-2"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Icon Blocks Section -->

    <!-- Subscribe Section -->
    <div class="u-gradient-half-primary-v1">
      <div class="container u-space-2">
        <div class="row justify-content-lg-end align-items-lg-center">
          <div class="col-lg-7 mb-7 mb-lg-0">
            <!-- SVG Icon -->
            <img src="/assets/svg/flat-icons/subscribe-flat-concept-illustration.svg" alt="SVG Illustration">
            <!-- End SVG Icon -->
          </div>

          <div class="col-lg-5">
            <div class="pl-lg-4">
              <!-- Title -->
              <div class="mb-5">
                <h2 class="text-white">
                  <strong class="font-weight-bold">Stay</strong> in the know
                </h2>
                <p class="u-text-light">Subscribe now and get special offers along with newsworthy updates on the latest developments from Xannia.</p>
              </div>
              <!-- End Title -->

              <!-- Input -->
              <form class="js-validate js-form-message">
                <div class="js-focus-state input-group input-group-lg u-form u-form--lg u-form--pill u-form--no-brd u-form--no-addon-brd">
                  <input type="email" class="form-control u-form__input" name="email" required
                         placeholder="Enter your email address"
                         aria-label="Enter your email address">
                  <span class="input-group-append u-form__append">
                    <button type="submit" class="btn text-primary u-btn-white">
                      <span class="fas fa-paper-plane"></span>
                    </button>
                  </span>
                </div>
              </form>
              <!-- End Input -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Subscribe Section -->

    <!-- CTA Section -->
    <div class="u-bg-light-blue-50">
      <div class="container u-space-3">
        <div class="w-md-80 w-lg-50 text-center mx-auto">
          <div class="mb-4">
            <span class="u-icon u-icon-white u-icon--xl shadow-sm text-primary rounded-circle">
              <span class="u-icon__inner">
                <img src="/assets/svg/logos/logo-short.svg" alt="Logo" style="width: 35px;">
              </span>
            </span>
          </div>

          <div class="mb-4">
            <h2 class="text-primary">
              <strong class="font-weight-bold">Ready</strong> to hire us?
            </h2>
            <p>Xannia helps you managing your Enterprise identity.</p>
          </div>

          <a class="btn btn-primary u-btn-primary u-btn-wide u-btn-pill transition-3d-hover" href="hire-us.html">Hire Xannia</a>
        </div>
      </div>
    </div>
    <!-- End CTA Section -->

    <!-- SVG Bottom Shape -->
    <figure class="position-absolute-bottom-0">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           viewBox="0 0 1920 140" style="margin-bottom: -8px; enable-background:new 0 0 1920 140;" xml:space="preserve">
        <path class="u-fill-white" d="M960,92.9C811.4,93.3,662.8,89.4,515.3,79c-138.6-9.8-277.1-26.2-409-53.3C97.8,24,0,6.5,0,0c0,0,0,140,0,140
          l960-1.2l960,1.2c0,0,0-140,0-140c0,2.7-42.1,11.3-45.8,12.2c-45.1,11-91.5,20.1-138.4,28.1c-176.2,30.1-359.9,43.8-542.9,48.9
          C1115.4,91.4,1037.7,92.7,960,92.9z"/>
      </svg>
    </figure>
    <!-- End SVG Bottom Shape -->

<?php $CI->load->view('templates/footer'); ?>