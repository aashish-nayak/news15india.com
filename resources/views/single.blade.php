@extends('layouts.frontend.master')
@section('title','News Details')
@section('sections')
<main class="container-fluid mx-auto mt-1">
    <div class="row">
        <div class="col-md-9 col-12 px-1 pr-md-1">
            {{-- ........... Ad Banner ........  --}}
            <section class="container-fluid mx-auto px-0 mb-1 text-center">
                <a href="javascript:void(0)">
                    <img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" loading="lazy">
                </a>
            </section>
            {{-- ........... Ad Banner ........  --}}
            <div style="font-size: 14px; font-weight:600;"class="col-12 p-1">
                @foreach ($news->categories as $key => $category)
                <a href="javascript:void(0)"><span>{{$category->cat_name}}</span></a><span>/</span>
                @endforeach
                <a href="javascript:void(0)" class="b-active"><span>{{\Str::limit($news->title,40)}}</span></a>
            </div>
            <div class="col-12 p-1">
                <h1 class="text-dark px-2 font-weight-bold" style="border-left: 4px solid var(--primary);">
                    {{$news->title}}
                </h1>
                <p class="px-3 m-0 font-weight-bold" style="line-height: 1.3;font-size:1.7rem">
                    {{$news->short_description}}
                </p>
            </div>
            <div class="container-fluid mx-auto py-2" style="border-bottom: 2px dotted gray;">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-1 col-3">
                        <img src="{{asset('front-assets/img/user.png')}}" style="height:70px;width:auto;" class="rounded-circle bg-primary" alt="" loading="lazy">
                    </div>
                    <div class="col-md-4 col-9 pl-3 px-1">
                        <div class="col-12" style="font-size: 16px; font-weight:500;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span>By</span> <a href="javascript:void(0)"><span><strong>{{$news->creator->name}}</strong></span></a>
                                </div>
                                <div class="pr-3">
                                    <a href="javascript:void(0)" style="font-size:1.2rem;" class="btn btn-primary font-weight-bold my-2 mr-5">Follow</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="m-0"><span>Location,</span> <span>{{\Carbon\Carbon::parse($news->created_at)->format('D d M Y, H:i A')}}</span></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 font-size-sm">
                        <p class="m-0"><i class="fa fa-eye px-2"></i> <span>2.5k</span> <span>Views</span></p>
                    </div>
                    <div class="col-md-4 col-6 font-size-sm">
                        <div class="row">
                            <div class="col-9 col-md-8 pr-1">
                                <p class="p-0 m-0 text-dark" style="font-weight:500;">Print this News</p>
                                <span>(इस खबर को प्रिंट करें)</span>
                            </div>
                            <div class="col-3 col-md-4 pl-1">
                                <i class="fa fa-print fa-4x icon-size"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mx-auto mt-1">
                <div class="row">
                    <div class="col-md-8 col-12 px-0 pr-md-1">
                        <div class="box">
                            <a href="javascript:void(0)">
                                <img src="{{asset('storage/media/'.$news->newsImage->filename)}}" class="img-fluid w-100" alt="" loading="lazy">
                                <div class="content-overlay"></div>
                                <div class="img-title py-3" style="background-color: #333333a6 !important;border-left: 5px solid var(--primary);">
                                    <h4 class="text-white font-weight-normal heading-single">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, impedit!</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 bg-dark-pure pl-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="single-para text-dark font-weight-bold bg-warning p-3 m-0">Share Now</h3>
                                <a href="javascript:void(0)" class="text-center bg-dark-pure text-white" style="font-size: 23px;">
                                    <i class="fab fa-whatsapp social-media-size"></i>
                                </a>
                                <a href="javascript:void(0)" class=" text-center bg-dark-pure text-white" style="font-size: 23px;">
                                    <i class="fab fa-facebook-f social-media-size"></i>
                                </a>
                                <a href="javascript:void(0)" class=" text-center bg-dark-pure text-white" style="font-size: 23px;">
                                    <i class="fab fa-twitter social-media-size"></i>
                                </a>
                                <a href="javascript:void(0)" class=" text-center bg-dark-pure text-white" style="font-size: 23px;">
                                    <i class="fab fa-linkedin-in social-media-size"></i>
                                </a>
                                <a href="javascript:void(0)" class=" text-center bg-dark-pure text-white" style="font-size: 23px;">
                                    <i class="fas fa-envelope social-media-size"></i>
                                </a>
                            </div>
                        </div>
                        <a href="javascript:void(0)">
                            <div class="col-12 px-0 mt-2" style="background: url({{asset('front-assets/img/whatsapp-full.jpg')}});height:94px;background-size:cover;width:100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-2"></div>
                                    <div class="col-md-10 col-9 mt-md-5 mt-2">
                                        <h4 class="text-light">अपने वॉट्स्ऐप मेसेंजर पर ताज़ा खबरे पाने के लिए सब्सक्राईब करे</>
                                        <h5 class="text-light">Subscribe To Get The Latest News On Your WhatsApp Messenger</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 px-0">
                        <div class="bg-primary-clr mt-md-0 mt-1 container-fluid d-flex align-items-center justify-content-between py-2">
                            <h3 class="m-0 mx-auto text-white">स्टोरी हाईलाइट </h3>
                        </div>
                        <div style="background-color:#333;">
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="border-bottom border-secondary">
                                <div class="post-data p-3" style="border-left: 3px solid var(--primary);">
                                    <a href="#" class="post-title">
                                        <h6 class="text-white m-0">Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ............ Ad Banner ...........  --}}
            <section class="container-fluid mt-1 px-0 text-center">
                <a href="javascript:void(0)">
                    <img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" loading="lazy">
                </a>
            </section>
            {{-- ............ Ad Banner ...........  --}}
            <div class="container-fluid mt-3 px-1">
                <p class=" text-dark single-para mb-3 text-justify">{!!$news->content!!}</p>
            </div>
            <section class="container-fluid mx-auto mt-1 px-0 text-center">
                <a href="javascript:void(0)">
                    <img src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" loading="lazy">
                </a>
            </section>
            {{-- ........... Tags ........  --}}
            <div class="container-fluid my-2 px-0">
                <div class="col-12">
                    <div class="row flex-wrap align-items-center">
                        <div class="col-md-2 text-center">
                            <h4 class="text-white rounded-pill bg-danger py-3"><i class="fas fa-tags "></i> TAGS</h4>
                        </div>
                        <div class="col-md-10">
                            <ul class="d-flex flex-wrap list-unstyled">
                                @foreach ($news->tags as $tag)
                                <li><a href="javascript:void(0)"><span class="badge badge-pill badge-secondary m-2" style="font-size: 14px">{{$tag->name}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col mt-1">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-12">
                            <h4>Get Help To Improve Our News</h4>
                            <div class="row">
                                <div class="col-md-6 p-0 col-12">
                                    <p class="d-inline px-3">If you give full info about News</p>
                                    <div class="switch-field d-inline">
                                        <input type="radio" id="radio-one" name="switch-one" value="yes" checked="">
                                        <label for="radio-one">Yes</label>
                                        <input type="radio" id="radio-two" name="switch-one" value="no">
                                        <label for="radio-two">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0 col-12">
                                    <p class="d-inline px-3">If you give full info about News</p>
                                    <div class="switch-field d-inline">
                                        <input type="radio" id="radio-three" name="switch-two" value="yes" checked="">
                                        <label for="radio-three">Yes</label>
                                        <input type="radio" id="radio-four" name="switch-two" value="no">
                                        <label for="radio-four">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0 col-12">
                                    <p class="d-inline px-3">If you give full info about News</p>
                                    <div class="switch-field d-inline">
                                        <input type="radio" id="radio-five" name="switch-three" value="yes" checked="">
                                        <label for="radio-five">Yes</label>
                                        <input type="radio" id="radio-six" name="switch-three" value="no">
                                        <label for="radio-six">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0 col-12">
                                    <p class="d-inline px-3">If you give full info about News</p>
                                    <div class="switch-field d-inline">
                                        <input type="radio" id="radio-seven" name="switch-four" value="yes" checked="">
                                        <label for="radio-seven">Yes</label>
                                        <input type="radio" id="radio-eight" name="switch-four" value="no">
                                        <label for="radio-eight">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 px-0 mx-auto">
                            <p class="my-3 my-md-1 font-weight-bold text-center" style="color: black;font-size:2rem">Download App</p>
                            <div class="row align-items-center m-0">
                                <a class="col-12 col-md-6 text-center" href="javascript:void(0)">
                                    <img src="{{asset('front-assets/img/app-store.png')}}" class="img-fluid" alt="" style="max-height:80px" loading="lazy">
                                </a>
                                <a class="col-12 col-md-6 text-center" href="javascript:void(0)">
                                    <img src="{{asset('front-assets/img/play-store.png')}}" class="img-fluid" alt="" style="max-height:80px" loading="lazy">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ........... Tags ........  --}}
            <div class="main-bg-clr container-fluid px-1 mt-3">
                @includeIf('components.news-header', ['section' => $moreCategoryNews,'width'=>'w-25'])
                <div class="row mx-auto">
                    @foreach ($moreCategoryNews->news as $key => $otherNews)
                        @if($key <= 3)
                        @push('design_1')
                        <div class="col mb-2 px-2">
                            <div class="card card-shadow">
                                <a href="{{route('single-news',$otherNews->slug)}}" class="text-muted text-decoration-none">
                                    <img src="{{asset('storage/media/'.$otherNews->newsImage->filename)}}" class="card-img-top" alt="..." loading="lazy">
                                </a>
                                <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                    <a href="{{route('single-news',$otherNews->slug)}}" class="text-decoration-none">
                                        <h6 class="my-0 text-left">{{\Str::limit($otherNews->title,40)}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endpush
                        @else
                        @push('design_2')
                        <div class="col mt-md-1 px-2 mb-2">
                            <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                                <a href="{{route('single-news',$otherNews->slug)}}">
                                    <div class="card-horizontal">
                                        <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                            <h6 class="card-text">{{\Str::limit($otherNews->title,40)}}</h6>
                                        </div>
                                        <div class="img-square-wrapper col-5 col-md-4 p-0">
                                            <img class="img-fluid" src="{{asset('storage/media/'.$otherNews->newsImage->filename)}}" alt="Card image cap" loading="lazy">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endpush
                        @endif
                    @endforeach
                    <div class="col-md-4 col-12 py-1">
                        <div class="row row-cols-2 row-cols-md-2 p-0">
                            @stack('design_1')
                        </div>
                    </div>
                    <div class="col-md-8 px-1">
                        <div class="row row-cols-1 row-cols-md-2 m-0">
                            @stack('design_2')
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-2 align-items-center px-3 justify-content-between bg-dark nav-height">
                <i class="fa fa-sort-up mr-1" style="color:#f3f3f3;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i>
                <h4 class="text-white mr-2">Related News</h4>
                <div class="w-75 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                    <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
                </div>
                <a href="javascript:void(0)" class="nav-link text-white" style="font-size: 15px;font-weight:600;">औरभी</a>
            </div>
            <section class="container-fluid mx-auto py-4" style="background-color:#FE9517;">
                <div class="row row-cols-md-4 row-cols-1">
                    @foreach ($related as $news)
                    <div class="col px-2 px-md-2 my-1">
                        <a href="{{route('single-news',$news->slug)}}" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img src="{{asset('storage/media/'.$news->newsImage->filename)}}" class="img-fluid" alt="" loading="lazy">
                            </div>
                            <h6 class="col-7 single-para" title="{{$news->title}}">
                                {{\Str::limit($news->title,30)}}
                            </h6>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
        <aside class="col-md-3 col-12 mt-1 my-md-0 px-1">
            @includeIf('components.whatsapp-ad')
            @includeIf('components.poll')
            <div class="col-12 p-0 mt-1 ">
                <p class="m-0 text-center" style="font-size:1.2rem">Advertisement</p>
                <div class="single-item">
                    <div class="holder">
                        <div class="box">
                            <a href="javascript:void(0)">
                                <img src="{{asset('front-assets/img/pepsi-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" alt="" loading="lazy">
                            </a>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box">
                            <a href="javascript:void(0)">
                                <img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" alt="" loading="lazy">
                            </a>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="box">
                            <a href="javascript:void(0)">
                                <img src="{{asset('front-assets/img/square.jpg')}}" style="height: 250px;object-fit:cover;" class="w-100" alt="" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-1 p-0">
                @includeIf('components.news-header', ['section' => $sidebar_1,'sidebar'=>true,'width'=>'w-50'])
                @foreach ($sidebar_1->news as $key => $sidebar_news)
                    @if($key == 0)
                    @push('sidebar1_design1')
                    <a href="{{route('single-news',$sidebar_news->slug)}}" class="text-decoration-none ">
                        <img src="{{asset('storage/media/'.$sidebar_news->newsImage->filename)}}" class="img-fluid" alt="" loading="lazy">
                        <h6 class="mt-2">{{\Str::limit($sidebar_news->title,60)}}</h6>
                    </a>
                    <p class="text-muted">
                        {{\Str::limit($sidebar_news->short_description,60)}}
                    </p>
                    @endpush
                    @else
                    @push('sidebar1_design2')
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-1">
                            <a href="{{route('single-news',$sidebar_news->slug)}}" class="post-title">
                                <h6>{{\Str::limit($sidebar_news->title,60)}}</h6>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                @endforeach
                <div class="container-fluid px-1">
                    @stack('sidebar1_design1')
                </div>
                @stack('sidebar1_design2')
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                @includeIf('components.news-header', ['section' => $sidebar_2,'sidebar'=>true,'width'=>'w-25'])
                <div class="side-bar">
                    @foreach ($sidebar_2->news as $sidebar_news)
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1 border-bottom border-secondary">
                            <div class="post-data ">
                                <a href="{{route('single-news',$sidebar_news->slug)}}" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                                    </div>
                                    <h6>{{\Str::limit($sidebar_news->title,60)}}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="side-footer d-none d-xl-flex justify-content-between align-items-center">
                </div>
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                @includeIf('components.news-header', ['section' => $sidebar_3,'sidebar'=>true,'width'=>'w-25'])
                <div class="single-item">
                    @foreach ($sidebar_3->news as $sidebar_news)
                    <div class="holder">
                        <div class="box mt-1" style="height:200px;">
                            <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                            <a href="{{route('single-news',$sidebar_news->slug)}}">
                                <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                            </a>
                            <img src="{{asset('storage/media/'.$sidebar_news->newsImage->filename)}}" class="img-fluid" alt="" loading="lazy">
                            <div class="img-title">
                                <h6 class="text-light m-0">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}" class="text-white">{{\Str::limit($sidebar_news->title,60)}}</a>
                                </h6>
                                <p class="m-0 p-1">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mt-1 side-position mx-auto px-0">
                @includeIf('components.news-header', ['section' => $sidebar_4,'sidebar'=>true,'width'=>'w-25'])
                <div class="single-item">
                    @foreach ($sidebar_4->news as $sidebar_news)
                    <div class="holder">
                        <div class="box mt-1" style="height:250px;">
                            <a href="{{route('single-news',$sidebar_news->slug)}}">
                                <img src="{{asset('storage/media/'.$sidebar_news->newsImage->filename)}}" class="w-100" alt="" loading="lazy">
                                <div class="content-overlay"></div>
                            </a>
                            <div class="img-title">
                                <a href="{{route('single-news',$sidebar_news->slug)}}">
                                    <h6 class="text-light m-0">
                                        {{\Str::limit($sidebar_news->title,60)}}
                                    </h6>
                                </a>
                                <p class="post-date m-m p-1">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</main>
@endsection
