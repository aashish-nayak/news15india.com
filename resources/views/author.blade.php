@extends('layouts.frontend.master')
@section('title','Auhtor')
@section('sections')
<main class="container-fluid mx-auto">
    <div class="row">
        <!-- Ad Banner  -->
        <section class="container-fluid mx-auto px-0 text-center">
            <a href="javascript:void(0)"><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
        </section>
        <!-- Ad Banner  -->
        <aside class="col-md-3 col-12 my-1 px-1 my-md-0 order-2 order-md-1">
            <div class="d-flex bg-dark align-items-center justify-content-center mt-1 py-2">
                <h4 style="color:#f2f2f2; font-weight:600;">Join Our whatsapp Group</h4>
            </div>
            <div class="col-12 px-0">
                <img src="{{asset('front-assets/img/whatsapp.jpg')}}" class="w-100" alt="">
            </div>
            <div class="col-12 p-0 mt-1">
                <img src="{{asset('front-assets/img/pepsi-ad.png')}}" class="w-100" alt="">
            </div>
            <div class="card mt-1">
                <div class="card-header">
                    <div class="text-center">
                        <h4 class="m-0 text-primary-clr"><strong>POLL</strong></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-left">
                        <h6 class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi obcaecati, nobis quas nihil ?</h6>
                    </div>
                    <form action="" style="font-size: 15px;" class="py-3">
                        <div class="custom-control custom-radio mb-2 px-3 py-2 rounded w-100" style="border: 1px solid #99000040">
                            <input type="radio" id="customRadio1" name="customRadio">
                            <label class="w-75 m-0" for="customRadio1">YES</label>
                        </div>
                        <div class="custom-control custom-radio mb-2 px-3 py-2 rounded w-100" style="border: 1px solid #99000040">
                            <input type="radio" id="customRadio2" name="customRadio">
                            <label class="w-75 m-0" for="customRadio2">NO</label>
                        </div>
                        <div class="custom-control custom-radio mb-2 px-3 py-2 rounded w-100" style="border: 1px solid #99000040">
                            <input type="radio" id="customRadio3" name="customRadio">
                            <label class="w-75 m-0" for="customRadio3">I Never Know</label>
                        </div>
                        <div class="custom-control custom-radio mb-2 px-3 py-2 rounded w-100" style="border: 1px solid #99000040">
                            <input type="radio" id="customRadio4" name="customRadio">
                            <label class="w-75 m-0" for="customRadio4">I Dont Know</label>
                        </div>
                        <button type="submit" class="btn btn-dark" style="font-size: 15px;">VOTE</button>
                    </form>
                </div>
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                <div class="container-fluid d-flex align-items-center justify-content-between bg-dark py-2 nav-height">
                    <i class="fa fa-sort-up mr-1" style="color:#f3f3f3;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color:#f3f3f3; font-weight:600;">Rajasthan</h4>
                    <div class="w-50 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \</span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link p-0" style="color:#f3f3f3;font-size:15px;font-weight:600;">औरभी</a>
                </div>
                <div class="single-item">
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square.jpg')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title"><a href="javascript:void(0)">
                                    <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                    </h6>
                                </a>
                                <p class="post-date m-1"><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title"><a href="javascript:void(0)">
                                    <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                    </h6>
                                </a>
                                <p class="post-date m-1"><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href="javascript:void(0)"><img src="{{asset('front-assets/img/pepsi-ad.png')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title"><a href="javascript:void(0)">
                                    <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                    </h6>
                                </a>
                                <p class="post-date m-1"><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                <div class="container-fluid px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <i class="fa fa-sort-up mr-1" style="color:var(--primary);font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color: var(--primary); font-weight:600;">Gadget</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link text-dark" style="font-size: 15px;font-weight:600;">औरभी</a>
                </div>
                <div class="side-bar">
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
            <div class="col-12 mt-2 side-position mx-auto px-0">
                <div class="container-fluid px-1 d-flex align-items-center justify-content-between bg-white py-2 nav-height">
                    <i class="fa fa-sort-up mr-1" style="color:var(--primary);font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color: var(--primary); font-weight:600;">Video</h4>
                    <div class="w-100 mx-3"
                        style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link text-dark" style="font-size: 15px;font-weight:600;">औरभी</a>
                </div>
                <div class="single-item">
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="javascript:void(0)">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                            <div class="img-title">
                                <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                </h6>
                                <p class=" m-1"><a href=""></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="javascript:void(0)">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                            <div class="img-title">
                                <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                </h6>
                                <p class=" m-1"><a href=""></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="javascript:void(0)">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
                            <div class="img-title">
                                <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                </h6>
                                <p class=" m-1"><a href=""></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mt-1 side-position mx-auto">
                <div class="container-fluid d-flex align-items-center justify-content-between bg-dark py-2 nav-height">
                    <i class="fa fa-sort-up mr-1" style="color:#FE9517;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color:#FE9517; font-weight:600;">News</h4>
                    <div class="w-50 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \</span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link p-0" style="color:#FE9517;font-size:15px;font-weight:600;">और भी</a>
                </div>
                <div class="side-bar" style="height:335px;background-color:#333;">
                    <div class=" my-1" style="background-color:#333;">
                        <div class="py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">

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
                                <a href="javascript:void(0)" class="post-title">

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
                                <a href="javascript:void(0)" class="post-title">

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
                                <a href="javascript:void(0)" class="post-title">

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
                                <a href="javascript:void(0)" class="post-title">

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
                                <a href="javascript:void(0)" class="post-title">

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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                                <a href="javascript:void(0)" class="post-title">
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
                    <div class="col-md-3 col-12 bg-primary w-100 p-4 text-center">
                        <img src="{{asset('front-assets/img/user.png')}}" class="text-center img-fluid mt-md-3" style="border:5px solid white;border-radius:50%;" alt="">
                    </div>
                    <div class="col-md-9 col-12" style="background-color: #d8d8d8;">
                        <div class="col-12 px-1 text-center flag-author-border">
                            <span class="flag-color-news flag-color"><b>NEWS</b></span><span class="flag-color-15 flag-color"><b>15</b></span><span class="flag-color-india flag-color"><b>INDIA</b> </span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="col-md-6 col-12 px-4 my-3 author-des">
                                <a href="javascript:void(0)">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:4px;"><i class="mr-md-3 mr-2 fas fa-user"></i> Abdul Malik</p>
                                </a>
                                <a href="javascript:void(0)">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:4px;"><i class=" mr-2 mr-md-3 fas fa-envelope"></i>info@news15indi.com</p>
                                </a>
                                <a href="javascript:void(0)">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:4px;"><i class=" mr-2 mr-md-3 far fa-user-crown"></i>Editor in chief</p>
                                </a>
                                <a href="javascript:void(0)">
                                    <p style="font-size:20px; color:var(--secondary); margin-bottom:4px;"><i class=" mr-2 mr-md-3 far fa-map-marker"></i>Location</p>
                                </a>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="d-flex flex-wrap justify-content-around align-items-center text-center flag-author-border">
                                    <a target="_blank" href="javascript:void(0)" style="font-size:x-large;" class="py-2 bottom mb-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="font-size:x-large;" class="py-2 bottom mb-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="font-size:x-large;" class="py-2 bottom mb-2 fab fa-whatsapp"></a>
                                </div>
                                <div class="col-md-12 mt-3 text-center">
                                    <p class="mb-0 font-weight-bold" style="font-size:1.3rem;">Lorem ipsum dolor sit amet.</p>
                                    <a href="javascript:void(0)" style="font-size:1.4rem;" class="d-block btn btn-primary font-weight-bold mt-1">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
            <div class="main-bg-clr container-fluid px-0">
                <div class="container-fluid mb-1 px-1 d-flex align-items-center justify-content-between nav-height" style="color: var(--text-color-light-hover);">
                    <i class="fa fa-sort-up mr-1" style="color:var(--primary);font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color: var(--primary); font-weight: bold;">Rajasthan</h4>
                    <div class="w-100 mx-3" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link text-dark" style="font-size: 16px;font-weight:600;">औरभी</a>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-4 col-12 py-1">
                        <div class="row row-cols-2 row-cols-md-2 p-0">
                            <div class="col mb-2 px-2">
                                <div class="card card-shadow">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="javascript:void(0)" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-2 px-2">
                                <div class="card card-shadow">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="javascript:void(0)" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-2 px-2">
                                <div class="card card-shadow">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="javascript:void(0)" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-2 px-2">
                                <div class="card card-shadow">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                        <a href="javascript:void(0)" class="text-decoration-none">
                                            <h6 class="my-0 text-left">Lorem ipsum dolor sit amet consectetur
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 px-1">
                        <div class="row row-cols-1 row-cols-md-2 m-0">
                            <div class="col mt-md-1 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-1 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                            <div class="col mt-md-0 px-2 mb-2">
                                <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                    <a href="javascript:void(0)">
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
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
            <div class="container-fluid mx-auto">
                <div class="row row-cols-md-2 row-cols-1 ">
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1" style="border:1px solid #b2bec3;">
                                <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                    <img src="{{asset('front-assets/img/camera.jpg')}}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">Lorem, ipsum dolor sit amet consectetur adipisicing.</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>News 15 India </div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>4 Days Ago</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-instagram"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-google-plus"></a>
                                    <a target="_blank" href="javascript:void(0)" style="color:#FE9517;" class="mr-2 fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-0 mx-auto mt-3">
                <nav data-pagination class="mt-1">
                    <a href="javascript:void(0)">PREV</a>
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
                    <a href="javascript:void(0)">NEXT</a>
                </nav>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid mt-2 mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
        </div>
    </div>
</main>
@endsection
