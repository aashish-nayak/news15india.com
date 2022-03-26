@if(!empty($media) && $media->count())
@foreach ($media as $item)
    <div class="col-lg-3 col-md-3 col-4 mt-4">
        <div class="file" data-id="{{$item->id}}" data-dimen="{{$item->dimension}}" data-type="{{$item->type}}" data-size="{{formatBytes($item->size,1)}}" data-path="{{asset('storage/media/'.$item->img)}}" data-alt="{{$item->alt}}" data-name="{{$item->img}}">
            <img class="img-fluid up-file" src="{{asset('storage/media/'.$item->img)}}" />
        </div>
    </div>
@endforeach
@else
<div class="col-lg-12 col-md-12 col-12 mt-4 d-flex justify-content-center align-items-center">
    <p>No Images</p>
</div>
@endif

<div class="col-12 mt-4 position-absolute d-flex justify-content-end" style="bottom:-2%">
    {!! $media->links() !!}
</div>
