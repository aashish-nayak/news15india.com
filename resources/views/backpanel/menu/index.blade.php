@extends('layouts.backpanel.master')
@section('title', 'Menus')
@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/nested/menu.css')}}">
@endpush
@section('sections')
    <div class="row">
        @role('super-admin')
            <div class="col-12 mb-2 text-end">
                <a href="{{ route('admin.news.view-all-news') }}" class="btn btn-primary mr-3 btn-sm">Add Menu</a>
            </div>
        @endrole
        <div class="col-12 mb-2">
            <div class="card">
                <div class="card-body py-4">
                    <form class="row align-items-center" action="{{ Route('admin.menu.index') }}" method="post"
                        role="form">
                        @csrf
                        <div class="col-12 col-md-1">
                            <label class="form-label fs-5">Menu</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pagesSidebar" aria-expanded="false">
                            Pages
                        </button>
                    </h2>
                    <div id="pagesSidebar" class="accordion-collapse collapse">
                        <div class="card-body">
                            <div class="border p-2 category-input">
                                <ul class="m-0">
                                    <li class="mb-2">
                                        <div class="form-check m-0">
                                            <input type="checkbox" name="test" value="21"
                                                class="form-check-input parent-cat" id="page1">
                                            <label class="form-check-label" for="page1">Page 1</label>
                                        </div>
                                    </li>
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
                                            <input type="checkbox" name="category" value="{{$cat->id}}"
                                                class="form-check-input parent-cat" id="category{{$cat->id}}">
                                            <label class="form-check-label" for="category{{$cat->id}}">{{$cat->cat_name}}</label>
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
                                            <input type="checkbox" name="tag" value="{{$tag->id}}"
                                                class="form-check-input parent-cat" id="tag{{$tag->id}}">
                                            <label class="form-check-label" for="tag{{$tag->id}}">{{$tag->name}}</label>
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
            <div class="card widget meta-boxes">
                <div class="card-header">
                    <h6>Menu Structure</h6>
                </div>
                <div class="dd nestable-menu card-body" id="nestable" data-depth="0">
                    <ol class="dd-list">
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
                    </ol>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {

        });
    </script>
@endpush
