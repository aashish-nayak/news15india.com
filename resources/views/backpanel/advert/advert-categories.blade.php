@extends('layouts.backpanel.master')
@section('title', 'Advertisement Categories')
@push('plugin-css')
@endpush
@push('css')
@endpush
@section('sections')
<div class="row">
    <div class="col-md-4">
        <h6 class="mb-0 text-uppercase">Add Advertisement Category</h6>
        <hr>
        <div class="card radius-10">
            <div class="card-body">
                <form action="{{ Route('admin.advert.categories.store') }}" method="post" role="form">
                    @csrf
                    <div id="idarea">

                    </div>
                    <div class="form-group">
                        <label for="catname" class="col-form-label"><b>Category Name</b></label>
                        <input class="form-control form-control-sm" required name="cat_name" type="text" value="" id="catname">
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-form-label"><b>Slug</b></label>
                        <input class="form-control form-control-sm" required name="slug" type="text" value="" id="slug">
                    </div>
                    <div class="row">
                        <div class="col-md-8 status">
                            <label for="" class="col-form-label d-block"><b>Status</b></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input status-input" checked type="radio" name="status" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input status-input" type="radio" name="status" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary px-3 mt-3">Submit</button>
                    <span id="cancel-btn">

                    </span>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h6 class="mb-0 text-uppercase">Advertisement Categories</h6>
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
                                <th>Status</th>
                                <th data-orderable="false">Created</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key=>$category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category->category}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        @if ($category->status == 1)
                                        <span class="badge text-success">Active</span>
                                        @else
                                        <span class="badge text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::create($category->created_at)->format('d M Y')}}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin.advert.categories.edit',$category->id)}}" class="edit"><i class="bx bxs-edit"></i></a>
                                            <a href="{{route('admin.advert.categories.delete',$category->id)}}" class="text-danger delete ms-3"><i class="bx bxs-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@includeIf('components.datatable.common-module-script',[
    'deleteMessage' => "You Want to Delete this Category!",
    'deleteConfirmMessage' => "Yes, Delete it!",
])
<script>
    $(document).ready(function() {
        $('#categories').DataTable();
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $("#idarea").html("<input type='hidden' name='id' value='" + data.id + "'>");   
                    $("#catname").val(data.category);
                    $("#slug").val(data.slug);
                    $(".status-input").prop('checked', false);
                    $(".status-input[value='" + data.status + "']").prop('checked', true);
                    $("#submit").html('Update');
                    $("#cancel-btn").html('<a href="" class="btn btn-sm btn-secondary px-3 mt-3" id="cancel">Cancel</a>');
                }
            });
        });
    });
</script>
@endpush
