@extends('layouts.backpanel.master')
@isset($page)
@php
    $title = 'Edit News';
@endphp
@else
@php
    $title = 'Add News';
@endphp
@endisset
@section('title', $title)
@push('plugin-css')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
@endpush
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase d-inline-block">{{$title}}</h6>
        <a href="{{route('admin.news.view-all-news')}}" class="btn btn-primary btn-sm">View News</a>
    </div>
    <hr>
    <form class="needs-validation" action="{{route('admin.news.store')}}" method="POST" role="form">
        <div class="row">
            <div class="col-lg-9">
                <div class="card radius-10">
                    <div class="card-body">
                        @csrf
                        @isset($page) <input type="hidden" name="id" value="{{$page->id}}"> @endisset
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01" class="form-label"><b>Title</b><span class="text-danger">*</span></label>
                                <input type="text" name="title" placeholder="Name" required class="form-control titletoslug" id="validationCustom01" value="@if(isset($page)){{$page->title}}@else{{old('title')}}@endif">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01" class="form-label"><b>Permalink : </b><span class="text-danger">*</span></label> 
                                <span class="ml-2"><a style="text-decoration: underline" href="javascript:void(0)">{{ url('/') }}/<b id="slug"></b></a></span><button id="link-edit" type="button" class="btn btn-sm btn-secondary py-0 px-1 ms-2 d-none">Edit</button>
                                <input type="hidden" id="slug-input" required name="slug" value="@if(isset($page)){{$page->slug}}@else{{old('slug')}}@endif">
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01" class="form-label"><b>Short Description</b> <span class="text-danger">*</span></label>
                                <textarea name="short_desc" required placeholder="Short description" class="form-control" id="desc" rows="2">@if(isset($page)){{$page->short_description}}@else{{old('short_desc')}}@endif</textarea>
                                @error('short_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @role('super-admin','admin')
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" style="width:2.3em;height:1.2em" type="checkbox" name="is_featured" id="flexSwitchCheckDefault" value="1" @if (isset($page) && $page->is_featured == 1) checked @endif>
                                    <label class="form-check-label fw-bold" for="flexSwitchCheckDefault">Is featured?</label>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01" class="form-label"><b>Content</b></label>
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
                <div class="card mt-4 col-12">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Addition Information</h6>
                    </div>
                    <div class="card-body pt-3 pb-4">
                        <div class="mb-3">
                            <label class="form-label">Youtube Video URL</label>
                            <input type="url" class="form-control" value="@isset($page){{$page->youtube_url}}@else{{old('youtube_url')}}@endisset" name="youtube_url" placeholder="Ex: https://www.youtube.com/watch?v=FN7ALfpGxiI">
                        </div>
                        @error('youtube_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div id="seo_wrap" class="card mt-4 col-12">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Search Engine Optimization</h6>
                        <a href="javascript:void(0)" id="edit-seo">Edit SEO meta</a>
                    </div>
                    <div class="card-body pt-3 pb-4">
                        <div class="seo-preview d-none">
                            <div class="existed-seo-meta">
                                <span class="page-title-seo" id="seo-section-title">@if(isset($page)){{($page->meta_title != '')? $page->meta_title : $page->title;}}@else{{old('title')}}@endif</span>
                                <div class="page-url-seo ws-nm">
                                    <p id="seo-section-link">{{url('/')}}@isset($page){{'/'.$page->slug}}@endisset{{old('slug')}}</p>
                                </div>
                                <div class="ws-nm">
                                    <span style="color: #70757a;">
                                        @isset($page)
                                        {{\Carbon\Carbon::parse($page->created_at)->format('M d, Y')}}
                                        @else
                                        {{\Carbon\Carbon::now()->format('M d, Y')}}
                                        @endisset - 
                                    </span>
                                    <span class="page-description-seo" id="seo-section-desc">@if(isset($page)){{($page->meta_description != '')? $page->meta_description : $page->short_description;}}@else{{old('short_desc')}}@endif</span>
                                </div>
                            </div>
                        </div>
                        <div class="seo-edit-section d-none">
                            <hr>
                            <div class="form-group mb-3">
                                <label for="seo_title" class="control-label"><b>SEO Title</b></label>
                                <input class="form-control" id="seo_title" placeholder="SEO Title" data-counter="120" value="@if(isset($page)){{$page->meta_title}}@else{{old('meta_title')}}@endif" name="meta_title" type="text">
                            </div>
                            @error('seo_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group mb-3">
                                <label for="seo_title" class="control-label"><b>SEO Keywords</b></label>
                                <input class="form-control" id="seo_keywords" data-role="tagsinput" placeholder="SEO Keywords ( , seperated )" data-counter="120" value="@if(isset($page)){{$page->meta_keywords}}@else{{old('meta_keywords')}}@endif" name="meta_keywords" type="text">
                            </div>
                            @error('seo_keywords')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group mb-3">
                                <label for="seo_description" class="control-label"><b>SEO description</b></label>
                                <textarea class="form-control" rows="3" id="seo_description" placeholder="SEO description" data-counter="160" name="meta_description" cols="50">@if(isset($page)){{$page->meta_description}}@else{{old('meta_description')}}@endif</textarea>
                            </div>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
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
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#PublishDateWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Publish Date </h6>
                            </button>
                        </h2>
                    </div>
                    <div id="PublishDateWidget" class="accordion-collapse collapse show">
                        <div class="card-body p-2">
                            <input type="date" value="@if(isset($page)){{\Carbon\Carbon::parse($page->created_at)->toDateString()}}@else{{old('created_at')}}@endif" name="created_at" class="form-control">
                            @error('created_at')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                @role('super-admin','admin')
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#AuthorWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Author <span class="text-danger">*</span></h6>
                            </button>
                        </h2>
                        <div id="AuthorWidget" class="accordion-collapse collapse show">
                            <div class="card-body p-2">
                                <select class="form-select" required name="user_id" aria-label="Default select example">
                                    @foreach ($users as $user)
                                    <option @if (isset($page) && $page->admin_id == $user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#categoryWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Categories <span class="text-danger">*</span></h6>
                            </button>
                        </h2>
                        <div id="categoryWidget" class="accordion-collapse collapse show">
                            <div class="card-body p-2">
                                <select class="form-select form-select-sm mb-3 multi-select" multiple data-placeholder="Select Categories" required id="parent" name="categories[]" aria-label=".form-select-sm example">
                                    <option disabled></option>
                                    @forelse ($categories as $cat)
                                        <option value="{{ $cat->id }}" @if(isset($page) && in_array($cat->id, $page->categories->pluck('id')->toArray())) selected @endif>{{ $cat->bread }} ({{$cat->slug}})</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('categories')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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
                                    <img src="@if(isset($page) && isset($page->newsImage->filename)){{asset('storage/media/'.$page->newsImage->filename)}}@else https://cms.botble.com/vendor/core/core/base/images/placeholder.png @endif" alt="Preview image" id="bannerPreview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
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
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#publishWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Status <span class="text-danger">*</span></h6>
                            </button>
                        </h2>
                        <div id="publishWidget" class="accordion-collapse collapse show">
                            <div class="card-body">
                                <select class="form-select" required name="is_published" aria-label="Default select example">
                                    <option @if (isset($page) && $page->is_published == 1) selected @endif @if (!isset($page)) selected @endif value="1">Published</option>
                                    <option @if (isset($page) && $page->is_published == 0) selected @endif value="0">Draft</option>
                                </select>
                                @error('is_published')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#formatWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Format <span class="text-danger">*</span></h6>
                            </button>
                        </h2>
                        <div id="formatWidget" class="accordion-collapse collapse show">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="default" name="format" @if (isset($page) && $page->format == 'default') checked @endif @if (!isset($page)) checked @endif id="flexRadioDefault1" >
                                    <label class="form-check-label" for="flexRadioDefault1">Default</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="video" name="format" @if (isset($page) && $page->format == 'video') checked @endif id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">Video</label>
                                </div>
                                @error('format')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#TagWidget" aria-expanded="true">
                                <h6 class="header-title m-0" style="font-weight: 600">Tags <span class="text-danger"></span></h6>
                            </button>
                        </h2>
                        <div id="TagWidget" class="accordion-collapse collapse show">
                            <div class="card-body">
                                <div class="mb-3 col-12">
                                    <label class="form-label">Select Tags</label>
                                    <select class="multiple-select" name="tags[]" data-placeholder="Choose anything" multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option @if(isset($page) && in_array($tag->id, $page->tags->pluck('id')->toArray())) selected @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <br><span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include('backpanel.includes.media-model')
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"> </script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@include('backpanel.includes.media-model-script')
<script>
function stringslug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase(); // remove accents, swap ñ for n, etc
    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes
    return str;
};
$(document).ready(function () {
    $('.multi-select').select2({
        theme: 'bootstrap4',
        multiple :true,
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
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
    menubar: "favs file edit view insert format tools table help",
    content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:16px; color: #333; }",
});

$(".card-container").draggable({
  handle: ".handle"
});

</script>
@endpush
