@extends('layouts.backpanel.master')
@section('title', 'Application Form')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-3">
                    <h4 class="card-title m-0 d-flex align-items-center"><i class="bx bx-group fs-3 mt-1 me-2"></i>
                        <span>Application Form</span>
                    </h4>
                </div>
                <div class="col-md-auto col-12">
                    <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                        <div class="form-group me-2 filters">
                            <div class="row justify-content-end align-items-center m-0">
                                <div class="col-md-5 px-1">
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
                                        <option value="approved">Approved</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </div>
                                <div class="col-md-3 px-1">
                                    <select class="form-select form-select-sm" required name="designation" id="designation">
                                        <option value="all">Designation</option>
                                        <option value="Reporter">Reporter</option>
                                        <option value="Bureau Chief">Bureau Chief</option>
                                        <option value="Sub Editor">Sub Editor</option>
                                        <option value="Editor">Editor</option>
                                        <option value="State Head">State Head</option>
                                        <option value="Advertisement Head">Advertisement Head</option>
                                        <option value="Video Editor">Video Editor</option>
                                        <option value="Content Writer">Content Writer</option>
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
    <script>
        $(document).ready(function () {
            $(document).on("click",".delete",function (e) {
                var url = $(this).attr("href");
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want to move this News in Trash!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Trash it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endpush
