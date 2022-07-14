<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap v4.6 CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
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
     <!--Top Header Strip  -->
    <div class="small-top d-md-block d-none">
        <div class="container-fluid mx-auto">
            <div class="row">
                <div class="col-md-3 d-none d-md-block d-md-flex justify-content-start">
                    <div class="social-icon">
                        <a target="_blank" href="#" class="fab fa-facebook-f"></a>
                        <a target="_blank" href="#" class="fab fa-twitter"></a>
                        <a target="_blank" href="#" class="fab fa-google-plus"></a>
                        <a target="_blank" href="#" class="fab fa-linkedin-in"></a>
                        <a target="_blank" href="#" class="fab fa-youtube"></a>
                        <a target="_blank" href="#" class="fab fa-instagram"></a>
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-block date-time text-center align-items-center">
                    <p class="m-0 date-time mt-2">
                        <span id="day" class=" font-weight-bold"></span> : <span class=" font-weight-bold" id="datetime"></span>
                    </p>
                </div>
                <div class="col-md-5 d-none d-md-block login-singup pr-1 text-right">
                    <a href="" class="p-2 mr-2 language language-hover"><img src="{{asset('front-assets/img/language.png')}}" class="img-fluid" alt="" srcset="" style="margin-top: -10px;width: 20px;"> English</a>
                    <a href="" class="google-play p-2 mr-2"><i class="fas fa-download"></i> Download App</a>
                    <a href="#"><i class="fas fa-bell mr-2"></i>SUBSCRIBE</a>
                    <a type="button" class="" data-toggle="modal" data-target="#exampleModal"><i class=" fas fa-user mr-1"></i> Login / Signup</a>
                </div>
            </div>
        </div>
    </div>
    <!--Top Header Strip End  -->
    <!-- Desktop Nav Bar Start   -->
    <header class="sticky-top start-header mx-auto mega-menu-navbar">
        <div class="container-fluid mx-auto">
            <div class="row">
                <div class="col-md-2-custom col-12 px-md-1 pt-0 d-flex justify-content-between justify-content-md-start mobile-toggle align-items-center">
                    <a href="{{url('/')}}">
                        <div class="navbar-brand p-0">
                            <img src="{{asset('front-assets/img/logo.png')}}" class="img-fluid" style="margin-top:-11px;" alt="logo">
                        </div>
                    </a>
                    <a href="" class="d-md-none p-1 text-center" style="font-size: 12px;"><i class="fas fa-cloud-download-alt mt-3" style="font-size:20px;"></i> <br> Download</a>
                    <a href="" class="d-md-none p-1 text-center" style="font-size: 12px;"><img src="{{asset('./img/english.png')}}" class="mt-2" alt="" srcset="" style="width: 23px;height:auto;"><br> English</a>
                </div>
                <div class="col-md-9-custom d-md-block d-none">
                    <!-- Main Navbar Start -->
                    <nav class="nav sticky-top d-none d-lg-block d-md-block">
                        <ul class="ul-reset ml-2 ">
                            <li><a href="index.html" class=" nav-link ml-4">Home</a></li>

                            <li class="nav-item-sub p-relative">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="fas fa-angle-down"></span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </div>
                            </li>

                            <li class="nav-item-sub p-relative">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MultiLevel Dropdown <span class="fas fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-sub dropright">
                                        <a data-toggle="dropdown" class="dropdown-item dropdown-toggle" href="#">Sub-menu</a>
                                        <ul class="dropdown-sub-menu" role="menu">
                                            <li><a href="#" class="dropdown-item">Sub Link 1</a></li>
                                            <li><a href="#" class="dropdown-item">Sub Link 2</a></li>
                                            <li><a href="#" class="dropdown-item">Sub Link 3</a></li>
                                            <li class="dropdown-sub-2 dropright">
                                                <a data-toggle="dropdown" class="dropdown-item dropdown-toggle" href="#">Sub-Link-Dropdown</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    <li><a href="#" class="dropdown-item">Sub Link 1</a></li>
                                                    <li><a href="#" class="dropdown-item">Sub Link 2</a></li>
                                                    <li><a href="#" class="dropdown-item">Sub Link 3</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-sub dropright">
                                        <a data-toggle="dropdown" class="dropdown-item dropdown-toggle" href="#">Sub-menu</a>
                                        <ul class="dropdown-sub-menu" role="menu">
                                            <li class="dropdown-sub-2 dropright">
                                                <a data-toggle="dropdown" class="dropdown-item dropdown-toggle" href="#">Sub-Link-Dropdown</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    <li><a href="#" class="dropdown-item">Sub Link 1</a></li>
                                                    <li><a href="#" class="dropdown-item">Sub Link 2</a></li>
                                                    <li><a href="#" class="dropdown-item">Sub Link 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Sub Link 1</a></li>
                                            <li><a href="#" class="dropdown-item">Sub Link 2</a></li>
                                            <li class="dropdown-sub-2 dropright">
                                                <a data-toggle="dropdown" class="dropdown-item dropdown-toggle" href="#">Sub-Link-Dropdown</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    <li><a href="#" class="dropdown-item">Sub Link 1</a></li>
                                                    <li><a href="#" class="dropdown-item">Sub Link 2</a></li>
                                                    <li><a href="#" class="dropdown-item">Sub Link 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Sub Link 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Link 1</a></li>
                                    <li><a href="#" class="dropdown-item">Link 2</a></li>
                                    <li><a href="#" class="dropdown-item">Link 3</a></li>
                                    <li><a href="#" class="dropdown-item">Link 4</a></li>
                                    <li><a href="#" class="dropdown-item">Link 5</a></li>
                                </ul>
                            </li>

                            <li><a href='#' class="nav-link">Category Three</a></li>
                        </ul>
                    </nav>
                    <!-- Main Navbar End  -->
                </div>
                <!-- Search Button  -->
                <div class="col-md-1 px-1 d-none d-md-flex justify-content-end">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default navbar-btn">
                        <span class="fa fa-search text-light desktop-search" aria-hidden="true"></span>
                    </button>
                </div>
                <!-- Search Button End  -->
            </div>
            <!-- Container End  -->
        </div>    
    </header>
    <!-- Desktop Nav Bar End 
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
    <div class="container-fluid d-md-none mb-1 d-block mobile-news-alert">
        <div class="row">
            <div class="col-4 px-1 text-center bg-primary-clr">
                <h6 class="breaking-news-mobile font-weight-bold mt-2">BREAKING NEWS</h6>
            </div>
            <div class="col-8 px-1 bg-dark-pure">
                <marquee behavior="scroll" direction="left" class="" onmouseover="this.stop();" scrollamount="4" onmouseout="this.start();">
                    <a href="" class="text-decoration-none text-light">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, sapiente!</h2>
                    </a>
                    <a href="" class="text-decoration-none text-light">
                        <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam, numquam.</h2>
                    </a>
                    <a href="" class="text-decoration-none text-light">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, labore.</h2>
                    </a>
                </marquee>
            </div>
        </div>
    </div>
    <!-- Mobile Breaking News Marquee End  -->
    @yield('sections')
    <footer class="nb-footer mt-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="footer-info-single">
                        <h4 class="title">Latest News</h4>
                        <ul class="list-unstyled">
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Crime News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Covid-19 News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Political News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> National News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Knowledged News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Religion News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Sport News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Career News</a></li>
                            <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Social Media News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Life Style</h4>
                                <ul class="list-unstyled">
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Standard of Living</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Right Diet</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Relationship</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Tourism</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Money Talk</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Education</h4>
                                <ul class="list-unstyled">
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Sarkari Exam</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Current Affairs</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> General Knowledged</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Result</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Exam</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Success Story</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Gadgets</h4>
                                <ul class="list-unstyled">
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Automobiles</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Talk to Easy</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Tablet/Computer</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Mobile</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 px-1 col-sm-6">
                            <div class="footer-info-single">
                                <h4 class="title">Female</h4>
                                <ul class="list-unstyled">
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Housekeeping</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Child Care</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Current Affairs</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Woman Power</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Pregnancy</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Fashion</a></li>
                                    <li><a href="" title=""><i class="fa fa-angle-double-right"></i> Beauty Tips</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 px-1">
                            <img src="{{asset('front-assets/img/flag-color.png')}}" class="img-fluid footer-img" alt="">
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-6">
                    <div class="bg-warning p-2 mt-3">
                        <div class="col-12 p-2 text-center" style="background-color: var(--secondary);">
                            <p style="font-size:10px;color:white;margin:0%;">SUBSCRIBE TO OUR DAILY NEWSLETTER</p>
                        </div>
                        <div class="col-12 p-0 mt-2" style="background-color: var(--secondary);">
                            <div class="text-light p-2">
                                <div class="row">
                                    <div class=" fa fa-envelope-open col-2" style="font-size:30px;"></div>
                                    <div class="col-10" style="font-size:11px;">Subscribe to our Mailing List to get the Updates to Your E-mail Inbox</div>
                                </div>
                            </div>
                            <div class="col-12 px-2 py-2" style="font-size:16px;">
                               <!-- Subscription Code start here -->
                               <form action="" method="post" class="subscribe_form"> 
                                 <input type="email" name="subscribe_email" class="w-100 mb-2 subscribe_email_footer" placeholder="name@example.com">
                                 <button type="submit" name="subcribe" style="font-size:16px;" class="btn btn-block btn-warning font-weight-bold">SUBSCRIBE</button>
                               </form>
                               <!-- Subscription Code ends here -->  
                            </div>
                        </div>
                    </div>
                    <div class="col-12 bg-warning p-2 mt-3">
                        <div class="col-12 p-2 text-center" style="background-color: var(--secondary);">
                            <p style="font-size:10px;color:yellow;margin:0%;">APP DOWNLOAD NOW</p>
                        </div>
                        <div class="col-12 p-0 mt-2" style="background-color: var(--secondary);">
                            <div class="text-light p-2">
                                <div class="row">
                                    <div class="col-6"><a href=""><img src="img/app-store.png" class="img-fluid" alt=""></a></div>
                                    <div class="col-6"><a href=""><img src="img/play-store.png" class="img-fluid" alt=""></a></div>
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
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">About Us</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Contact Us</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Feedback</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Careers</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Advertisment with Us</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Sitemap</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Privacy Policy</a></li>
                        <li class="nav-item"><a class="p-0 nav-link text-white" href="">Disclamer</a></li>
                    </ul>
                </nav>
                <div class="col-sm-12 p-0">
                    <p>Copyright © 20219 All Rights Reserved | <a href="" class="text-decoration-none text-light"> <b><span style="color:orange;">NEWS</span><span style="color:white;">15</span><span style="color:green">INDIA</span></b> </a> (Mahira News Network Pvt. Ltd.)</p>
                </div>
            </div>
        </section>
    </footer>
    <!-- Modal -->
    <div class="modal fade" style="font-size: 1.6rem;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item w-50 text-center" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item w-50 text-center" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Signup</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container d-flex justify-content-center">
                                <img src="./img/logo.png" class="img-fluid p-3 mx-auto w-50" alt="">
                            </div>
                            <div class="container">
                                <h2 class="line"><span>Sign in Via </span></h2>
                                <div class="col-md-12 text-center px-0 px-md-3">
                                    <div class="row justify-content-center m-0">
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="" class="m-0 social-tab social-tab-f"><i class="fab fa-facebook-f mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="" class="m-0 social-tab social-tab-t"><i class="fab fa-twitter mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="" class="m-0 social-tab social-tab-g"><i class="fab fa-google-plus mr-1"></i> Login with Facebook</a>
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
                                                <input type="tel" name="l_mobile" id="l_mobile" placeholder="Enter 10 Digits Mobile Number" required />
                                            </div>
                                            <div class="input_field"> 
                                                <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                                <input type="password" name="l_password" id="l_password" placeholder="Enter Password" required autocomplete="off"/>
                                            </div>
                                            <div class="col-12 px-2">
                                                <div class="row m-0 justify-content-center">
                                                    <div class="col p-0 text-left input_field checkbox_option">
                                                        <input type="checkbox" id="cb1">
                                                        <label for="cb1">Remember Me</label>
                                                    </div>
                                                    <div class="col p-0 text-right input_field checkbox_option">
                                                        <a href="" class=" font-weight-bold text-danger">Forget Password ?</a>
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
                                                <a href="javascript:void(0)" data-modal="close" class="link-after-button">Go Back To NEWS15INDIA</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container d-flex justify-content-center">
                                <img src="./img/logo.png" class="img-fluid p-3 mx-auto w-50" alt="">
                            </div>
                            <div class="container">
                                <h2 class="line"><span>Sign Up By </span></h2>
                                <div class="col-md-12 text-center px-0 px-md-3">
                                    <div class="row justify-content-center m-0">
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="" class="m-0 social-tab social-tab-f"><i class="fab fa-facebook-f mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="" class="m-0 social-tab social-tab-t"><i class="fab fa-twitter mr-1"></i> Login with Facebook</a>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <a href="" class="m-0 social-tab social-tab-g"><i class="fab fa-google-plus mr-1"></i> Login with Facebook</a>
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
                                            <div class="row m-0 clearfix">
                                                <div class="inner col_half">
                                                    <div class="input_field">
                                                    <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                    <input type="text" id="name" name="name" placeholder="Full Name" required/>
                                                    </div>
                                                </div>
                                                <div class="inner col_half">
                                                    <div class="input_field"> 
                                                        <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                                        <input type="email" id="email" name="email" placeholder="Email Address" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-0 clearfix">
                                                <div class="inner col_half">
                                                    <div class="input_field"> 
                                                        <span><i aria-hidden="true" class="fa fa-mobile"></i></span>
                                                        <input type="tel" id="mobile_no" name="mobile_no" placeholder="10 Digits Mobile number" required />
                                                    </div>
                                                </div>
                                                <div class="inner col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-map-marker-alt"></i></span>
                                                        <input type="text" id="pincode" name="pincode" placeholder="City Pincode" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-0 clearfix">
                                                <div class="inner col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                                        <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="inner col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-2 input_field m-0 checkbox_option">
                                                <input type="checkbox" id="cb4" checked>
                                                <label for="cb4">I agree to the <span class="text-info">SSO Login Privacy Terms</span> and I Warrant that I am above 18 Years of age. *</label>
                                            </div>
                                            <div class="px-2 input_field m-0 checkbox_option">
                                                <input type="checkbox" id="cb2" checked>
                                                <label for="cb2">I agree to the processing of my personal information for profiling such as My Credits, Follow activity, Personalised recommendations and Advertisments.</label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="" id="signup-msg-container">
                                                    <strong id="signup-msg-text"></strong>
                                                </div>
                                                <input class="button button-signup" type="submit" value="Sign Up" />
                                            </div>
                                            <div class="col-12 text-center">
                                                <a href="javascript:void(0)" data-modal="close" class="link-after-button">Go Back To NEWS15INDIA</a>
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
    {{-- <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/weather.js')}}"></script>
    <script src="{{ asset('front-assets/js/login.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front-assets/js/index-script.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        });
    </script>
</body>

</html>
