@extends('layouts.frontend.master')
@php
    $avatar = $author->getAvatar();
@endphp
@section('meta-tags')
{!! SEO::generate() !!}
@endsection
@section('sections')
<main class="container-fluid mx-auto position-relative">
    <div class="row">
        <!-- Ad Banner  -->
        <section class="container-fluid mx-auto px-0 text-center">
            {!!AdvertHTML('author-header-1250x150')!!}
        </section>
        <!-- Ad Banner  -->
        <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-2 order-md-1">
            <div class="sticky-top"  style="z-index:1">
                @includeIf('components.whatsapp-ad')
                <div class="ad-box my-2">
                    {!!AdvertHTML('author-header-1250x150')!!}
                </div>
                @includeIf('components.poll')
                @if ($sidebar_1->news->count() > 0)                  
                <div class="col-12 mt-1 side-position mx-auto px-0">
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
                                    <p class="post-date m-1 text-white">{{frontDateFormat($sidebar_news->created_at)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if ($sidebar_2->news->count() > 0)                 
                <div class="col-12 mt-2 side-position mx-auto px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_2,'sidebar'=>true,'width'=>'w-25'])
                    <div class="side-bar">
                        @foreach ($sidebar_2->news as $sidebar_news)
                        <div class="card card-shadow my-1">
                            <div class="card-body px-3 py-1 border-bottom border-secondary">
                                <div class="post-data">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}" class="post-title">
                                        <div class="post-meta">
                                            <p class="post-date m-0 ">{{frontDateFormat($sidebar_news->created_at)}}</p>
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
                @endif
                @if ($sidebar_3->news->count() > 0)                 
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
                                    <p class="m-1 text-white">{{frontDateFormat($sidebar_news->created_at)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if($sidebar_4->news->count() > 0)
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
                                                <p style="color:#f2f2f2;" class="post-date m-0 ">{{frontDateFormat($sidebar_news->created_at)}}</p>
                                                <h6 style="color:#f2f2f2;">{{\Str::limit($sidebar_news->title,50)}}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </aside>
        <div class="col-md-9 col-12 px-1 pr-md-1 order-1 order-md-2">
            <div class="container-fluid mx-auto px-0 mt-1">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-md-3 col-12 bg-primary w-100 p-4 text-center">
                        <img loading="lazy" src="{{$avatar}}" class="text-center img-fluid author-avatar" alt="">
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
                                        {{$author->name}}
                                    </p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-envelope"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        {{$author->email}}
                                    </p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-user-crown"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        @if ($author->roles[0]->slug == 'super-admin')
                                            {{'Administrator'}}
                                        @else
                                        {{$author->roles[0]->name}}
                                        @endif
                                    </p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2" style="font-size:18px">
                                    <i class="mr-md-3 mr-2 fas fa-map-marker"></i> 
                                    <p class="text-secondary-clr m-0" style="font-size:18px">
                                        @if ($author->roles[0]->slug == 'super-admin')
                                        {{$author->details->state->name.", ".$author->details->country->name}}
                                        @else
                                        {{$author->details->city->name.", ".$author->details->state->name}}
                                        @endif
                                    </p>
                                </a>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="row align-items-center">
                                    <div class="col-md-12 mb-2 mb-md-0">
                                        <div class="d-flex justify-content-around align-items-center flag-author-border">
                                            <a target="_blank" href="{{$shareCurrent['facebook']}}" style="font-size:30px;" class="py-2 bottom mb-2 fab fa-facebook-square"></a>
                                            <a target="_blank" href="{{$shareCurrent['twitter']}}" style="font-size:30px;" class="py-2 bottom mb-2 fab fa-twitter-square"></a>
                                            <a target="_blank" href="{{$shareCurrent['whatsapp']}}" style="font-size:30px;" class="py-2 bottom mb-2 fab fa-whatsapp-square"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 text-center mt-md-3">
                                        @php
                                            if ($author->roles[0]->slug == 'super-admin'){
                                                $loc = $author->details->state->name;

                                            }else{
                                                $loc = $author->details->city->name;
                                            }
                                        @endphp
                                        @if(auth('web')->check() && $author->isFollowedBy(auth('web')->user()))
                                            @followable(['followable'=>$author])
                                        @else
                                        <p class="mb-0 font-weight-bold" style="font-size:1.4rem;">{{$loc}} की ताजा खबरे देखने के लिए  <br> मुझे @followable(['followable'=>$author]) करें</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                {!!AdvertHTML('author-detail-bottom-800x100')!!}
            </section>
            <!-- Ad Banner  -->
            @if ($popularCategory->news->count() > 0)                
            <div class="main-bg-clr container-fluid px-0">
                @includeIf('components.news-header', ['section' => $popularCategory,'width'=>'w-25'])
                @foreach ($popularCategory->news as $key => $news)
                    @if ($key < 4)
                    @push('design_1')
                    <div class="col mb-2 px-2">
                        <div class="card card-shadow">
                            <a href="{{route('single-news',$news->slug)}}" class="text-muted text-decoration-none">
                                <img loading="lazy" src="{{asset('storage/media/'.$news->newsImage->filename)}}" class="card-img-top simple-card" alt="...">
                            </a>
                            <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                <a href="{{route('single-news',$news->slug)}}" class="text-decoration-none">
                                    <h6 class="my-0 text-left">{{\Str::limit($news->title,40)}}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endpush
                    @else
                    @push('design_2')
                    <div class="col mt-md-1 px-2 mb-2">
                        <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                            <a href="{{route('single-news',$news->slug)}}">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">{{\Str::limit($news->title,50)}}</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img loading="lazy" src="{{asset('storage/media/'.$news->newsImage->filename)}}" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                @endforeach
                <div class="row mx-auto">
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
            @endif

            <!-- Ad Banner  -->
            <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                {!!AdvertHTML('author-category-bottom-800x100')!!}
            </section>
            <!-- Ad Banner  -->
            <div class="container-fluid mx-auto">
                <div class="row row-cols-md-2 row-cols-1 ">
                    @foreach ($creatorNews as $news)
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
                                    <div class="col news-status px-2"><i class="fas fa-watch mr-3"></i>{{\Carbon\Carbon::parse($news->created_at)->diffForHumans()}}</div>
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
                    @endforeach
                </div>
            </div>
            <div class="container-fluid px-0 mx-auto mt-3">
                <div class="d-flex align-items-center justify-content-center">
                {{$creatorNews->onEachSide(0)->links()}}
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto px-0 text-center">
                {!!AdvertHTML('author-pagination-bottom-800x100')!!}
            </section>
            <!-- Ad Banner  -->
        </div>
    </div>
</main>
@endsection
