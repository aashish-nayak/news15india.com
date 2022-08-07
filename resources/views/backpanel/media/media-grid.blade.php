@if(!empty($media) && $media->count())
@foreach ($media as $item)
<li class="col">
    <div class="file grid" 
        data-id="{{$item->id}}" 
        data-dimen="{{$item->dimension}}" 
        data-type="{{$item->type}}" 
        data-size="{{formatBytes($item->size,1)}}" 
        data-path="{{asset('storage/media/'.$item->filename)}}" 
        data-alt="{{$item->alt}}" 
        data-name="{{$item->filename}}" 
        data-createdat="{{date('Y-m-d H:i:s',strtotime($item->created_at))}}" 
        data-updatedat="{{date('Y-m-d H:i:s',strtotime($item->updated_at))}}">
        <div class="media-item">
            <span class="media-item-selected">
                <input type="checkbox" class="form-check-input checkbox" value="{{$item->id}}">
            </span>
            <div class="media-thumbnail d-flex align-items-center justify-content-center">
                @if(strpos($item->type, 'image/') !== false)
                <img src="{{asset('storage/media/'.$item->filename)}}" alt="1">
                @elseif(strpos($item->type, 'video/') !== false)
                    <i class="bx bx-film fs-2"></i>
                @elseif(strpos($item->type, 'audio/') !== false)
                    <i class="bx bx-volume-full fs-2"></i>
                @else
                    <i class="bx bx-file fs-2"></i>
                @endif
            </div>
            <div class="media-description">
                <p>{{\Str::limit($item->filename,15)}}</p>
            </div>
        </div>
    </div>
</li>
@endforeach

@if($total > $take + $skip)
<div class="col-12 my-2 text-center loadmore-wrapper">
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