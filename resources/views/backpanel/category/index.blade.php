@extends('layouts.backpanel.master')
@section('title', 'Category')
@push('plugin-css')
    <link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@push('css')
    <style>
        .bootstrap-tagsinput .badge {
            margin: 2px 4px;
            padding: 5px 8px;
            font-size: 75%;
            font-weight: 700;
        }

        .bootstrap-tagsinput .badge [data-role="remove"] {
            margin-left: 5px;
            cursor: pointer;
        }

        .img-box {
            background: #fff;
            border: 3px dashed #e8e8e8;
            color: #aaa;
            cursor: pointer;
            display: block;
            font-size: 22px;
            padding: 40px 0 26px;
            position: relative;
            text-align: center;
        }

        .img-box button {
            font-size: 14px;
            color: #555555;
            background: #cccccc;
        }

        .img-box span {
            font-size: 10px;
        }

    </style>
@endpush
@section('sections')
    <div class="row">
        <div class="col-12" id="message">
            @if (Session::has('success'))
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show" role="alert">
                    <div>
                        {{ Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endisset
    </div>
    <div class="col-md-4">
        <h6 class="mb-0 text-uppercase">Add Category</h6>
        <hr>
        <div class="card radius-10">
            <div class="card-body">
                <ul class="nav nav-tabs nav-danger" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#dangerhome" role="tab"
                            aria-selected="true">
                            <div class="tab-title">Basic</div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dangerprofile" role="tab"
                            aria-selected="false">
                            <div class="tab-title">Image</div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dangercontact" role="tab"
                            aria-selected="false">
                            <div class="tab-title">SEO</div>
                        </a>
                    </li>
                </ul>
                <form action="{{ Route('admin.category.store') }}" method="post" role="form">
                    @csrf
                    <div class="tab-content py-3">
                        <div class="tab-pane fade active show" id="dangerhome" role="tabpanel">
                            <div id="idarea">

                            </div>
                            <div class="form-group">
                                <label for="example-text-input2" class="col-form-label"><b>Parent Category</b></label>
                                <select class="form-select form-select-sm mb-3" required id="parent" name="parent_id" aria-label=".form-select-sm example">
                                    <option selected disabled>Select Parent Category</option>
                                    <option value="null">Parent</option>
                                    @forelse ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->bread }}</option>
                                    @empty                                   
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catname" class="col-form-label"><b>Category Name</b></label>
                                <input class="form-control form-control-sm" required name="cat_name" type="text" value=""
                                    id="catname">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-form-label"><b>Slug</b></label>
                                <input class="form-control form-control-sm" required name="slug" type="text" value=""
                                    id="slug">
                            </div>
                            <div class="row">
                                <div class="col-md-8 status">
                                    <label for="" class="col-form-label d-block"><b>Status</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status-input" checked type="radio" name="status"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status-input" type="radio" name="status" id="inlineRadio2"
                                            value="0">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="catorder" class="col-form-label"><b>Order</b></label>
                                    <input class="form-control form-control-sm" required type="number" value="" name="cat_order"
                                        id="catorder">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="loc" name="location[]" value="navbar" id="checkbox1">
                                    <label for="checkbox1">Navbar</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="loc" name="location[]" value="sidebar" id="checkbox2">
                                    <label for="checkbox2">Sidebar</label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dangerprofile" role="tabpanel">
                            <input type="file" class="" hidden="" name="cat_img" id="cat-img">
                            <label for="cat-img" class="img-box">
                                <div class="col-12">Pick a Image</div>
                                <div class="col-12"><span>OR</span></div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary px-5"><i class="bx bx-link mr-1"></i>Get from URL</button>
                                </div>
                            </label>
                        </div>
                        <div class="tab-pane fade" id="dangercontact" role="tabpanel">
                            <div class="form-group">
                                <label for="metatitle" class="col-form-label"><b>SEO Title</b></label>
                                <textarea class="form-control form-control-sm" name="meta_title" id="metatitle" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><b>Meta Keywords</b></label>
                                <textarea class="form-control form-control-sm" placeholder="comma separated (,)" data-role="tagsinput" name="meta_keywords" id="metakey" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="metadesc" class="col-form-label"><b>Meta Description</b></label>
                                <textarea class="form-control form-control-sm" name="meta_desc" id="metadesc" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary px-3">Submit</button>
                    <span id="cancel-btn">

                    </span>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h6 class="mb-0 text-uppercase">All Categories</h6>
        <hr>
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="categories" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).ready(function () {
            $('#submit').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if(!checked) {
                    alert("You must check at least one checkbox.");
                    return false;
                }

            });
        });
        $('#categories').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.getCategories') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'cat_name'
                },
                {
                    data: 'slug'
                },
                {
                    data: 'cat_order'
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<span class="badge text-success">Active</span>';
                        } else {
                            return '<span class="badge text-danger">Inactive</span>';
                        }
                    }
                },
                {
                    data: 'created'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return ' <div class="d-flex order-actions">' +
                            '<a href="javascript:void(0);" class="edit-category" data-id="' +
                            data.id + '"><i class="bx bxs-edit"></i></a>' +
                            '<a href="javascript:void(0);" class="text-danger delete-category ms-3" data-id="' +
                            data.id + '"><i class="bx bxs-trash"></i></a>' +
                            '</div>';
                    }
                },
            ]
        });
        $(document).on('click', '.delete-category', function() {
            var row = $(this);
            var id = $(this).data('id');
            var url = "{{ route('admin.category.delete',':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "Once deleted, you will not be able to recover this category!",
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
                            var message = $("#message").html('<div class="alert border-0 border-start border-5 border-success alert-dismissible fade show" role="alert">'+
                            '<div> Category Delete Successfully !'+
                            '</div>'+
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
                            '</div>');
                            setTimeout(() => {
                                $(message).html('');
                            }, 2000);
                            row.closest('tr').hide(1000);
                        }
                    });
                }
            });
        });

        $(document).on('click', '.edit-category', function() {
            var id = $(this).data('id');
            var url = "{{ route('admin.category.edit',':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $("#idarea").html("<input type='hidden' name='id' value='" + data.id + "'>");
                    $("#parent").children().attr('selected', false);
                    $("#parent").children('option[value="' + data.parent_id + '"]').attr('selected', 'selected');       
                    $("#catname").val(data.cat_name);
                    $("#slug").val(data.slug);
                    $("#catorder").val(data.cat_order);
                    $(".status-input").attr('checked', false);
                    $(".status-input[value='" + data.status + "']").attr('checked', true);
                    let locarr = data.location.split(',');
                    $(".loc").attr('checked', false);
                    $(".loc[value='" + locarr[0] + "']").attr('checked', true);
                    $(".loc[value='" + locarr[1] + "']").attr('checked', true);
                    $("#metatitle").html(data.meta_title);
                    $("#metakey").html(data.meta_keywords);
                    $("#metadesc").html(data.meta_desc);
                    $("#submit").html('Update');
                    $("#cancel-btn").html('<a href="" class="btn btn-sm btn-secondary px-3" id="cancel">Cancel</a>');
                }
            });
        });
    });
</script>
@endpush
