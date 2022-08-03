<ul class="m-0">
    @foreach ($categories as $cat)
    <li>
        <div class="form-check m-0">
            <input type="checkbox" 
                name="categories[]"
                @if(isset($page) && in_array($cat->id, $page->categories->pluck('id')->toArray())) checked @endif 
                data-search="{{$cat->slug}}"
                value="{{ $cat->id }}"
                class="form-check-input" id="category{{ $cat->id }}">
            <label class="form-check-label" data-title="{{ $cat->cat_name }}"
                data-reference-id="{{ $cat->id }}"
                data-reference-type="App\Models\Category"
                @isset($menu_id)
                data-menu-id="{{ $menu_id }}"
                @endisset
                for="category{{ $cat->id }}">{{ $cat->cat_name }}</label>
        </div>
        @php
            $query = $cat->children()->where('status',1);
        @endphp
        @if ($query->count() > 0)
            @includeIf('backpanel.includes.nested-categories', ['categories' => $query->get()])
        @endif
    </li>
    @endforeach
</ul>