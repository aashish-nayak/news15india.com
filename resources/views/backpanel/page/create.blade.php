@extends('layouts.backpanel.master')
@isset($page)
@php
    $title = 'Edit Page';
@endphp
@else
@php
    $title = 'Add Page';
@endphp
@endisset
@section('title', $title)
@push('plugin-css')
@endpush
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase d-inline-block align-self-center">{{$title}}</h6>
        <div class="d-flex align-items-center justify-content-center">
            {{-- <a type="button" id="fullscreen"><i class="bx bx-fullscreen fs-4 fw-bolder"></i></a> --}}
            <a href="{{route('admin.page.index')}}" class="btn btn-primary btn-sm ms-5">View Pages</a>
        </div>
    </div>
    <hr class="my-2">
    <form class="needs-validation" action="{{route('admin.page.store')}}" method="POST" role="form">
        <div class="row">
            <div class="col-lg-9">
                <div class="card radius-10">
                    <div class="card-body">
                        @csrf
                        @isset($page) <input type="hidden" name="id" value="{{$page->id}}"> @endisset
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="form-title" class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" required class="form-control titletoslug" id="form-title" value="@if(isset($page)){{$page->name}}@else{{old('name')}}@endif">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="form-slug" class="form-label"><b>Permalink : </b><span class="text-danger">*</span></label> 
                                <span class="ml-2"><a style="text-decoration: underline" href="javascript:void(0)">{{ url('/') }}/<b id="slug"></b></a></span><button id="link-edit" type="button" class="btn btn-sm btn-secondary py-0 px-1 ms-2 d-none">Edit</button>
                                <input type="hidden" id="slug-input" required name="slug" value="@if(isset($page)){{$page->slug}}@else{{old('slug')}}@endif">
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="contentEditor" class="form-label"><b>Content</b></label>
                                <textarea name="content" id="contentEditor" class="text-editor">@if(isset($page))@php
                                    echo $page->content;
                                @endphp @else{{ html_entity_decode(old('content')) }}@endif</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @includeIf('backpanel.includes.seo-meta')
            </div>
            <div class="col-lg-3">
                <div class="card" id="publishCard">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Publish</h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="btn-group">
                            <button type="submit" name="save_btn" value="save_btn" class="btn btn-primary"><i class="bx bx-save"></i> Publish & View</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" style="margin: 0px;">
                                <li><button type="submit" name="edit_btn" value="edit_btn" class="dropdown-item">Save & Edit</button></li>
                                <hr class="dropdown-divider">
                                <li><button type="submit" name="save_add_new" value="save_and_add" class="dropdown-item">Save & Add New</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Status <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body p-2">
                        <select class="form-select" required name="status" aria-label="Default select example">
                            <option @if (isset($page) && $page->status == 1) selected @endif @if (!isset($page)) selected @endif value="1">Published</option>
                            <option @if (isset($page) && $page->status == 0) selected @endif value="0">Draft</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ImageWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Primary Image <span class="text-danger">*</span></h6>
                            </button>
                        </h2>
                        <div id="ImageWidget" class="accordion-collapse collapse show">
                            <div class="card-body">
                                <div class="preview-image-wrapper ">
                                    <img src="@if(isset($page) && isset($page->pageImage->filename)){{asset('storage/media/'.$page->pageImage->filename)}}@else https://cms.botble.com/vendor/core/core/base/images/placeholder.png @endif" alt="Preview image" id="bannerPreview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
                                    <a href="javascript:void(0)" class="btn_remove_image" id="removeBanner" title="Remove image">X</a>
                                </div><br>
                                <input type="hidden" required name="image" id="bannerId" value="@isset($page){{$page->image}}@else{{old('banner_data')}}@endisset">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                @error('image')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Template <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="default" name="template" @if (isset($page) && $page->template == 'default') checked @endif @if (!isset($page)) checked @endif id="flexRadioDefault1" >
                            <label class="form-check-label" for="flexRadioDefault1">Default</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="no-sidebar" name="template" @if (isset($page) && $page->template == 'no-sidebar') checked @endif id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">No Sidebar</label>
                        </div>
                        @error('template')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include('backpanel.includes.media-model')
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"> </script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@include('backpanel.includes.media-model-script')
<script>
$(document).ready(function () {
    if ($(window).width() < 720) {
        $("#publishCard").toggleClass('position-fixed top-0 start-0 end-0 mt-3');
        $("#publishCard").attr('style','z-index:5')
    }
    $(document).on("keyup", ".titletoslug", function() {
        let slug = stringslug($(this).val());
        $("#slug").html(slug);
        $("#slug-input").val($("#slug").html());
        $("#link-edit").removeClass("d-none");
        let baseurl = "{{url('/')}}/";
        $("#seo-section-link").html(baseurl + $("#slug").html());
        $(".seo-preview").removeClass("d-none");
        if($("#seo_title").val() == ""){
            $("#seo-section-title").html($(this).val());
        }
    });
    $(document).on("keyup","#seo_title",function () {
        $("#seo-section-title").html($(this).val());
    });
    $("#link-edit").on("click",function () {
        $("#link-edit").addClass("d-none");
        let val = $("#slug").html();
        $("#slug").html('<input type="text" id="edit-link" value="'+val+'"><button type="button" id="link-save" class="btn btn-success btn-sm px-1 py-0 ms-2"><i class="fadeIn animated bx bx-check"></i></button><button type="button" id="link-cancel" class="btn btn-secondary ms-2 btn-sm px-1 py-0"><i class="fadeIn animated bx bx-x"></i></button>');
        $(document).on("click","#link-cancel",function(){
            $("#link-edit").removeClass("d-none");
            $("#slug").html(val);
        });
        $(document).on("click","#link-save",function(){
            $("#link-edit").removeClass("d-none");
            let editedLink = stringslug($(document).find("#edit-link").val());
            $("#slug").html(editedLink);
            $("#slug-input").val(editedLink);
            let baseurl = "{{url('/')}}/";
            $("#seo-section-link").html(baseurl + $("#slug").html());
        });
    });
    if($("#slug-input").val() != ''){
        $("#slug").html($("#slug-input").val());
    }
    if($(".titletoslug").val() != ''){
        $(".seo-preview").removeClass("d-none");
    }
    $("#desc").on("keyup",function () {  
        if($('#seo_description').val() == ""){
            $("#seo-section-desc").html($(this).val());
        }
    });
    $("#seo_description").on('keyup',function(){
        $("#seo-section-desc").html($(this).val());
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $("#edit-seo").on('click', function () {
        $(".seo-edit-section").toggleClass('d-none');
    });
});

tinymce.init({
    selector: "#contentEditor",
    encoding: 'xml',
    height: 600,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table emoticons template paste help",
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | help",
    menu: {
        favs: {
            title: "My Favorites",
            items: "code visualaid | searchreplace | emoticons",
        },
    },
    mobile: {
        menubar: true
    },
    menubar: "favs file edit view insert format tools table help",
    content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:18px; color: #000; }",
});
</script>
@endpush
