@if(!empty($media) && $media->count())
@foreach ($media as $item)
    <div class="col-lg-2 col-md-2 col-3 mt-4">
        <div class="file" data-id="{{$item->id}}" data-dimen="{{$item->dimension}}" data-type="{{$item->type}}" data-size="{{formatBytes($item->size,1)}}" data-path="{{asset('storage/media/'.$item->filename)}}" data-alt="{{$item->alt}}" data-name="{{$item->filename}}">
            <img class="img-fluid up-file" src="{{asset('storage/media/'.$item->filename)}}" />
        </div>
    </div>
@endforeach
@else
<div class="col-lg-12 col-md-12 col-12 mt-4 h-100 d-flex justify-content-center align-items-center">
    <h1>No Images</h1>
</div>
@endif

<div class="col-12 mt-4 d-flex justify-content-end" style="bottom:0%">
    {!! $media->links() !!}
</div>
