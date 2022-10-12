@extends('layouts.backpanel.master')
@section('title', 'Members')

@section('sections')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-3">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="bx bx-group fs-3 mt-1 me-2"></i>
                        <span>Members</span>
                    </h4>
                </div>
                <div class="col-md-auto col-12">
                    <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                        <div class="form-group me-2 filters">
                            <div class="row justify-content-end align-items-center m-0">
                                <div class="col px-1">
                                    <select class="form-select form-select-sm" required name="status" id="status">
                                        <option value="all">Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="col px-1">
                                    <select class="form-select form-select-sm" required name="designation" id="designation">
                                        <option value="all">Designation</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 px-1">
                                    <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.user.add')}}" class="btn btn-primary btn-sm">Add Member</a>
                        <a href="{{route('admin.user.block')}}" class="btn btn-danger btn-sm">Block Members</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
{!! $dataTable->scripts() !!}
@includeIf('components.datatable.common-module-script',[
    'deleteMessage' => "You Want to Block this Member!",
    'deleteConfirmMessage' => "Yes, Block it!",
])
<script>
    $(document).ready(function() {
        $('#users').DataTable();
    });
</script>
@endpush
