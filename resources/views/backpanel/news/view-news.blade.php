@extends('layouts.backpanel.master')
@section('title', 'News')
@push('plugin-css')

@endpush
@section('sections')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-4">
                    <h4 class="card-title m-0 d-flex align-items-center"><i class="bx bx-news fs-3 mt-1 me-2"></i> <span>News</span></h4>
                </div>
                <div class="col text-end">
                    <a href="{{route('admin.bulk.delete')}}" id="bulkDelete" data-model="App\Models\News" class="btn btn-danger mr-3 btn-sm d-none">Bulk Delete</a>
                    <a href="{{route('admin.news.create')}}" id="create" class="btn btn-success mr-3 btn-sm">Add News</a>
                    <a href="{{route('admin.news.trash-news')}}" id="trash" class="btn btn-info mr-3 btn-sm">View Trash</a>
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
@endpush
