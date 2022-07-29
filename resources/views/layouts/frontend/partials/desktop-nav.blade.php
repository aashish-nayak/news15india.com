<!-- Desktop Nav Bar Start   -->
<header class="sticky-top start-header mx-auto mega-menu-navbar">
    <div class="container-fluid mx-auto position-relative">
        <div class="row align-items-center">
            <div class="col-md-2-custom col-12 px-md-1 pt-0 d-flex justify-content-between justify-content-md-start mobile-toggle mobile-height-black align-items-center">
                <div class="col-md-12 col-6 px-0">
                    <span class="text-light mt-1" onclick="openNav()">&#9776;</span>
                    <a href="{{ route('home') }}" class="m-0">
                        <div class="navbar-brand p-0 m-0">
                            <img src="{{ asset('front-assets/img/logo.png') }}" class="img-fluid" style="margin-top:-11px;" alt="logo">
                        </div>
                    </a>
                </div>
                <div class="d-md-none d-block col-6 justify-self-end text-right px-0">
                    <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center" ><i class="fas fa-bell mt-3"></i></a>
                    <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center"><i class="fas fa-user mt-3"></i></a>
                    <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center"><i class="far fa-tv-retro mt-3"></i></i></a>
                </div>
            </div>
            <div class="col-md-8 d-md-block d-none position-static">
                <!-- Main Navbar Start -->
                <nav class="nav sticky-top d-none d-lg-block d-md-block position-static">
                    <ul class="ul-reset ml-2 ">
                        <li><a href="{{route('home')}}" class="nav-link">होम</a></li>
                        @foreach ($menu->parentMenuNodes as $node)
                        @if ($node->has_child)
                        <li class="nav-item-sub p-relative">
                            <a href="{{route('category-news',$node->fetchUrl->slug)}}" class="nav-link dropdown-toggle">
                                {{$node->title}} <span class="fas fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach ($node->child as $sub)
                                    @if ($sub->has_child)
                                    <li class="dropdown-sub dropright">
                                        <a href="{{route('category-news',$sub->fetchUrl->slug)}}" class="dropdown-item dropdown-toggle">{{$sub->title}}</a>
                                        <ul class="dropdown-sub-menu" role="menu">
                                            @foreach ($sub->child as $sub2)
                                            @if ($sub2->has_child)
                                            <li class="dropdown-sub-2 dropright">
                                                <a href="{{route('category-news',$sub2->fetchUrl->slug)}}" class="dropdown-item dropdown-toggle">{{$sub2->title}}</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    @foreach ($sub2->child as $sub3)
                                                        @if($sub3->has_child)
                                                        <li class="dropdown-sub-3 dropright">
                                                            <a href="{{route('category-news',$sub3->fetchUrl->slug)}}" class="dropdown-item dropdown-toggle">{{$sub3->title}}</a>
                                                            <ul class="dropdown-sub-menu-3" role="menu">
                                                                @foreach ($sub3->child as $sub4)
                                                                    @if($sub4->has_child == 0)
                                                                    <li><a href="{{route('category-news',$sub4->fetchUrl->slug)}}" class="dropdown-item">{{$sub4->title}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @else
                                                        <li><a href="{{route('category-news',$sub3->fetchUrl->slug)}}" class="dropdown-item">{{$sub3->title}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li><a href="{{route('category-news',$sub2->fetchUrl->slug)}}" class="dropdown-item">{{$sub2->title}}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="{{route('category-news',$sub->fetchUrl->slug)}}" class="dropdown-item">{{$sub->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @else 
                        <li><a href="{{route('category-news',$node->fetchUrl->slug)}}" class="nav-link">{{$node->title}}</a></li>
                        @endif
                        @endforeach
                        {{-- <li class="droppable">
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col mb-2 px-2">
                                                                        <div class="card card-shadow">
                                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                                                    <img src="{{asset('front-assets/img/landscape.jpg')}}" class="img-fluid" alt="">
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
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
                                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                                <a href="javascript:void(0)" class="text-decoration-none font-weight-bold">Lorem ipsum dolor amet consectetur.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-2 px-2">
                                                        <div class="card card-shadow">
                                                            <a href="javascript:void(0)" class="text-muted text-decoration-none"><img src="{{asset('front-assets/img/square.jpg')}}" class="card-img-top" alt="..."></a>
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
                        </li> --}}
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
    </div>
</header>
<!-- Desktop Nav Bar End -->