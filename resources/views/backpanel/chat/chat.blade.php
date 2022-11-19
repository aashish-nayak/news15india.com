@extends('layouts.backpanel.master')
@section('title', 'Chat')
@push('plugin-css')
<link href="{{ asset('css/chatApp.css') }}" rel="stylesheet">
<script src="{{ asset('js/chatApp.js') }}" defer></script>
@endpush
@section('sections')
    <div class="col-12" id="app">
        <chat :user="{{ Auth::guard('admin')->user() }}"/>
    </div>
@endsection
@push('plugin-scripts')
<script>
        // new PerfectScrollbar('.chat-list');
        // new PerfectScrollbar('.chat-content');
    </script>
@endpush
