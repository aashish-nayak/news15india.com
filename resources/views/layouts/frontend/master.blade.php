<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap v4.6 CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- Slick Slider Css  -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <!-- Main CSS  -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <!-- Site Title  -->
    <title>@yield('title') - {{ config('app.name') }}</title>
    @stack('meta-tags')
    @stack('css')
</head>

<body onload="startTime()">
    <input type="hidden" value="{{asset('front-assets/img/')}}" id="weather-icon-assets">
    <!--Top Header Strip  -->
    <div class="small-top d-md-block d-none">
        <div class="container-fluid mx-auto">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-2 d-none d-md-block d-md-flex justify-content-start">
                    <div class="social-icon">
                        <a target="_blank" href="javascript:void(0)" class="fab fa-facebook-f"></a>
                        <a target="_blank" href="javascript:void(0)" class="fab fa-twitter"></a>
                        <a target="_blank" href="javascript:void(0)" class="fab fa-youtube"></a>
                        <a target="_blank" href="javascript:void(0)" class="fab fa-instagram"></a>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-flex justify-content-center date-time text-center align-items-center">
                    <p class="m-0 date-time mr-5">
                        <span id="day" class=""></span> : <span class="" id="datetime"></span>
                    </p>
                    <p class="m-0 date-time">
                        <span class="weather-icon" style="border-radius:4px; padding: 3px; background: slategray;"></span> | <span class="temperature-value"></span> | <span class="location"></span>
                    </p>
                </div>
                <div class="col-md-5 d-none d-md-block login-singup pr-1 text-right">
                    <a href="javascript:void(0)" class="google-play"><i class="fas fa-newspaper"></i> E-Paper</a>
                    <a href="javascript:void(0)" class="google-play"><i class="fas fa-download"></i> Download App</a>
                    <a href="javascript:void(0)" class="google-play"><i class="fas fa-bell"></i> Notification</a>
                    <a href="javascript:void(0)" class="google-play" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user"></i> Login / Signup</a>
                </div>
            </div>
        </div>
    </div>
    <!--Top Header Strip End  -->
    <!-- Desktop Nav Bar Start   -->
    <header class="sticky-top start-header mx-auto mega-menu-navbar">
        <div class="container-fluid mx-auto position-relative">
            <div class="row align-items-center">
                <div class="col-md-2-custom col-12 px-md-1 pt-0 d-flex justify-content-between justify-content-md-start mobile-toggle mobile-height-black align-items-center">
                    <div class="col-md-12 col-6 px-0">
                        <span class="text-light mt-1" onclick="openNav()">&#9776;</span>
                        <a href="{{ url('/') }}" class="m-0">
                            <div class="navbar-brand p-0 m-0">
                                <img src="{{ asset('front-assets/img/logo.png') }}" class="img-fluid"
                                    style="margin-top:-11px;" alt="logo">
                            </div>
                        </a>
                    </div>
                    <div class="d-md-none d-block col-6 justify-self-end text-right px-0">
                        <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center" ><i class="fas fa-bell mt-3"></i></a>
                        <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center"><i class="fas fa-user mt-3"></i></a>
                        <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center"><i class="fas fa-tv mt-3"></i></a>
                    </div>
                </div>
                <div class="col-md-8 d-md-block d-none position-static">
                    <!-- Main Navbar Start -->
                    <nav class="nav sticky-top d-none d-lg-block d-md-block position-static">
                        <ul class="ul-reset ml-2 ">
                            <li><a href="{{route('home')}}" class="nav-link active">Home</a></li>
                            <li class="nav-item-sub p-relative">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"
                                    role="button" aria-haspopup="true" aria-expanded="false">Pages <span
                                        class="fas fa-angle-down"></span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('home')}}">Home Page</a>
                                    <a class="dropdown-item" href="{{route('category')}}">Category Page</a>
                                    <a class="dropdown-item" href="{{route('author')}}">Author Page</a>
                                    <a class="dropdown-item" href="{{route('single')}}">Single Page</a>
                                </div>
                            </li>
                            <!-- Desktop Mega Menu  -->
                            <li class="droppable">
                                <a href="javascript:void(0)" class="nav-link">Mega Menu One <span class="fas fa-angle-down"></span></a>
                                <div class="mega-menu mx-auto">
                                    <div class="col-12 py-4">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-2">
                                                <ul class="ul-reset">
                                                    <h3>Heading 1</h3>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <ul class="ul-reset">
                                                    <h3>Heading 2</h3>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <ul class="ul-reset">
                                                    <h3>Heading 3</h3>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <ul class="ul-reset">
                                                    <h3>Heading 4</h3>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <ul class="ul-reset">
                                                    <h3>Heading 5</h3>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <ul class="ul-reset">
                                                    <h3>Heading 6</h3>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                    <li><a class="dropdown-item text-decoration-none" href="javascript:void(0)">Category Two Sublink</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="droppable">
                                <a href="javascript:void(0)" class="nav-link">Mega Menu Two <span class="fas fa-angle-down"></span></a>
                                <div class="mega-menu row justify-content-center">
                                    <div class="cf col-10 py-4">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-3">
                                                <h5 class="mb-2">Parent Category Name</h5>
                                                <div class="mega-menu-tabs nav flex-column flex-nowrap nav-pills pr-1" style="max-height: 300px;overflow-y:scroll;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Category Name 1</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Category Name 2</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Category Name 3</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 4</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab2" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 5</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab3" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 6</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab4" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 7</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab5" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 8</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab6" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 9</a>
                                                    <a href="javascript:void(0)" class="mb-2 py-1 nav-link" id="v-pills-settings-tab7" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Category Name 10</a>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings3" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings4" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings5" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings6" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-settings7" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-md-7">
                                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                            Natus doloremque dolorum laborum voluptate.
                                                                        </h6>
                                                                    </a>
                                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row row-cols-2 p-0">
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mb-2 px-2">
                                                                            <div class="card card-shadow">
                                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="droppable">
                                <a href="javascript:void(0)" class="nav-link">Mega Menu Three <span class="fas fa-angle-down"></span></a>
                                <div class="mega-menu col-12">
                                    <div class="row justify-content-center">
                                        <div class="cf col-12 py-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5">
                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                        <img src="http://127.0.0.1:8000/front-assets/img/landscape.jpg" class="img-fluid" alt="">
                                                        <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Natus doloremque dolorum laborum voluptate.
                                                        </h6>
                                                    </a>
                                                    <p class="text-muted" style="font-size: 1.2rem">
                                                        Some representati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, nemo.
                                                    </p>
                                                </div>
                                                <div class="col-7">
                                                    <div class="row row-cols-4 mx-0">
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2 px-2">
                                                            <div class="card card-shadow">
                                                                <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="http://127.0.0.1:8000/front-assets/img/square.jpg" class="card-img-top" alt="..."></a>
                                                                <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                    <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Desktop Mega Menu End  -->
                            <li class="nav-item-sub p-relative">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"
                                    role="button" aria-haspopup="true" aria-expanded="false">MultiLevel Dropdown
                                    <span class="fas fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-sub dropright">
                                        <a data-toggle="dropdown" class="dropdown-item dropdown-toggle"
                                            href="javascript:void(0)">Sub-menu</a>
                                        <ul class="dropdown-sub-menu" role="menu">
                                            <li><a href="javascript:void(0)" class="dropdown-item">Sub Link 1</a></li>
                                            <li><a href="javascript:void(0)" class="dropdown-item">Sub Link 2</a></li>
                                            <li><a href="javascript:void(0)" class="dropdown-item">Sub Link 3</a></li>
                                            <li class="dropdown-sub-2 dropright">
                                                <a data-toggle="dropdown" class="dropdown-item dropdown-toggle"
                                                    href="javascript:void(0)">Sub-Link-Dropdown</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            1</a></li>
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            2</a></li>
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            3</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-sub dropright">
                                        <a data-toggle="dropdown" class="dropdown-item dropdown-toggle"
                                            href="javascript:void(0)">Sub-menu</a>
                                        <ul class="dropdown-sub-menu" role="menu">
                                            <li class="dropdown-sub-2 dropright">
                                                <a data-toggle="dropdown" class="dropdown-item dropdown-toggle"
                                                    href="javascript:void(0)">Sub-Link-Dropdown</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            1</a></li>
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            2</a></li>
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0)" class="dropdown-item">Sub Link 1</a></li>
                                            <li><a href="javascript:void(0)" class="dropdown-item">Sub Link 2</a></li>
                                            <li class="dropdown-sub-2 dropright">
                                                <a data-toggle="dropdown" class="dropdown-item dropdown-toggle"
                                                    href="javascript:void(0)">Sub-Link-Dropdown</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            1</a></li>
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            2</a></li>
                                                    <li><a href="javascript:void(0)" class="dropdown-item">Sub Link
                                                            3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0)" class="dropdown-item">Sub Link 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" class="dropdown-item">Link 1</a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item">Link 2</a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item">Link 3</a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item">Link 4</a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item">Link 5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- Main Navbar End  -->
                </div>
                <!-- Search Button  -->
                <div class="col px-1">
                    <div id="block-search-form" class="block block-search block-odd d-none d-md-flex justify-content-end">
                        <div class="content">
                            <form action="/drupal/globalnews/" method="post" id="search-block-form"
                                accept-charset="UTF-8">
                                    <div class="container-inline">
                                        <h2 class="element-invisible">Search form</h2>
                                        <div class="form-item form-type-textfield form-item-search-block-form">
                                            <label class="element-invisible" for="edit-search-block-form--2">Search</label>
                                            <input title="Enter the terms you wish to search for." placeholder="Search"
                                                type="search" id="edit-search-block-form--2" name="search_block_form"
                                                value="" size="15" maxlength="128" class="form-text">
                                        </div>
                                        <div class="form-actions form-wrapper" id="edit-actions">
                                            <a type="submit" id="edit-submit" name="op" value="Search" class="form-submit"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Search Button End  -->
            </div>
            <!-- Container End  -->
        </div>
    </header>
    <!-- Desktop Nav Bar End -->
    <!-- Swiper Nav fro Mobile -->
    <div class="container-fluid d-md-none d-block">
        <div class="scrollmenu">
            <a class="link-swipe" href="#home">Home</a>
            <a class="link-swipe" href="#news">News</a>
            <a class="link-swipe" href="#contact">Contact</a>
            <a class="link-swipe" href="#about">About</a>
            <a class="link-swipe" href="#support">Support</a>
            <a class="link-swipe" href="#blog">Blog</a>
            <a class="link-swipe" href="#tools">Tools</a>
            <a class="link-swipe" href="#base">Base</a>
            <a class="link-swipe" href="#custom">Custom</a>
            <a class="link-swipe" href="#more">More</a>
            <a class="link-swipe" href="#logo">Logo</a>
            <a class="link-swipe" href="#friends">Friends</a>
            <a class="link-swipe" href="#partners">Partners</a>
            <a class="link-swipe" href="#people">People</a>
            <a class="link-swipe" href="#work">Work</a>
        </div>
    </div>
    <!-- Swiper Nav fro Mobile End -->
    <!-- Mobile Breaking News Marquee  -->
    <div class="container-fluid d-md-none my-1 d-block mobile-news-alert">
        <div class="row">
            <div class="col-4 px-1 text-center bg-primary-clr">
                <h6 class="breaking-news-mobile font-weight-bold mt-2">BREAKING NEWS</h6>
            </div>
            <div class="col-8 px-1 bg-dark-pure">
                <marquee behavior="scroll" direction="left" class="" onmouseover="this.stop();"
                    scrollamount="4" onmouseout="this.start();">
                    <a href="javascript:void(0)" class="text-decoration-none text-light">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, sapiente!</h2>
                    </a>
                    <a href="javascript:void(0)" class="text-decoration-none text-light">
                        <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam, numquam.</h2>
                    </a>
                    <a href="javascript:void(0)" class="text-decoration-none text-light">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, labore.</h2>
                    </a>
                </marquee>
            </div>
        </div>
    </div>
    <!-- Mobile Breaking News Marquee End  -->
    <!-- Desktop Breaking News Marquee  -->
    <div class="container mx-auto my-2 px-0">
        <div class="alert alert-dismissible m-0 py-1 px-1 text-center fade show border rounded-pill d-md-block d-none bg-primary-clr" role="alert">
            <div class="news-alert d-flex justify-content-start align-items-center m-md-0">
                <div class="ml-4">
                    <strong style="color:black;font-size: 20px;">BREAKING NEWS |</strong>
                </div>
                <div class="ml-3 text-left">
                    <a href="javascript:void(0)" class="text-decoration-none text-left">
                        <h2 class="text-white font-weight-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, laborum quo nemo repellendus </h2>
                    </a>
                </div>
                <div class="position-relative ml-auto mr-4">
                    <button type="button" class="close p-0 position-static" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Desktop Breaking News Marquee End  -->
    @yield('sections')
    <footer class="nb-footer mt-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="footer-info-single">
                        <h4 class="title">Latest News</h4>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Crime News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Covid-19 News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Political News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    National News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Knowledged News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Religion News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Sport News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Career News</a></li>
                            <li><a href="javascript:void(0)" title=""><i class="fa fa-angle-double-right"></i>
                                    Social Media News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Life Style</h4>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Standard of Living</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Right Diet</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Relationship</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Tourism</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Money Talk</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Education</h4>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Sarkari Exam</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Current Affairs</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> General Knowledged</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Result</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Exam</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Success Story</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Gadgets</h4>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Automobiles</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Talk to Easy</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Tablet/Computer</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Mobile</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Female</h4>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Housekeeping</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Child Care</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Current Affairs</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Woman Power</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Pregnancy</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Fashion</a></li>
                                    <li><a href="javascript:void(0)" title=""><i
                                                class="fa fa-angle-double-right"></i> Beauty Tips</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 px-1 mt-5 mt-md-0">
                            <img src="{{ asset('front-assets/img/flag-color.png') }}" class="img-fluid footer-img"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="p-2 mt-3" style="background-color:var(--primary)">
                        <div class="col-12 p-2 text-center" style="background-color: var(--secondary);">
                            <p style="font-size:10px;color:white;margin:0%;">SUBSCRIBE TO OUR DAILY NEWSLETTER</p>
                        </div>
                        <div class="col-12 p-0 mt-2" style="background-color: var(--secondary);">
                            <div class="text-light p-2">
                                <div class="row">
                                    <div class=" fa fa-envelope-open col-2" style="font-size:30px;"></div>
                                    <div class="col-10" style="font-size:11px;">Subscribe to our Mailing List to get
                                        the Updates to Your E-mail Inbox</div>
                                </div>
                            </div>
                            <div class="col-12 px-2 py-2" style="font-size:16px;">
                                <!-- Subscription Code start here -->
                                <form action="" method="post" class="subscribe_form">
                                    <input type="email" name="subscribe_email"
                                        class="w-100 mb-2 subscribe_email_footer" placeholder="name@example.com">
                                    <button type="submit" name="subcribe" class="btn btn-block text-white font-weight-bold subscribe-button">SUBSCRIBE</button>
                                </form>
                                <!-- Subscription Code ends here -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-2 mt-3" style="background-color:var(--primary)">
                        <div class="col-12 p-2 text-center" style="background-color: var(--secondary);">
                            <p style="font-size:10px;margin:0%;" class="text-white">APP DOWNLOAD NOW</p>
                        </div>
                        <div class="col-12 p-0 mt-2" style="background-color: var(--secondary);">
                            <div class="text-light p-2">
                                <div class="row">
                                    <div class="col-6"><a href="javascript:void(0)"><img src="{{asset('front-assets/img/app-store.png')}}"
                                                class="img-fluid" alt=""></a></div>
                                    <div class="col-6"><a href="javascript:void(0)"><img src="{{asset('front-assets/img/play-store.png')}}"
                                                class="img-fluid" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="copyright" style="border-top: 1px solid gray;">
            <div class="container-fluid px-1 text-center">
                <nav class="col-12 mx-auto">
                    <ul class="m-0 p-1">
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">About Us</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Contact Us</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Feedback</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Careers</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Advertisment with Us</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Sitemap</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Privacy Policy</a></li>
                        <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Disclamer</a></li>
                    </ul>
                </nav>
                <div class="col-sm-12 p-0">
                    <p>Copyright © 20219 All Rights Reserved | <a href="javascript:void(0)"
                            class="text-decoration-none text-light"> <b><span style="color:orange;">NEWS</span><span
                                    style="color:white;">15</span><span style="color:green">INDIA</span></b> </a>
                        (Mahira News Network Pvt. Ltd.)</p>
                </div>
            </div>
        </section>
    </footer>
    <!-- Modal -->
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
    <div id="mySidenav" class="sidenav mx-auto">
        <div class="container">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close &times;</a>
            <a class="navbar-brand" href=""><img src="img/logo.png" class="img-fluid" alt="" style="height: 40px;"></a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    
                </div>
                <div class="col-11"></div>
            </div>
        </div>
    </div>
    <button class="back-to-top" type="button"><i class="fas fa-angle-up"></i></button>
    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/weather.js')}}"></script>
    <script src="{{ asset('front-assets/js/time.js') }}"></script>
    <script src="{{ asset('front-assets/js/slick.js') }}"></script>
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
        });
    </script>
</body>

</html>
