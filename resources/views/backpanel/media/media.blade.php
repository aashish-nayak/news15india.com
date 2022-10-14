@extends('layouts.backpanel.master')
@section('title', 'Media')
@push('plugin-css')
<link rel="stylesheet" href="{{asset('assets/plugins/fancy-box/jquery.fancybox.min.css')}}" />
@endpush
@push('plugin-scripts')
<script src="{{ asset('assets/plugins/fancy-box/jquery.fancybox.min.js')}}"></script>
@endpush
@section('sections')
    <div class="card m-0">
        @includeIf('backpanel.media.media-actions')
        <div class="media-main" id="MediaWrapper">
            <div class="media-items">
                <div class="media-grid">
                    <ul class="row list-unstyled m-0" id="MediaList">
                        {{-- @include('backpanel.media.media-grid') --}}
                        {{-- @include('backpanel.media.media-list') --}}
                    </ul>
                </div>
            </div>
            <div class="media-sidebar collapse show" id="MediaSidebar">
                @includeIf('backpanel.media.sidebar-preview')
            </div>
        </div>
    </div>
    <div id="copied-success" class="copied">
        <span>Copied!</span>
    </div>
    @includeIf('backpanel.media.modal-forms')
@endsection
@push('scripts')
@includeIf('backpanel.media.media-script')
<script>
    $(document).ready(function () {
        $(document).on('dblclick','.file',function () {
            $.fancybox.open({
                src : $(this).data('path'),
                toolbar: "auto",
                defaultType: "image",
                buttons : [
                    'zoom',
                    'fullScreen',
                    'download',
                    'close',
                ]
            });
        });
    });
</script>
@endpush
