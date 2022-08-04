@if(!empty($media) && $media->count())
@foreach ($media as $item)
<li class="col-md-2 col-4">
    <div class="file media-file" data-id="{{$item->id}}" data-dimen="{{$item->dimension}}" data-type="{{$item->type}}" data-size="{{formatBytes($item->size,1)}}" data-path="{{asset('storage/media/'.$item->filename)}}" data-alt="{{$item->alt}}" data-name="{{$item->filename}}">
        <input type="checkbox" class="d-none">
        <div class="media-item" title="1">
            <span class="media-item-selected">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z"></path>
                </svg>
            </span>
            <div class="media-thumbnail">
                <img src="{{asset('storage/media/'.$item->filename)}}" alt="1">
            </div>
            <div class="media-description">
                <p>{{$item->filename}}</p>
            </div>
        </div>
    </div>
</li>
@endforeach
<div class="col-12 mt-4">
    {!! $media->links() !!}
</div>
@else
<li class="col">
    <div class="d-flex justify-content-center align-items-center">
        <p>No Images</p>
    </div>
</li>
@endif