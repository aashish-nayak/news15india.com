@extends('layouts.backpanel.master')
@section('title', 'Menus')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/nested/menu.css') }}">
@endpush
@section('sections')
    <div class="row">
        @role('super-admin')
            <div class="col-12 mb-2 text-end">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#AddMenu"
                    class="btn btn-primary mr-3 btn-sm">Add Menu</a>
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#AddLocation"
                    class="btn btn-primary mr-3 btn-sm">Add Location</a>
            </div>
        @endrole
        <div class="col-12 mb-2">
            <div class="card">
                <div class="card-body py-4">
                    <form class="row align-items-center" action="{{ Route('admin.menu.select') }}" method="post"
                        role="form">
                        @csrf
                        <div class="col-12 col-md-1">
                            <label class="form-label fs-5">Menu</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <select class="form-select" name="menu_select" aria-label="Default select example">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}"
                                            @if ($menu->id == $menu_id) selected @endif>
                                            {{ ucwords(str_replace('-', ' ', $menu->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary">Select Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#categoriesSidebar" aria-expanded="false">
                            Categories
                        </button>
                    </h2>
                    <div id="categoriesSidebar" class="accordion-collapse collapse">
                        <div class="card-body">
                            <div class="border p-2 category-input">
                                @includeIf('backpanel.includes.nested-categories', ['categories' => $categories,'menu_id' => $menu_id])
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn-add-to-menu btn btn-primary btn-sm"><span class="mt-1 bx bx-plus"></span> Add to Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#tagsSidebar" aria-expanded="false">
                            Tags
                        </button>
                    </h2>
                    <div id="tagsSidebar" class="accordion-collapse collapse">
                        <div class="card-body">
                            <div class="border p-2 category-input">
                                <ul class="m-0">
                                    @foreach ($tags as $tag)
                                        <li class="mb-2">
                                            <div class="form-check m-0">
                                                <input type="checkbox" value="{{ $tag->id }}"
                                                    class="form-check-input parent-cat" id="tag{{ $tag->id }}">
                                                <label class="form-check-label" data-title="{{ $tag->name }}"
                                                    data-reference-id="{{ $tag->id }}"
                                                    data-reference-type="App\Models\Tag" data-menu-id="{{ $menu_id }}"
                                                    for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn-add-to-menu btn btn-primary btn-sm"><span class="mt-1 bx bx-plus"></span> Add
                                to Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#addLinkSidebar" aria-expanded="false">
                            Add Link
                        </button>
                    </h2>
                    <div id="addLinkSidebar" class="accordion-collapse collapse">
                        <form action="{{ route('admin.menu.add-to-menu-link') }}" method="post" id="addLinkSidebarForm">
                            <input type="hidden" name="menu_id" value="{{ $menu_id }}">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="form-group mb-1">
                                        <label for="inputEnterYourName" class="col-form-label"><b>Title</b></label>
                                        <input type="text" required class="form-control form-control-sm"
                                            name="title" value="" placeholder="Title">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="inputEnterYourName" class="col-form-label"><b>Url</b></label>
                                        <input type="text" required class="form-control form-control-sm"
                                            name="url" value="" placeholder="https://www.example.com">
                                        <div style="font-size:10px;line-height:1.0;margin-top:5px">
                                            <span class="text-muted">External Link : https://www.google.com</span>
                                            <span class="text-muted">Internal Link : /home</span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="inputEnterYourName" class="col-form-label"><b>Icon</b></label>
                                        <input type="text" class="form-control form-control-sm" name="icon"
                                            value="" placeholder="Icon">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="inputEnterYourName" class="col-form-label"><b>css</b></label>
                                        <input type="text" class="form-control form-control-sm" name="css"
                                            value="" placeholder="css">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="inputEnterYourName" class="col-form-label"><b>Target</b></label>
                                        <select name="target" required id=""
                                            class="form-control form-control-sm">
                                            <option selected value="_self">Open Link Directly</option>
                                            <option value="_blank">Open Link in New Tab</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary btn-sm"><span
                                        class="mt-1 bx bx-plus"></span> Add to Menu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form action="{{route('admin.menu.save-menu-structure')}}" method="post" id="structure-form">
                @csrf
                <textarea name="menu_nodes" id="nestable-output" class="form-control d-none"></textarea>
                <div class="card widget meta-boxes">
                    <div class="card-header">
                        <h6>Menu Structure</h6>
                    </div>
                    <div class="dd nestable-menu card-body" id="nestable" data-depth="0">
                        @includeIf('backpanel.includes.menu-structure', ['menu' => $nodes])
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-primary form-save-menu">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ route('admin.menu.location-store') }}" method="POST">
        <div class="modal fade" id="AddLocation" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Menu Location</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><b>Location Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="location" placeholder="Location Name" required
                                    class="form-control" value="{{ old('location') }}">
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('admin.menu.store') }}" method="POST">
        <div class="modal fade" id="AddMenu" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><b>Menu Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" required class="form-control"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label"><b>Locations</b><span class="text-danger">*</span></label>
                                <select name="menu_location_id" class="form-control">
                                    @foreach ($MenuLocations as $loc)
                                        <option value="{{ $loc->id }}">
                                            {{ ucwords(str_replace('-', ' ', $loc->location)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/nested/nested.js') }}"></script>
<script>
$(document).ready(function() {
    class MenuNestable {
        constructor() {
            this.$nestable = $(document).find('#nestable');
        }

        setDataItem(target) {
            target.each((index, el) => {
                let current = $(el);
                current.data('id', current.attr('data-id'));
                current.data('title', current.attr('data-title'));
                current.data('reference-id', current.attr('data-reference-id'));
                current.data('reference-type', current.attr('data-reference-type'));
                current.data('custom-url', current.attr('data-custom-url'));
                current.data('class', current.attr('data-class'));
                current.data('target', current.attr('data-target'));
            });
        }

        updatePositionForSerializedObj(arrayObject) {
            let result = arrayObject;
            let that = this;

            $.each(result, (index, val) => {
                val.position = index;
                if (typeof val.children == 'undefined') {
                    val.children = [];
                }
                that.updatePositionForSerializedObj(val.children);
            });

            return result;
        }

        // Main function to initiate the module
        init() {
            let depth = parseInt(this.$nestable.attr('data-depth'));
            if (depth < 1) {
                depth = 5;
            }
            $(document).find('.nestable-menu').nestable({
                group: 1,
                maxDepth: depth,
                expandBtnHTML: '',
                collapseBtnHTML: ''
            });
            this.handleNestableMenu();
        }

        handleNestableMenu() {
            let that = this;
            // Show node details
            $(document).on('click', '.dd-item .dd3-content a.show-item-details', function(event){
                event.preventDefault();
                let parent = $(event.currentTarget).parent().parent();
                $(event.currentTarget).toggleClass('active');
                parent.toggleClass('active');
            });

            // Edit attributes
            $(document).on('change blur keyup', '.nestable-menu .item-details input[type="text"], .nestable-menu .item-details select', function(event){
                    event.preventDefault();
                    let current = $(event.currentTarget);
                    let parent = current.closest('li.dd-item');
                    let value = current.val();
                    let name = current.attr('name');
                    let old = current.attr('data-old');
                    parent.attr('data-' + name, value);
                    parent.data(name, value);
                    parent.find('> .dd3-content .text[data-update="' + name + '"]').text(value);
                    if (value.trim() === '') {
                        parent.find('> .dd3-content .text[data-update="' + name + '"]').text(old);
                    }
                    that.setDataItem(that.$nestable.find('> ol.dd-list li.dd-item'));
            });
            // Cancel Edit attributes
            $(document).on('click', '.nestable-menu .item-details .btn-cancel', function(event) {
                event.preventDefault();
                let current_pa = $(event.currentTarget);
                let parent = current_pa.parents('.item-details').parent();
                parent.find('input[type="text"]').each((index, el) => {
                    $(el).val($(el).attr('data-old'));
                });

                parent.find('select').each((index, el) => {
                    $(el).val($(el).val());
                });
                parent.find('input[type="text"]').trigger('change');
                parent.find('select').trigger('change');
                parent.removeClass('active');
            });

            $(document).on('change', '.box-links-for-menu .list-item li input[type=checkbox]', function(event) {
                $(event.currentTarget).closest('li').toggleClass('active');
            });
            // Save Structure 
            $(document).on('click', '.form-save-menu', function(e){
                e.preventDefault();
                if (that.$nestable.length < 1) {
                    $('#nestable-output').val('[]');
                } else {
                    let nestable_obj_returned = that.$nestable.nestable('serialize');
                    let the_obj = that.updatePositionForSerializedObj(nestable_obj_returned);
                    $('#nestable-output').val(JSON.stringify(the_obj));
                }
                $("#structure-form").submit();
            });
            // Add Models data Menu in Structure 
            $(document).on('click', '.btn-add-to-menu', function() {
                let checked = $(this).parent().parent().find('input[type=checkbox]:checked');
                let labelData = $(checked).next();
                var url = "{{ route('admin.menu.add-to-menu') }}";
                var data = [];
                $.each(labelData, function(key, val) {
                    data.push({
                        title: $(val).data('title'),
                        reference_id: $(val).data('reference-id'),
                        reference_type: $(val).data('reference-type'),
                        menu_id: $(val).data('menu-id')
                    });
                });
                let obj = {
                    _token: "{{ csrf_token() }}",
                    menus: data,
                }
                $.ajax({
                    url: url,
                    type: "POST",
                    data: obj,
                    success: function(data) {
                        $(checked).prop('checked', false);
                        $("#nestable").append(data);
                    }
                });
            });
            // Add Custom Link in Menu Structure 
            $(document).on("submit","#addLinkSidebarForm",function(e) {
                e.preventDefault();
                var input_title = $(this).find("input[name='title']");
                var input_url = $(this).find("input[name='url']");
                var input_css = $(this).find("input[name='css']");
                var input_icon = $(this).find("input[name='icon']");
                var input_target = $(this).find("select[name='target']");
                var input_menu_id = $(this).find("input[name='menu_id']");
                var obj = {
                    _token: "{{ csrf_token() }}",
                    title: input_title.val(),
                    url: input_url.val(),
                    css: input_css.val(),
                    icon: input_icon.val(),
                    target: input_target.val(),
                    menu_id: input_menu_id.val(),
                }
                let url = "{{ route('admin.menu.add-to-menu-link') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: obj,
                    success: function(response) {
                        input_title.val('');
                        input_url.val('');
                        input_css.val('');
                        input_icon.val('');
                        input_target.children().prop('selected', false);
                        $("#nestable").append(response);
                    }
                });
            });
            // Remove Menu 
            $(document).on('click', '.btn-remove', function() {
                var row = $(this);
                var id = $(this).data('id');
                var url = "{{ route('admin.menu.delete', ':id') }}";
                url = url.replace(':id', id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Want to remove Menu!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(data) {
                                $(row).closest('li').remove();
                            }
                        });
                    }
                });
            });
        }
    }
    // Initialize Nested Menu 
    $(window).on('load', () => {
        new MenuNestable().init();
    });
});
</script>
@endpush
