@extends('layouts.backpanel.master')
@isset($user)
@php
    $title = 'Edit Member';
@endphp
@else
@php
    $title = 'Add Member';
@endphp
@endisset
@section('title', $title)
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@push('css')

@endpush

@section('sections')

<div class="col-12 mb-5">
    <div class="col-12 d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase d-inline-block">{{$title}}</h6>
        <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">All Members</a>
    </div>
    <hr>
    <form class="needs-validation" action="{{route('admin.user.store')}}" method="POST" role="form">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card radius-10">
                    <div class="card-body">
                        @csrf
                        @isset($user) <input type="hidden" name="id" value="{{$user->id}}"> @endisset
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" required class="form-control titletoslug" id="name" value="@if(isset($user)){{$user->name}}@else{{old('name')}}@endif">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                <input type="email" autocomplete="email" name="email" placeholder="Email" required class="form-control titletoslug" id="email" value="@if(isset($user)){{$user->email}}@else{{old('email')}}@endif">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="password" class="form-label"><b>Password</b><span class="text-danger"></span></label>
                                <input type="password" autocomplete="password" name="password" placeholder="Password" class="form-control titletoslug" id="password" value="{{old('password')}}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="cpassword" class="form-label"><b>Confirm Password</b><span class="text-danger"></span></label>
                                <input type="password" autocomplete="password" name="confirmed" placeholder="Confirm Password" class="form-control titletoslug" id="cpassword" value="">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label"><b>Member Role Permissions</b><span class="text-danger">*</span></label><br>
                                <div class="col-12 px-4">
                                    <label for="" class="form-label"><b>Roles : </b></label>
                                    <div class="row row-cols-md-3">
                                        @foreach ($roles as $role)
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input role" name="roles[]" type="checkbox" @if(isset($user) && in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif value="{{$role->id}}" id="role-{{$role->id}}">
                                                <label class="form-check-label cursor-pointer" for="role-{{$role->id}}">{{$role->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 px-4">
                                    <label for="" class="form-label"><b>Permissions : </b></label>
                                    <div class="row row-cols-md-4">
                                        @foreach ($permissions as $permission)
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input permission" name="permissions[]" type="checkbox" @foreach ($permission->roles->pluck('id')->toArray() as $item)
                                                    data-role-{{$item}}="{{$item}}" @endforeach @if((isset($user) && in_array($permission->id, $user->permissions->pluck('id')->toArray())) || (isset($user) && $user->hasPermissionThroughRole($permission))) checked @endif value="{{$permission->id}}" id="permission-{{$permission->id}}">
                                                <label class="form-check-label cursor-pointer" for="permission-{{$permission->id}}">{{$permission->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="d-flex">
                    <div class="btn-group">
                        <button type="submit" name="back" value="save_and_back" class="btn btn-success"><i class="bx bx-save"></i> Save & Back</button>
                        <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" style="margin: 0px;">
                            <li><button type="submit" name="edit" value="save_and_edit" class="dropdown-item">Save & Edit</button></li>
                            <hr class="dropdown-divider">
                            <li><button type="submit" name="add" value="save_and_add" class="dropdown-item">Save & Add New</button></li>
                        </ul>
                    </div>
                    <a href="{{route('admin.user.index')}}" class="btn btn-secondary px-5 ms-2"><i class="bx bx-block"></i> Cancel</a>
                </div>
            </div>
        </div>
    </form>
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
    $(document).ready(function () {
        function rolePermission(Element) {
            if($(Element).is(':checked')) {
                $('.permission[data-role-'+$(Element).val()+'="' + $(Element).val() + '"]').prop('checked',true);
            }else{
                $('.permission[data-role-'+$(Element).val()+'="' + $(Element).val() + '"]').prop('checked',false);
            }
        }
        $('.role').change(function() {
            rolePermission(this);
        });
        // rolePermission($('.role'));
    });
</script>
@endpush
