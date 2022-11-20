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
<link rel="stylesheet" href="{{asset('assets/plugins/richtexteditor/rte_theme_default.css')}}">
@endpush
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase d-inline-block align-self-center">{{$title}}</h6>
        <div class="d-flex align-items-center justify-content-center">
            {{-- <a type="button" id="fullscreen"><i class="bx bx-fullscreen fs-4 fw-bolder"></i></a> --}}
            <a href="{{route('admin.news.view-all-news')}}" class="btn btn-primary btn-sm ms-5">View News</a>
        </div>
    </div>
    <hr class="my-2">
    <form class="needs-validation" action="{{route('admin.news.store')}}" method="POST" role="form">
        <div class="row">
            <div class="col-lg-9">
                <div class="card radius-10">
                    <div class="card-body">
                        @csrf
                        @isset($page) <input type="hidden" name="id" value="{{$page->id}}"> @endisset
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="form-title" class="form-label"><b>Title</b><span class="text-danger">*</span></label>
                                <input type="text" name="title" placeholder="Name" required class="form-control titletoslug" id="form-title" value="@if(isset($page)){{$page->title}}@else{{old('title')}}@endif">
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
                                <label for="desc" class="form-label"><b>Short Description</b> <span class="text-danger">*</span></label>
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
                                    <label class="form-check-label fw-bold ps-2" for="flexSwitchCheckDefault">Is Breaking?</label>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="contentEditor" class="form-label"><b>Content</b></label>
                                <textarea name="content" id="contentEditor" class="text-editor" style="min-height: 500px;max-height:800px;">@if(isset($page))@php
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
                            <label class="form-label" for="youtube_url">Youtube Video URL</label>
                            <input type="url" class="form-control" value="@isset($page){{$page->youtube_url}}@else{{old('youtube_url')}}@endisset" name="youtube_url" id="youtube_url" placeholder="Ex: https://www.youtube.com/watch?v=FN7ALfpGxiI">
                        </div>
                        @error('youtube_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                        <h6 class="header-title m-0" style="font-weight: 600">Publish Date</h6>
                    </div>
                    <div class="card-body p-2">
                        <input type="date" value="@if(isset($page)){{\Carbon\Carbon::parse($page->created_at)->toDateString()}}@else{{old('created_at')}}@endif" name="created_at" class="form-control">
                        @error('created_at')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Status <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body p-2">
                        <select class="form-select" required name="is_published" aria-label="Default select example">
                            <option @if (isset($page) && $page->is_published == 1) selected @endif @if (!isset($page)) selected @endif value="1">Published</option>
                            <option @if (isset($page) && $page->is_published == 0) selected @endif value="0">Draft</option>
                        </select>
                        @error('is_published')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @role('super-admin','admin')
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Author <span class="text-danger">*</span></h6>
                    </div>
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
                @endrole
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Categories <span class="text-danger">*</span></h6>
                    </div>
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
                                <img src="@if(isset($page) && $page->image != ''){{asset('storage/media/'.$page->newsImage->filename)}}@else https://cms.botble.com/vendor/core/core/base/images/placeholder.png @endif" alt="Preview image" id="bannerPreview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
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
                        <h6 class="header-title m-0" style="font-weight: 600">Format <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body p-2">
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
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="header-title m-0" style="font-weight: 600">Tags <span class="text-danger"></span></h6>
                    </div>
                    <div class="card-body p-2">
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
{{-- <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"> </script> --}}
<script src="{{ asset('assets/plugins/richtexteditor/rte.js') }}"> </script>
<script src="{{ asset('assets/plugins/richtexteditor/plugins/all_plugins.js') }}"> </script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@include('backpanel.includes.media-model-script')
<script>

$(document).ready(function () {
    if ($(window).width() < 720) {
        $("#publishCard").toggleClass('position-fixed top-0 start-0 end-0 mt-3');
        $("#publishCard").attr('style','z-index:5')
    }
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
function initRichText(element) {
    var editor1cfg = {};
    editor1cfg.toolbar = "mytoolbar";
    editor1cfg.svgCode_menu_justify = `<svg viewBox="-2 -2 20 20" fill="#5F6368" style="width: 100%; height: 100%; margin: 0px; border: 0px; align-self: self-start;"><path d="M2 12.5a.5.5 0 01.5-.5h7a.5.5 0 010 1h-7a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5z" clip-rule="evenodd"></path></svg>`;
    editor1cfg.svgCode_media = `<svg viewBox="-2 -2 20 20" fill="#5F6368" style="width: 100%; height: 100%; margin: 0px; border: 0px; align-self: self-start;"><path fill-rule="evenodd" d="M14.002 2h-12a1 1 0 00-1 1v10a1 1 0 001 1h12a1 1 0 001-1V3a1 1 0 00-1-1zm-12-1a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V3a2 2 0 00-2-2h-12z" clip-rule="evenodd"></path><path fill="#666666" d="M10.648 7.646a.5.5 0 01.577-.093L15.002 9.5V14h-14v-2l2.646-2.354a.5.5 0 01.63-.062l2.66 1.773 3.71-3.71z"></path><path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"></path></svg>`;
    editor1cfg.toolbar_mytoolbar = "{bold,italic,underline,forecolor,backcolor}|{paragraphs:toggle,fontname:toggle,fontsize:toggle}|{menu_justify,insertorderedlist,insertunorderedlist,indent,outdent,insertblockquote,insertemoji} #{preview,fullscreenenter,fullscreenexit} /{removeformat,cut,copy,paste,delete,find}|{insertlink,insertchars,inserttable,media,insertvideo,insertcode}|{code,selectall} #{undo,redo,togglemore}";
    editor1cfg.subtoolbar_justify = 'justifyleft,justifycenter,justifyright,justifyfull';
    editor1cfg.editorResizeMode = "none";
    editor1cfg.subtoolbar_more = "{strike,superscript,subscript,ucase,lcase,inserthorizontalrule,html2pdf,insertdate} #{save,print}";
    editor1cfg.skin = "rounded-corner";
    editor1cfg.enableDragDrop = true;
    editor1cfg.showFloatParagraph = false;
    editor1cfg.toolbar_mobile = "{bold,italic,underline} #{paragraphs:toggle,fontname:toggle,fontsize:toggle}/{menu_justify,insertorderedlist,insertunorderedlist} #{undo,redo,fullscreenenter,fullscreenexit,togglemore}";
    editor1cfg.subtoolbar_more_mobile = "{insertlink,insertchars,inserttable,media,insertvideo,insertemoji,preview}/{removeformat,cut,copy,paste,find,code,selectall}";
    var editor1 = new RichTextEditor(element, editor1cfg);
    editor1.attachEvent("exec_command_media", function (state, cmd, value) {
		state.returnValue = false;//set it has been handled
        $("#media-box").modal("show");
        $("#media-box").find("#insert").attr('id','insert2');
        $("#media-box").find("#media-row").attr('id','media-row2');
		
	});
    $(document).on('click','#insert2',function(){
        $("#media-box").find("#insert2").attr('id','insert');
        $("#media-box").find("#media-row2").attr('id','media-row');
        let selected = $(document).find("#MediaList .file-selected")[0];
        var img=editor1.document.createElement("IMG");
        img.style.cssText = "display:inline-block;max-width:200px";
        img.src=$(selected).data('path');
        editor1.insertElement(img);        
        $("#media-box").modal("hide");
        $(document).find("#MediaList .file").removeClass('file-selected');
    });
    
    $(document).on('dblclick','#media-row2 .file',function () {
        $("#media-box").find("#insert2").attr('id','insert');
        $("#media-box").find("#media-row2").attr('id','media-row');
        let selected = $(document).find("#MediaList .file-selected")[0];
        var img=editor1.document.createElement("IMG");
        img.style.cssText = "display:inline-block;max-width:200px";
        img.src=$(selected).data('path');          
        editor1.insertElement(img);        
        $("#media-box").modal("hide");
        $(document).find("#MediaList .file").removeClass('file-selected');
    });
}
initRichText("#contentEditor");
</script>
@endpush
