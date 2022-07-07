@extends('layouts.backpanel.master')
@section('title', 'Permissions')
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="javascript:void(0)" class="btn btn-secondary mr-3 btn-sm" data-bs-toggle="modal" data-bs-target="#AddPermission">Add Permissions</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Permissions</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="users" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Permission Name</th>
                                <th data-orderable="false">Permission Slug</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key=>$permission)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->slug}}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin.permission.edit',$permission->id)}}" class="edit-category border" title="Edit"><i class="bx bxs-edit"></i></a>
                                            <a href="{{route('admin.permission.delete',$permission->id)}}" class="text-danger ms-3 border delete" title="Trash"><i class="bx bxs-trash"></i></a>
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
    <form action="{{route('admin.permission.store')}}" method="POST">
        <div class="modal fade" id="AddPermission" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@isset($data){{'Edit'}}@else{{'Add'}}@endisset Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @isset($data) <input type="hidden" name="id" value="{{$data->id}}"> @endisset
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label"><b>Permission Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" required class="form-control titletoslug" id="name" value="@if(isset($data)){{$data->name}}@else{{old('name')}}@endif">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{route('admin.permission.show')}}" class="btn btn-secondary" @if(!isset($data)) data-bs-dismiss="modal" @endif>Close</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
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
@isset($data)
<script>
    $(document).ready(function () {
        $("#AddPermission").modal('show');
    });
</script>
@endisset
<script>
    $(document).ready(function() {
        $('#users').DataTable();
        $(document).on("click",".delete",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Delete this Permission!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
    });
</script>
@endpush
