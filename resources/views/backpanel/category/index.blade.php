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
        .bootstrap-tagsinput{
            max-height: 150px;
            overflow-y: scroll;
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
        .controls {
        background: #fff;
        padding: 6px 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .controls button {
            border: 0px;
            color: #5a5cbb;
            margin: 4px;
            padding: 4px 12px;
            cursor: pointer;
            background: transparent;
        }

        .controls button.active,
        .controls button.active:hover {
            background: #5a5cbb;
            color: #fff;
        }

        .controls button:hover {
            background: #efefef;
        }

        input[type=checkbox] {
            vertical-align: middle !important;
        }

        .tree {
            margin: 2% auto;
            width: 80%;
        }

        .tree ul {
            display: none;
            margin: 4px auto;
            margin-left: 6px;
            border-left: 1px dashed #dfdfdf;
        }


        .tree li {
            padding: 12px 18px;
            cursor: pointer;
            vertical-align: middle;
            background: #fff;
        }

        .tree li:first-child {
            border-radius: 3px 3px 0 0;
        }

        .tree li:last-child {
            border-radius: 0 0 3px 3px;
        }

        .tree .active,
        .active li {
            background: #efefef;
        }

        .tree label {
            cursor: pointer;
        }

        .tree input[type=checkbox] {
            margin: -2px 6px 0 0px;
        }

        .has>label {
            color: #000;
        }

        .tree .total {
            color: #5a5cbb;
        }
    </style>
@endpush
@section('sections')
<div class="row">
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
                                <select class="form-select form-select-sm mb-3 single-select" required id="parent" name="parent_id" aria-label=".form-select-sm example">
                                    <option selected disabled>Select Parent Category</option>
                                    <option value="0">Parent</option>
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
                            <div class="preview-image-wrapper " style="width:100%;max-width:none;max-height:none;height:auto">
                                <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" alt="Preview image" id="banner-preview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
                                <a href="javascript:void(0)" class="btn_remove_image" id="banner-img-id" title="Remove image">X
                                </a>
                            </div><br>
                            <input type="hidden" required name="cat_img" id="banner_data" value="">
                            <a href="javascript:void(0)" id="banner-img">Choose Image</a>
                        </div>
                        <div class="tab-pane fade" id="dangercontact" role="tabpanel">
                            <div class="form-group">
                                <label for="metatitle" class="col-form-label"><b>SEO Title</b></label>
                                <textarea class="form-control form-control-sm" name="meta_title" id="metatitle" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><b>Meta Keywords</b></label>
                                <input class="form-control form-control-sm" placeholder="comma separated (,)" data-role="tagsinput" name="meta_keywords" id="metakey">
                            </div>
                            <div class="form-group">
                                <label for="metadesc" class="col-form-label"><b>Meta Description</b></label>
                                <textarea class="form-control form-control-sm" name="meta_desc" id="metadesc" rows="5"></textarea>
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
                <div class="">
                    <table id="categories" class="table table-striped table-bordered align-middle border table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th data-orderable="false">Created</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Categories Tree View
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <div class="controls">
                                            <button>Collepsed</button>
                                            <button>Expanded</button>
                                            {{-- <button>Checked All</button>
                                            <button>Unchek All</button> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card ">
                                            <div class="card-body">
                                                {!!$tree!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backpanel.includes.media-model')
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
@if (Session::has('success'))
<script>
    $(document).ready(function () {
        Swal.fire(
            'Successful!',
            "{{ Session::get('success') }}",
            'success'
        )
    });
</script>
@endisset
@include('backpanel.includes.media-model-script')
<script>
    function loadselect() {  
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    }
    function loadtag(){
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    }
    $(document).ready(function() {
        loadselect();
        loadtag();
        $('#submit').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
        $('#categories').DataTable({
            processing: true,
            serverSide: true,
            scrollX:true,
            ajax: "{{ route('admin.category.getCategories') }}",
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
                            Swal.fire(
                                'Successful!',
                                'Category deleted Successfully!',
                                'success'
                            )
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
                    $('.single-select').select2('destroy');
                    $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput('destroy');
                    $("#idarea").html("<input type='hidden' name='id' value='" + data.id + "'>");
                    $("#parent").children().prop('selected', false);
                    $("#parent").children().prop('disabled', false);
                    $("#parent").children('option[value="' + data.id + '"]').prop('disabled', true);
                    let parent = (data.parent_id == null) ? '0' : data.parent_id;
                    $("#parent").children('option[value="' + parent + '"]').prop('selected', true);     
                    $("#catname").val(data.cat_name);
                    $("#slug").val(data.slug);
                    $("#catorder").val(data.cat_order);
                    $(".status-input").prop('checked', false);
                    $(".status-input[value='" + data.status + "']").prop('checked', true);
                    let locarr = data.location.split(',');
                    $(".loc").prop('checked', false);
                    $(".loc[value='" + locarr[0] + "']").prop('checked', true);
                    $(".loc[value='" + locarr[1] + "']").prop('checked', true);
                    let preview = '';
                    if(data.editImg != null){
                        preview = '{{asset("storage/media/")}}'+'/'+data.editImg.img;
                    }else{
                        preview = 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png';
                    }
                    $("#banner-preview").attr('src',preview);
                    $("#banner_data").val(data.cat_img);
                    $("#metatitle").html(data.meta_title);
                    $("#metakey").val(data.meta_keywords);
                    $("#metadesc").html(data.meta_desc);
                    $("#submit").html('Update');
                    $("#cancel-btn").html('<a href="" class="btn btn-sm btn-secondary px-3" id="cancel">Cancel</a>');
                    loadselect();
                    loadtag();
                }
            });
        });

        $(document).on("click", ".tree label", function(e) {
            $(this).next("ul").fadeToggle();
            e.stopPropagation();
        });

        $(document).on("change", ".tree input[type=checkbox]", function(e) {
            $(this)
                .siblings("ul")
                .find("input[type='checkbox']")
                .prop("checked", this.checked);
            $(this)
                .parentsUntil(".tree")
                .children("input[type='checkbox']")
                .prop("checked", this.checked);
            e.stopPropagation();
        });

        $(document).on("click", "button", function(e) {
            switch ($(this).text()) {
                case "Collepsed":
                    $(".tree ul").fadeOut();
                    break;
                case "Expanded":
                    $(".tree ul").fadeIn();
                    break;
                case "Checked All":
                    $(".tree input[type='checkbox']").prop("checked", true);
                    break;
                case "Unchek All":
                    $(".tree input[type='checkbox']").prop("checked", false);
                    break;
                default:
            }
        });
        
    });
</script>
@endpush
