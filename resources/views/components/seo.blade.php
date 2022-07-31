@if($obj)
@php
    if($page == 'single-page'){
        $title = $obj->title;
        $description = $obj->short_description;
        $tags = implode(", ",$obj->tags->pluck('name')->toArray());
        $image = (isset($obj->newsImage->filename)) ? $obj->newsImage->filename : '';
        $alt = (isset($obj->newsImage->filename)) ? $obj->newsImage->alt : '';
        $type = (isset($obj->newsImage->filename)) ? $obj->newsImage->type : '';
        $size = (isset($obj->newsImage->filename)) ? $obj->newsImage->size : '';
    }elseif($page == 'category-page'){
        $title = $obj->cat_name;
        $description = '';
        $tags = '';
        $image = (isset($obj->catImage->filename)) ? $obj->catImage->filename : '';
        $alt = (isset($obj->catImage->filename)) ? $obj->catImage->alt : '';
        $type = (isset($obj->catImage->filename)) ? $obj->catImage->type : '';
        $size = (isset($obj->catImage->filename)) ? $obj->catImage->size : '';
    }elseif($page == 'tag-page'){
        $title = $obj->name;
        $description = '';
        $tags = '';
        $tagImage = (isset($obj->tagImage->filename)) ? $obj->tagImage->filename : '';
        $image = (isset($obj->tagImage->filename)) ? $obj->tagImage->filename : '';
        $alt = (isset($obj->tagImage->filename)) ? $obj->tagImage->alt : '';
        $type = (isset($obj->tagImage->filename)) ? $obj->tagImage->type : '';
        $size = (isset($obj->tagImage->filename)) ? $obj->tagImage->size : '';
    }elseif($page == 'page-page'){
        $title = $obj->title;
        $description = $obj->short_description;
        $tags = '';
        $image = (isset($obj->pageImage->filename)) ? $obj->pageImage->filename : '';
        $alt = (isset($obj->pageImage->filename)) ? $obj->pageImage->alt : '';
        $type = (isset($obj->pageImage->filename)) ? $obj->pageImage->type : '';
        $size = (isset($obj->pageImage->filename)) ? $obj->pageImage->size : '';
    }elseif($page == 'author-page'){
        $title = $obj->name;
        $description = $obj->about;
        $tags = '';
        $image = (isset($obj->details->avatar->filename)) ? $obj->details->avatar->filename : '';
        $alt = (isset($obj->details->avatar->filename)) ? $obj->details->avatar->alt : '';
        $type = (isset($obj->details->avatar->filename)) ? $obj->details->avatar->type : '';
        $size = (isset($obj->details->avatar->filename)) ? $obj->details->avatar->size : '';
    }else{
        $title = '';
        $description = '';
        $tags = '';
        $image = '';
        $alt = '';
        $type = '';
        $size = '';
    }
    $title = ($obj->meta_title != NULL) ? $obj->meta_title : $title;
    $meta_description = ($obj->meta_description != NULL) ? $obj->meta_description : $description;
    $keywords = ($obj->meta_keywords != NULL) ? $obj->meta_keywords : $tags;
    $publish_date = \Carbon\Carbon::parse($obj->created_at)->toDateTimeString();
    $image = ($image != '') ? asset('storage/media/'.$image) : '';
    $alt = $alt;
    $type = $type;
    $size = $size;
@endphp
    <meta name="robots" content="noindex, nofollow">
    <title>{{$title}} - {{ config('app.name') }}</title>
    <meta name='description' itemprop='description' content="{{$meta_description}}" />
    <meta name='keywords' content='{{$keywords}}' />
    <meta property='article:published_time' content='{{$publish_date}}' />
    <meta property='article:section' content='event' />

    <meta property="og:description" content="{{$meta_description}}" />
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate" content="en-us" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:image" content="{{$image}}" />
    <meta property="og:og_imageAlt" content="{{$alt}}" />
    <meta property="og:image:url" content="{{$image}}" />
    <meta property="og:image:size" content="{{$size}}" />
    <meta name="og_imageType" content="{{ $type }}"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$title}}" />
    <meta name="twitter:site" content="{{ config('app.name') }}" />
@endif