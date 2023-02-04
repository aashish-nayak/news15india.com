@extends('layouts.backpanel.master')
@section('title', 'Website Users')

@section('sections')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-3">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="bx bx-group fs-3 mt-1 me-2"></i>
                        <span>Website Users</span>
                    </h4>
                </div>
                <div class="col-md-auto col-12">
                    <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                        <div class="form-group me-2 filters">
                            <div class="row justify-content-end align-items-center m-0">
                                <div class="col-md-auto px-1">
                                    <select class="form-select form-select-sm" required name="status" id="status">
                                        <option value="all">Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-auto px-1">
                                    <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.viewer.block')}}" class="btn btn-danger btn-sm">Block Users</a>
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
    'deleteMessage' => "You Want to Delete this User!",
    'deleteConfirmMessage' => "Yes, Delete it!",
])
@endpush
