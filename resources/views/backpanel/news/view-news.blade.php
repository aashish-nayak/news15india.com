@extends('layouts.backpanel.master')
@section('title', 'News')
@push('plugin-css')

@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.news.create')}}" class="btn btn-primary mr-3 btn-sm">Add News</a>
        <a href="{{route('admin.news.trash-news')}}" class="btn btn-danger mr-3 btn-sm">View Trash</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">News</h4>
            </div>
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
{!! $dataTable->scripts() !!}
@endpush
