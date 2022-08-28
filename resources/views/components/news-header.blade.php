<div class="position-relative col-12 px-1 mt-3 mb-2" style="color: var(--text-color-light-hover);background-color:#fff">
    <div style="font-size:1.8rem; word-spacing:-5px;overflow: hidden; white-space: nowrap;text-overflow:'';">
        @foreach (range(1,500) as $item)
            \
        @endforeach
    </div>
    <div class="section-heading px-3 py-1" style="background-color:#fff;position: absolute;left:0;top:-5px;">
        <h2 class="m-0"><i class="fas fa-caret-right" style="color:var(--primary);font-size: 30px;transform: rotate(315deg);margin:-10px 0px 0px 5px;"></i> {{$section->cat_name}}</h2>
    </div>
    <div class="subcats px-1 py-1" style="background-color:#fff;position: absolute;right:0;top:-5px;">
        <div class="col text-right px-1">
            <div class="row align-items-center justify-content-end mx-0">
                @if (!isset($sidebar))
                <div class="lists d-none d-md-block">
                    <ul class="d-flex align-items-center m-0 p-0" style="list-style: none">
                        @php
                            $optionhtml = '';
                        @endphp
                        @foreach ($section->children as $key => $subCat)
                            @if ($key <= 3)
                            <li><a class="section-link" href="{{ route('category-news',$subCat->slug) }}">{{ $subCat->cat_name }}</a></li>
                            @endif
                            @if ($key >= 4)
                                @php
                                    $optionhtml .= '<option value="'.$subCat->slug.'">'.$subCat->cat_name.'</option>';
                                @endphp
                            @endif
                        @endforeach
                    </ul>
                </div>
                @if ($optionhtml != '')
                <div class="other-lists mr-2 d-none d-md-block">
                    <select name="" class="block-drop" id="">
                        <option value="">All</option>
                        {!!$optionhtml!!}
                    </select>
                </div>
                @endif
                @endif
                <a href="{{ route('category-news',$section->slug) }}" class="nav-link text-dark d-inline" style="font-size: 16px;font-weight:700;word-spacing:-2px">और भी</a>
            </div>
        </div>
    </div>
</div>
