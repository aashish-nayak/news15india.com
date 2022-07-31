<div class="col-12 px-1 mb-1" style="color: var(--text-color-light-hover);">
    <div class="d-flex align-items-center justify-content-between nav-height">
        <i class="fa fa-sort-up mr-1" style="color:var(--primary);font-size: 30px;transform: rotate(45deg);padding-right: 3px;"></i>
        <h4 style="color: var(--primary); font-weight: bold;">{{$section->cat_name}}</h4>
        @php
            if(!isset($width)){
                $width = 'w-100';
            }
        @endphp
        <div class="{{$width}} mx-3" style=" margin-top:-5px;font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:' ';">
            <span>\ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \
                \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ </span>
        </div>
        @if (!isset($sidebar))
        @php
            $htmlSubcat = '';
        @endphp
        @foreach ($section->children as $key => $subCat)
            @if ($key <= 3)
                <li class="d-none d-md-block"><a class="section-link" href="{{ route('category-news',$subCat->slug) }}">{{ $subCat->cat_name }}</a></li>
            @endif
            @if ($key >= 4)
                @php
                    $htmlSubcat .= '<option value="">' . $subCat->cat_name . '</option>';
                @endphp
            @endif
        @endforeach
        @if ($htmlSubcat != '')
            <select name="" class="mx-1 block-drop" id="">
                <option value="">All</option>
                {!! $htmlSubcat !!}
            </select>
        @endif
        @endif
        <a href="{{ route('category-news',$section->slug) }}" class="nav-link text-dark" style="font-size: 16px;font-weight:600;">औरभी</a>
    </div>
</div>
