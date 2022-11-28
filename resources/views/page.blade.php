@extends('layouts.frontend.master')
@section('meta-tags')
{!! SEO::generate() !!}
@endsection
@section('sections')
<main class="container-fluid mx-auto mt-1 position-relative">
    <div class="row">
        <div class="@if($page->template != 'no-sidebar') col-md-9 @endif col-12 px-2">
            <div class="container-fluid px-1 py-4" style="background:linear-gradient(to right, var(--primary) 0%,#f2c75d 100%)">
                <div class="row justify-content-between align-items-center m-0">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 py-0" style="background-color:transparent;font-size:17px">
                                <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Hindi News</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{$page->name}}</span></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 mt-3">
                        <h1 class="text-white px-2">{{$page->name}}</h1>
                        <ul class="d-flex list-unstyled m-0 ml-2">
                            <li><a href="{{$shareCurrent['facebook']}}" target="_blank" class="text-white" style="font-size:22px"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$shareCurrent['whatsapp']}}" target="_blank" class="mx-5 text-white" style="font-size:22px"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="{{$shareCurrent['twitter']}}" target="_blank" class="text-white" style="font-size:22px"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 px-1">
                <div class="text-dark single-para mb-3 text-justify fs-5 content">
                    @php
                    echo html_entity_decode($page->content);
                    @endphp
                </div>
            </div>
        </div>
        @if($page->template != 'no-sidebar')
        <aside class="col-md-3 col-12 px-1 my-md-0">
            <div class="sticky-top"  style="z-index:1">
                @includeIf('components.whatsapp-ad')
                @includeIf('components.poll')
                @if ($sidebar_1->news->count() > 0)                    
                <div class="col-12 mt-2 side-position mx-auto px-0">
                    @includeIf('components.news-header', ['section' => $sidebar_1,'sidebar'=>true,'width'=>'w-25'])
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
                                        <h6 class="text-light m-0">{{\Str::limit($sidebar_news->title,60)}}</h6>
                                    </a>
                                    <p class="post-date m-1text-white">{{frontDateFormat($sidebar_news->created_at)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </aside>
        @endif
    </div>
</main>
@endsection
