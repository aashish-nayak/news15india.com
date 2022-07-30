@if($obj)
@php
    if($page == 'single-page'){
        $title = $obj->title;
        $description = $obj->short_description;
        $tags = implode(", ",$obj->tags->pluck('name')->toArray());
        $image = $obj->newsImage->filename;
        $alt = $obj->newsImage->alt;
        $type = $obj->newsImage->type;
        $size = $obj->newsImage->size;
    }elseif($page == 'category-page'){
        $title = $obj->cat_name;
        $description = '';
        $tags = '';
        $image = $obj->catImage->filename;
        $alt = $obj->catImage->alt;
        $type = $obj->catImage->type;
        $size = $obj->catImage->size;
    }elseif($page == 'tag-page'){
        $title = $obj->name;
        $description = '';
        $tags = '';
        $image = $obj->tagImage->filename;
        $alt = $obj->tagImage->alt;
        $type = $obj->tagImage->type;
        $size = $obj->tagImage->size;
    }elseif($page == 'page-page'){
        $title = $obj->title;
        $description = $obj->short_description;
        $tags = '';
        $image = $obj->pageImage->filename;
        $alt = $obj->pageImage->alt;
        $type = $obj->pageImage->type;
        $size = $obj->pageImage->size;
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
    $image = asset('storage/media/'.$image);
    $alt = $alt;
    $type = $type;
    $size = $size;
@endphp
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