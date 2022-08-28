<!-- Swiper Nav fro Mobile -->
<div class="container-fluid d-md-none d-block px-1">
    <div class="scrollmenu">
        @foreach ($mobileMenu as $mobile)
        <a class="link-swipe" target="{{$mobile->target}}" href="{{$mobile->url}}">{{$mobile->title}}</a>
        @endforeach
    </div>
</div>
<!-- Swiper Nav fro Mobile End -->