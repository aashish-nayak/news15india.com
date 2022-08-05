@if(!empty($media) && $media->count())
@foreach ($media as $item)
<li class="col">
    <div class="file media-file" data-id="{{$item->id}}" data-dimen="{{$item->dimension}}" data-type="{{$item->type}}" data-size="{{formatBytes($item->size,1)}}" data-path="{{asset('storage/media/'.$item->filename)}}" data-alt="{{$item->alt}}" data-name="{{$item->filename}}" data-createdat="{{date('Y-m-d H:i:s',strtotime($item->created_at))}}" data-updatedat="{{date('Y-m-d H:i:s',strtotime($item->updated_at))}}">
        <input type="checkbox" class="checkbox d-none" value="{{$item->id}}">
        <div class="media-item">
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
<li class="col">
    <div class="d-flex justify-content-center align-items-center">
        <p>No Images</p>
    </div>
</li>
@endif