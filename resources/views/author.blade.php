@extends('layouts.frontend.master')
@section('title','Category')
@section('sections')
<main class="container-fluid mx-auto">
    <div class="row">
        <!-- Ad Banner  -->
        <section class="container-fluid mx-auto px-0 text-center">
            <a href=""><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
        </section>
        <!-- Ad Banner  -->
        <aside class="col-md-3 col-12 my-1 px-1 my-md-0 order-2 order-md-1">
            <div class="col-12 p-0 mt-1">
                <img src="{{asset('front-assets/img/pepsi-ad.png')}}" class="w-100" alt="">
            </div>
            <div class="col-12 p-0 mt-1" style="background-color:#FE9517;">
                <div class="text-center">
                    <h2 class="text-dark m-0">YOUR VOTE</h2>
                </div>
                <div class="col p-2">
                    <div class="bg-white p-4">
                        <div class="text-center">
                            <h5>Lorem ipsum dolor sit amet consectetur. ?</h5>
                        </div>
                        <form action="" style="font-size: medium;">
                            <div class="custom-control custom-radio py-3" style="border-top: 2px dotted black; border-bottom:1px solid black;">
                                <input type="radio" id="customRadio1" name="customRadio">
                                <label for="customRadio1">YES</label>
                            </div>
                            <div class="custom-control custom-radio py-3" style="border-bottom:1px solid black;">
                                <input type="radio" id="customRadio2" name="customRadio">
                                <label for="customRadio2">NO</label>
                            </div>
                            <div class="custom-control custom-radio py-3" style="border-bottom:1px solid black;">
                                <input type="radio" id="customRadio3" name="customRadio">
                                <label for="customRadio3">I Never Know</label>
                            </div>
                            <div class="custom-control custom-radio py-3" style="border-bottom:1px solid black;">
                                <input type="radio" id="customRadio4" name="customRadio">
                                <label for="customRadio4">I Dont Know</label>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between py-3">
                            <button class="btn btn-dark" style="font-size: medium;">VOTE</button>
                            <button class="btn btn-dark" style="font-size: medium;">VIEW RESULT</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                <div class="container-fluid bg-dark d-flex align-items-center justify-content-between py-2 nav-height" style="color: var(--text-color-light-hover);">
                    <h4 class="mr-2" style="color:#f2f2f2; font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" style="font-size: medium;" class="nav-link text-white">MORE</a>
                </div>
                <div class="single-item">
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href=""><img src="{{asset('front-assets/img/square.jpg')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title"><a href="">
                                    <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                    </h6>
                                </a>
                                <p class="post-date m-1"><a href=""></a><a href="#" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href=""><img src="{{asset('front-assets/img/square-ad.png')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title"><a href="">
                                    <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                    </h6>
                                </a>
                                <p class="post-date m-1"><a href=""></a><a href="#" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href=""><img src="{{asset('front-assets/img/pepsi-ad.png')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title"><a href="">
                                    <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                    </h6>
                                </a>
                                <p class="post-date m-1"><a href=""></a><a href="#" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mt-1 side-position mx-auto">
                <div class="my-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <h4 style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="side-bar">
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
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
                <div class="side-footer d-none d-xl-flex justify-content-between align-items-center">
                </div>
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                <div class="container-fluid d-flex align-items-center justify-content-between py-2 nav-height" style="color: var(--text-color-light-hover);">
                    <h4 class="mr-2" style="color: var(--primary); font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="fa fa-chevron-left nav-link text-clr-primary"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-clr-primary"></a>
                </div>
                <div class="single-item">
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="#">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                            <div class="img-title">
                                <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                </h6>
                                <p class=" m-1"><a href=""></a><a href="#" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="#">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                            <div class="img-title">
                                <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                </h6>
                                <p class=" m-1"><a href=""></a><a href="#" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="#">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                            <div class="img-title">
                                <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                </h6>
                                <p class=" m-1"><a href=""></a><a href="#" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mt-1 side-position mx-auto">
                <div class="container-fluid d-flex align-items-center justify-content-between bg-dark py-2 nav-height">
                    <h4 style="color:#FE9517; font-weight:600;">Rajasthan</h4>
                    <div class="w-100 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="" class="nav-link p-0" style="color:#FE9517;font-size:medium;">Read More</a>
                </div>
                <div class="side-bar" style="height: 300px;background-color:#333;">
                    <div class=" my-1" style="background-color:#333;">
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">1</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">2</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">3</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">4</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">5</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">6</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">7</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">8</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">9</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="#" class="post-title">
                                    <div class="row m-0">
                                        <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">10</span>
                                        <div class="post-meta col-10 p-0">
                                            <p style="color:#f2f2f2;" class="post-date m-0 ">7:00 AM | April 14</p>
                                            <h6 style="color:#f2f2f2;">Pellentesque mattis arcu massa, nec fringilla turpis</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="col-md-9 col-12 px-1 pr-md-1 order-1 order-md-2">
            <div class="container-fluid mx-auto px-0 mt-1">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-md-3 col-12 bg-primary w-100 p-2 text-center">
                        <img src="{{asset('front-assets/img/user.png')}}" class="text-center img-fluid mt-md-3" style="height:175px;border:5px solid white;border-radius:50%;" alt="">
                    </div>
                    <div class="col-md-9 col-12" style="background-color: #d8d8d8;">
                        <div class="col-12 px-1 text-center flag-author-border">
                            <span class="flag-color-news flag-color"><b>NEWS</b></span><span class="flag-color-15 flag-color"><b>15</b></span><span class="flag-color-india flag-color"><b>INDIA</b> </span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="col-md-7 col-12 px-4 my-3 author-des">
                                <a href="">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:0px;"><i class="mr-md-3 mr-2 fas fa-user"></i> Abdul Malik</p>
                                </a>
                                <a href="">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:0px;"><i class=" mr-2 mr-md-3 fas fa-envelope"></i>info@news15indi.com</p>
                                </a>
                                <a href="">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:0px;"><i class=" mr-2 mr-md-3 far fa-user-crown"></i>Editor in chief</p>
                                </a>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="d-flex flex-wrap justify-content-around align-items-center text-center">
                                    <a target="_blank" href="#" style="font-size:x-large;" class="mb-4 fab fa-facebook-f"></a>
                                    <a target="_blank" href="#" style="font-size:x-large;" class="mb-4 fab fa-twitter"></a>
                                    <a target="_blank" href="#" style="font-size:x-large;" class="mb-4 fab fa-whatsapp"></a>
                                    <div class="col-md-12 d-none d-md-block"></div>
                                    <a target="_blank" href="#" style="font-size:x-large;" class="mt-md-4 mb-md-0 mb-4 fab fa-linkedin-in"></a>
                                    <a target="_blank" href="#" style="font-size:x-large;" class="mt-md-4 mb-md-0 mb-4 fab fa-google-plus"></a>
                                    <a target="_blank" href="#" style="font-size:x-large;" class="mt-md-4 mb-md-0 mb-4 fab fa-instagram"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                <a href=""><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
            <div class="main-bg-clr container-fluid px-0">
                <div class=" mb-1 d-flex align-items-center justify-content-between nav-height" style="color: var(--text-color-light-hover);">
                    <img src="{{asset('front-assets/img/left-chevron.png')}}" class="img-fluid" alt="">
                    <h3 class="custom-heading-font m-0" style="color: var(--primary); font-weight: bold;">राजस्थान </h3>
                    <div class="w-100 mx-3"></div>
                    <a href="" class="fa fa-chevron-left nav-link text-primary-clr"></a>
                    <a href="" class="fa fa-chevron-right nav-link text-primary-clr"></a>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-4 col-12 py-1 py-md-0">
                        <div class="row row-cols-2 row-cols-md-2 p-0">
                            <div class="col mb-3 px-2">
                                <div class="card card-shadow">
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                    <a href="" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                        <div class="card card-shadow add-mb-3 custom-margin" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow add-mb-3 mb-md-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow add-mb-3 custom-margin-col-2" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow add-mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="card card-shadow add-mb-3 custom-margin" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow add-mb-3 mb-md-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow add-mb-3 custom-margin-col-2" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img class="" src="{{asset('front-assets/img/camera.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card card-shadow add-mb-3" style="border-right:2px solid var(--primary);">
                            <a href="">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-2 ">
                                        <h6 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, beatae.</h6>
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
            <div class="container-fluid mx-auto">
                <div class="row">
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-2">
                        <h4 style="font-size:20px; border-left: 5px solid black;" class="px-3">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                        <div class="my-4">
                            <div class="card-horizontal no-gutters">
                                <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                    <a href="" class="text-muted text-decoration-none">
                                        <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0 px-2">
                                        <a href="" class="text-muted text-decoration-none">
                                            <h6 class="card-text p-2 ">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-start px-md-3">
                                        <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                        <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                    </div>
                                    <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                        <a target="_blank" href="#" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-0 mx-auto">
                <nav data-pagination class="mt-1">
                    <a href="">PREV</a>
                    <ul>
                        <li class="current"><a href=#1>1</a>
                        <li><a href=#2>2</a></li>
                        <li><a href=#3>3</a></li>
                        <li><a href=#4>4</a></li>
                        <li><a href=#5>5</a></li>
                        <li><a href=#6>6</a></li>
                        <li><a href=#7>7</a></li>
                        <li><a href=#8>8</a></li>
                        <div class="d-none d-md-inline-block">
                            <li><a href=#9>9</a></li>
                            <li><a href=#10>10</a></li>
                            <li><a href=#10>11</a></li>
                            <li><a href=#10>12</a></li>
                        </div>
                    </ul>
                    <a href="">NEXT</a>
                </nav>
            </div>
        </div>
    </div>
</main>
@endsection
