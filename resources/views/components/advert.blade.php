@if(isset($slider) && $slider == true)
    <div class="holder">
    @endif
    <div class="w-100 text-center">
        @if (isset($ad_text) && $ad_text == true)
            <p class="m-0 text-center bg-light text-dark" style="font-size:1.2rem">Advertisement</p>
        @endif
        @php
            if(!isset($target)){
                $target = '_self';
            }
        @endphp
        <a href="{{ $url }}" target="{{$target}}">
            <img src="{{ $img }}" alt="@isset($alt){{ $alt }}@endisset"
                width="@if(isset($width)){{ $width }}@else{{ '100%' }}@endif"
                height="@if(isset($height)){{ $height }}@else{{ 'auto' }}@endif"
                style="max-width: 100%;object-fit: contain"
            />
        </a>
    </div>
    @if(isset($slider) && $slider == true)
    </div>
@endif
