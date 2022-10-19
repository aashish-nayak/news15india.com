@extends('layouts.backpanel.master')
@section('title', 'Advertisement Categories')
@push('plugin-css')
@endpush
@push('css')
@endpush
@section('sections')
<div class="row">
    <div class="col-md-4">
        <h6 class="mb-0 text-uppercase">Create Advertisement Placement</h6>
        <hr>
        @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger border-0 bg-light-danger alert-dismissible fade show mb-2 py-2">
                <div class="text-dark">{{ $error }}</div>
                <button type="button" class="btn-close p-2 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        @endif
        <div class="card radius-10">
            <div class="card-body">
                <form action="{{ Route('admin.advert.placements.store') }}" method="post" role="form">
                    @csrf
                    <div id="idarea">

                    </div>
                    <div class="form-group">
                        <label for="group" class="col-form-label"><b>Page Name</b><span class="text-danger">*</span></label>
                        <input type="text" name="group_name" id="group" class="form-control form-control-sm" required placeholder="Group name" value="{{old('group_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="catname" class="col-form-label"><b>Placement Name</b><span class="text-danger">*</span></label>
                        <input type="text" name="name" id="catname" class="form-control form-control-sm titleslug" required placeholder="Location name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-form-label"><b>Slug</b><span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="slug" class="form-control form-control-sm" required readonly value="{{old('slug')}}">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mt-2">
                                <label for="ad_size" class="form-label"><b>Ad Size</b></label>
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" name="width" value="{{old('width')}}" placeholder="Width" id="width">
                                    <span class="input-group-text">X</span>
                                    <input type="number" class="form-control" name="height" value="{{old('height')}}" placeholder="Height" id="height">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label"><b>Price</b></label>
                                <input type="text" name="price" id="price" class="form-control form-control-sm" placeholder="0.00" value="{{old('price')}}"/>
                            </div>
                        </div>
                        <div class="col-md-8 status">
                            <label for="" class="col-form-label d-block"><b>Status</b><span class="text-danger">*</span></label>
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
        <h6 class="mb-0 text-uppercase">Advertisement Placements</h6>
        <hr>
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="">
                    <table id="categories" class="w-100 table table-striped table-bordered align-middle border table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Page</th>
                                <th>Placement</th>
                                <th>Slug</th>
                                {{-- <th>Size</th>
                                <th>Price</th> --}}
                                <th>Status</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($placements as $key=>$placement)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$placement->group_name}}</td>
                                    <td>{{$placement->name}}</td>
                                    <td>{{$placement->slug}}</td>
                                    {{-- <td>{{$placement->width."x".$placement->height}}</td>
                                    <td>{{$placement->price ?? '-'}}</td> --}}
                                    <td>
                                        @if ($placement->status == 1)
                                        <span class="badge text-success">Active</span>
                                        @else
                                        <span class="badge text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin.advert.placements.edit',$placement->id)}}" class="edit"><i class="bx bxs-edit"></i></a>
                                            <a href="{{route('admin.advert.placements.delete',$placement->id)}}" class="text-danger delete ms-3"><i class="bx bxs-trash"></i></a>
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
    'deleteMessage' => "You Want to Delete this Ad Location !",
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
                    $("#group").val(data.group_name);
                    $("#catname").val(data.name);
                    $("#slug").val(data.slug);
                    $("#width").val(data.width);
                    $("#height").val(data.height);
                    $("#price").val(data.price);
                    $(".status-input").prop('checked', false);
                    $(".status-input[value='" + data.status + "']").prop('checked', true);
                    $("#submit").html('Update');
                    $("#cancel-btn").html('<a href="" class="btn btn-sm btn-secondary px-3 mt-3" id="cancel">Cancel</a>');
                }
            });
        });
        $(document).on('keyup','.titleslug',function(){
            $("#slug").val(stringslug($(this).val()));
        })
    });
</script>
@endpush
