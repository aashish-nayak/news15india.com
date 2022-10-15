@extends('layouts.backpanel.master')
@section('title', 'Trash News')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-2">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="bx bx-news fs-3 mt-1 me-2"></i>
                        <span>Trash</span>
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
                                @role('super-admin','admin')
                                <div class="col-md-2 px-1">
                                    <select class="form-select form-select-sm" required name="author" id="author">
                                        <option value="all">Author</option>
                                        @foreach ($authors as $author)
                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endrole
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
                        <a href="{{ route('admin.news.create') }}" id="create" class="btn btn-success btn-sm">Add News</a>
                        <a href="{{ route('admin.bulk.destroy') }}" id="bulkDelete" data-model="App\Models\News" data-message="You Want to Delete Permanently Bulk News!" data-button="Yes, Delete it!" class="btn btn-danger btn-sm d-none position-relative"><span class="badge bg-dark selectedCount position-absolute top-0 start-100 translate-middle rounded-pill"></span> Bulk Delete</a>
                        <a href="{{ route('admin.news.view-all-news') }}" id="trash" class="btn btn-info btn-sm">View News</a>
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
    'deleteMessage' => "You Want to Permanenty Delete this News!",
    'deleteConfirmMessage' => "Yes, Delete it!",
])
@endpush
