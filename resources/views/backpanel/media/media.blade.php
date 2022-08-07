@extends('layouts.backpanel.master')
@section('title', 'Media')
@push('plugin-css')
<link rel="stylesheet" href="{{asset('assets/plugins/fancy-box/jquery.fancybox.min.css')}}" />
@endpush
@push('plugin-scripts')
<script src="{{ asset('assets/plugins/fancy-box/jquery.fancybox.min.js')}}"></script>
@endpush
@section('sections')
    <form action="{{ Route('admin.media.create') }}" method="post" id="upload-form" enctype="multipart/form-data">
        @csrf
        <input type="file" class="" hidden name="file[]" multiple id="uploader">
    </form>
    <div class="card">
        <div class="card-header py-2">
            <button id="uploadBtn" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-save"></i>Upload</button>
            <button data-bs-toggle="modal" data-bs-target="#downloadModal" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-cloud-download"></i>Download</button>
            {{-- <button id="" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-folder"></i>Create Folder</button> --}}
            <button id="refreshMedia" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-refresh"></i>Refresh</button>
            <div class="dropdown d-inline"> 
                <a href="#" class="btn btn-dark btn-sm mb-2 mb-md-0 rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-filter-alt"></i>Filter(<span id="filter"><i class="bx bx-recycle"></i>Everything</span>)<i class="bx bxs-chevron-down ms-1"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item filter" type="button" data-filter="all"><i class="bx bx-recycle"></i> Everything</a>
                    <a class="dropdown-item filter" type="button" data-filter="image"><i class="bx bxs-image-alt"></i> Image</a>
                    <a class="dropdown-item filter" type="button" data-filter="audio"><i class="bx bxs-music"></i> Audio</a>
                    <a class="dropdown-item filter" type="button" data-filter="video"><i class="bx bxs-video"></i> Video</a>
                    <a class="dropdown-item filter" type="button" data-filter="application"><i class="bx bxs-file"></i> Document</a>
                </div>
            </div>
            {{-- <div class="dropdown d-inline"> 
                <a href="#" class="btn btn-dark btn-sm mb-2 mb-md-0 rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-show"></i><span id="view">View in(<i class="bx bx-globe"></i>All Media)</span><i class="bx bxs-chevron-down ms-1"></i></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-globe"></i> All Media</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="bx bxs-trash"></i> Trash</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="bx bxs-time-five"></i> Recent</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="bx bxs-star"></i> Favorites</a>
                </div>
            </div> --}}
            {{-- <div class="d-inline">
                <div class="input-group input-group-sm"> 
                    <input type="text" class="form-control" placeholder="People, groups, &amp; messages">
                    <span class="input-group-text bg-transparent">
                        <i class="bx bx-search"></i>
                    </span>
                </div>
            </div> --}}
        </div>
        <div class="bottom-header media-actions px-4 py-3 border-top border-bottom">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <nav style="--bs-breadcrumb-divider: '/';font-size:12px" aria-label="breadcrumb">
                        <ul class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ul>
                        <div class="items-loaded mt-1">
                            <p class="m-0"><span id="loadedItems" class="fw-bold"></span> Items Loaded out of <span id="totalItems" class="fw-bold"></span></p>
                        </div>
                    </nav>
                </div>
                <div class="col-md-4 text-end">
                    <div class="dropdown d-inline me-md-2"> 
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-2 mb-md-0 rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort <i class="bx bx-sort"></i>
                        </a>
                        <div class="dropdown-menu mb-2 mb-md-0" style="font-size: 13px">
                            <a class="dropdown-item sort" type="button" data-sort="created_at,desc"><i class="bx bx-sort-down"></i> Uploaded date - Latest</a>
                            <a class="dropdown-item sort" type="button" data-sort="created_at,asc"><i class="bx bx-sort-up"></i> Uploaded date - Oldest</a>
                            <a class="dropdown-item sort" type="button" data-sort="filename,desc"><i class="bx bx-sort-z-a"></i> File name - DESC</a>
                            <a class="dropdown-item sort" type="button" data-sort="filename,asc"><i class="bx bx-sort-a-z"></i> File name - ASC</a>
                        </div>
                    </div>
                    <div class="dropdown d-inline me-md-2"> 
                        <a type="button" class="btn btn-outline-secondary btn-sm mb-2 mb-md-0 rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
                            <span id="selectedFiles" class="fw-bold"></span> Actions<i class="bx bx-dots-vertical-rounded"></i>
                        </a>
                        <div class="dropdown-menu mb-2 mb-md-0" style="font-size: 13px">
                            <a class="dropdown-item action-preview" type="button"><i class="bx bx-show"></i> Preview</a>
                            <a class="dropdown-item action-copy" type="button"><i class="bx bx-link"></i> Copy link</a>
                            <a class="dropdown-item action-rename" type="button"><i class="bx bx-rename"></i> Rename</a>
                            {{-- <a class="dropdown-item" type="button"><i class="bx bx-copy"></i> Make a copy</a> --}}
                            {{-- <a class="dropdown-item" type="button"><i class="bx bx-star"></i> Add to favorite</a> --}}
                            <a class="dropdown-item action-download" type="button"><i class="bx bx-download"></i> Download</a>
                            <a class="dropdown-item action-moveToTrash" type="button"><i class="bx bx-trash"></i> Move to trash</a>
                        </div>
                    </div>
                    <div class="btn-group me-md-3" role="group" aria-label="First group">
                        <button type="button" class="btn btn-sm btn-outline-secondary file-view" data-view="grid" style="border-radius: 0%"><span class="fw-bold lni lni-grid"></span></button>
                        <button type="button" class="btn btn-sm btn-outline-secondary file-view" data-view="list" style="border-radius: 0%"><span class="fw-bold lni lni-list"></span></button>
                    </div>
                    <a class="text-primary accod-btn" type="button" data-bs-toggle="collapse" data-bs-target="#MediaSidebar" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out text-primary"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="media-main" id="MediaWrapper">
            <div class="media-items">
                <div class="media-grid">
                    <ul class="row row-cols-6 row-cols-2 list-unstyled m-0" id="MediaList">
                        {{-- @include('backpanel.media.media-grid') --}}
                        {{-- @include('backpanel.media.media-list') --}}
                    </ul>
                </div>
            </div>
            <div class="media-sidebar collapse show" id="MediaSidebar">
                <div class="file-details">
                    <div class="sidebar-image d-flex align-items-center justify-content-center" id="SideBarImage" data-placeholder-image="{{asset('assets/images/placeholder-image.jpg')}}">

                    </div>
                    <hr>
                    <div class="sidebar-description">
                        <div class="mb-1"><b>FileName </b><br><span class="media-title" id="SideBarName">File</span></div>
                        <div class="mb-1"><b>Alt : </b><span class="media-size" id="SideBarAlt">Alt Name</span></div>
                        <div class="mb-1"><b>Dimesion : </b><span class="media-size" id="SideBarDimension">Dimesion</span></div>
                        <div class="mb-1"><b>Size : </b><span class="media-weight" id="SideBarSize">Size</span></div>
                        <div class="mb-1"><b>File Type : </b><span class="media-type" id="SideBarType">File Type</span></div>
                        <div class="mb-1"><b>Created at : </b><span class="media-type" id="SideBarCreated">00 00 0000</span></div>
                        <div class="mb-1"><b>Updated at : </b><span class="media-type" id="SideBarUpdated">00 00 0000</span></div>
                    </div>
                    <div class="form-group m-0 mb-1">
                        <label class="col-form-label fw-bold" for="input-path">FullPath</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="input-path"  name="path" value="" readonly>
                            <a type="button" class="input-group-prepend" style="cursor: pointer" onclick="copy()" title="Copy to Clipboard">
                                <div class="input-group-text"><i class="fadeIn animated bx bx-clipboard"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="copied-success" class="copied">
        <span>Copied!</span>
    </div>
    <form action="{{route('admin.media.rename')}}" method="POST" id="renameForm">
        <div class="modal fade" id="renameModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rename</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div id="renameInputsWrapper">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary" id="renameFormSubmit">Save changes</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{route('admin.media.download')}}" method="POST" id="downloadForm">
        <div class="modal fade" id="downloadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Download</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
<textarea class="form-control form-control-sm" required name="download" 
placeholder="https://example.com/image.jpg
https://example.com/image2.jpg
https://example.com/image3.jpg
..." rows="4"></textarea>
                        <div class="alert alert-info border-0 shadow-none rounded-0 px-2 py-2 bg-light-info show mb-0 mt-2" style="cursor: help">
                            <div class="d-flex align-items-center">
                                <div class="font-14 text-dark"><i class="bx bx-info-circle fw-bold"></i>
                                </div>
                                <div class="ms-2">
                                    <div style="font-size: 12px" class="text-dark fw-bold"> Enter one URL per line.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary" id="downloadFormSubmit">
                            Download
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
<script type="text/x-custom-template" id="loader">
    <div class="loading-wrapper">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
        </div>
    </div>
</script>
<script>
    function copy() {
        var copyText = document.getElementById("input-path");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $('#copied-success').fadeIn(800);
        $('#copied-success').fadeOut(800);
    }
    $(document).ready(function() {   
        var lastChecked = null; 
        function sidebarState(that = '') {
            let name = (that != '') ? $(that).data('name') : 'File';
            let dimen = (that != '') ? $(that).data('dimen') : 'Alt Name';
            let size = (that != '') ? $(that).data('size') : '100x100';
            let type = (that != '') ? $(that).data('type') : 'File Type';
            let createdat = (that != '') ? $(that).data('createdat') : '00 00 0000';
            let updatedat = (that != '') ? $(that).data('updatedat') : '00 00 0000';
            let alt = (that != '') ? $(that).data('alt') : '';
            let path = (that != '') ? $(that).data('path') : '';
            let sidebarPreview = '';
            if(type.indexOf('image/') != -1) {
                sidebarPreview = '<img src="'+$(that).data('path')+'" alt="'+alt+'" class="img-fluid">';
            } else if(type.indexOf('application/') != -1) {
                sidebarPreview = '<i class="bx bx-file" style="font-size:80px"></i>';
            }else if(type.indexOf('audio/') != -1) {
                sidebarPreview = '<i class="bx bx-volume-full" style="font-size:80px"></i>';
            }else if(type.indexOf('video/') != -1) {
                sidebarPreview = '<i class="bx bx-film" style="font-size:80px"></i>';
            }else{
                sidebarPreview =  '<img src="'+$("#SideBarImage").data('placeholder-image')+'" class="img-fluid">';
            }
            $("#SideBarImage").html(sidebarPreview);
            $("#SideBarName").html(name);
            $("#SideBarDimension").html(dimen);
            $("#SideBarSize").html(size);
            $("#SideBarType").html(type);
            $("#SideBarCreated").html(createdat);
            $("#SideBarUpdated").html(updatedat);
            $("#SideBarAlt").html(alt);
            $("#input-path").val(path);
        }
        function ajaxMediaLoader(loaderStart = true) {
            if(loaderStart == true){
                $('.media-main').addClass('on-loading bb-loading');
                $('.media-main').append($('#loader').html());
            }else{
                $('.media-main').removeClass('on-loading bb-loading');
                $(document).find('.media-main .loading-wrapper').remove();
            }
        }
        function fetch_data(params = {}) {
            if(localStorage.getItem('view') == null){
                localStorage.setItem('view', 'grid');
            }
            if(localStorage.getItem('filter') == null){
                localStorage.setItem('filter', 'all');
            }
            if(localStorage.getItem('sort') == null){
                localStorage.setItem('sort', 'created_at,desc');
            }
            let skip = (params.skip !== undefined) ? params.skip : 0,
            loadType = (params.loadType !== undefined) ? params.loadType : 'refresh',
            filter = localStorage.getItem('filter'),
            sort = localStorage.getItem('sort'),
            view = localStorage.getItem('view');

            $(".file-view[data-view='"+view+"']").addClass('active');
            $(".filter[data-filter='"+filter+"']").addClass('active');
            $("#filter").html($(".filter[data-filter='"+filter+"']").html());
            $(".sort[data-sort='"+sort+"']").addClass('active');

            let requestData = {
                "_token": "{{ csrf_token() }}",
                skip : skip,
                view : view,
                filter : filter,
                sort : sort
            };
            $.ajax({
                url: "{{ route('admin.media.fetch') }}",
                type: 'POST',
                data : requestData,
                beforeSend: function() {
                    ajaxMediaLoader();
                },
                success: function(response) {
                    ajaxMediaLoader(false);
                    sidebarState();
                    if(loadType == 'loadmore'){
                        $('#MediaList').append(response);
                    }else{
                        $('#MediaList').html(response);
                    }
                    
                    let loaded = $('#MediaList').find('.media-file').length;
                    $("#loadedItems").text(loaded);
                    $("#totalItems").text($(document).find("#loadMoreBtn").data('total'));
                    let gap = (localStorage.getItem('view') == 'grid') ? 'g-2' : '';
                    $('#MediaList').removeClass('g-2');
                    $('#MediaList').addClass(gap);
                }
            });
        }
        function countChecked(){
            let selected = $(document).find(".file .checkbox:checked").length;
            $("#selectedFiles").text((selected > 1) ? selected : '');
            return selected;
        }
        function checkedIds(){
            let allCheckedBox = $(document).find(".file .checkbox:checked");
            let ids = [];
            allCheckedBox.each(function(index, el) {
                ids.push($(el).val());
            });
            return ids;
        }
        function setFileSelectedClass() {
            $(document).find(".file").removeClass("file-selected");
            $(document).find(".file input[type='checkbox']:checked").closest('.file').addClass("file-selected");
        }
        fetch_data();
        $(".file-view").on('click',function () {
            localStorage.setItem('view',$(this).data('view'));
            $(".file-view").removeClass('active');
            $(this).addClass('active');
            fetch_data();
            lastChecked = null;
            $(document).find(".file input[type='checkbox']").prop('checked',false);
            countChecked();
        });
        $(".filter").on('click',function () {
            localStorage.setItem('filter',$(this).data('filter'));
            $(".filter").removeClass('active');
            $(this).addClass('active');
            fetch_data();
            lastChecked = null;
            $(document).find(".file input[type='checkbox']").prop('checked',false);
            countChecked();
        });
        $(".sort").on('click',function () {
            localStorage.setItem('sort',$(this).data('sort'));
            $(".sort").removeClass('active');
            $(this).addClass('active');
            fetch_data();
            lastChecked = null;
            $(document).find(".file input[type='checkbox']").prop('checked',false);
            countChecked();
        });
        $("#uploadBtn").click(()=>$("#uploader").trigger('click'));
        $("#refreshMedia").on('click',function () {
            fetch_data();
        });
        $(document).on('dblclick','.media-file',function () {
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
        $(document).on('click', ".file", function(e) {
            let thisCheckBoxElement = $(document).find(".file input[value="+$(this).data('id')+"]");
            let allCheckBoxElements = $(document).find(".file input[type='checkbox']");
            if(!lastChecked) {
                lastChecked = thisCheckBoxElement;
                return;
            }
            if(e.ctrlKey){
                thisCheckBoxElement.prop('checked',!$(thisCheckBoxElement).is(':checked'));
            }else if(e.shiftKey){
                var from = allCheckBoxElements.index(thisCheckBoxElement);
                var to = allCheckBoxElements.index(lastChecked);
                var start = Math.min(from, to);
                var end = Math.max(from, to) + 1;

                allCheckBoxElements.slice(start, end)
                    .filter(':not(:disabled)')
                    .prop('checked', true);
            }else{
                allCheckBoxElements.prop('checked',false);
                thisCheckBoxElement.prop('checked',true);
            }
            lastChecked = thisCheckBoxElement;
            setFileSelectedClass();
            countChecked();
            sidebarState(this);
        });
        $("#uploader").change(()=>$("#upload-form").trigger('submit'));
        
        $("#upload-form").on('submit',function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                beforeSend: function() {
                    ajaxMediaLoader();
                    $("#uploader").prop("disabled",true);
                },
                success: function(response) {
                    ajaxMediaLoader(false);
                    $("#uploader").prop("disabled",false);
                    if(response.status == 'success'){
                        fetch_data();
                        Swal.fire(
                            'Successful!',
                            response.message,
                            'success'
                        );
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        })
                    }
                }
            });
        });
        $(".action-moveToTrash").click(function () {
            let Ids = checkedIds();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Bulk Delete Files!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{route('admin.media.delete')}}";
                    let data = {
                        "_token": "{{ csrf_token() }}",
                        ids: Ids
                    };
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        beforeSend: function() {
                            ajaxMediaLoader();
                        },
                        success: function(response) {
                            ajaxMediaLoader(false);
                            if(response.status == 'success'){
                                fetch_data();
                                Swal.fire(
                                    'Successful!',
                                    response.message,
                                    'success'
                                );
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                })
                            }
                        }
                    });
                }
            })

        });
        $(".action-preview").click(function () {
            let gallary = [];
            $.each($(document).find('.file.file-selected'), function (key, value) { 
                gallary.push({
                    src  : $(value).data('path'),
                });
            });
            $.fancybox.open(gallary,{
                toolbar: "auto",
                defaultType: "image",
                arrows: true,
                buttons : [
                    'zoom',
                    'fullScreen',
                    "slideShow",
                    'download',
                    'close',
                ]
            });
        });
        $(".action-copy").click(function () {
            let links = '',
            elements = $(document).find('.file.file-selected');
            $.each(elements, function (key, value) {
                let prefix = (key !== (elements.length -1 )) ? ', \n' : '';
                links += $(value).data('path')+prefix;
            });
            var inp = document.createElement('input');
            document.body.appendChild(inp);
            inp.value = links;
            inp.select();
            inp.setSelectionRange(0, 99999);
            document.execCommand("copy");
            $('#copied-success').fadeIn(800);
            $('#copied-success').fadeOut(800);
        });
        $(".action-download").click(function () {
            elements = $(document).find('.file.file-selected');
            $.each(elements, function (key, value) {
                var a = $("<a>")
                    .attr("href", $(value).data('path'))
                    .attr("download", $(value).data('name'))
                    .appendTo("body");
    
                a[0].click();
                a.remove();
            });
        });
        $(".action-rename").click(function () {
            elements = $(document).find('.file.file-selected');
            let inputs = '';
            $.each(elements, function (key, value) {
                inputs += `<input type="text" required name="filename[${$(value).data('id')}]" value="${$(value).data('name')}" class="form-control form-control-sm mb-3 rounded-0" placeholder="Rename here">`;
            });
            $("#renameInputsWrapper").html(inputs);
            $("#renameModal").modal("show");
        });
        $("#renameForm").submit(function (e) {
            e.preventDefault();
            $("#renameFormSubmit").prop("disabled",true);
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: form.serialize(),
                dataType: "json",
                success: function(response) {
                    $("#renameFormSubmit").prop("disabled",false);
                    $("#renameModal").modal("hide");
                    if (response.status == "success") {
                        fetch_data(1);
                        Swal.fire(
                            'Successful!',
                            response.message,
                            'success'
                        );
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !',
                            text: response.message,
                        })
                    }
                }
            });
        });
        $("#downloadForm").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: form.serialize(),
                dataType: "json",
                beforeSend: function() {
                    ajaxMediaLoader();
                    $("#downloadFormSubmit").prop("disabled",true);
                    $("#downloadFormSubmit").html(`<span class="spinner-border spinner-border-sm"></span> Downloading`);
                },
                success: function(response) {
                    $("#downloadModal").modal("hide");
                    $("#downloadForm").trigger("reset");
                    $("#downloadFormSubmit").prop("disabled",false);
                    $("#downloadFormSubmit").html(`Download`);
                    ajaxMediaLoader(false);
                    if (response.status == "success") {
                        fetch_data(1);
                        Swal.fire(
                            'Successful!',
                            response.message,
                            'success'
                        );
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !',
                            text: response.message,
                        })
                    }
                }
            });
        });

        $(document).on('click',"#loadMoreBtn",function () {
            let skip = $(this).data("skip");
            fetch_data({
                skip : skip,
                loadType : 'loadmore'
            });
            $(this).closest('.loadmore-wrapper').remove();
        });

        // Old FileManager Code //
        $("#delete").on("click",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to delete this Image!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        $(document).on('click','#bulk-select',function () {
            if(bulk === true){
                $(document).find(".file").removeClass("file-selected");
                $(document).find("#bulk-delete").remove();
                $(this).text('Select Multiple');
                $(this).removeClass('btn-secondary');
                $(this).addClass('btn-success');
                bulk = false;
                bulkId = [];
            }else{
                $(this).before('<button class="btn btn-danger btn-sm me-3" id="bulk-delete">Bulk Delete</button>');
                $(this).removeClass('btn-success');
                $(document).find(".file").removeClass("file-selected");
                $(this).addClass('btn-secondary');
                $(this).text('Cancel');
                bulk = true;
            }
        });
        $(document).on('click','#bulk-delete',function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Bulk Delete Images!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('admin.media.bulk.delete') }}";
                    var data = {
                        "_token": "{{ csrf_token() }}",
                        ids: bulkId
                    };
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        beforeSend: function() {
                            $("#bulk-delete").prop('disabled',true);
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
        $("#update-form").on("submit", function(e) {
            e.preventDefault();
            $("#submitchange").prop("disabled",true);
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: form.serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") {
                        $("#submitchange").prop("disabled",false);
                        fetch_data(1);
                        Swal.fire(
                            'Successful!',
                            data.message,
                            'success'
                        );
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }
                }
            });
        });
    });
</script>
@endpush
