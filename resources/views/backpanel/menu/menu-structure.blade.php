<ol class="dd-list">
    @foreach ($menu as $value)
    <li class="dd-item dd3-item  @if ($value->reference_id > 0) post-item @endif" data-reference-type="{{ $value->reference_type }}"
        data-reference-id="{{ $value->reference_id }}" data-title="{{ $value->title }}"
        data-class="{{ $value->css }}" data-id="{{ $value->id }}" data-custom-url="{{ $value->url }}"
        data-icon-font="{{ $value->icon }}" data-target="{{ $value->target }}"">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">
            <span class="float-start menu-name">{{$value->title}}</span>
            <span class="float-end modal-name me-4">{{ $value->reference_type ? : 'Custom Link'}}</span>
            <a class="show-item-details" type="button"><i class="bx bx-chevron-down"></i></a>
        </div>
        <div class="item-details">
            <div class="form-body">
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Title</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$value->title}}" placeholder="Title">
                    </div>
                </div>
                @if (!$value->reference_id)
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Url</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="custom-url" value="{{ $value->url }}" data-old="{{ $value->url }}">
                        </div>
                    </div>
                @endif
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Icon</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$value->icon}}" placeholder="Icon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>css</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$value->css}}" placeholder="CSS Class">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Target</b></label>
                    <div class="col-sm-9">
                        <select name="" id="" class="form-control form-control-sm">
                            <option {{($value->target == '_self') ? 'selected': ''}} value="_self">Open Link Directly</option>
                            <option {{($value->target == '_blank') ? 'selected': ''}} value="_blank">Open Link in New Tab</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger me-1 remove-menu" data-id="{{$value->id}}">Remove</button>
                        <button type="button" class="btn btn-sm btn-primary" for="">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        @if ($value->has_child == 1)
            @includeIf('backpanel.menu.menu-structure', ['menu' => $value->child()->orderBy('position')->get()])
        @endif
    </li>
    @endforeach
</ol>
