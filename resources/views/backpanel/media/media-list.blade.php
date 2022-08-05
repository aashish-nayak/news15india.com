@if(!empty($media) && $media->count())
@foreach ($media as $item)
<li class="col-12 border-bottom">
    <div class="file media-file row py-1 align-items-center" data-id="{{$item->id}}" data-dimen="{{$item->dimension}}" data-type="{{$item->type}}" data-size="{{formatBytes($item->size,1)}}" data-path="{{asset('storage/media/'.$item->filename)}}" data-alt="{{$item->alt}}" data-name="{{$item->filename}}" data-createdat="{{date('Y-m-d H:i:s',strtotime($item->created_at))}}" data-updatedat="{{date('Y-m-d H:i:s',strtotime($item->updated_at))}}">
        <div class="col-1">
            <label class="">
                <input type="checkbox" class="form-check-input checkbox" value="{{$item->id}}">
            </label>
        </div>
        <div class="col-7" style="font-size: 14px">
            <i class="bx bx-file me-2"></i>
            <span>{{$item->filename}}</span>
        </div>
        <div class="col-2">{{formatBytes($item->size,1)}}</div>
        <div class="col-2">{{date('Y-m-d H:i:s',strtotime($item->created_at))}}</div>
    </div>
</li>
@endforeach
<div class="col-12 my-2 text-center">
    <button class="btn btn-primary btn-sm" 
        data-current="{{$media->currentPage()}}"
        data-to="{{$media->lastPage()}}"
        data-per_page="{{$media->perPage()}}"
        data-next_page_url="{{$media->nextPageUrl()}}">
        <i class="bx bx-down-arrow-alt"></i> Load More
    </button>
</div>
@else
<li class="col-12">
    <div class="d-flex justify-content-center align-items-center">
        <p>No Images</p>
    </div>
</li>
@endif