@extends('layouts.backpanel.master')
@section('title', 'Roles & Permissions')
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.role.add')}}" class="btn btn-primary mr-3 btn-sm">Add Role</a>
        <a href="{{route('admin.permission.show')}}" class="btn btn-secondary mr-3 btn-sm">Permissions</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Roles</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="users" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Role Name</th>
                                <th data-orderable="false">Permission</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key=>$role)
                                <tr>
                                    <td class="py-5 px-3"><b>{{$role->name}}</b></td>
                                    <td>@foreach ($role->permissions as $permission)
                                        <span class="badge rounded-pill bg-secondary me-2 mb-1">{{$permission->name}}</span>
                                    @endforeach</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{route('admin.role.edit',$role->id)}}" class="edit-category border" title="Edit"><i class="bx bxs-edit"></i></a>
                                            <a href="{{route('admin.role.delete',$role->id)}}" class="text-danger ms-3 border delete" title="Trash"><i class="bx bxs-trash"></i></a>
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
<script>
    $(document).ready(function() {
        $('#users').DataTable();
        $(document).on("click",".delete",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Delete this Role!",
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
