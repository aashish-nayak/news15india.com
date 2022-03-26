@extends('layouts.backpanel.master')
@section('title', 'Add News')
@push('plugin-css')
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
    </style>
@endpush

@section('sections')
    <div class="col-12">
        <h6 class="mb-0 text-uppercase">Add News</h6>
        <hr>
        <form class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label"><b>Title</b><span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" placeholder="Name" required
                                        class="form-control titletoslug" id="validationCustom01" value="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label"><b>Permalink : </b><span
                                            class="text-danger">*</span>
                                    </label> <span class="ml-2"><a style="text-decoration: underline" href="javascript:void(0)">{{ url('/') }}/<b id="slug"></b></a></span><button id="link-edit" type="button" class="btn btn-sm btn-secondary py-0 px-1 ms-2 d-none">Edit</button>
                                    <input type="hidden" id="slug-input" required name="slug" value="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label"><b>Description</b></label>
                                    <textarea name="short_desc" placeholder="Short description" class="form-control" id="" rows="4"></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label"><b>Content</b><span
                                            class="text-danger">*</span></label>
                                    <textarea name="content" class="text-editor"></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
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
                                    <span class="page-title-seo" id="seo-section-title"></span>
                                    <div class="page-url-seo ws-nm">
                                        <p id="seo-section-link">{{url('/')}}</p>
                                    </div>
                                    <div class="ws-nm">
                                        <span style="color: #70757a;">Mar 24, 2022 - </span>
                                        <span class="page-description-seo">asdasdasdasdasd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="seo-edit-section d-none">
                                <hr>
                                <div class="form-group mb-3">
                                    <label for="seo_title" class="control-label"><b>SEO Title</b></label>
                                    <input class="form-control" id="seo_title" placeholder="SEO Title" data-counter="120"
                                        name="seo_meta[seo_title]" type="text">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description" class="control-label"><b>SEO description</b></label>
                                    <textarea class="form-control" rows="3" id="seo_description" placeholder="SEO description" data-counter="160"
                                        name="seo_meta[seo_description]" cols="50"></textarea>
                                </div>
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
                            <button type="button" class="btn btn-sm btn-primary"><i class="bx bx-save"></i>Save</button>
                            <button type="button" class="btn btn-sm btn-success ms-3"><i class="bx bx-edit"></i>Save&Edit</button>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="header-title m-0" style="font-weight: 600">Status <span class="text-danger">*</span></h6>
                        </div>
                        <div class="card-body">
                            <select class="form-select" aria-label="Default select example">
                                <option selected value="1">Published</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="header-title m-0" style="font-weight: 600">Categories <span class="text-danger">*</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Category 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">Category 2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">Category 3</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                <label class="form-check-label" for="flexCheckDefault4">Category 4</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                <label class="form-check-label" for="flexCheckDefault5">Category 5 Category 5</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                                <label class="form-check-label" for="flexCheckDefault6">Category 6</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                                <label class="form-check-label" for="flexCheckDefault7">Category 7</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                                <label class="form-check-label" for="flexCheckDefault8">Category 8</label>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="header-title m-0" style="font-weight: 600">Banner Image <span class="text-danger">*</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="preview-image-wrapper">
                                <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" alt="Preview image" class="preview_image" width="150">
                                <a class="btn_remove_image" title="Remove image">
                                    <i class="fa lni lni-close"></i>
                                </a>
                            </div><br>
                            <a href="javascript:void(0)">Choose Image</a>
                        </div>
                    </div>
                    <div class="card mt-3 col-12">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="header-title m-0" style="font-weight: 600">Tags <span class="text-danger">*</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 col-12">
                                <label class="form-label">Select Tags</label>
                                <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
                                    <option value="United States" selected>United States</option>
                                    <option value="United Kingdom" selected>United Kingdom</option>
                                    <option value="Afghanistan" selected>Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"> </script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
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
    $(document).on("keyup", ".titletoslug", function() {
        let slug = stringslug($(this).val());
        $("#slug").html(slug);
        $("#slug-input").val($("#slug").html());
        $("#link-edit").removeClass("d-none");
        let baseurl = "{{url('/')}}/";
        $("#seo-section-link").html(baseurl + $("#slug").html());
        $(".seo-preview").removeClass("d-none");
        $("#seo-section-title").html(slug);
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
            $("#slug").html($("#edit-link").val());
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
</script>
@endpush
