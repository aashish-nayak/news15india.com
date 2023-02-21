@extends('layouts.backpanel.master')
@section('title', 'Website Users')

@section('sections')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-3">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="bx bx-group fs-3 mt-1 me-2"></i>
                        @if ($users_blocked == false)
                        <span>Website Users</span>
                        @else
                        <span>Block Users</span>
                        @endif
                    </h4>
                </div>
                <div class="col-md-auto col-12">
                    <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                        
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
                                <div class="col-md-auto px-1">
                                    <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                                </div>
                            </div>
                        </div>
                        @if ($users_blocked == false)
                        <a href="{{route('admin.viewer.block')}}" class="btn btn-danger btn-sm">Block Users</a>
                        @else
                        <a href="{{route('admin.viewer.index')}}" class="btn btn-primary btn-sm">All Users</a>
                        @endif
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
@php
    $messages = [
        'deleteMessage' => "You Want to Block this User!",
        'deleteConfirmMessage' => "Yes, Block it!",
    ];
    if($users_blocked == true){
        $messages['deleteMessage'] = 'You Want to Permanenty Delete this User!';
    }
@endphp
@includeIf('components.datatable.common-module-script',$messages)
@endpush
