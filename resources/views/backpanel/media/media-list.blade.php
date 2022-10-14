@if(!empty($media) && $media->count())
@foreach ($media as $item)
<li class="col-12 border-bottom">
    <div class="file row py-1 align-items-center list" 
        data-id="{{$item->id}}" 
        data-dimen="{{$item->dimension}}" 
        data-type="{{$item->type}}" 
        data-size="{{formatBytes($item->size,1)}}" 
        data-path="{{asset('storage/media/'.$item->filename)}}" 
        data-alt="{{$item->alt}}" 
        data-name="{{$item->filename}}" 
        data-createdby="{{$item->creator->name}}"
        data-createdat="{{date('Y-m-d H:i:s',strtotime($item->created_at))}}" 
        data-updatedat="{{date('Y-m-d H:i:s',strtotime($item->updated_at))}}">
        <div class="col-2 col-md-1">
            <label class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input checkbox" value="{{$item->id}}">
                @if(strpos($item->type, 'image/') !== false)
                <i class="bx bx-image-alt fs-4 ms-3 d-none d-md-inline-block"></i>
                @elseif(strpos($item->type, 'video/') !== false)
                <i class="bx bx-film fs-4 ms-3 d-none d-md-inline-block"></i>
                @elseif(strpos($item->type, 'audio/') !== false)
                <i class="bx bx-volume-full fs-4 ms-3 d-none d-md-inline-block"></i>
                @else
                <i class="bx bx-file fs-4 ms-3 d-none d-md-inline-block"></i>
                @endif
            </label>
        </div>
        <div class="col-10 col-md-7" style="font-size: 14px">
            <span>{{$item->filename}}</span>
        </div>
        <div class="col-md-2 d-none d-md-block">{{formatBytes($item->size,1)}}</div>
        <div class="col-md-2 d-none d-md-block">{{date('Y-m-d H:i:s',strtotime($item->created_at))}}</div>
    </div>
</li>
@endforeach

@if($total > $take + $skip)
<div class="col-12 col-md-12 col-lg-12 my-2 text-center loadmore-wrapper">
    <button id="loadMoreBtn" class="btn btn-primary btn-sm"
        data-skip="{{$take + $skip}}"
        data-total="{{$total}}">
        <i class="bx bx-down-arrow-alt"></i> Load More
    </button>
</div>
@else
<li class="col-12 py-2">
    <div class="d-flex justify-content-center align-items-center">
        <h6>No More Files</h6>
    </div>
</li>
@endif

@endif