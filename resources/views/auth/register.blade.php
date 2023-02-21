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
        'title' => 'Register - ' . setting('site_name'),
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
            font-weight: 600;
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
                    <h2 class="line"><span>Sign Up By </span></h2>
                    <div class="col-md-12 text-center px-0 px-md-3">
                        <div class="row justify-content-center m-0">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{url('login/facebook')}}" class="m-0 social-tab social-tab-f">
                                    <i class="fab fa-facebook-f mr-1"></i> Signup with Facebook
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{url('login/twitter')}}" class="m-0 social-tab social-tab-t">
                                    <i class="fab fa-twitter mr-1"></i> Signup with Twitter
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <a href="{{url('login/google')}}" class="m-0 social-tab social-tab-g">
                                    <i class="fab fa-google mr-1"></i> Signup with Google
                                </a>
                            </div>
                        </div>
                        <div class="mt-md-4 mt-2 col-12 text-center">
                            <p class="m-0">OR</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}" id="signup-form">
                        @csrf
                        <div class="row m-0 clearfix row-cols-1 row-cols-md-3">
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <div class="input_field m-0">
                                        <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <input type="text" name="name" value="{{old('name')}}"
                                            placeholder="Full Name" required />
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <div class="input_field m-0">
                                        <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                        <input type="email" id="email" name="email" autocomplete="email"
                                            value="{{old('email')}}" placeholder="Email Address" required />
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <div class="input_field m-0">
                                        <span><i aria-hidden="true" class="fab fa-whatsapp"></i></span>
                                        <input type="tel" name="wa_number" maxlength="10" autocomplete="new-password"
                                            value="{{old('wa_number')}}" placeholder="Whatsapp Number" />
                                    </div>
                                    @error('wa_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <div class="input_field m-0">
                                        <span><i aria-hidden="true" class="fa fa-mobile"></i></span>
                                        <input type="tel" id="mobile_no" name="mobile_no" maxlength="10"
                                            value="{{old('mobile_no')}}" placeholder="10 Digits Mobile number"
                                            required />
                                    </div>
                                    @error('mobile_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <div class="input_field m-0">
                                        <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                        <input type="password" id="password" name="password" placeholder="Password" required />
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <div class="input_field m-0">
                                        <span><i aria-hidden="true" class="fa fa-map-marker-alt"></i></span>
                                        <input type="text" id="pincode" maxlength="6" name="pincode" value="{{old('pincode')}}" placeholder="City Pincode" />
                                    </div>
                                    @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <select name="country" class="form-control" required data-edit="{{old('country')}}" style="font-size: 1.7rem">
                                        <option selected disabled>Select Country</option>
                                    </select>
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <select name="state" class="form-control" required data-edit="{{old('state')}}" style="font-size: 1.7rem">
                                        <option selected disabled>Select Country First</option>
                                    </select>
                                    @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inner col">
                                <div class="form-group mb-3">
                                    <select name="city" class="form-control" required data-edit="{{old('city')}}" style="font-size: 1.7rem">
                                        <option selected disabled>Select State First</option>
                                    </select>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-2 input_field m-0 checkbox_option">
                            <input type="checkbox" id="cb4" checked>
                            <label for="cb4">I agree to the <span class="text-info">SSO Login Privacy
                                    Terms</span> and I Warrant that I am above 18 Years of age. *</label>
                        </div>
                        <div class="px-2 input_field m-0 checkbox_option">
                            <input type="checkbox" id="cb2" checked>
                            <label for="cb2">I agree to the processing of my personal
                                information for profiling such as My Credits, Follow activity,
                                Personalised recommendations and Advertisments.</label>
                        </div>
                        <div class="col-12 text-center">
                            <input class="button button-signup mt-4" type="submit" value="Sign Up" />
                        </div>
                        <div class="col-12 text-center py-4">
                            Already have any account? <a href="{{route('login')}}" class="text-primary">Login</a>
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

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    @includeIf('vendor.worlddata.ajax-script')
</body>

</html>
