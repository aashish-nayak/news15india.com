@extends('layouts.frontend.master')
@section('meta-tags')
@meta([
    'title'         => (!empty($currentCategory->meta_title)) ? $currentCategory->meta_title : $currentCategory->cat_name,
    'keywords'      => $currentCategory->meta_keywords,
    'description'   => (!empty($currentCategory->meta_description)) ? $currentCategory->meta_description : $currentCategory->cat_name,
    'image'         => asset('storage/media/'.$currentCategory->catImage->filename),
    'image_alt'     => $currentCategory->catImage->alt,
    'image_size'    => $currentCategory->catImage->size,
    'image_type'    => $currentCategory->catImage->type,
])
@endsection
@section('sections')
<main class="container-fluid mx-auto mt-1 position-relative">
    <div class="row">
        <div class="col-md-9 col-12 px-0 pr-md-1">
            @foreach ($categoryNews as $key => $news)
            @if($key < 5)
            @push('design_1')
            <div class="holder h-100">
                <div class="box mt-1 slider-height h-100">
                    <a href="{{route('single-news',$news->slug)}}">
                        <img loading="lazy" src="{{asset('storage/media/'.$news->newsImage->filename)}}" class="w-100 h-100" alt="">
                        <div class="content-overlay"></div>
                    </a>
                    <div class="img-title p-3" style="background-color: #16161687 !important;">
                        <a href="{{route('single-news',$news->slug)}}">
                            <h6 class="text-light m-0">{{\Str::limit($news->title,50)}}</h6>
                        </a>
                        <p class="post-date m-1 text-white">{{frontDateFormat($news->created_at)}}</p>
                    </div>
                </div>
            </div>
            @endpush
            @elseif($key > 5 && $key <= 11)
            @push('design_2')
            <div class="col mb-4 p-1">
                <div class="card mx-1" style="border:1px solid var(--primary);">
                    <a href="{{route('single-news',$news->slug)}}" class="text-decoration-none">
                        <img loading="lazy" src="{{asset('storage/media/'.$news->newsImage->filename)}}" class="card-img-top simple-card" alt="...">
                    </a>
                    <div class="card-body p-2">
                        <a href="{{route('single-news',$news->slug)}}" class="text-muted text-decoration-none">
                            <h6 class="text-left">{{\Str::limit($news->title,40)}}</h6>
                        </a>
                    </div>
                </div>
            </div>
            @endpush
            @else
            @push('moreNews')
            <div class="col mt-2 px-1">
                <div class="card-horizontal no-gutters card-horizontal-3" style="border:1px solid var(--primary)">
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
            @endpush
            @endif
            @endforeach
            <div class="container-fluid px-1 py-4" style="background:linear-gradient(to right, var(--primary) 0%,#f2c75d 100%)">
                <div class="row justify-content-between align-items-center m-0">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 py-0" style="background-color:transparent;font-size:17px">
                                <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Hindi News</a></li>
                                @foreach ($parents as $parent)
                                <li class="breadcrumb-item"><a class="text-white" href="{{route('category-news',$parent->slug)}}">{{$parent->cat_name}}</a></li>
                                @endforeach
                                <li class="breadcrumb-item active" aria-current="page"><span>{{$currentCategory->cat_name}}</span></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 mt-3">
                        <h1 class="text-white px-2">{{$currentCategory->cat_name}}</h1>
                        <ul class="d-flex list-unstyled m-0 ml-2">
                            <li><a href="{{$shareCurrent['facebook']}}" target="_blank" class="text-white" style="font-size:22px"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$shareCurrent['whatsapp']}}" target="_blank" class="mx-5 text-white" style="font-size:22px"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="{{$shareCurrent['twitter']}}" target="_blank" class="text-white" style="font-size:22px"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {!!AdvertHTML('category-breadcrumb-bottom-header-800x100')!!}
            <div class="container-fluid mx-auto mt-1">
                <div class="row">
                    <div class="col-md-6 col-12 px-1 pr-md-1 my-md-0 my-1">
                        <div class="single-item">
                            @stack('design_1')
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-1 pl-md-1 my-md-0 my-1">
                        <div class="row row-cols-md-3 row-cols-2 mx-auto justify-content-between">
                            @stack('design_2')
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mx-auto">
                <div class="row row-cols-md-2 row-cols-1 ">
                    @stack('moreNews')
                </div>
            </div>
            <div class="container-fluid px-0 mx-auto mt-4">
                <div class="d-flex justify-content-center align-items-center">
                    {{$categoryNews->onEachSide(0)->links()}}
                </div>
            </div>
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto mt-3 mb-2 mb-md-0 px-0 text-center">
                {!!AdvertHTML('category-pagination-bottom-800x100')!!}
            </section>
            <!-- Ad Banner  -->
        </div>
        <aside class="col-md-3 col-12 px-1 my-md-0">
            <div class="sticky-top"  style="z-index:1">
                <div class="ad-box mb-2">
                    {!!AdvertHTML('category-sidebar-350x300')!!}
                </div>
                @includeIf('components.whatsapp-ad')
                @includeIf('components.poll')
                <div class="col-12 p-0 mt-2 side-position mx-auto">
                    <div class="container-fluid d-flex align-items-center justify-content-between bg-dark py-2 nav-height">
                        <i class="fa fa-sort-up mr-1" style="color:#FE9517;font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i><h4 style="color:#FE9517; font-weight:600;">{{$sidebar_1->cat_name}}</h4>
                        <div class="w-50 mx-3 text-white" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
                            <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \</span>
                        </div>
                        <a href="{{route('category-news',$sidebar_1->slug)}}" class="nav-link p-0" style="color:#FE9517;font-size:15px;font-weight:600;">और भी</a>
                    </div>
                    <div class="side-bar" style="height: 350px;background-color:#333;">
                        <div class="my-1" style="background-color:#333;">
                            @foreach ($sidebar_1->news as $key=>$sidebar_news)
                            <div class="py-1 border-bottom border-secondary">
                                <div class="post-data ">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}" class="post-title">
                                        <div class="row m-0">
                                            <span class="col-2 p-0" style="color: #FE9517; font-size:30px;">{{$key+1}}</span>
                                            <div class="post-meta col-10 p-0">
                                                <p style="color:#f2f2f2;" class="post-date m-0">{{frontDateFormat($sidebar_news->created_at)}}</p>
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
                <div class="col-12 mt-2 side-position mx-auto px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_2,'sidebar'=>true,'width'=>'w-25'])
                    <div class="single-item">
                        @foreach ($sidebar_2->news as $sidebar_news)
                        <div class="holder">
                            <div class="box mt-1" style="height:250px;">
                                <a href="{{route('single-news',$sidebar_news->slug)}}">
                                    <img loading="lazy" src="{{asset('storage/media/'.$sidebar_news->newsImage->filename)}}" class="w-100" alt="">
                                    <div class="content-overlay"></div>
                                </a>
                                <div class="img-title">
                                    <a href="{{route('single-news',$sidebar_news->slug)}}">
                                        <h6 class="text-light m-0">{{\Str::limit($sidebar_news->title,60)}}</h6>
                                    </a>
                                    <p class="post-date m-1text-white">{{frontDateFormat($sidebar_news->created_at)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                                    <h6 class="m-0"><a class="text-light " href="{{route('single-news',$sidebar_news->slug)}}">{{\Str::limit($sidebar_news->title,60)}}</a></h6>
                                    <p class="text-white m-1">{{frontDateFormat($sidebar_news->created_at)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </aside>
        <div class="col-12 px-1">
            @includeIf('components.news-header', ['section' => $bottom_section])
            <section class="container-fluid mx-auto py-4" style="background-color:#FE9517;">
                <div class="row row-cols-md-5 row-cols-1">
                    @foreach ($bottom_section->news as $bottomNews)
                    <div class="col px-2 px-md-1 my-3">
                        <a href="{{route('single-news',$bottomNews->slug)}}" class="text-decoration-none card-horizontal p-0">
                            <div class="col-5 p-0" style="border: 3px solid #f2f2f2;">
                                <img loading="lazy" src="{{asset('storage/media/'.$bottomNews->newsImage->filename)}}" class="img-fluid" alt="">
                            </div>
                            <h6 class="col-7 single-para">
                                {{\Str::limit($bottomNews->title,40)}}
                            </h6>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</main>
@endsection
