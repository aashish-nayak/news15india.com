@extends('layouts.backpanel.master')
@section('title', 'Pages')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-2">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="bx bx-detail fs-3 mt-1 me-2"></i>
                        <span>Pages</span>
                    </h4>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <div class="form-group me-2 filters">
                            <div class="row justify-content-end align-items-center m-0">
                                <div class="col px-1">
                                    <div class="input-group input-daterange d-flex align-items-center">
                                        &nbsp;<div class="input-group-addon">From</div>&nbsp;
                                        <input type="date" name="from_date" id="filter_from" class="form-control form-control-sm" />
                                        &nbsp;<div class="input-group-addon">To</div>&nbsp;
                                        <input type="date" name="to_date" id="filter_to" class="form-control form-control-sm" />
                                    </div>
                                </div>
                                <div class="col-md-2 px-1">
                                    <select class="form-select form-select-sm" required name="status" id="status">
                                        <option value="all">Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-1 px-1">
                                    <button type="button" name="filter" id="filter"
                                        class="btn btn-info btn-sm">Filter</button>
                                </div>
                            </div>
                        </div>
                        @permission('create-page')
                        <a href="{{ route('admin.page.create') }}" id="create" class="btn btn-success btn-sm">Add Page</a>
                        @endpermission
                        @permission('delete-page')
                        <a href="{{ route('admin.bulk.delete') }}" id="bulkDelete" data-model="App\Models\Page" data-message="You Want to delete Bulk Pages!" data-button="Yes, Delete it!" class="btn btn-danger btn-sm d-none position-relative"><span class="badge bg-dark selectedCount position-absolute top-0 start-100 translate-middle rounded-pill"></span> Bulk Delete</a>
                        @endpermission
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    {!! $dataTable->scripts() !!}
    @includeIf('components.datatable.common-module-script',[
        'deleteMessage' => "You Want to delete Page!",
        'deleteConfirmMessage' => "Yes, Delete it!",
    ])
@endpush
