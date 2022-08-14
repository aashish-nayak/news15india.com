<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{setting('site_favicon')}}" type="image/png" />
    <!-- Meta Data  -->
    @yield('meta-tags')
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    @stack('css')
</head>

<body onload="startTime()">
    <input type="hidden" value="{{asset('front-assets/img/')}}" id="weather-icon-assets">
    @includeIf('layouts.frontend.partials.header-nav', ['some' => 'data'])
    @includeIf('layouts.frontend.partials.desktop-nav', ['some' => 'data'])
    @includeIf('layouts.frontend.partials.desktop-breaking', ['some' => 'data'])
    @includeIf('layouts.frontend.partials.mobile-nav', ['some' => 'data'])
    @includeIf('layouts.frontend.partials.mobile-breaking', ['some' => 'data'])

    @yield('sections')

    @includeIf('layouts.frontend.partials.footer', ['some' => 'data'])
    <!-- Login Register Modal -->
    <div class="modal fade" style="font-size: 1.6rem;" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item w-50 text-center" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                role="tab" aria-controls="home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item w-50 text-center" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Signup</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="container d-flex justify-content-center">
                                <img src="./img/logo.png')}}" class="img-fluid p-3 mx-auto w-50" alt="">
                            </div>
                            <div class="container">
                                <h2 class="line"><span>Sign in Via </span></h2>
                                <div class="col-md-12 text-center px-0 px-md-3">
                                    <div class="row justify-content-center m-0">
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="javascript:void(0)" class="m-0 social-tab social-tab-f"><i
                                                    class="fab fa-facebook-f mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="javascript:void(0)" class="m-0 social-tab social-tab-t"><i
                                                    class="fab fa-twitter mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="javascript:void(0)" class="m-0 social-tab social-tab-g"><i
                                                    class="fab fa-google-plus mr-1"></i> Login with Facebook</a>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="line pt-3"><span>Or Sign in Using Your Email or Mobile Number </span></h2>
                            </div>
                            <div class="form_wrapper border-top">
                                <div class="row clearfix">
                                    <div class="w-100">
                                        <form action="" method="post" id="loginForm" autocomplete="off">
                                            <div class="input_field">
                                                <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                                <input type="tel" name="l_mobile" id="l_mobile"
                                                    placeholder="Enter 10 Digits Mobile Number" required />
                                            </div>
                                            <div class="input_field">
                                                <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                                <input type="password" name="l_password" id="l_password"
                                                    placeholder="Enter Password" required autocomplete="off" />
                                            </div>
                                            <div class="col-12 px-2">
                                                <div class="row m-0 justify-content-center">
                                                    <div class="col p-0 text-left input_field checkbox_option">
                                                        <input type="checkbox" id="cb1">
                                                        <label for="cb1">Remember Me</label>
                                                    </div>
                                                    <div class="col p-0 text-right input_field checkbox_option">
                                                        <a href="javascript:void(0)"
                                                            class=" font-weight-bold text-danger">Forget Password ?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="" id="login-msg-container" style="display: none;">
                                                    <strong id="login-msg-text"></strong>
                                                </div>
                                                <input class="button" type="submit" value="Login" />
                                            </div>
                                            <div class="col-12 text-center">
                                                <a href="javascript:void(0)" data-dismiss="modal"
                                                    class="link-after-button">Go Back To NEWS15INDIA</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container d-flex justify-content-center">
                                <img src="./img/logo.png')}}" class="img-fluid p-3 mx-auto w-50" alt="">
                            </div>
                            <div class="container">
                                <h2 class="line"><span>Sign Up By </span></h2>
                                <div class="col-md-12 text-center px-0 px-md-3">
                                    <div class="row justify-content-center m-0">
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="javascript:void(0)" class="m-0 social-tab social-tab-f"><i
                                                    class="fab fa-facebook-f mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="javascript:void(0)" class="m-0 social-tab social-tab-t"><i
                                                    class="fab fa-twitter mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="javascript:void(0)" class="m-0 social-tab social-tab-g"><i
                                                    class="fab fa-google-plus mr-1"></i> Login with Facebook</a>
                                        </div>
                                    </div>
                                    <div class="mt-md-4 mt-2 col-12 text-center">
                                        <p class="m-0">OR</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form_wrapper border-top">
                                <div class="row clearfix">
                                    <div class="">
                                        <form action="" method="post" id="signup-form" autocomplete="off">
                                            <div class="row m-0 clearfix row-cols-1 row-cols-md-3">
                                                <div class="inner col">
                                                    <div class="input_field">
                                                        <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                        <input type="text" id="name" name="name"
                                                            placeholder="Full Name" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field">
                                                        <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                                        <input type="email" id="email" name="email"
                                                            placeholder="Email Address" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field">
                                                        <span><i aria-hidden="true" class="fab fa-whatsapp"></i></span>
                                                        <input type="tel" id="email" name="wa_number"
                                                            placeholder="Whatsapp Number" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field">
                                                        <span><i aria-hidden="true" class="fa fa-mobile"></i></span>
                                                        <input type="tel" id="mobile_no" name="mobile_no"
                                                            placeholder="10 Digits Mobile number" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field"> <span><i aria-hidden="true"
                                                                class="fa fa-lock"></i></span>
                                                        <input type="password" name="password" id="password"
                                                            placeholder="Password" required autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field"> <span><i aria-hidden="true"
                                                                class="fa fa-map-marker-alt"></i></span>
                                                        <input type="text" id="pincode" name="pincode"
                                                            placeholder="City Pincode" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field"> <span><i aria-hidden="true"
                                                        class="fa fa-map-marker-alt"></i></span>
                                                        <input type="text" id="pincode" name="country"
                                                            placeholder="Country Name" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field"> <span><i aria-hidden="true"
                                                        class="fa fa-map-marker-alt"></i></span>
                                                        <input type="text" id="pincode" name="state"
                                                            placeholder="State Name" required />
                                                    </div>
                                                </div>
                                                <div class="inner col">
                                                    <div class="input_field"> <span><i aria-hidden="true"
                                                        class="fa fa-map-marker-alt"></i></span>
                                                        <input type="text" id="pincode" name="city"
                                                            placeholder="City Name" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-2 input_field m-0 checkbox_option">
                                                <input type="checkbox" id="cb4" checked>
                                                <label for="cb4">I agree to the <span class="text-info">SSO Login
                                                        Privacy Terms</span> and I Warrant that I am above 18 Years of
                                                    age. *</label>
                                            </div>
                                            <div class="px-2 input_field m-0 checkbox_option">
                                                <input type="checkbox" id="cb2" checked>
                                                <label for="cb2">I agree to the processing of my personal
                                                    information for profiling such as My Credits, Follow activity,
                                                    Personalised recommendations and Advertisments.</label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="" id="signup-msg-container">
                                                    <strong id="signup-msg-text"></strong>
                                                </div>
                                                <input class="button button-signup" type="submit" value="Sign Up" />
                                            </div>
                                            <div class="col-12 text-center">
                                                <a href="javascript:void(0)" data-dismiss="modal"
                                                    class="link-after-button">Go Back To NEWS15INDIA</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer-login text-center">
                    <!-- <p class="m-0 footer-text">Part Of Mahira News Network Private Limited</p> -->
                    <h6 class="m-0">Part Of Mahira News Network Private Limited</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Register Modal -->
    @includeIf('layouts.frontend.partials.sidebar-nav', ['some' => 'data'])
    <button class="back-to-top" type="button"><i class="fas fa-angle-up"></i></button>
    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/weather.js')}}"></script>
    <script src="{{ asset('front-assets/js/time.js') }}"></script>
    <script src="{{ asset('front-assets/js/slick.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    @stack('js')
    <script>
        $().ready(function() {
            $('.single-item').slick({
                infinite: true,
                arrows: false,
                autoplay: true,
            });
            if ($(window).width() < 514) {
                $(".custom-margin").removeClass("custom-margin");
                $(".custom-margin-col-2").removeClass("custom-margin-col-2");
                $(".add-mb-3").addClass("mb-3");
            } else {
                $(".add-mb-3").removeClass("mb-3");
                $(".custom-margin").addClass("custom-margin");
                $(".custom-margin-col-2").addClass("custom-margin-col-2");
            }
            // Back to top
            var amountScrolled = 200;
            var amountScrolledNav = 25;

            $(window).scroll(function() {
                if ( $(window).scrollTop() > amountScrolled ) {
                    $('button.back-to-top').addClass('show');
                } else {
                    $('button.back-to-top').removeClass('show');
                }
            });

            $('button.back-to-top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
            $(".over_lay1").click(function () {
                $(".over_lay1").css('width',"0%");
                $(".search_container").css('left',"-360px");
            });
        });
    </script>
</body>

</html>
