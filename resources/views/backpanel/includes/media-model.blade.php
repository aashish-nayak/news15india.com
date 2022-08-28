@push('plugin-css')
<link rel="stylesheet" href="{{asset('assets/plugins/fancy-box/jquery.fancybox.min.css')}}" />
@endpush
@push('plugin-scripts')
<script src="{{ asset('assets/plugins/fancy-box/jquery.fancybox.min.js')}}"></script>
@endpush
<div class="modal fade" id="media-box">
    <div class="modal-dialog modal-dialog-centered modal-xl mt-0" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bx bx-images"></i> Media</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body py-0 row h-100" id="media-row">
                @includeIf('backpanel.media.media-actions')
                <div class="media-main" style="height: 300px;" id="MediaWrapper">
                    <div class="media-items">
                        <div class="media-grid">
                            <ul class="row row-cols-6 row-cols-2 list-unstyled m-0" style="overflow-x: hidden" id="MediaList">
                                {{-- @include('backpanel.media.media-grid') --}}
                                {{-- @include('backpanel.media.media-list') --}}
                            </ul>
                        </div>
                    </div>
                    <div class="media-sidebar collapse show" id="MediaSidebar">
                        @includeIf('backpanel.media.sidebar-preview')
                    </div>
                </div>
                <div id="copied-success" class="copied">
                    <span>Copied!</span>
                </div>
                @includeIf('backpanel.media.modal-forms')
            </div>
            <div class="modal-footer">
                <button type="button" id="insert" class="btn btn-sm btn-info">Insert</button>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>