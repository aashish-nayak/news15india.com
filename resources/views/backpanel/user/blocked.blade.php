@extends('layouts.backpanel.master')
@section('title', 'Blocked Members')
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.user.index')}}" class="btn btn-primary mr-3 btn-sm">All Members</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Blocked Members</h4>
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
                                    @forelse ($user->roles as $role)
                                        <span class="badge rounded-pill bg-secondary">{{$role->name}}</span>
                                        @empty
                                        -
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($user->permissions as $permission)
                                        <span class="badge rounded-pill bg-primary">{{$permission->name}}</span>
                                        @empty
                                        -
                                    @endforelse
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{route('admin.user.restore',$user->id)}}" class="text-dark ms-3 border" title="Restore"><i class="bx bx-reset"></i></a>
                                        <a href="{{route('admin.user.forceDelete',$user->id)}}" class="text-danger ms-3 border" title="Delete"><i class="bx bx-trash"></i></a>
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
                text: "You Want to Block this Member!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Block it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
    });
</script>
@endpush
