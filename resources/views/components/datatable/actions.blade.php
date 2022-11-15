<div class="row order-actions justify-content-center gap-1">
    @foreach ($buttons as $key => $item)
        @php
            if(!isset($item['permission'])){
                $item['permission'] = '';
            }
            if(!isset($item['target'])){
                $item['target'] = '_self';
            }
        @endphp
        @permission($item['permission'])
        <a href="{{$item['url']}}"
            class="col-6 @isset($item['classes']){{$item['classes']}}@endisset border border-dark"
            target="{{$item['target']}}"
            title="{{ucwords($key)}}">
            <i class="{{$item['icon']}}"></i>
        </a>
        @endpermission
    @endforeach
</div>