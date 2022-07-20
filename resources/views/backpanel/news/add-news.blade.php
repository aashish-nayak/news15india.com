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
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@push('css')
    <style>
        .bootstrap-tagsinput .badge {
            margin: 2px 4px;
            padding: 5px 8px;
            font-size: 75%;
            font-weight: 700;
        }

        .bootstrap-tagsinput .badge [data-role="remove"] {
            margin-left: 5px;
            cursor: pointer;
        }

        .img-box {
            background: #fff;
            border: 3px dashed #e8e8e8;
            color: #aaa;
            cursor: pointer;
            display: block;
            font-size: 22px;
            padding: 40px 0 26px;
            position: relative;
            text-align: center;
        }

        .img-box button {
            font-size: 14px;
            color: #555555;
            background: #cccccc;
        }

        .img-box span {
            font-size: 10px;
        }
        .btn-group-sm>.btn, .btn-sm{
            font-size: .800rem;
        }
        .btn i{
            margin-top: -20px;
            font-size: 1rem;
        }
        .category-input{
            max-height: 300px;
            overflow-y: scroll;
        }

        .card-container {
            position: fixed;
            width: 320px;
            height: 240px;
            margin: 0 auto;
            top: 0%;
            right: 0%;
            z-index: 999;
        }
        .card-container .card {
        
        box-sizing: border-box;
        position: relative;
        width: 100%;
        height: 100%;
        padding: 18px;
        background: White;
        box-shadow: 0 8px 0 #BCBBB9;
        transition: box-shadow 0.185s linear;
        }
        .card-container .card h1 {
        width: 180px;
        height: 24px;
        margin: 0;
        background: #BCBBB9;
        }
        .card-container .card p {
        width: 120px;
        height: 16px;
        background: #D0CFCE;
        }
        .card-container .handle {
        z-index: 1;
        position: absolute;
        right: 0;
        bottom: 0;
        width: 44px;
        height: 44px;
        }
        .card-container .handle .dots {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 8px;
        height: 8px;
        margin: 0 12px 12px 0;
        border-radius: 8px;
        background: #BCBBB9;
        transition: background-color 0.185s linear;
        }
        .card-container .handle .dots:before {
        position: absolute;
        content: "";
        bottom: 8px;
        width: 8px;
        height: 8px;
        margin: 0 8px 8px 0;
        border-radius: 8px;
        background: #BCBBB9;
        transition: background-color 0.185s linear;
        }
        .card-container .handle .dots:after {
        position: absolute;
        content: "";
        right: 8px;
        width: 8px;
        height: 8px;
        margin: 0 8px 8px 0;
        border-radius: 8px;
        background: #BCBBB9;
        transition: background-color 0.185s linear;
        }
        .card-container .handle:hover {
        cursor: all-scroll;
        }
        .card-container .handle:hover .dots {
        background: #A8A7A5;
        }
        .card-container .handle:hover .dots:before {
        background: #A8A7A5;
        }
        .card-container .handle:hover .dots:after {
        background: #A8A7A5;
        }
        .card-container > .handle:hover + .card {
        box-shadow: 0 8px 8px #A8A7A5;
        }
        .ui-draggable-dragging .handle .dots {
        background: #959492 !important;
        }
        .ui-draggable-dragging .handle .dots:before {
        background: #959492 !important;
        }
        .ui-draggable-dragging .handle .dots:after {
        background: #959492 !important;
        }
        .ui-draggable-dragging .card {
        box-shadow: 0 12px 8px #959492 !important;
        }
    </style>
@endpush

