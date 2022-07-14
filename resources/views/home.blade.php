@extends('layouts.frontend.master')
@section('title','Home')
@section('sections')
    <!-- Hero Section   -->
    <section class="container-fluid mt-md-1 mx-auto">
        <div class="row">
            <div class="col-md-4 px-0 mt-1 my-md-0 mobile-height">
                <div class="ml-md-1 px-1 px-md-0 h-100"> 
                    <video src="{{asset('front-assets/img/ncs.mp4')}}" autoplay loop controls class="w-100 h-100 home-video"></video>
                </div>
            </div>
            <div class="col-md-4 p-0 mt-1 my-md-0 ">
                <div class="mx-1">
                    <div class="box position-relative">
                        <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                            <div class="content-overlay"></div>
                            <div class="img-title" style="width: 75%;">
                                <h5 class="text-light">Man City into FA Cup semifinals, keeps quadruple dream alive</h5>
                                <p class="post-date m-0 py-1"><a href="#" class="text-white">7:00 AM | April 14</a>
                                </p>
                            </div>
                        </a>
                    </div>
                    <marquee behavior="scroll" direction="up" onmouseover="this.stop();" scrollamount="2"
                        onmouseout="this.start();" class="marquee" loop="true" scrolldelay="0s">
                        <div class="news-slider col">
                            <a href="" class="text-decoration-none">
                                <h2 class="slider-title">पति से झगड़ा कर अपनी 6 साल की बेटी को लेकर नहर में कूदी महिला का
                                    मिला शव, बच्ची की तलाश जारी</h2>
                            </a>
                        </div>
                        <div class="news-slider col">
                            <a href="" class="text-decoration-none ">
                                <h2 class="slider-title">कच्चे सफाई कर्मचारियों को गृह मंत्री अनिल विज की बड़ी सौगात , 42
                                    कर्मियों को किया ऑन रोल</h2>
                            </a>
                        </div>
                        <div class="news-slider col">
                            <a href="" class="text-decoration-none">
                                <h2 class="slider-title">होली के पर्व पर लगा कोरोना का ग्रहण , हरियाणा में होली मनाना हुआ
                                    बैन</h2>
                            </a>
                        </div>
                        <div class="news-slider col">
                            <a href="" class="text-decoration-none">
                                <h2 class="slider-title">होली के पर्व पर लगा कोरोना का ग्रहण , हरियाणा में होली मनाना हुआ
                                    बैन</h2>
                            </a>
                        </div>
                        <div class="news-slider col">
                            <a href="" class="text-decoration-none">
                                <h2 class="slider-title">होली के पर्व पर लगा कोरोना का ग्रहण , हरियाणा में होली मनाना हुआ
                                    बैन</h2>
                            </a>
                        </div>
                        <div class="news-slider col">
                            <a href="" class="text-decoration-none">
                                <h2 class="slider-title">होली के पर्व पर लगा कोरोना का ग्रहण , हरियाणा में होली मनाना हुआ
                                    बैन</h2>
                            </a>
                        </div>
                    </marquee>
                </div>
            </div>
            <div class="col-md-4 mt-1 p-0 my-md-0">
                <div class="mx-1 mb-4">
                    <a href="">
                        <img src="{{asset('front-assets/img/add.jpg')}}" style="height:105px;" class="img-fluid" width="100%" alt="">
                    </a>
                </div>
                <div class="mx-1 my-4">
                    <a href="">
                        <img src="{{asset('front-assets/img/add.jpg')}}" style="height:105px;" class="img-fluid" width="100%" alt="">
                    </a>
                </div>
                <div class="mx-1 mt-4">
                    <a href="">
                        <img src="{{asset('front-assets/img/add.jpg')}}" style="height:105px;" class="img-fluid" width="100%" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End  -->
    <!--Section 1 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-8 col-12 px-0 pr-md-1">
                <div class="container-fluid px-1 mb-1 d-flex align-items-center justify-content-between nav-height"
                    style="color: var(--text-color-light-hover);">
                    <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                    <select name="" class="language mx-1" style="border: 2px solid var(--primary);" id="">
                        <option value="">All</option>
                        <option value="">Delhi</option>
                        <option value="">Rajasthan</option>
                    </select>
                    <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-6 p-1">
                                <div class="box card-shadow" style="height:130px;">
                                    <a href="">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                        <div class="content-overlay" style="border-bottom:2px solid var(--primary);">
                                        </div>
                                        <div class="img-title">
                                            <p class="text-light">Man City into FA Cup semifinals, keeps quadruple dream
                                                alive</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 p-1">
                                <div class="box card-shadow" style="height:130px;">
                                    <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                        <div class="content-overlay" style="border-bottom:2px solid var(--primary);">
                                        </div>
                                        <div class="img-title">
                                            <p class="text-light">Man City into FA Cup semifinals, keeps quadruple dream
                                                alive</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 p-1 mt-md-2">
                                <div class="box card-shadow" style="height:130px;">
                                    <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                        <div class="content-overlay" style="border-bottom:2px solid var(--primary);">
                                        </div>
                                        <div class="img-title">
                                            <p class="text-light">Man City into FA Cup semifinals, keeps quadruple dream
                                                alive</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 p-1 mt-md-2">
                                <div class="box card-shadow" style="height:130px;">
                                    <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                        <div class="content-overlay" style="border-bottom:2px solid var(--primary);">
                                        </div>
                                        <div class="img-title">
                                            <p class="text-light">Man City into FA Cup semifinals, keeps quadruple dream
                                                alive</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-1">
                        <div class="card card-shadow mt-md-0 my-2" style="border-left:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-9 p-2">
                                        <h6 class="card-text">Some quick example text to build on the card title and make
                                            up.</h6>
                                        <p class="post-date m-0 ml-2" style="font-size: 1.1rem;">7:00 AM | April 14</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-2" style="border-left:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-9 p-2">
                                        <h6 class="card-text">Some quick example text to build on the card title and make
                                            up.</h6>
                                        <p class="post-date m-0 ml-2" style="font-size: 1.1rem;">7:00 AM | April 14</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div style="border-left:2px solid var(--primary);"
                            class="single-blog-post mt-md-0 mb-2  style-2 d-flex align-items-center card-shadow">
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui.
                                        Dolor numquam voluptates tempora!</h6>
                                </a>
                            </div>
                        </div>
                        <div style="border-left:2px solid var(--primary);"
                            class="single-blog-post mt-md-0 mb-2 style-2 d-flex align-items-center card-shadow">
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui.
                                        Dolor numquam voluptates tempora!</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 my-2 my-md-0 mb-md-2 px-md-1">
                        <div class="card card-shadow" style="border-left:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-9 p-2">
                                        <h6 class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's.</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mb-2 px-md-1">
                        <div class="card card-shadow" style="border-left:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-9 p-2">
                                        <h6 class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's.</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mb-2 mb-md-0 px-md-1">
                        <div class="card card-shadow" style="border-left:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-9 p-2">
                                        <h6 class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's.</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mb-2 mb-md-0 px-md-1">
                        <div class="card card-shadow" style="border-left:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-9 p-2">
                                        <h6 class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's.</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 mt-3 px-1">
                        <a href=""><img src="{{asset('front-assets/img/8x1ad.png')}}" width="100%" alt="" srcset=""></a>
                    </div>
                </div>
            </div>
            <aside class="col-md-4 col-12 my-3 my-md-0 px-0">
                <div
                    class="container-fluid px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="container-fluid px-1">
                    <a href="" class="text-decoration-none ">
                        <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                        <h5 class="mt-2 ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id quos vel est
                            possimus quisquam repellendus.</h5>
                    </a>
                    <p class="text-muted ">Some representati. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Laborum, nemo.</p>
                </div>
                <div class="style-2 border-top d-flex align-items-center px-1">
                    <div class="post-data mt-1">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 border-top d-flex align-items-center px-1">
                    <div class="post-data mt-1">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 border-top d-flex align-items-center px-1">
                    <div class="post-data mt-1">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!--Section End  -->
    <!-- Sectioon -2 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1 main-bg-clr">
                <div class="container-fluid px-1 mb-1 d-flex align-items-center justify-content-between nav-height"
                    style="color: var(--text-color-light-hover);">
                    <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                    <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                        id="">
                        <option value="">All</option>
                        <option value="">Delhi</option>
                        <option value="">Rajasthan</option>
                    </select>
                    <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-4 col-12 py-1">
                        <div class="row row-cols-2 row-cols-md-2 p-0">
                            <div class="col mb-3 px-2">
                                <div class="card card-shadow">
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 px-2">
                                <div class="card card-shadow">
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-2 px-2">
                                <div class="card card-shadow">
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-2 px-2">
                                <div class="card card-shadow">
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow mt-md-0 mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">Some quick example text to build on the card title..</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-11 my-md-0 px-1">
                <div class="my-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="side-bar">
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">7:00 AM | April 14</p>
                                    </div>
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-footer d-none d-md-flex justify-content-between align-items-center">
                </div>
            </aside>
        </div>
    </section>
    <!-- Sectioon -2 End -->
    <!-- Sectioon -3 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1">
                <div class="container-fluid px-1 mb-1 d-flex align-items-center justify-content-between nav-height"
                    style="color: var(--text-color-light-hover);">
                    <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                    <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                        id="">
                        <option value="">All</option>
                        <option value="">Delhi</option>
                        <option value="">Rajasthan</option>
                    </select>
                    <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-6 col-12 py-1 px-1">
                        <div class="container-fluid p-0">
                            <a href="" class="text-decoration-none">
                                <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                                <h5 class="mt-2 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus
                                    doloremque dolorum laborum voluptate.</h5>
                            </a>
                            <p class="text-muted">Some representati. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Laborum, nemo.</p>
                        </div>
                        <div class="style-2 border-top d-flex align-items-center px-1 py-2">
                            <div class="post-data mt-1">
                                <a href="#" class="post-title">
                                    <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus doloremque dolorum
                                        laborum voluptate.</h5>
                                </a>
                            </div>
                        </div>
                        <div class="style-2 border-top d-flex align-items-center px-1 py-2">
                            <div class="post-data mt-1">
                                <a href="#" class="post-title">
                                    <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus doloremque dolorum
                                        laborum voluptate.</h5>
                                </a>
                            </div>
                        </div>
                        <div class="style-2 border-top d-flex align-items-center px-1 py-2 pt-md-1 pb-md-0">
                            <div class="post-data mt-1">
                                <a href="#" class="post-title">
                                    <h5 class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus
                                        doloremque dolorum laborum voluptate.</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-1">
                        <div class="card mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-8 col-md-8 p-0 px-2">
                                        <h6 class="card-text p-md-3 p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Similique labore placeat delectus eius tempora.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-8 col-md-8 p-0 px-2">
                                        <h6 class="card-text p-md-3 p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Similique labore placeat delectus eius tempora.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-8 col-md-8 p-0 px-2">
                                        <h6 class="card-text p-md-3 p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Similique labore placeat delectus eius tempora.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-8 col-md-8 p-0 px-2">
                                        <h6 class="card-text p-md-3 p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Similique labore placeat delectus eius tempora.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-8 col-md-8 p-0 px-2">
                                        <h6 class="card-text p-md-3 p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Similique labore placeat delectus eius tempora.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-12 mt-1 my-md-0 px-1">
                <div
                    class="container-fluid px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="col-md-12 px-0">
                    <div class="single-item">
                        <div class="holder">
                            <div class="box mt-1">
                                <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                    <div class="content-overlay"></div>
                                </a>
                                <div class="img-title"><a href="">
                                        <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream
                                            alive
                                        </h6>
                                    </a>
                                    <p class="post-date m-1"><a href=""></a><a href="#"
                                            class="text-white">7:00 AM | April 14</a></p>
                                </div>

                            </div>
                        </div>
                        <div class="holder">
                            <div class="box mt-1">
                                <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                    <div class="content-overlay"></div>
                                </a>
                                <div class="img-title"><a href="">
                                        <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream
                                            alive
                                        </h6>
                                    </a>
                                    <p class="post-date m-1"><a href=""></a><a href="#"
                                            class="text-white">7:00 AM | April 14</a></p>
                                </div>

                            </div>
                        </div>
                        <div class="holder">
                            <div class="box mt-1">
                                <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="img-fluid" alt="">
                                    <div class="content-overlay"></div>
                                </a>
                                <div class="img-title"><a href="">
                                        <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream
                                            alive
                                        </h6>
                                    </a>
                                    <p class="post-date m-1"><a href=""></a><a href="#"
                                            class="text-white">7:00 AM | April 14</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box mt-1">
                        <a href=""><img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 180px;" class="w-100"
                                alt="">
                        </a>
                    </div>
                    <div class="col-12 p-0 my-1 " style="background-color:#FE9517;">
                        <div class="text-center">
                            <h2 class="text-dark">SUBSCRIBE</h2>
                        </div>
                        <div class="col p-2">
                            <div class="bg-dark text-white py-4 px-1">
                                <div class="text-center ">
                                    <h5 class="text-white">Lorem ipsum dolor sit amet consectetu.?</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-3">
                                    <form action="" style="font-size: medium;">
                                        <div class="my-4 px-0">
                                            <input type="email" style="outline: none;"
                                                class="py-2 px-3 position-relative w-100 " placeholder="E-mail ID">
                                        </div>
                                    </form>
                                    <button class="btn position-absolute text-white py-2"
                                        style="right:8px;font-size: medium; background-color:#FE9517;">SUBSCRIBE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-- Sectioon -3 End -->
    <!-- Sectioon - 4 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <aside class="col-md-3 side-position mx-auto col-12 my-md-0 px-1">
                <div class="col-md-12 px-0">
                    <a href=""><img src="{{asset('front-assets/img/job-ad.png')}}" class="w-100" alt="" srcset=""></a>
                </div>
                <div
                    class="container-fluid my-1 px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="col-md-12 px-0">
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-1">
                            <a href="#" class="post-title ">
                                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui delectus sit
                                    corrupti consectetur quos.</h5>
                            </a>
                        </div>
                    </div>
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-1">
                            <a href="#" class="post-title ">
                                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui delectus sit
                                    corrupti consectetur quos.</h5>
                            </a>
                        </div>
                    </div>
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-1">
                            <a href="#" class="post-title  ">
                                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui delectus sit
                                    corrupti consectetur quos.</h5>
                            </a>
                        </div>
                    </div>
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-1">
                            <a href="#" class="post-title  ">
                                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui delectus sit
                                    corrupti consectetur quos.</h5>
                            </a>
                        </div>
                    </div>
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-1">
                            <a href="#" class="post-title  ">
                                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui delectus sit.</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-md-9 col-12 px-0">
                <div class="container-fluid mt-1 px-1 d-flex align-items-center justify-content-between nav-height"
                    style="color: var(--text-color-light-hover);">
                    <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                    <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                        id="">
                        <option value="">All</option>
                        <option value="">Delhi</option>
                        <option value="">Rajasthan</option>
                    </select>
                    <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
                </div>
                <div class="container-fluid">
                    <div class="row row-cols-2 row-cols-md-6 p-0" style="background-color: #E3E9FF;">
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-6 p-0" style="background-color: #E3E9FF;">
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur, adipisicing
                                            elit. Ullam at omnis alias
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-1 d-flex align-items-center justify-content-between"
                        style="color: var(--text-color-light-hover);">
                        <i class="fa fa-sort-up mr-1"
                            style="color:var(--primary);font-size:40px;transform: rotate(45deg);"></i>
                        <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                        <div class="w-100 mx-3"
                            style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                            <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                                \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                                \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                        </div>
                        <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                        <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 px-1 col-12">
                            <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 px-1 col-12">
                            <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 px-1 col-12">
                            <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                style="border-left:2px solid var(--primary);">
                                <a href="">
                                    <div class="card-horizontal">
                                        <div class="card-body col-8 col-md-8 p-0 px-2">
                                            <h6 class="card-text p-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.</h6>
                                        </div>
                                        <div class="img-square-wrapper col-4 col-md-4 p-0">
                                            <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sectioon - 4 End -->
    <!-- Section - 5 Start  -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1">
                <div class="container-fluid mb-1 px-1 d-flex align-items-center justify-content-between nav-height"
                    style="color: var(--text-color-light-hover);">
                    <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                    <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                        id="">
                        <option value="">All</option>
                        <option value="">Delhi</option>
                        <option value="">Rajasthan</option>
                    </select>
                    <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-6 col-12 p-0">
                        <a href=""><img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid w-100" alt=""
                                srcset=""></a>
                    </div>
                    <div class="col-md-6 col-12 p-0">
                        <div class="col-md-12 px-0">
                            <div class="style-2 border-top d-flex align-items-center px-1">
                                <div class="post-data mt-1">
                                    <a href="#" class="post-title ">
                                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui
                                            delectus sit
                                            corrupti consectetur quos.</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="style-2 border-top d-flex align-items-center px-1">
                                <div class="post-data mt-1">
                                    <a href="#" class="post-title ">
                                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui
                                            delectus sit
                                            corrupti consectetur quos.</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="style-2 border-top d-flex align-items-center px-1">
                                <div class="post-data mt-1">
                                    <a href="#" class="post-title  ">
                                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui
                                            delectus sit</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="style-2 border-top d-flex align-items-center px-1">
                                <div class="post-data mt-1">
                                    <a href="#" class="post-title ">
                                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis qui
                                            delectus sit</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <section class="container-fluid mx-auto">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 px-1 ">
                                <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 px-1 ">
                                <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 px-1 ">
                                <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                                    style="border-left:3px solid var(--primary);">
                                    <a href="">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper col-4 col-md-4 p-0">
                                                <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body col-8 col-md-8 p-0 pl-1">
                                                <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing elit.</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-11 my-3 my-md-0 px-1">
                <div
                    class="container-fluid px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="container-fluid px-0 px-md-4">
                    <div class="col p-md-1">
                        <a href="" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 p-0 pl-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col p-md-1">
                        <a href="" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 p-0 pl-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col p-md-1">
                        <a href="" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 p-0 pl-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col p-md-1">
                        <a href="" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 p-0 pl-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col p-md-1">
                        <a href="" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 p-0 pl-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col p-md-1">
                        <a href="" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 p-0 pl-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-- Section -5 End  -->
    <!-- Section -6 start  -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1">
                <div class="container-fluid mb-1 px-1 d-flex align-items-center justify-content-between nav-height"
                    style="color: var(--text-color-light-hover);">
                    <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                    <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                    <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                        id="">
                        <option value="">All</option>
                        <option value="">Delhi</option>
                        <option value="">Rajasthan</option>
                    </select>
                    <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
                </div>
                <div class="container-fluid">
                    <div class="row row-cols-2 row-cols-md-4 p-0">
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-4 p-0">
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="" class=""><img src="{{asset('front-assets/img/breaking-news.png')}}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-2">
                                    <a href="" class="text-dark text-decoration-none">
                                        <h5 class="mb-1 text-left text-dark">Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                        </h5>
                                    </a>
                                    <p class="my-0 text-left text-muted">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-12 my-md-0 px-1">
                <div class="d-flex bg-dark align-items-center justify-content-center mt-1 py-2">
                    <h4 style="color:#f2f2f2; font-weight:600;">Join Our whatsapp Group</h4>
                </div>
                <div class="p-0">
                    <div class="p-0 mb-1">
                        <img src="{{asset('front-assets/img/whatsapp.jpg')}}" class=" w-100 p-0" alt="" srcset="">
                    </div>
                    <div class="p-0 mb-1">
                        <img src="{{asset('front-assets/img/score.png')}}" class="img-fluid p-0" alt="" srcset="">
                    </div>
                    <div class="p-0 mb-1">
                        <img src="{{asset('front-assets/img/square-ad.png')}}" class=" w-100 p-0" style="height:250px;" alt=""
                            srcset="">
                    </div>
                </div>
            </aside>
            <section class="container-fluid mx-auto">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/breaking-news.png')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- Section - 6 End  -->
    <!-- Section - 7 Start  -->
    <section class="container-fluid mx-auto mt-2">
        <div class="row">
            <div class="container-fluid mb-1 px-1 d-flex align-items-center justify-content-between nav-height"
                style="color: var(--text-color-light-hover);">
                <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                <div class="w-100 mx-3"
                    style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                    <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                        \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                        \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                </div>
                <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Udaipur</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Ajmer</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                    id="">
                    <option value="">All</option>
                    <option value="">Delhi</option>
                    <option value="">Rajasthan</option>
                </select>
                <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
            </div>
            <div class="container-fluid mx-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card border-bottom-0 border-right-0 border-top-0 my-2"
                            style="border-left:3px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/square.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quod
                                            nihil
                                            possimus voluptate.
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mx-auto">
                <div class="row row-cols-1 row-cols-md-4 p-0">
                    <div class="col mb-2 px-0 ">
                        <div class="card-body p-4 border-right">
                            <a href="" class="text-decoration-none">
                                <h4 class="mb-2  text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-0  text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                        </div>
                    </div>
                    <div class="col mb-2 px-0 ">
                        <div class="card-body p-4 border-right">
                            <a href="" class="text-decoration-none">
                                <h4 class="mb-2  text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-0  text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                        </div>
                    </div>
                    <div class="col mb-2 px-0 ">
                        <div class="card-body p-4 border-right">
                            <a href="" class="text-decoration-none">
                                <h4 class="mb-2  text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-0  text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                        </div>
                    </div>
                    <div class="col mb-2 px-0 ">
                        <div class="card-body p-4 border-right">
                            <a href="" class="text-decoration-none">
                                <h4 class="mb-2  text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-0  text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section - 7 End  -->
    <!-- Section - 8 Start  -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="container-fluid px-1 my-1 d-flex align-items-center justify-content-between nav-height"
                style="color: var(--text-color-light-hover);">
                <h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                <div class="w-100 mx-3"
                    style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                    <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                        \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                        \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                </div>
                <li class="d-none d-md-block"><a class="section-link" href="">Jaipur</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">kota</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Tonk</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Udaipur</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Ajmer</a></li>
                <li class="d-none d-md-block"><a class="section-link" href="">Bikarner</a></li>
                <select name="" class="language mx-1" style="border: 2px solid var(--primary);"
                    id="">
                    <option value="">All</option>
                    <option value="">Delhi</option>
                    <option value="">Rajasthan</option>
                </select>
                <a href="" class="fa fa-chevron-left nav-link text-dark"></a>
                <a href="" class="fa fa-chevron-right nav-link text-dark"></a>
            </div>
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-md-4 p-0">
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-4 p-0">
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                    <div class="col my-2 px-md-1">
                        <div class="card-body p-2"
                            style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                            <a href="" class="text-decoration-none">
                                <h4 class="my-0 text-dark">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </h4>
                            </a>
                            <p class="my-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Rem non rerum, quas repellat unde deleniti suscipit modi porro amet veniam.</p>
                            <div class="news-status py-1">7:00 AM | April 14</div>
                        </div>
                        <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <aside class="col-md-4 col-12 mb-1 my-md-0 px-0">
                <div
                    class="container-fluid px-1 my-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="container-fluid px-1">
                    <a href="" class="text-decoration-none ">
                        <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt=""
                            style="border-bottom: 4px solid var(--primary);">
                        <h5 class="mt-2 ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id quos vel est
                            possimus quisquam repellendus.</h5>
                    </a>
                    <p class="post-date m-0 py-1">
                        7:00 AM | April 14
                    </p>
                    <p class="text-muted ">Some representati. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Laborum, nemo.</p>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
            </aside>
            <aside class="col-md-4 col-12 mb-1 my-md-0 px-0">
                <div
                    class="container-fluid my-1 px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="container-fluid px-1">
                    <a href="" class="text-decoration-none ">
                        <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt=""
                            style="border-bottom: 4px solid var(--primary);">
                        <h5 class="mt-2 ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id quos vel est
                            possimus quisquam repellendus.</h5>
                    </a>
                    <p class="post-date m-0 py-1">
                        7:00 AM | April 14
                    </p>
                    <p class="text-muted ">Some representati. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Laborum, nemo.</p>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
            </aside>
            <aside class="col-md-4 col-12 mb-1 my-md-0 px-0">
                <div
                    class="container-fluid px-1 my-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="container-fluid px-1">
                    <a href="" class="text-decoration-none ">
                        <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt=""
                            style="border-bottom: 4px solid var(--primary);">
                        <h5 class="mt-2 ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id quos vel est
                            possimus quisquam repellendus.</h5>
                    </a>
                    <p class="post-date m-0 py-1">
                        7:00 AM | April 14
                    </p>
                    <p class="text-muted ">Some representati. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Laborum, nemo.</p>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
                <div class="style-2 d-flex align-items-center mx-3" style="border-bottom:2px dotted gray;">
                    <div class="post-data mt-1  ">
                        <a href="#" class="post-title">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis qui. Dolor
                                numquam voluptates tempora!</h5>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-- Section - 8 End  -->
@endsection