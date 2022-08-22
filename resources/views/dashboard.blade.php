@extends('layouts.frontend.master')
@section('meta-tags')
@meta([
    'title'         => 'Profile - '.auth('web')->user()->name,
    'prefix'        => ' - '.setting('site_name'),
    'description'   => auth('web')->user()->about,
    'image'         => setting('site_log'),
    'image_alt'     => auth('web')->user()->name,
    'type'          => 'User',
    'auhtor'        => auth('web')->user()->name,
])
@endsection
@section('sections')
<main class="container-fluid mx-auto position-relative">
    <div class="row">
        <!-- Ad Banner  -->
        <section class="container-fluid mx-auto px-0 text-center">
            <a href="javascript:void(0)"><img loading="lazy" src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
        </section>
        <!-- Ad Banner  -->
        <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-2 order-md-1">
            <div class="sticky-top"  style="z-index:1">
                @includeIf('components.whatsapp-ad')
                <div class="ad-box my-2">
                    <p class="m-0 text-center bg-secondary text-light" style="font-size:1.2rem">Advertisement</p>
                    <div class="box">
                        <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt=""></a>
                    </div>
                </div>
                @includeIf('components.poll')
                {{-- <div class="col-12 mt-1 side-position mx-auto px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_1,'sidebar'=>true,'width'=>'w-50'])
                    <div class="single-item">
                        @foreach ($sidebar_1->news as $sidebar_news)
                        <div class="holder">
                            <div class="box mt-1" style="height:250px;">
                                <a href="{{route('single-news',$sidebar_news->slug)}}">
                                    <img loading="lazy" src="{{asset('storage/media/'.$sidebar_news->newsImage->filename)}}" class="w-100" alt="">
                                    <div class="content-overlay"></div>
                                </a>
                                <div class="img-title">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}">
                                        <h6 class="text-light m-0">{{\Str::limit($sidebar_news->title,40)}}</h6>
                                    </a>
                                    <p class="post-date m-1 text-white">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 mt-2 side-position mx-auto px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_2,'sidebar'=>true,'width'=>'w-25'])
                    <div class="side-bar">
                        @foreach ($sidebar_2->news as $sidebar_news)
                        <div class="card card-shadow my-1">
                            <div class="card-body px-3 py-1 border-bottom border-secondary">
                                <div class="post-data">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}" class="post-title">
                                        <div class="post-meta">
                                            <p class="post-date m-0 ">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                                        </div>
                                        <h6>{{\Str::limit($sidebar_news->title,50)}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="side-footer d-none d-xl-flex justify-content-between align-items-center">
                    </div>
                </div>
                <div class="col-12 mt-2 side-position mx-auto px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_3,'sidebar'=>true,'width'=>'w-25'])
                    <div class="single-item">
                        @foreach ($sidebar_3->news as $sidebar_news)
                        <div class="holder">
                            <div class="box mt-1" style="height:200px;">
                                <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                                <a href="{{route('single-news',$sidebar_news->slug)}}">
                                    <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                                </a>
                                <img loading="lazy" src="{{asset('storage/media/'.$sidebar_news->newsImage->filename)}}" class="img-fluid" alt="">
                                <div class="img-title">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}">
                                        <h6 class="text-light m-0">
                                            {{\Str::limit($sidebar_news->title,50)}}
                                        </h6>
                                    </a>
                                    <p class="m-1 text-white">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 p-0 mt-1 side-position mx-auto">
                    <div class="container-fluid d-flex align-items-center justify-content-between bg-dark py-2 nav-height">
                        <i class="fa fa-sort-up mr-1" style="color:#FE9517;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color:#FE9517; font-weight:600;">{{$sidebar_4->cat_name}}</h4>
                        <div class="w-50 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                            <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \</span>
                        </div>
                        <a href="{{route('category-news',$sidebar_4->slug)}}" class="nav-link p-0" style="color:#FE9517;font-size:15px;font-weight:600;">और भी</a>
                    </div>
                    <div class="side-bar" style="height:380px;background-color:#333;">
                        <div class="my-1" style="background-color:#333;">
                            @foreach ($sidebar_4->news as $key => $sidebar_news)
                            <div class="py-1 border-bottom border-secondary">
                                <div class="post-data ">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}" class="post-title">
                                        <div class="row m-0">
                                            <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">{{$key+1}}</span>
                                            <div class="post-meta col-10 p-0">
                                                <p style="color:#f2f2f2;" class="post-date m-0 ">{{\Carbon\Carbon::parse($sidebar_news->created_at)->format(' H:i A | d M Y,')}}</p>
                                                <h6 style="color:#f2f2f2;">{{\Str::limit($sidebar_news->title,50)}}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
            </div>
        </aside>
        <div class="col-md-9 col-12 px-1 pr-md-1 order-1 order-md-2">
            <div class="container-fluid mx-auto px-0 mt-1">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-md-3 col-12 bg-primary w-100 p-4 text-center">
                        @isset(auth('web')->user()->details->avatar->filename)
                        <img loading="lazy" src="{{asset('storage/media/'.auth('web')->user()->details->avatar->filename)}}" class="text-center img-fluid author-avatar" alt="">
                        @else
                        <img src="{{asset('front-assets/img/user.png')}}" class="text-center img-fluid author-avatar" alt="" loading="lazy">
                        @endisset
                    </div>
                    <div class="col-md-9 col-12" style="background-color: #d8d8d8;">
                        <div class="col-12 px-1 text-center flag-author-border">
                            <span class="flag-color-news flag-color"><b>NEWS</b></span><span class="flag-color-15 flag-color"><b>15</b></span><span class="flag-color-india flag-color"><b>INDIA</b> </span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="col-md-6 col-12 px-4 my-3 author-des">
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-user"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        {{auth('web')->user()->name}}
                                    </p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-envelope"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        {{auth('web')->user()->email}}
                                    </p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-user-crown"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        {{"User"}}
                                    </p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-map-marker"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        {{auth('web')->user()->details->city->name.", ".auth('web')->user()->details->country->name}}
                                    </p>
                                </a>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="row align-items-center">
                                    <div class="col-md-12 mb-2 mb-md-0">
                                    </div>
                                    <div class="col-md-12 mb-3 text-center mt-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-bg-clr container-fluid my-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link mr-2 active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                      <button class="nav-link mr-2" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                    </div>
                  </nav>
                  <div class="tab-content" style="font-size: 16px" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        Placeholder content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        Placeholder content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.
                    </div>
                  </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img loading="lazy" src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
            <div class="container-fluid mx-auto">
                <div class="row row-cols-md-2 row-cols-1 ">
                    {{-- @foreach ($creatorNews as $news)
                    <div class="col mt-2 px-1">
                        <div class="card-horizontal card-horizontal-3 no-gutters" style="border:1px solid var(--primary)">
                            <div class="col-4 p-1 h-100" style="border-right:1px solid #b2bec3;">
                                <a href="{{route('single-news',$news->slug)}}" class="text-muted text-decoration-none">
                                    <img loading="lazy" src="{{asset('storage/media/'.$news->newsImage->filename)}}" class="img-fluid h-100" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body py-0 px-2">
                                    <a href="{{route('single-news',$news->slug)}}" class="text-muted text-decoration-none">
                                        <h6 class="card-text p-2">{{\Str::limit($news->title,50)}}</h6>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start px-md-3">
                                    <div class="col news-status px-2 ml-2"><i class="fas fa-user mr-3"></i>{{$news->creator->name}}</div>
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>{{$news->created_at}}</div>
                                </div>
                                <div class="social-icon px-4 my-2" style="font-size:18px;color:#FE9517;">
                                    @php
                                        $share = Jorenvh\Share\ShareFacade::page(route('single-news',$news->slug), $news->title)
                                        ->facebook()
                                        ->twitter()
                                        ->whatsapp()
                                        ->linkedin()
                                        ->getRawLinks();
                                    @endphp
                                    <a target="_blank" href="{{$share['facebook']}}" style="color:#FE9517;" class="mr-2 fab fa-facebook-f"></a>
                                    <a target="_blank" href="{{$share['twitter']}}" style="color:#FE9517;" class="mr-2 fab fa-twitter"></a>
                                    <a target="_blank" href="{{$share['whatsapp']}}" style="color:#FE9517;" class="mr-2 fab fa-whatsapp"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                </div>
            </div>
            <div class="container-fluid px-0 mx-auto mt-3">
                <div class="d-flex align-items-center justify-content-center">
                {{-- {{$creatorNews->onEachSide(0)->links()}} --}}
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img loading="lazy" src="{{asset('front-assets/img/banner.png')}}" class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
        </div>
    </div>
</main>
@endsection
