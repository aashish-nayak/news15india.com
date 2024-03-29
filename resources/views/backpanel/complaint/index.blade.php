@extends('layouts.backpanel.master')
@section('title', 'Complaints')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-3">
                    <h4 class="card-title m-0 d-flex align-items-center"><i class="bx bx-message-square-edit fs-3 mt-1 me-2"></i>
                        <span>All Complaints</span>
                    </h4>
                </div>
                <div class="col-md-auto col-12">
                    <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                        <div class="form-group me-2 filters">
                            <div class="row justify-content-end align-items-center m-0">
                                <div class="col-md-6 px-1">
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
                                        <option value="pending">Pending</option>
                                        <option value="process">Process</option>
                                        <option value="solve">Solve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </div>
                                <div class="col-md-2 px-1">
                                    <select class="form-select form-select-sm" required name="subject" id="subject">
                                        <option value="all">Subject</option>
                                        <option value="News Related">News Related</option>
                                        <option value="Survey Related">Survey Related</option>
                                        <option value="Advertisement Related">Advertisement Related</option>
                                        <option value="User Data Related">User Data Related</option>
                                    </select>
                                </div>
                                <div class="col-md-1 px-1">
                                    <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                                </div>
                            </div>
                        </div>
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
        'deleteMessage' => "You Want to Delete this Complaint !",
        'deleteConfirmMessage' => "Yes, Delete it!",
    ])
@endpush
