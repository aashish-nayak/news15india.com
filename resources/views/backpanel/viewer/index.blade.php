@extends('layouts.backpanel.master')
@section('title', 'Website Users')
@push('plugin-css')
@endpush
@section('sections')
@php
    if(!isset($users_blocked)){
        $isBlockedUsersUrl = route('admin.viewer.block');
        $urlTitle = 'Blocked';
        $CardTitle = 'All';
    }else{
        $CardTitle = 'Blocked';
        $urlTitle = 'All';
        $isBlockedUsersUrl = route('admin.viewer.index');
    }
@endphp
    <div class="col-12 mt-4 text-end">
        <a href="{{$isBlockedUsersUrl}}" class="btn btn-danger mr-3 btn-sm">{{$urlTitle}} Users</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">{{$CardTitle}} Users</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="users" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        @php
                                            if(!isset($users_blocked)){
                                                $isRetoreUrl = route('admin.viewer.delete',$user->id);
                                                $linkIcon = '<i class="bx bx-block"></i>';
                                                $title = 'Block';
                                                $class = 'delete';
                                            }else{
                                                $isRetoreUrl = route('admin.viewer.restore',$user->id);
                                                $linkIcon = '<i class="bx bx-reset"></i>';
                                                $title = 'Restore';
                                                $class = '';
                                            }
                                        @endphp
                                        {{-- <a href="{{route('admin.viewer.edit',$user->id)}}" class="edit-category border" title="Edit"><i class="bx bxs-edit"></i></a> --}}
                                        <a href="{{$isRetoreUrl}}" class="text-danger ms-3 border {{$class}}" title="{{$title}}">{!!$linkIcon!!}</a>
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
                text: "You Want to Block this User!",
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
