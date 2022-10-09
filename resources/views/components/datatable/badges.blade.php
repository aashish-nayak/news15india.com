@php
    if(!isset($param)){
        $param = 'cat_name';
    }
    if(!isset($bgcolor)){
        $bgcolor = 'bg-secondary';
    }
@endphp
@foreach ($data as $item)
<span class="badge {{$bgcolor}} me-1">{{$item[$param]}}</span>
@endforeach