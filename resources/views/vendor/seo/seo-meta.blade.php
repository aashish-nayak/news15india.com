    <!-- Standard SEO -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="referrer" content="{{((!empty($referrer))) ? $referrer : config('meta.referrer')}}">
    <meta name="robots" content="{{((!empty($robots))) ? $robots : config('meta.robots')}}">
    @php
        $prefix = (isset($prefix)) ? $prefix : '';
    @endphp
    <title>{{(isset($title)) ? $title.$prefix : setting('site_meta_title')}}</title>
    <meta name="title" content="Your Page Title">
    <meta name="description" content="{{((!empty($description))) ? $description : setting('site_meta_description')}}">
    <meta name="keywords" content="{{((!empty($keywords))) ? $keywords : setting('site_meta_keyword')}}">
    @if (config('meta.geo_region') !== '')
    <meta name="geo.region" content="{{config('meta.geo_region')}}">
    @endif
    @if (config('meta.geo_position') !== '')
    <meta name="geo.position" content="{{config('meta.geo_position')}}">
    <meta name="ICBM" content="{{config('meta.geo_position')}}">
    @endif
    <meta name="geo.placename" content="{{setting('site_name')}}">


    <!-- Dublin Core basic info -->
    <meta name="dcterms.Format" content="text/html">
    <meta name="dcterms.Language" content="{{config('app.locale')}}">
    <meta name="dcterms.Identifier" content="{{url()->current()}}">
    <meta name="dcterms.Relation" content="{{setting('site_name')}}">
    <meta name="dcterms.Publisher" content="{{setting('site_name')}}">
    <meta name="dcterms.Type" content="text/html">
    <meta name="dcterms.Coverage" content="{{url()->current()}}">
    <meta name="dcterms.Title" content="{{(!empty($title)) ? $title : setting('site_meta_title')}}">
    <meta name="dcterms.Subject" content="{{(!empty($keywords)) ? $keywords : setting('site_meta_keyword')}}">
    <meta name="dcterms.Contributor" content="{{(!empty($author)) ? $author : setting('site_name')}}">
    <meta name="dcterms.Description" content="{{(!empty($description)) ? $description : setting('site_meta_description')}}">


    <!-- Facebook OpenGraph -->
    <meta property="og:locale" content="{{config('app.locale')}}">
    <meta property="og:type" content="{{(!empty($type)) ? $type : config('meta.type')}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" name="og:title" content="{{(!empty($title)) ? $title : setting('site_meta_title')}}">
    <meta property="og:description" content="{{(!empty($description)) ? $description : setting('site_meta_description')}}">
    <meta property="og:image" itemprop="image" content="{{(!empty($image)) ? $image : setting('site_logo')}}">
    <meta property="og:image:url" content="{{$image}}" />
    <meta property="og:site_name" content="{{setting('site_name')}}">
    @isset($publish_date)
    <meta property='article:published_time' content='{{$publish_date}}' />
    @endisset
    @isset($image_alt)
    <meta property="og:og_imageAlt" content="{{$image_alt}}" />
    @endisset
    @isset($image_size)
    <meta property="og:image:size" content="{{$image_size}}" />
    @endisset
    @isset($image_type)
    <meta name="og_imageType" content="{{ $image_type }}"/>
    @endisset

    @if (config('meta.fb_app_id') !== '')
    <meta property="fb:app_id" content="{{ config('meta.fb_app_id') }}" />
    @endif

    <!-- Twitter Card -->
    @if (config('meta.twitter_card') !== '')
    <meta name="twitter:card" content="{{(!empty($twitter_card)) ? $twitter_card : config('meta.twitter_card')}}">
    @endif
    @if (config('meta.twitter_site') !== '' || (!empty($twitter_site)))
    <meta name="twitter:site" content="{{(!empty($twitter_site)) ? $twitter_site : config('meta.twitter_site')}}">
    @endif
    <meta name="twitter:title" content="{{(!empty($title)) ? $title : setting('site_meta_title')}}">
    <meta name="twitter:description" content="{{(!empty($description)) ? $description : setting('site_meta_description')}}">
    <meta name="twitter:image" content="{{(!empty($image)) ? $image : setting('site_logo')}}">