@section('sections')
{{-- Draggable Media Section  --}}
{{-- <div class="card-container">
    <div class="handle">
        <div class="dots"></div>
    </div>
    <div class="card">
        <h1></h1>
        <p></p>
    </div>
</div> --}}

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
                                <textarea name="short_desc" required placeholder="Short description" class="form-control" id="desc" rows="4">@if(isset($page)){{$page->short_description}}@else{{old('short_desc')}}@endif</textarea>
                                @error('short_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01" class="form-label"><b>Content</b></label>
                                <textarea name="content" class="text-editor">@if(isset($page))@php
                                    echo $page->content;
                                @endphp @else{{ html_entity_decode(old('content')) }}@endif</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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
                                    <span style="color: #70757a;">Mar 24, 2022 - </span>
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
                    <div class="card-body">
                        <button type="submit" name="save_btn" value="save_btn" class="btn btn-sm btn-primary"><i class="bx bx-save"></i>Publish</button>
                        <button type="submit" name="edit_btn" value="edit_btn" class="btn btn-sm btn-success ms-3"><i class="bx bx-edit"></i>Save&Edit</button>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Author <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <select class="form-select" required name="user_id" aria-label="Default select example">
                            <option @if (isset($page) && $page->user_id == 1) selected @endif @if (!isset($page)) selected @endif value="1">Admin </option>
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Status <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <select class="form-select" required name="is_published" aria-label="Default select example">
                            <option @if (isset($page) && $page->status == 1) selected @endif @if (!isset($page)) selected @endif value="1">Published</option>
                            <option @if (isset($page) && $page->status == 0) selected @endif value="0">Draft</option>
                        </select>
                        @error('is_published')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Categories <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body category-input">
                        <ul>
                            @foreach ($categories as $item)
                            <li>
                                <div class="form-check">
                                    <input type="checkbox" name="categories[]" @if(isset($page) && in_array($item->id, $page->category->pluck('id')->toArray())) checked @endif value="{{$item->id}}" class="form-check-input parent-cat" id="customCheck{{$item->id}}">
                                    <label class="form-check-label" for="customCheck{{$item->id}}">{{$item->cat_name}}</label>
                                </div>
                                @if (count($item->children)>0)
                                <ul>
                                    @foreach($item->children as $sub_cat)
                                        <li class="ml-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="categories[]" @if(isset($page) && in_array($sub_cat->id, $page->category->pluck('id')->toArray())) checked @endif value="{{$sub_cat->id}}" class="form-check-input sub-cat" id="customCheck{{$sub_cat->id}}">
                                                <label class="form-check-label" for="customCheck{{$sub_cat->id}}">{{$sub_cat->cat_name}}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @error('categories')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Primary Image <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="preview-image-wrapper ">
                            <img src="@if(isset($page) && isset($page->img->img)){{asset('storage/media/'.$page->img->img)}}@else https://cms.botble.com/vendor/core/core/base/images/placeholder.png @endif" alt="Preview image" id="banner-preview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
                            <a href="javascript:void(0)" class="btn_remove_image" id="banner-img-id" title="Remove image">X
                            </a>
                        </div><br>
                        <input type="hidden" required name="image" id="banner_data" value="@isset($page){{$page->image}}@endisset">
                        <a href="javascript:void(0)" id="banner-img">Choose Image</a>
                        @error('image')
                            <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card mt-3 col-12">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Tags <span class="text-danger"></span></h6>
                    </div>
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
    </form>
</div>
@include('backpanel.includes.media-model')
@endsection
@push('scripts')
@if (Session::has('success'))
<script>
    $(document).ready(function () {
        Swal.fire(
            'Successful!',
            "{{ Session::get('success') }}",
            'success'
        )
    });
</script>
@endisset
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
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
    $(document).on("click",".parent-cat",function() {
        var child = $(this).parent().next().children().find('.sub-cat');
        $(child).prop("checked", $(this).prop("checked"));
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
        $("#link-cancel").on("click",function(){
            $("#link-edit").removeClass("d-none");
            $("#slug").html(val);
        });
        $("#link-save").on("click",function(){
            $("#link-edit").removeClass("d-none");
            $("#slug").html(stringslug($("#edit-link").val()));
            $("#slug-input").val($("#edit-link").val());
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
    selector: ".text-editor",
    encoding: 'xml',
    height: 400,
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
    content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px; color: #7c8ea7; }",
});

$(".card-container").draggable({
  handle: ".handle"
});

</script>
@endpush
