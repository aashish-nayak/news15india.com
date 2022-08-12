@extends('layouts.backpanel.master')
@section('title', 'Settings')
@section('sections')
    @push('css')
        <style>
            .nav-pills .nav-link.active,
            .nav-pills .show>.nav-link {
                color: #0d6efd;
                background-color: #fff;
                border-color: #0d6efd transparent #0d6efd #0d6efd;
            }

            .nav-pills .nav-link {
                border: 1px solid;
                border-right: 0px;
                border-radius: 30px 0px 0px 30px;
                border-color: transparent;
            }

            .nav-pills.flex-column .nav-link {
                /* border-bottom-left-radius: 0.25rem; */
                border-top-right-radius: 0;
                margin-right: -1px;
            }
            .imgbox .preview-wrapper{
                width: 100%;
                height: 200px;
                position: relative;
                border: 1px dashed var(--primary);
                margin-bottom: 10px;
            }
            .imgbox .preview-wrapper img{
                width: 100%;
                height: 100%;
                object-fit: scale-down;
            }
            .imgbox .preview-wrapper .imgbox-action{
                position: absolute;
                top: 3%;
                width: 100%;
                right: 2%;
                z-index: 1;
                text-align: end;
                cursor: pointer;
            }
            .imgbox .preview-wrapper .imgbox-action a{
                font-size: 20px;
                color: #f3f3f3;
                background-color: #c90000;
                border-radius: 30px;
                padding: 2px 6px;
            }
            .imgbox .preview-wrapper .imgbox-action a:hover{
                background-color: var(--primary);
                color: #fff;
            }
        </style>
    @endpush
    <div class="col-12 mb-5 mx-auto">
        <div class="col-12 d-flex justify-content-between">
            <h4 class="mb-0 text-uppercase d-inline-block">Settings</h4>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row align-items-start justify-content-between">
                    <div class="col-md-3">
                        <ul class="nav flex-column nav-pills nav-primary border-end border-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab1" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-info-circle font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Web Information</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Web Contact</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab3" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-image-add font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Web Properties</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-cog font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Web Config</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab5" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Home Page</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab1" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST"
                                    role="form">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Site Name</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Web URL</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Web Description</label>
                                            <textarea name="" class="form-control" id="" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Meta Keyword</label>
                                            <textarea name="" class="form-control" id="" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputFirstName" class="form-label fw-bold">Copyright
                                                Footer</label>
                                            <textarea name="" class="form-control" id="" rows="6"></textarea>
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST"  role="form">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="inputFirstName" class="form-label fw-bold">Street</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Country</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">State</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">City</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Postal Code</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Email</label>
                                            <input type="email" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Phone</label>
                                            <input type="text" class="form-control" id="inputFirstName">
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold">Social Media</label>
                                            <select class="single-select" id="socials">
                                                <option value="youtube">YouTube</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="instagram">Instagram</option>
                                                <option value="linkedin">LinkedIn</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="row g-4" id="socials-inputs">

                                            </div>
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST"
                                    role="form">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" value="">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">FrontEnd Logo</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" value="">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">FrontEnd Favicon</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" value="">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">Admin Logo</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" value="">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">Admin Favicon</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST"
                                    role="form">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Google Analytics ID</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bxl-google fs-5"></i></span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Analytics View ID</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bx-line-chart fs-5"></i></span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold">Google Captcha</label>
                                            <div class="">
                                                <div class="form-check form-check-inline cursor-pointer">
                                                    <input type="radio" checked class="form-check-input cursor-pointer" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label cursor-pointer" for="inlineRadio1">On</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input cursor-pointer" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label cursor-pointer" for="inlineRadio2">Off</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Captcha Site Key</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bxl-google fs-5"></i></span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Captcha Secret Key</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bxl-google fs-5"></i></span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade active show" id="tab5" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST" role="form">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold">Live Video Link</label>
                                            <input type="text" class="form-control" name="" >
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold">Main Box 2</label>
                                            <input type="text" class="form-control" name="" >
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold">Main Box 3</label>
                                            <input type="text" class="form-control" name="" >
                                        </div>
                                        <div class="col-md-7">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Section 1</label>
                                                <select class="single-select">
                                                    <option value="youtube">YouTube</option>
                                                    <option value="facebook">Facebook</option>
                                                    <option value="twitter">Twitter</option>
                                                    <option value="instagram">Instagram</option>
                                                    <option value="linkedin">LinkedIn</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label fw-bold">Sidebar 1</label>
                                            <select class="single-select">
                                                <option value="youtube">YouTube</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="instagram">Instagram</option>
                                                <option value="linkedin">LinkedIn</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backpanel.includes.media-model')
