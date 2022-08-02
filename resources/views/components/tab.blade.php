<div class="tab-pane fade {{$active}} {{$show}}" id="tab-{{$subMegaNode->id}}" role="tabpanel" aria-labelledby="tab-{{$subMegaNode->id}}-data">
    <div class="col-12">
        <div class="row justify-content-center align-items-center">
            @foreach ($subMegaNode->reference->news()->latest()->limit(5)->get() as $key => $megaNews)
            @if($key < 1)
            <div class="col-md-7">
                <a href="{{route('single-news',$megaNews->slug)}}" class="text-decoration-none">
                    <img loading="lazy" src="{{asset('storage/media/'.$megaNews->newsImage->filename)}}" class="img-fluid" alt="{{$megaNews->newsImage->alt}}">
                    <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                        {{\Str::limit($megaNews->title,60)}}
                    </h6>
                </a>
                <p class="text-muted" style="font-size: 1.2rem">
                    {{\Str::limit($megaNews->short_description,100)}}
                </p>
            </div>
            @endif
            @endforeach
            <div class="col-md-4">
                <div class="row row-cols-2 p-0">
                    @foreach ($subMegaNode->reference->news()->latest()->limit(5)->get() as $key => $megaNews)
                    @if($key > 0)
                    <div class="col mb-2 px-2">
                        <div class="card card-shadow">
                            <a href="{{route('single-news',$megaNews->slug)}}" class="text-muted text-decoration-none">
                                <img loading="lazy" src="{{asset('storage/media/'.$megaNews->newsImage->filename)}}" class="card-img-top" alt="{{$megaNews->newsImage->alt}}">
                            </a>
                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                <a href="{{route('single-news',$megaNews->slug)}}" class="text-decoration-none font-weight-bold">{{\Str::limit($megaNews->title,45)}}</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>