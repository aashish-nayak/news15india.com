<!-- Desktop Breaking News Marquee  -->
@if (isset($breakingNews->title))
<div class="container mx-auto my-md-2 px-0">
    <div class="alert alert-dismissible m-0 py-1 px-1 text-center fade show border rounded-pill d-md-block d-none bg-primary-clr" role="alert">
        <div class="news-alert d-flex justify-content-start align-items-center m-md-0">
            <div class="ml-4">
                <strong style="color:black;font-size: 20px;">BREAKING NEWS |</strong>
            </div>
            <div class="ml-3 text-left">
                <a href="{{route('single-news',$breakingNews->slug)}}" class="text-decoration-none text-left">
                    <h2 class="text-white font-weight-bold">{{$breakingNews->title}}</h2>
                </a>
            </div>
            <div class="position-relative ml-auto mr-4">
                <button type="button" class="close p-0 position-static" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Desktop Breaking News Marquee End  -->