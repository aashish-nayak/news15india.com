<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ setting('site_favicon') }}" type="image/png" />
    <!-- Meta Data  -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    @meta([
        'title' => 'Login - ' . setting('site_name'),
        'keywords' => setting('site_meta_keyword'),
        'description' => setting('site_meta_description'),
        'image' => setting('site_logo'),
        'type' => 'website',
        'author' => setting('site_name'),
    ])
    <style>
        body {
            font-size: 16px;
            background-color: rgb(243 244 246 /1);
        }

        .line {
            line-height: 0.1em !important;
            margin: 15px 0 25px !important;
        }

        .form_wrapper {
            width: 100%;
        }

        .form_wrapper input[type="submit"] {
            line-height: 1.6;
            font-size: 1.7rem;
            margin-bottom: 0px;
            font-weight: 600
        }

        .form_wrapper label {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <input type="hidden" value="{{ asset('front-assets/img/') }}" id="weather-icon-assets">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-7">
                <a href="{{ route('home') }}" class="d-block text-center">
                    <img src="{{ setting('site_logo') }}" style="width:200px;margin-bottom:20px" alt="News15india Logo">
                </a>
                <div class="form_wrapper border-top">
                    <h2 class="line"><span>Sign in Via </span></h2>
                    <div class="col-md-12 text-center px-0 px-md-3">
                        <div class="row justify-content-between m-0">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{url('login/facebook')}}" class="m-0 social-tab social-tab-f">
                                    <i class="fab fa-facebook-f mr-1"></i> Login with Facebook
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{url('login/twitter')}}" class="m-0 social-tab social-tab-t">
                                    <i class="fab fa-twitter mr-1"></i> Login with Twitter
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{url('login/google')}}" class="m-0 social-tab social-tab-g">
                                    <i class="fab fa-google mr-1"></i> Login with Google
                                </a>
                            </div>
                        </div>
                    </div>
                    <h2 class="line pt-3"><span>Or Sign in Using Your Email or Mobile Number </span></h2>
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input_field m-0">
                                <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <input type="email" name="email" value="{{old('email')}}" required autofocus placeholder="Enter Your Email" />
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="input_field m-0">
                                <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                <input type="password" name="password" required autocomplete="current-password" placeholder="Enter Your Password" />
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 px-2">
                            <div class="row m-0 justify-content-center">
                                <div class="col p-0 text-left input_field checkbox_option">
                                    <input type="checkbox" id="cb1" name="remember">
                                    <label for="cb1">Remember Me</label>
                                </div>
                                <div class="col p-0 text-right input_field checkbox_option">
                                    <a href="{{ route('password.request') }}"
                                        class=" font-weight-bold text-danger">Forget Password ?</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <input class="button" type="submit" value="Login" />
                        </div>
                        <div class="col-12 text-center py-4">
                            Not Registered yet ? <a href="{{route('register')}}" class="text-primary">Create an account</a>
                        </div>
                    </form>
                </div>

                <div class="col-12 text-center mt-4">
                    <a href="{{ route('home') }}" data-dismiss="modal" class="link-after-button">Go Back To NEWS15INDIA</a>
                    <h6 class="m-0">Part Of Mahira News Network Private Limited</h6>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
