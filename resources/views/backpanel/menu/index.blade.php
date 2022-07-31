@extends('layouts.backpanel.master')
@section('title', 'Menus')
@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/nested/menu.css')}}">
@endpush
@section('sections')
    <div class="row">
        @role('super-admin')
            <div class="col-12 mb-2 text-end">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#AddMenu" class="btn btn-primary mr-3 btn-sm">Add Menu</a>
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#AddLocation" class="btn btn-primary mr-3 btn-sm">Add Location</a>
            </div>
        @endrole
        <div class="col-12 mb-2">
            <div class="card">
                <div class="card-body py-4">
                    <form class="row align-items-center" action="{{ Route('admin.menu.select') }}" method="post" role="form">
                        @csrf
                        <div class="col-12 col-md-1">
                            <label class="form-label fs-5">Menu</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <select class="form-select" name="menu_select" aria-label="Default select example">
                                    @foreach ($menus as $menu)
                                        <option value="{{$menu->id}}" @if ($menu->id == $menu_id) selected @endif>{{ucwords(str_replace('-',' ',$menu->name))}}</option>
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
        <textarea name="menu_nodes" id="nestable-output" class="form-control d-none"></textarea>
        <div class="col-md-3">
            <div class="card accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesSidebar" aria-expanded="false">
                            Categories
                        </button>
                    </h2>
                    <div id="categoriesSidebar" class="accordion-collapse collapse">
                        <div class="card-body">
                            <div class="border p-2 category-input">
                                <ul class="m-0">
                                    @foreach ($categories as $cat)
                                    <li class="mb-2">
                                        <div class="form-check m-0">
                                            <input type="checkbox" value="{{$cat->id}}" class="form-check-input parent-cat" id="category{{$cat->id}}">
                                            <label class="form-check-label" data-title="{{$cat->cat_name}}" data-reference-id="{{$cat->id}}" data-reference-type="App\Models\Category" data-menu-id="{{$menu_id}}" for="category{{$cat->id}}">{{$cat->cat_name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
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
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tagsSidebar" aria-expanded="false">
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
                                            <input type="checkbox" value="{{$tag->id}}" class="form-check-input parent-cat" id="tag{{$tag->id}}">
                                            <label class="form-check-label" data-title="{{$tag->name}}" data-reference-id="{{$tag->id}}" data-reference-type="App\Models\Tag" data-menu-id="{{$menu_id}}" for="tag{{$tag->id}}">{{$tag->name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn-add-to-menu btn btn-primary btn-sm"><span class="mt-1 bx bx-plus"></span> Add to Menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form action="" method="post">
                <div class="card widget meta-boxes">
                    <div class="card-header">
                        <h6>Menu Structure</h6>
                    </div>
                    <div class="dd nestable-menu card-body" id="nestable" data-depth="0">
                        {{-- <ol class="dd-list">
                            <li class="dd-item">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">
                                    <span class="float-start menu-name">Category</span>
                                    <span class="float-end modal-name me-4">Category</span>
                                    <a class="show-item-details" type="button"><i class="bx bx-chevron-down"></i></a>
                                </div>
                                <div class="item-details">
                                    <div class="form-body">
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Title</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName" placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Icon</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName" placeholder="Icon">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>css</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName" placeholder="CSS Class">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Target</b></label>
                                            <div class="col-sm-9">
                                                <select name="" id="" class="form-control form-control-sm">
                                                    <option value="_self">Open Link Directly</option>
                                                    <option value="_self">Open Link in New Tab</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 text-end">
                                                <button type="button" class="btn btn-sm btn-danger me-1">Remove</button>
                                                <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol> --}}
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="{{route('admin.menu.location-store')}}" method="POST">
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
                                <input type="text" name="location" placeholder="Location Name" required class="form-control" value="{{old('location')}}">
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
    <form action="{{route('admin.menu.store')}}" method="POST">
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
                                <input type="text" name="name" placeholder="Name" required class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label"><b>Locations</b><span class="text-danger">*</span></label>
                                <select name="menu_location_id" class="form-control">
                                    @foreach ($MenuLocations as $loc)
                                        <option value="{{$loc->id}}">{{ucwords(str_replace('-',' ',$loc->location))}}</option>
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
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                Swal.fire(
                    'Successful!',
                    "{{ Session::get('success') }}",
                    'success'
                )
            });
        </script>
    @endisset
    <script src="{{ asset('assets/plugins/nested/nested.js') }}"></script>
    <script src="{{ asset('assets/plugins/nested/menu.js') }}"></script>
    <script>
        function loadStructure() {
            var url = "{{ route('admin.menu.structure-fetch',$menu_id) }}";
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    // console.log(data);
                    $("#nestable").html(data);
                }
            });
        }
        $(document).ready(function() {
            loadStructure();
            $(document).on('click','.btn-add-to-menu',function(){
                let checked = $(this).parent().parent().find('input[type=checkbox]:checked');
                let labelData = $(checked).next();
                var url = "{{ route('admin.menu.add-to-menu') }}";
                var data = [];
                $.each(labelData, function (key, val) {
                    data.push({
                        title : $(val).data('title'),
                        reference_id : $(val).data('reference-id'),
                        reference_type : $(val).data('reference-type'),
                        menu_id : $(val).data('menu-id')
                    });
                });
                let obj = {
                    _token : "{{csrf_token()}}",
                    menus : data,
                }
                $.ajax({
                    url: url,
                    type: "POST",
                    data : obj,
                    success: function(data) {
                        loadStructure();
                        $(checked).prop('checked',false);
                    }
                });
            });
            $(document).on('click', '.remove-menu', function() {
            var row = $(this);
            var id = $(this).data('id');
            var url = "{{ route('admin.menu.delete',':id') }}";
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
                            loadStructure();
                        }
                    });
                }
            });
        });
        });
    </script>
@endpush
