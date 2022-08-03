@extends('layouts.backpanel.master')
@section('title', 'Category')
@push('plugin-css')
@endpush
@push('css')
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
                                <select class="form-select form-select-sm mb-3 single-select" data-placeholder="Select Parent Category" required id="parent" name="parent_id" aria-label=".form-select-sm example">
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
                                <textarea class="form-control form-control-sm" name="meta_description" id="metadesc" rows="5"></textarea>
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
                    <table id="categories" class="w-100 table table-striped table-bordered align-middle border table-hover">
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
</div>
@include('backpanel.includes.media-model')
@endsection
@push('scripts')
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
                    let preview = '';
                    if(data.editImg != null){
                        preview = '{{asset("storage/media/")}}'+'/'+data.editImg.filename;
                    }else{
                        preview = 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png';
                    }
                    $("#banner-preview").attr('src',preview);
                    $("#banner_data").val(data.cat_img);
                    $("#metatitle").html(data.meta_title);
                    $("#metakey").val(data.meta_keywords);
                    $("#metadesc").html(data.meta_description);
                    $("#submit").html('Update');
                    $("#cancel-btn").html('<a href="" class="btn btn-sm btn-secondary px-3" id="cancel">Cancel</a>');
                    loadselect();
                    loadtag();
                }
            });
        });
        
    });
</script>
@endpush
