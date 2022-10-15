<div class="w-100 text-center">
    <a href="{{ $url }}"
        target="@if (isset($target)) {{ $target }}@else{{ '_self' }}@endif">
        <img src="{{ $img }}" alt="@isset($alt){{ $alt }}@endisset" 
        @isset($width) width="{{$width}}" @endisset
        @isset($height) height="{{$height}}" @endisset
        style="max-width: 100%">
    </a>
</div>
