<!-- Swiper Nav fro Mobile -->
<div class="container-fluid d-md-none d-block">
    <div class="scrollmenu">
        @foreach ($mobileMenu->parentMenuNodes as $mobile)
        <a class="link-swipe" href="{{route($mobile->route_name,$mobile->url)}}">{{$mobile->title}}</a>
        @endforeach
    </div>
</div>
<!-- Swiper Nav fro Mobile End -->