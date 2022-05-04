@extends('layouts.backpanel.master')
@section('title', 'Tags')
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
    <div class="col-md-4">
        <h6 class="mb-0 text-uppercase">Add Tag</h6>
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
                <form action="{{ Route('admin.tag.store') }}" method="post" role="form">
                    @csrf
                    <div class="tab-content py-3">
                        <div class="tab-pane fade active show" id="dangerhome" role="tabpanel">
                            <div id="idarea">

                            </div>
                            <div class="form-group">
                                <label for="catname" class="col-form-label"><b>Tag Name</b></label>
                                <input class="form-control form-control-sm" required name="name" type="text" value=""
                                    id="catname">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-form-label"><b>Slug</b></label>
                                <input class="form-control form-control-sm" required name="slug" type="text" value="" id="slug">
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dangerprofile" role="tabpanel">
                            <div class="preview-image-wrapper " style="width:100%;max-width:none;max-height:none;height:auto">
                                <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" alt="Preview image" id="banner-preview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
                                <a href="javascript:void(0)" class="btn_remove_image" id="banner-img-id" title="Remove image">X
                                </a>
                            </div><br>
                            <input type="hidden" required name="tag_img" id="banner_data" value="">
                            <a href="javascript:void(0)" id="banner-img">Choose Image</a>
                        </div>
                        <div class="tab-pane fade" id="dangercontact" role="tabpanel">
                            <div class="form-group">
                                <label for="metatitle" class="col-form-label"><b>SEO Title</b></label>
                                <textarea class="form-control form-control-sm" name="meta_title" id="metatitle" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><b>Meta Keywords</b></label>
                                <textarea class="form-control form-control-sm" placeholder="comma separated (,)" data-role="tagsinput" name="meta_keyword" id="metakey" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="metadesc" class="col-form-label"><b>Meta Description</b></label>
                                <textarea class="form-control form-control-sm" name="meta_description" id="metadesc" rows="3"></textarea>
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
        <h6 class="mb-0 text-uppercase">All Tags</h6>
        <hr>
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="">
                    <table id="tags" class="responsive w-100 table table-striped table-bordered align-middle border table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tag Name</th>
                                <th>Slug</th>
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
    $(document).ready(function() {
        $(document).ready(function () {
        });
        $('#tags').DataTable({
            processing: true,
            serverSide: true,
            scrollX:true,
            ajax: "{{ route('admin.getTags') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'slug'
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
                            '<a href="javascript:void(0);" class="edit-tag" data-id="' +
                            data.id + '"><i class="bx bxs-edit"></i></a>' +
                            '<a href="javascript:void(0);" class="text-danger delete-tag ms-3" data-id="' +
                            data.id + '"><i class="bx bxs-trash"></i></a>' +
                            '</div>';
                    }
                },
            ]
        });
        $(document).on('click', '.delete-tag', function() {
            var row = $(this);
            var id = $(this).data('id');
            var url = "{{ route('admin.tag.delete',':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "Once deleted, you will not be able to recover this Tag!",
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
                                'Tag deleted Successfully!',
                                'success'
                            )
                            row.closest('tr').hide(1000);
                        }
                    });
                }
            });
        });

        $(document).on('click', '.edit-tag', function() {
            var id = $(this).data('id');
            var url = "{{ route('admin.tag.edit',':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $("#idarea").html("<input type='hidden' name='id' value='" + data.id + "'>");      
                    $("#catname").val(data.name);
                    $("#slug").val(data.slug);
                    if(data.editImg != null){
                        preview = '{{asset("storage/media/")}}'+'/'+data.editImg.img;
                    }else{
                        preview = 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png';
                    }
                    $("#banner-preview").attr('src',preview);
                    $("#banner_data").val(data.cat_img);
                    $(".status-input").prop('checked', false);
                    $(".status-input[value='" + data.status + "']").prop('checked', true);
                    $("#metatitle").html(data.meta_title);
                    $("#metakey").html(data.meta_keyword);
                    $("#metadesc").html(data.meta_description);
                    $("#submit").html('Update');
                    $("#cancel-btn").html('<a href="" class="btn btn-sm btn-secondary px-3" id="cancel">Cancel</a>');
                }
            });
        });
    });
</script>
@endpush
