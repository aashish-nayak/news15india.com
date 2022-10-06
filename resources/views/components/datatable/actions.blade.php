<div class="row row-cols-2 order-actions justify-content-center gap-1">
    @foreach ($buttons as $key => $item)
        @php
            if(!isset($item['permission'])){
                $item['permission'] = '';
            }
        @endphp
        @permission($item['permission'])
        <a href="{{$item['url']}}"
            class="col @isset($item['classes']){{$item['classes']}}@endisset border border-dark"
            @isset($item['target'])
            target="_blank"
            @endisset
            title="{{ucwords($key)}}">
            <i class="{{$item['icon']}}"></i>
        </a>
        @endpermission
    @endforeach
    
</div>