@if(!empty($media) && $media->count())
@foreach ($media as $item)
    <div class="col-lg-3 col-md-3 col-4 mt-4">
        <div class="file position-relative" data-id="{{$item->id}}" data-dimen="{{$item->dimension}}" data-type="{{$item->type}}" data-size="{{formatBytes($item->size,1)}}" data-path="{{asset('storage/media/'.$item->filename)}}" data-alt="{{$item->alt}}" data-name="{{$item->filename}}">
            <img class="img-fluid up-file" src="{{asset('storage/media/'.$item->filename)}}" />
            <div class="position-absolute top-0 p-1 d-none">
                <input type="checkbox" name="" id="">
            </div>
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
