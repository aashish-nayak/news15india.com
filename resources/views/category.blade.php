@extends('layouts.frontend.master')
@section('title','Category')
@section('sections')
<main class="container-fluid mx-auto mt-1">
    <div class="row">
        <div class="col-md-9 col-12 px-0 pr-md-1">
            <div class="container-fluid px-1 py-5 mx-1" style="background:linear-gradient(to right, var(--primary) 0%,#f2c75d 100%)">
                <div class="row justify-content-between align-items-center m-0">
                    <div class="col-12 col-md-10">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 py-0" style="background-color:transparent;font-size:17px">
                                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">Hindi News</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">Parent</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Category Name</span></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 col-md-6">
                        <h1 class="text-white px-2">Category Name</h1>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="d-flex list-unstyled float-right m-0">
                            <li><a href="javascript:void(0)" class="text-white" style="font-size:22px"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:void(0)" class="mx-5 text-white" style="font-size:22px"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="javascript:void(0)" class="text-white" style="font-size:22px"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-0 mx-1">
                <img class="img-fluid w-100" style="height: 130px;object-fit: cover; margin: 3px 0px;" src="{{asset('front-assets/img/8x1ad.png')}}" alt="">
            </div>
            <div class="container-fluid mx-auto">
                <div class="row">
                    <div class="col-md-6 col-12 px-1 pr-md-1 my-md-0 my-1">
                        <div class="single-item">
                            <div class="holder h-100">
                                <div class="box mt-1 slider-height h-100">
                                    <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square.jpg')}}" class="w-100 h-100" alt="">
                                        <div class="content-overlay"></div>
                                    </a>
                                    <div class="img-title p-3" style="background-color: #16161687 !important;"><a href="javascript:void(0)">
                                            <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                            </h6>
                                        </a>
                                        <p class="post-date m-1"><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="holder h-100">
                                <div class="box mt-1 slider-height h-100">
                                    <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" class="w-100 h-100" alt="">
                                        <div class="content-overlay"></div>
                                    </a>
                                    <div class="img-title p-3" style="background-color: #16161687 !important;"><a href="javascript:void(0)">
                                            <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                            </h6>
                                        </a>
                                        <p class="post-date m-1"><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="holder h-100">
                                <div class="box mt-1 slider-height h-100">
                                    <a href="javascript:void(0)"><img src="{{asset('front-assets/img/pepsi-ad.png')}}" class="w-100 h-100" alt="">
                                        <div class="content-overlay"></div>
                                    </a>
                                    <div class="img-title p-3" style="background-color: #16161687 !important;"><a href="javascript:void(0)">
                                            <h6 class="text-light m-0">Man City into FA Cup semifinals, keeps quadruple dream alive
                                            </h6>
                                        </a>
                                        <p class="post-date m-1"><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="text-white">7:00 AM | April 14</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-1 pl-md-1 my-md-0 my-1">
                        <div class="row row-cols-md-3 row-cols-2 mx-auto justify-content-between">
                            <div class="col mb-3 p-1" style="border:2px solid var(--primary);">
                                <div class="card border-0">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body p-2">
                                        <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                            <h6 class="text-left">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 p-1" style="border:2px solid var(--primary);">
                                <div class="card border-0">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body p-2">
                                        <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                            <h6 class="text-left">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 p-1" style="border:2px solid var(--primary);">
                                <div class="card border-0">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body p-2">
                                        <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                            <h6 class="text-left">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 p-1" style="border:2px solid var(--primary);">
                                <div class="card border-0">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body p-2">
                                        <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                            <h6 class="text-left">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 p-1" style="border:2px solid var(--primary);">
                                <div class="card border-0">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body p-2">
                                        <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                            <h6 class="text-left">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 p-1" style="border:2px solid var(--primary);">
                                <div class="card border-0">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body p-2">
                                        <a href="javascript:void(0)" class="text-muted text-decoration-none">
                                            <h6 class="text-left">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                </div>
            </div>
            <div class="container-fluid px-0 mx-auto">
                <nav data-pagination class="mt-3">
                    <a href="javascript:void(0)">PREV</a>
                    <ul>
                        <li class="current"><a href="javascript:void(0)">1</a>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">4</a></li>
                        <li><a href="javascript:void(0)">5</a></li>
                        <li><a href="javascript:void(0)">6</a></li>
                        <li><a href="javascript:void(0)">7</a></li>
                        <li><a href="javascript:void(0)">8</a></li>
                        <div class="d-none d-md-inline-block">
                            <li><a href="javascript:void(0)">9</a></li>
                            <li><a href="javascript:void(0)">10</a></li>
                            <li><a href="javascript:void(0)">11</a></li>
                            <li><a href="javascript:void(0)">12</a></li>
                        </div>
                    </ul>
                    <a href="javascript:void(0)">NEXT</a>
                </nav>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto mt-3 px-0 text-center">
                <a href="javascript:void(0)"><img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
        </div>
        <aside class="col-md-3 col-12 px-1 my-md-0">
            <div class="col-12 px-0">
                <img src="{{asset('front-assets/img/pepsi-ad.png')}}" class="w-100" alt="">
            </div>
            <div class="d-flex bg-dark align-items-center justify-content-center py-2 mt-1">
                <h4 style="color:#f2f2f2; font-weight:600;">Join Our whatsapp Group</h4>
            </div>
            <div class="col-12 px-0">
                <img src="{{asset('front-assets/img/whatsapp.jpg')}}" class="w-100" alt="">
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
            <div class="col-12 p-0 mt-1 side-position mx-auto">
                <div class="container-fluid d-flex align-items-center justify-content-between bg-dark py-2 nav-height">
                    <i class="fa fa-sort-up mr-1" style="color:#FE9517;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color:#FE9517; font-weight:600;">News</h4>
                    <div class="w-50 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \</span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link p-0" style="color:#FE9517;font-size:15px;font-weight:600;">और भी</a>
                </div>
                <div class="side-bar" style="height: 350px;background-color:#333;">
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
            <div class="col-12 mt-1 side-position mx-auto px-0">
                <div class="container-fluid px-1 d-flex align-items-center justify-content-between py-2 nav-height">
                    <i class="fa fa-sort-up mr-1" style="color:var(--primary);font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color: var(--primary); font-weight:600;">Gadget</h4>
                    <div class="w-50 mx-3" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                        <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                            \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \</span>
                    </div>
                    <a href="javascript:void(0)" class="nav-link text-dark" style="font-size: 15px;font-weight:600;">औरभी</a>
                </div>
                <div class="single-item">
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square.jpg')}}" class="w-100" alt="">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title">
                                <a href="javascript:void(0)">
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
        </aside>
        <div class="col-12 px-1">
            <div class="d-flex mt-2 align-items-center px-3 justify-content-between bg-dark nav-height">
                <i class="fa fa-sort-up mr-1" style="color:#f3f3f3;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 class="text-white mr-2">Rajasthan</h4>
                <div class="w-100 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                    <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                </div>
                <a href="javascript:void(0)" class="nav-link text-white" style="font-size: 15px;font-weight:600;">औरभी</a>
            </div>
            <section class="container-fluid mx-auto py-4" style="background-color:#FE9517;">
                <div class="row row-cols-md-5 row-cols-1">
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                    <div class="col px-2 px-md-1 my-3">
                        <a href="javascript:void(0)" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('front-assets/img/breaking-news.png')}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                Lorem ipsum dolor sit amet consectetur.
                            </h6>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection
