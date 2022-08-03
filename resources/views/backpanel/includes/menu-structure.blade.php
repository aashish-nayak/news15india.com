<ol class="dd-list">
    @foreach ($menu as $value)
    <li class="dd-item dd3-item  @if ($value->reference_id > 0) post-item @endif" data-reference-type="{{ $value->reference_type }}"
        data-reference-id="{{ $value->reference_id }}" data-title="{{ $value->title }}"
        data-class="{{ $value->css }}" data-id="{{ $value->id }}" data-custom-url="{{ ($value->reference_type == '') ? $value->url : ''}}"
        data-icon-font="{{ $value->icon }}" data-target="{{ $value->target }}"">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">
            <span class="text float-start menu-name" data-update="title">{{$value->title}}</span>
            <span class="float-end modal-name me-4">{{ $value->reference_type ? : 'Custom Link'}}</span>
            <a class="show-item-details" type="button"><i class="bx bx-chevron-down"></i></a>
        </div>
        <div class="item-details">
            <div class="form-body">
                <div class="row mb-3">
                    <label class="text col-sm-3 col-form-label" data-update="title">Title</label>
                    <div class="col-sm-9">
                        <input class="text form-control" type="text" name="title" value="{{$value->title}}" data-old="{{ $value->title }}" placeholder="Title">
                    </div>
                </div>
                @if (!$value->reference_id)
                    <div class="row mb-3">
                        <label class="text col-sm-3 col-form-label" data-update="custom-url">Url</label>
                        <div class="col-sm-9">
                            <input class="text form-control" type="text" name="custom-url" value="{{ $value->url }}" data-old="{{ $value->url }}">
                        </div>
                    </div>
                @endif
                <div class="row mb-3">
                    <label class="text col-sm-3 col-form-label" data-update="icon-font">Icon</label>
                    <div class="col-sm-9">
                        <input class="text form-control" type="text" name="icon-font" value="{{$value->icon}}" data-old="{{ $value->icon }}" placeholder="Icon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="text col-sm-3 col-form-label">css</label>
                    <div class="col-sm-9">
                        <input class="text form-control" type="text" name="class" value="{{$value->css}}" data-old="{{ $value->css }}" placeholder="CSS Class">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Target</label>
                    <div class="col-sm-9">
                        <select name="target" class="ui-select form-control form-control-sm" id="target" data-old="{{ $value->target }}">
                            <option {{($value->target == '_self') ? 'selected': ''}} value="_self">Open Link Directly</option>
                            <option {{($value->target == '_blank') ? 'selected': ''}} value="_blank">Open Link in New Tab</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger me-1 btn-remove" data-id="{{$value->id}}">Remove</button>
                        <button type="button" class="btn btn-sm btn-primary btn-cancel" for="">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        @if ($value->has_child == 1)
            @includeIf('backpanel.includes.menu-structure', ['menu' => $value->child()->orderBy('position')->get()])
        @endif
    </li>
    @endforeach
</ol>
