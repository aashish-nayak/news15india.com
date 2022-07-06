@extends('layouts.backpanel.master')
@section('title', 'Users')
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.user.add')}}" class="btn btn-primary mr-3 btn-sm">Add User</a>
        {{-- <a href="{{route('admin.news.trash-news')}}" class="btn btn-danger mr-3 btn-sm">View Block Users</a> --}}
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Users</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="users" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th data-orderable="false">Extra Permission</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{$role->name}} |
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->permissions as $permission)
                                        {{$permission->name}} |
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{route('admin.user.edit',$user->id)}}" class="edit-category border" title="Edit"><i class="bx bxs-edit"></i></a>
                                        <a href="{{route('admin.user.delete',$user->id)}}" class="text-danger ms-3 border delete" title="Trash"><i class="bx bxs-trash"></i></a>
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
                text: "You Want to Trash this User!",
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
