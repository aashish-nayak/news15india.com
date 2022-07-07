@extends('layouts.backpanel.master')
@isset($role)
@php
    $title = 'Edit Role';
@endphp
@else
@php
    $title = 'Add Role';
@endphp
@endisset
@section('title', $title)
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush

@section('sections')
<div class="col-12 mb-5">
    <div class="col-12 d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase d-inline-block">{{$title}}</h6>
        <a href="{{route('admin.role.show')}}" class="btn btn-primary btn-sm">Back</a>
    </div>
    <hr>
    <form class="needs-validation" action="{{route('admin.role.store')}}" method="POST" role="form">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card radius-10">
                    <div class="card-body">
                        @csrf
                        @isset($role) <input type="hidden" name="id" value="{{$role->id}}"> @endisset
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label"><b>Role Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Role Name" required class="form-control titletoslug" id="name" value="@if(isset($role)){{$role->name}}@else{{old('name')}}@endif">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label"><b>Permissions</b><span class="text-danger">*</span></label><br>
                                <div class="col-12 px-4">
                                    <div class="col-12">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="all-permission">
                                            <label class="form-check-label cursor-pointer" for="all-permission"><b>All Permissions</b></label>
                                        </div>
                                    </div>
                                    <div class="row row-cols-md-4">
                                        @foreach ($permissions as $permission)
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input permission" name="permissions[]" type="checkbox" @foreach ($permission->roles->pluck('id')->toArray() as $item)
                                                    data-role-{{$item}}="{{$item}}" @endforeach @if(isset($role) && in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif value="{{$permission->id}}" id="permission-{{$permission->id}}">
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
                    <button type="submit" name="back" value="save_and_back" class="btn btn-primary"><i class="bx bx-save"></i> Save & Back</button>
                    <a href="{{route('admin.role.show')}}" class="btn btn-secondary px-5 ms-2"><i class="bx bx-block"></i> Cancel</a>
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
                $('.permission').prop('checked',true);
            }else{
                $('.permission').prop('checked',false);
            }
        }
        $('#all-permission').change(function() {
            rolePermission(this);
        });
    });
</script>
@endpush
