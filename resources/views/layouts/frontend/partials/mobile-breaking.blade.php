<!-- Mobile Breaking News Marquee  -->
@if($breakingNews->count()>0)
<div class="container-fluid d-md-none my-1 d-block mobile-news-alert">
    <div class="row align-items-center">
        <div class="col-4 py-1 px-1 text-center bg-primary-clr">
            <h6 class="breaking-news-mobile font-weight-bold pt-2" style="font-size: 1.5rem">BREAKING NEWS</h6>
        </div>
        <div class="col-8 px-1 bg-dark-pure d-flex align-items-center">
            <marquee behavior="scroll" direction="left" class="py-2" onmouseover="this.stop();" scrollamount="4" onmouseout="this.start();">
                @foreach ($breakingNews as $breakNews)
                <a href="{{route('single-news',$breakNews->slug)}}" class="text-decoration-none text-light">
                    <h2>{{$breakNews->title}}</h2>
                </a>
                @endforeach
            </marquee>
        </div>
    </div>
</div>
@endif
<!-- Mobile Breaking News Marquee End  -->
