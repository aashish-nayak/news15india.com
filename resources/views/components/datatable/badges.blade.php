@php
    if(!isset($param)){
        $param = 'cat_name';
    }
@endphp
@foreach ($data as $item)
<span class="badge bg-secondary me-1">{{$item[$param]}}</span>
@endforeach