@endsection
@push('scripts')
@include('backpanel.includes.media-model-script',['module_script'=>false])
<script type="template" id="youtube">
    <div class="col-md-6" id="youtube-input">
        <label class="form-label fw-bold">YouTube URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-youtube fs-5"></i></span>
            <input type="url" placeholder="https://youtube.com/example/video" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <span class="input-group-text px-2 py-0 cursor-pointer remove-input"><i class="bx bx-x fs-5"></i></span>
        </div>
    </div>
</script>
<script type="template" id="facebook">
    <div class="col-md-6" id="facebook-input">
        <label class="form-label fw-bold">Facebook URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-facebook fs-5"></i></span>
            <input type="url" placeholder="https://facebook.com/example/user" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <span class="input-group-text px-2 py-0 cursor-pointer remove-input"><i class="bx bx-x fs-5"></i></span>
        </div>
    </div>
</script>
<script type="template" id="twitter">
    <div class="col-md-6" id="twitter-input">
        <label class="form-label fw-bold">Twitter URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-twitter fs-5"></i></span>
            <input type="url" placeholder="https://twitter.com/example/user" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <span class="input-group-text px-2 py-0 cursor-pointer remove-input"><i class="bx bx-x fs-5"></i></span>
        </div>
    </div>
</script>
<script type="template" id="instagram">
    <div class="col-md-6" id="instagram-input">
        <label class="form-label fw-bold">Instagram URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-instagram fs-5"></i></span>
            <input type="url" placeholder="https://instagram.com/example/user" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <span class="input-group-text px-2 py-0 cursor-pointer remove-input"><i class="bx bx-x fs-5"></i></span>
        </div>
    </div>
</script>
<script type="template" id="linkedin">
    <div class="col-md-6" id="linkedin-input">
        <label class="form-label fw-bold">LinkedIn URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-linkedin fs-5"></i></span>
            <input type="url" placeholder="https://linkedin.com/example/user" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <span class="input-group-text px-2 py-0 cursor-pointer remove-input"><i class="bx bx-x fs-5"></i></span>
        </div>
    </div>
</script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        multiple: false,
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $(document).ready(function() {
        $("#socials").on('change', function() {
            var social = $(this).val();
            var template = $('#' + social).html();
            if ($('#socials-inputs').find('#' + social + '-input').length == 0) {
                $('#socials-inputs').append(template);
            }
            $(this).val('');
        });
        $(document).on('click', '.remove-input', function() {
            $(this).closest('div.col-md-6').remove();
        });

        var ele = '';
        function insertImage(that) {
            let selected = $(document).find("#MediaList .file-selected")[0];
            let img = $(selected).data('path');
            $(that).parent().find('input').val(img);
            $(that).parent().find('img').attr('src',img);
            $("#media-box").modal("hide");
        }
        $(document).on('click', '.insert-image', function() {
            ele = this;
        });
        $(document).on('click','#insert',function(){
            insertImage(ele);
        });
        $(document).on('dblclick','.file',function () {
            insertImage(ele);
        });
        $(".removeImage").on("click",function () {
            $(this).closest('.imgbox').find('input').val('');
            $(this).closest('.imgbox').find('.preview-wrapper > img').attr('src','https://cms.botble.com/vendor/core/core/base/images/placeholder.png');
        });
    });
</script>
@endpush
