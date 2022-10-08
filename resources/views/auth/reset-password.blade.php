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
        'title' => 'Reset Password - ' . setting('site_name'),
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
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="d-block text-center">
                    <img src="{{ setting('site_logo') }}" style="width:300px;margin-bottom:20px" alt="News15india Logo">
                </a>
                <div class="form_wrapper border-top">
                    <form method="POST" action="{{ route('password.update') }}" id="loginForm">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group mb-3 mt-5">
                            <div class="input_field m-0">
                                <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <input type="email" name="email" value="{{old('email',$request->email)}}" required autofocus placeholder="Enter Your Email" />
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="input_field m-0">
                                <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                <input type="password" name="password" required placeholder="Enter Your Password" />
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="input_field m-0">
                                <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                <input type="password" name="password_confirmation" required placeholder="Enter Confirmation Password" />
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 text-center pb-5">
                            <input class="button" type="submit" value="Reset Password" />
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
