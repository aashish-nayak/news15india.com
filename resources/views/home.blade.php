@extends('layouts.frontend.master')
@section('meta-tags')
@meta([
    'title'         => setting('site_meta_title'),
    'keywords'      => setting('site_meta_keyword'),
    'description'   => setting('site_meta_description'),
    'image'         => setting('site_logo'),
    'type'          => 'website',
    'author'        => setting('site_name'),
])
@endsection
@section('sections')
    <!-- Hero Section   -->
    <section class="container-fluid mt-md-1 mx-auto px-0">
        <div class="row justify-content-between custom-space">
            <div class="col-md-4">
                <div class="box">
                    <iframe class="w-100 home-video" src="{{convertYoutube(setting('live_stream_url'))}}?controls=1&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 mb-2 mb-md-0">
                <div class="box">
                    @foreach ($popularNews->news as $key=>$popNews)
                        @if($key <= 5)
                        @push('main_slider_news')
                        <div class="position-relative holder">
                            <a href="{{route('single-news',$popNews->slug)}}">
                                <img src="{{asset('storage/media/'.$popNews->newsImage->filename)}}" class="img-fluid" loading="lazy" alt="">
                                <div class="content-overlay"></div>
                                <div class="img-title" style="width: 75%;">
                                    <h5 class="text-light">{{\Str::limit($popNews->title,40)}}</h5>
                                    <p class="post-date py-1 text-white">{{\Carbon\Carbon::parse($popNews->created_at)->format(' H:i A | d M Y,')}}</p>
                                </div>
                            </a>
                        </div>
                        @endpush
                        @else
                        @push('main_marquee_news')
                        <div class="news-slider col">
                            <a href="{{route('single-news',$popNews->slug)}}" class="text-decoration-none">
                                <h2 class="slider-title">{{\Str::limit($popNews->title,45)}}</h2>
                            </a>
                        </div>
                        @endpush
                        @endif
                    @endforeach
                    <div class="single-item position-relative">
                        @stack('main_slider_news')
                    </div>
                    <marquee behavior="scroll" direction="up" onmouseover="this.stop();" scrollamount="2" onmouseout="this.start();" class="marquee" loop="true" scrolldelay="0s">
                        @stack('main_marquee_news')
                    </marquee>
                </div>
            </div>
            <div class="col-md-4 mb-2 mb-md-0">
                <div class="box calendar-default">
                    @php
                        $default_url = "javascript:void(0)";
                        $default_image = asset('front-assets/img/add.jpg');

                        $special = json_decode(setting('special_coverage'));

                        $block_1_url = (isset($special->block_1)&&$special->block_1->status == 1) ? $special->block_1->url : $default_url;
                        $block_1_image = (isset($special->block_1)&&$special->block_1->status == 1) ? $special->block_1->image : $default_image;

                        $block_2_url = (isset($special->block_2)&&$special->block_2->status == 1) ? $special->block_2->url : $default_url;
                        $block_2_image = (isset($special->block_2)&&$special->block_2->status == 1) ? $special->block_2->image : $default_image;

                        $block_3_url = (isset($special->block_3)&&$special->block_3->status == 1) ? $special->block_3->url : $default_url;
                        $block_3_image = (isset($special->block_3)&&$special->block_3->status == 1) ? $special->block_3->image : $default_image;
                    @endphp
                    <div class="calendar-plage">
                        <a href="{{$block_1_url}}">
                            <img src="{{$block_1_image}}" class="img-fluid" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="calendar-plage">
                        <a href="{{$block_2_url}}">
                            <img src="{{$block_2_image}}" class="img-fluid" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="calendar-plage">
                        <a href="{{$block_3_url}}">
                            <img src="{{$block_3_image}}" class="img-fluid" loading="lazy" alt="">
                        </a>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End  -->
    <!--Section 1 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-0 pr-md-1">
                @includeIf('components.news-header', ['section' => $section1,'width'=>'w-50'])
                @foreach ($section1->news as $key => $news1)
                    @if($key <= 3)
                    @push('section1_design_1')
                    <div class="col-6 p-1">
                        <div class="box card-shadow" style="height:160px;">
                            <a href="{{route('single-news',$news1->slug)}}">
                                <img src="{{asset('storage/media/'.$news1->newsImage->filename)}}" class="img-fluid" loading="lazy" alt="">
                                <div class="content-overlay" style="border-bottom:2px solid var(--primary);"></div>
                                <div class="img-title">
                                    <p class="text-light">{{\Str::limit($news1->title,50)}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @elseif ($key > 5 && $key <= 9)
                    @push('section1_design_2')
                    <div class="card card-shadow mt-md-1 my-2" style="border-left:2px solid var(--primary);">
                        <a href="{{route('single-news',$news1->slug)}}">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper col-4 col-md-3 p-0">
                                    <img src="{{asset('storage/media/'.$news1->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
                                </div>
                                <div class="card-body col-8 col-md-9">
                                    <h6 class="card-text m-0">{{\Str::limit($news1->title,55)}}</h6>
                                    <p class="post-date m-0">
                                        {{$news1->created_at}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endpush
                    @else
                    @push('section1_design_3')
                    <div class="col-md-6 col-12 px-2 my-2 my-md-0 mb-md-2 px-md-1">
                        <div class="card card-shadow" style="border-left:2px solid var(--primary);">
                            <a href="{{route('single-news',$news1->slug)}}">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-3 p-0">
                                        <img src="{{asset('storage/media/'.$news1->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
                                    </div>
                                    <div class="card-body col-8 col-md-9">
                                        <h6 class="card-text m-0">{{\Str::limit($news1->title,65)}}</h6>
                                        <p class="post-date m-0">{{$news1->created_at}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                @endforeach
                <div class="row mx-auto">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            @stack('section1_design_1')
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-1">
                        @stack('section1_design_2')
                    </div>
                    @stack('section1_design_3')
                    <div class="col-12 px-1">
                        <a href="javascript:void(0)"><img src="{{asset('front-assets/img/8x1ad.png')}}" width="100%" loading="lazy" alt="" srcset=""></a>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 col-12 my-3 my-md-0 px-0">
                @includeIf('components.whatsapp-ad')
                @includeIf('components.poll')
                <div class="col-md-12 px-0 mt-1">
                    <a href="javascript:void(0)">
                        <img src="{{asset('front-assets/img/job-ad.png')}}" class="w-100" loading="lazy" alt="" srcset="">
                    </a>
                </div>
            </aside>
        </div>
    </section>
    <!--Section End  -->
    <!-- Sectioon -2 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1 main-bg-clr">
                @includeIf('components.news-header', ['section' => $section2])
                @foreach ($section2->news as $key => $news2)
                    @if($key <= 3)
                    @push('section2_design_1')
                    <div class="col mb-2 px-2">
                        <div class="card card-shadow">
                            <a href="{{route('single-news',$news2->slug)}}" class="text-muted text-decoration-none">
                                <img src="{{asset('storage/media/'.$news2->newsImage->filename)}}" class="card-img-top simple-card" loading="lazy" alt="...">
                            </a>
                            <div class="card-body py-3 px-2" style="border-bottom:2px solid var(--primary);">
                                <a href="{{route('single-news',$news2->slug)}}" class="text-decoration-none">
                                    <h6 class="my-0 text-left">{{\Str::limit($news2->title,60)}}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endpush
                    @else
                    @push('section2_design_2')
                    <div class="col mt-md-1 px-2 mb-2">
                        <div class="card card-shadow" style="border-right:2px solid var(--primary);">
                            <a href="{{route('single-news',$news2->slug)}}">
                                <div class="card-horizontal">
                                    <div class="card-body col-7 col-md-8 p-2 p-md-0 px-md-2 ">
                                        <h6 class="card-text">{{\Str::limit($news2->title,65)}}</h6>
                                    </div>
                                    <div class="img-square-wrapper col-5 col-md-4 p-0">
                                        <img src="{{asset('storage/media/'.$news2->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
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
                            @stack('section2_design_1')
                        </div>
                    </div>
                    <div class="col-md-8 px-1">
                        <div class="row row-cols-1 row-cols-md-2 m-0">
                            @stack('section2_design_2')
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-11 my-md-0 px-1 mt-md-2">
                @includeIf('components.news-header', ['section' => $sidebar_1,'sidebar' => true,'width'=>"w-25"])
                <div class="side-bar">
                    @foreach ($sidebar_1->news as $sideNews)
                    <div class="card card-shadow my-1">
                        <div class="card-body px-3 py-1">
                            <div class="post-data ">
                                <a href="{{route('single-news',$sideNews->slug)}}" class="post-title">
                                    <div class="post-meta">
                                        <p class="post-date m-0 ">{{$sideNews->created_at}}</p>
                                    </div>
                                    <h6>{{\Str::limit($sideNews->title,65)}}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="side-footer d-none d-md-flex justify-content-between align-items-center"></div>
            </aside>
        </div>
    </section>
    <!-- Sectioon -2 End -->
    <!-- Sectioon -3 -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1">
                @includeIf('components.news-header', ['section' => $section3])
                @foreach ($section3->news as $key => $news3)
                    @if($key == 0)
                    @push('section3_design_1')
                    <div class="container-fluid p-0">
                        <a href="{{route('single-news',$news3->slug)}}" class="text-decoration-none">
                            <img src="{{asset('storage/media/'.$news3->newsImage->filename)}}" class="img-fluid section-main-news" loading="lazy" alt="">
                            <h5 class="mt-2">{{\Str::limit($news3->title,100)}}</h5>
                        </a>
                        <p class="text-muted">{{\Str::limit($news3->short_description,90)}}</p>
                    </div>
                    @endpush
                    @endif
                    @if ($key > 0 && $key <= 5)
                    @push('section3_design_2')
                    <div class="style-2 border-top d-flex align-items-center px-1 py-2">
                        <div class="post-data mt-1">
                            <a href="{{route('single-news',$news3->slug)}}" class="post-title">
                                <h5>{{\Str::limit($news3->title,100)}}</h5>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                    @if ($key >= 6)
                    @push('section3_design_3')
                    <div class="card mb-1" style="border-right:2px solid var(--primary);">
                        <a href="{{route('single-news',$news3->slug)}}">
                            <div class="card-horizontal card-horizontal-2">
                                <div class="card-body col-8 col-md-8 p-0 px-2">
                                    <h6 class="card-text p-md-3 p-1">{{\Str::limit($news3->title,100)}}</h6>
                                </div>
                                <div class="img-square-wrapper col-4 col-md-4 p-0">
                                    <img src="{{asset('storage/media/'.$news3->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
                                </div>
                            </div>
                        </a>
                    </div>
                    @endpush
                    @endif
                @endforeach
                <div class="row mx-auto">
                    <div class="col-md-6 col-12 py-1 px-1">
                        @stack('section3_design_1')
                        @stack('section3_design_2')
                    </div>
                    <div class="col-md-6 p-1">
                        @stack('section3_design_3')
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-12 mt-1 my-md-0 px-1">
                <div class="col-md-12 px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_2,'sidebar' => true,'width'=>"w-25"])
                    @foreach ($sidebar_2->news as $key => $sideNews)
                        @if ($key == 0)
                        <div class="col-12 px-1">
                            <a href="{{route('single-news',$sideNews->slug)}}" class="text-decoration-none ">
                                <img src="{{asset('storage/media/'.$sideNews->newsImage->filename)}}" class="img-fluid" loading="lazy" alt="">
                                <h6 class="mt-2">{{\Str::limit($sideNews->title,60)}}</h6>
                            </a>
                            <p class="text-muted">
                                {{\Str::limit($sideNews->short_description,65)}}
                            </p>
                        </div>
                        @else
                        <div class="style-2 border-top d-flex align-items-center px-1">
                            <div class="post-data mt-1">
                                <a href="{{route('single-news',$sideNews->slug)}}" class="post-title">
                                    <h6>{{\Str::limit($sideNews->title,60)}}</h6>
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="ad-box mb-2">
                        <p class="m-0 text-center bg-secondary text-light" style="font-size:1.2rem">Advertisement</p>
                        <div class="single-item">
                            <div class="holder">
                                <div class="box">
                                    <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt=""></a>
                                </div>
                            </div>
                            <div class="holder">
                                <div class="box">
                                    <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt=""></a>
                                </div>
                            </div>
                            <div class="holder">
                                <div class="box">
                                    <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt=""></a>
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
            <div class="col-md-9 col-12 px-0">
                @includeIf('components.news-header', ['section' => $section4])
                <div class="container-fluid">
                    <div class="row row-cols-2 row-cols-md-6 p-0" style="background-color: #E3E9FF;">
                        @foreach ($section4->news as $key => $news4)
                        <div class="col mb-2 px-1">
                            <div class="card" style="border-bottom: 2px solid var(--primary);">
                                <a href="{{route('single-news',$news4->slug)}}" class="text-muted text-decoration-none">
                                    <img src="{{asset('storage/media/'.$news4->newsImage->filename)}}" class="card-img-top simple-card" loading="lazy" alt="...">
                                </a>
                                <div class="card-body py-3 px-2" style="background-color: #E3E9FF;">
                                    <a href="{{route('single-news',$news4->slug)}}" class="text-muted text-decoration-none">
                                        <h6 class="my-0 text-left">{{\Str::limit($news4->title,65)}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-12 my-md-0 px-1">
                @includeIf('components.news-header', ['section' => $sidebar_3,'sidebar' => true,'width'=>"w-25"])
                <div class="col-md-12 px-0">
                    @foreach ($sidebar_3->news as $sideNews)
                    <div class="style-2 border-top d-flex align-items-center px-1">
                        <div class="post-data mt-3">
                            <a href="{{route('single-news',$sideNews->slug)}}" class="post-title ">
                                <h5>{{\Str::limit($sideNews->title,50)}}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </section>
    <!-- Sectioon - 4 End -->
    <!-- Sectioon - 5 start -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-12 px-1 mt-2">
                @includeIf('components.news-header', ['section' => $section5,'width'=>'w-50'])
                <div class="row row-cols-1 row-cols-md-4 mx-0">
                    @foreach ($section5->news as $news5)
                    <div class="col mb-2 px-1">
                        <div class="card" style="border-right:3px solid var(--primary);">
                            <a href="{{route('single-news',$news5->slug)}}">
                                <div class="card-horizontal">
                                    <div class="card-body col-8 col-md-8 p-0 px-2">
                                        <h6 class="card-text p-1">{{\Str::limit($news5->title,60)}}</h6>
                                    </div>
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img class="img-fluid" src="{{asset('storage/media/'.$news5->newsImage->filename)}}" loading="lazy" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Section - 5 end  -->
    <!-- Section - 6 Start  -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1">
                @includeIf('components.news-header', ['section' => $section6])
                @foreach ($section6->news as $key => $news6)
                    @if($key == 0)
                    @push('section6_design_1')
                    <a href="{{route('single-news',$news6->slug)}}">
                        <img src="{{asset('storage/media/'.$news6->newsImage->filename)}}" class="img-fluid section-main-news" loading="lazy" alt="" >
                    </a>
                    @endpush
                    @endif
                    @if ($key > 0 && $key <= 6)
                    @push('section6_design_2')
                    <div class="style-2 border-top d-flex align-items-center px-2">
                        <div class="post-data mt-2">
                            <a href="{{route('single-news',$news6->slug)}}" class="post-title ">
                                <h5>{{\Str::limit($news6->title,115)}}</h5>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                    @if ($key >= 7)
                    @push('section6_design_3')
                    <div class="col px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-3" style="border-left:3px solid var(--primary);">
                            <a href="{{route('single-news',$news6->slug)}}">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img src="{{asset('storage/media/'.$news6->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
                                    </div>
                                    <div class="card-body col-8 col-md-8 p-0 pl-1">
                                        <h6 class="card-text p-0">{{\Str::limit($news6->title,80)}}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                @endforeach
                <div class="row mx-auto">
                    <div class="col-md-6 col-12 p-0">
                        @stack('section6_design_1')
                    </div>
                    <div class="col-md-6 col-12 p-0">
                        @stack('section6_design_2')
                    </div>
                    <div class="col-12 mx-auto mt-3">
                        <div class="row row-cols-1 row-cols-md-3">
                            @stack('section6_design_3')
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-11 my-3 my-md-0 px-1">
                @includeIf('components.news-header', ['section' => $sidebar_4,'sidebar' => true])
                <div class="container-fluid px-0 px-md-4">
                    @foreach ($sidebar_4->news as $sideNews)
                    <div class="col p-md-1">
                        <a href="{{route('single-news',$sideNews->slug)}}" class="text-decoration-none row p-0"
                            style="border-bottom: 2px dotted var(--secondary);">
                            <h6 class="col-8 d-flex align-items-center px-1">
                                {{\Str::limit($sideNews->title,65)}}
                            </h6>
                            <div class="col-4 p-0 mb-1">
                                <img src="{{asset('storage/media/'.$sideNews->newsImage->filename)}}" class="img-fluid" loading="lazy" alt="">
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </section>
    <!-- Section - 6 End  -->
    <!-- Section - 7 start  -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <div class="col-md-9 col-12 px-1 pr-md-1">
                @includeIf('components.news-header', ['section' => $section7])
                @foreach ($section7->news as $key => $news7)
                    @if($key <= 7)
                    @push('section7_design_1')
                    <div class="col mb-2 px-1">
                        <div class="card" style="border-bottom: 2px solid var(--primary);">
                            <a href="{{route('single-news',$news7->slug)}}" class="">
                                <img src="{{asset('storage/media/'.$news7->newsImage->filename)}}" class="card-img-top simple-card-2" loading="lazy" alt="...">
                            </a>
                            <div class="card-body p-2">
                                <a href="{{route('single-news',$news7->slug)}}" class="text-dark text-decoration-none">
                                    <h5 class="mb-1 text-left text-dark">{{\Str::limit($news7->title,50)}}</h5>
                                </a>
                                <p class="my-0 text-left text-muted">{{\Str::limit($news7->short_description,55)}}</p>
                            </div>
                        </div>
                    </div>
                    @endpush
                    @else
                    @push('section7_design_2')
                    <div class="col px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2 my-md-1"
                            style="border-left:3px solid var(--primary);">
                            <a href="{{route('single-news',$news7->slug)}}">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img src="{{asset('storage/media/'.$news7->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
                                    </div>
                                    <div class="card-body col-8 col-md-8">
                                        <h6 class="card-text p-0">{{\Str::limit($news7->title,80)}}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endpush
                    @endif
                @endforeach
                <div class="container-fluid">
                    <div class="row row-cols-2 row-cols-md-4 p-0">
                        @stack('section7_design_1')
                    </div>
                </div>
            </div>
            <aside class="col-md-3 side-position mx-auto col-12 my-md-1 px-1">
                <div class="p-0">
                    @includeIf('components.news-header', ['section' => $sidebar_5,'sidebar' => true,'width'=>"w-50"])
                    <div class="single-item mb-1">
                        @foreach ($sidebar_5->news as $sideNews)
                        <div class="holder">
                            <div class="box" style="height:220px;">
                                <div class="content-overlay" style="background-color: #5a5a5a66;"></div>
                                <a href="{{route('single-news',$sideNews->slug)}}">
                                    <i class="far fa-play-circle position-absolute" style="top:50%; left:50%;transform:translate(-50%,-50%);font-size:50px;color:var(--primary);"></i>
                                </a>
                                <img src="{{asset('storage/media/'.$sideNews->newsImage->filename)}}" class="img-fluid" loading="lazy" alt="" style="height: 100%;object-fit-cover;">
                                <div class="img-title">
                                    <h6 class="text-light m-0"><a class="text-white" href="{{route('single-news',$sideNews->slug)}}">{{\Str::limit($sideNews->title,65)}}</a></h6>
                                    <p class="p-1 m-0 text-light">{{$sideNews->created_at}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="ad-box my-2">
                        <p class="m-0 text-center bg-secondary text-light" style="font-size:1.2rem">Advertisement</p>
                        <div class="box">
                            <a href="javascript:void(0)"><img src="{{asset('front-assets/img/square-ad.png')}}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt=""></a>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-12 mx-auto mt-2 mt-md-0 px-1">
                <div class="row row-cols-1 row-cols-md-4 mx-0">
                    @stack('section7_design_2')
                </div>
            </div>
        </div>
    </section>
    <!-- Section - 7 End  -->
    <!-- Section - 8 Start  -->
    <section class="container-fluid mx-auto mt-2">
        <div class="row">
            @includeIf('components.news-header', ['section' => $section8])
            <div class="col-12">
                <div class="row align-items-center">
                    @foreach ($section8->news as $news8)
                    <div class="col-lg-4 col-md-6 col-12 px-1">
                        <div class="card border-bottom-0 border-right-0 border-top-0 mb-2" style="border-left:3px solid var(--primary);">
                            <a href="{{route('single-news',$news8->slug)}}">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper col-4 col-md-4 p-0">
                                        <img src="{{asset('storage/media/'.$news8->newsImage->filename)}}" loading="lazy" alt="Card image cap" class="">
                                    </div>
                                    <div class="card-body col-8 col-md-8">
                                        <h6 class="card-text p-0">
                                            {{\Str::limit($news8->title,80)}}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Section - 8 End  -->
    <!-- Section - 9 Start  -->
    <div class="container-fluid px-1 mt-1" style="color: var(--text-color-light-hover);">
        @includeIf('components.news-header', ['section' => $section9])
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-4 p-0">
                @foreach ($section9->news as $news9)
                <div class="col my-2 px-md-1">
                    <div class="card-body p-2"
                        style="border-left:2px solid var(--primary);border-right:2px solid var(--primary);">
                        <a href="{{route('single-news',$news9->slug)}}" class="text-decoration-none">
                            <h4 class="my-0 text-dark">{{\Str::limit($news9->title,80)}}</h4>
                        </a>
                        <p class="my-2 text-muted">{{\Str::limit($news9->short_description,80)}}</p>
                        <div class="news-status py-1">{{$news9->created_at}}</div>
                    </div>
                    <div class="mx-3" style=" border-bottom: 2px dotted #333;"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Section - 9 End  -->
    <!-- Section - 10 Start  -->
    <section class="container-fluid mx-auto mt-1">
        <div class="row">
            <aside class="col-md-4 col-12 mb-1 my-md-0 px-0">
                @includeIf('components.news-header', ['section' => $section10])
                @foreach ($section10->news as $key => $news10)
                @if($key == 0)
                <div class="col px-1">
                    <a href="{{route('single-news',$news10->slug)}}" class="text-decoration-none">
                        <img src="{{asset('storage/media/'.$news10->newsImage->filename)}}" class="img-fluid section-main-news" loading="lazy" alt="" style="border-bottom: 4px solid var(--primary);">
                        <h5 class="mt-2 p-1">
                            {{\Str::limit($news10->title,80)}}
                        </h5>
                    </a>
                    <p class="post-date m-0 p-1">
                        {{$news10->created_at}}
                    </p>
                    <p class="text-muted p-1">
                        {{\Str::limit($news10->short_description,80)}}
                    </p>
                </div>
                @else
                <div class="col px-1 mb-2">
                    <div class="style-2 mx-1" style="border-bottom:2px dotted gray;">
                        <div class="post-data mt-1  ">
                            <a href="{{route('single-news',$news10->slug)}}" class="post-title">
                                <h5>{{\Str::limit($news10->title,120)}}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </aside>
            <aside class="col-md-4 col-12 mb-1 my-md-0 px-0">
                @includeIf('components.news-header', ['section' => $section10_part2])
                @foreach ($section10_part2->news as $key => $news10)
                @if($key == 0)
                <div class="col px-1">
                    <a href="{{route('single-news',$news10->slug)}}" class="text-decoration-none">
                        <img src="{{asset('storage/media/'.$news10->newsImage->filename)}}" class="img-fluid section-main-news" loading="lazy" alt="" style="border-bottom: 4px solid var(--primary);">
                        <h5 class="mt-2 p-1">
                            {{\Str::limit($news10->title,80)}}
                        </h5>
                    </a>
                    <p class="post-date m-0 p-1">
                        {{$news10->created_at}}
                    </p>
                    <p class="text-muted p-1">
                        {{\Str::limit($news10->short_description,80)}}
                    </p>
                </div>
                @else
                <div class="col px-1 mb-2">
                    <div class="style-2 mx-1" style="border-bottom:2px dotted gray;">
                        <div class="post-data mt-1">
                            <a href="{{route('single-news',$news10->slug)}}" class="post-title">
                                <h5>{{\Str::limit($news10->title,120)}}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </aside>
            <aside class="col-md-4 col-12 mb-1 my-md-0 px-0">
                @includeIf('components.news-header', ['section' => $section10_part3])
                @foreach ($section10_part3->news as $key => $news10)
                @if($key == 0)
                <div class="col px-1">
                    <a href="{{route('single-news',$news10->slug)}}" class="text-decoration-none">
                        <img src="{{asset('storage/media/'.$news10->newsImage->filename)}}" class="img-fluid section-main-news" loading="lazy" alt="" style="border-bottom: 4px solid var(--primary);">
                        <h5 class="mt-2 p-1">
                            {{\Str::limit($news10->title,80)}}
                        </h5>
                    </a>
                    <p class="post-date m-0 p-1">
                        {{$news10->created_at}}
                    </p>
                    <p class="text-muted p-1">
                        {{\Str::limit($news10->short_description,80)}}
                    </p>
                </div>
                @else
                <div class="col px-1 mb-2">
                    <div class="style-2 mx-1" style="border-bottom:2px dotted gray;">
                        <div class="post-data mt-1  ">
                            <a href="{{route('single-news',$news10->slug)}}" class="post-title">
                                <h5>{{\Str::limit($news10->title,120)}}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </aside>
        </div>
    </section>
    <!-- Section - 10 End  -->
@endsection
