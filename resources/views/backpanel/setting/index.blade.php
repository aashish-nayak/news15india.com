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
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-selected="true">
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
                                <a class="nav-link" data-bs-toggle="tab" href="#tab5" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Home Page</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab6" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-grid-alt font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Category Page</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab7" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-news font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Single Page</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab8" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-user-circle font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Author Page</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab9" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon">
                                            <i class="bx bx-hash font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Tag Page</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST" role="form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Site Name</label>
                                            <input type="text" name="site_name" class="form-control" value="{{setting('site_name')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Site URL</label>
                                            <input type="text" name="site_url" class="form-control" value="{{setting('site_url')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Web Description</label>
                                            <textarea name="site_description" class="form-control" rows="3">{{setting('site_description')}}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Meta Keyword</label>
                                            <textarea name="site_keyword" class="form-control" rows="3">{{setting('site_keyword')}}</textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputFirstName" class="form-label fw-bold">Copyright Footer</label>
                                            <textarea name="site_copyright" class="form-control" rows="6">{{setting('site_copyright')}}</textarea>
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST"  role="form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="inputFirstName" class="form-label fw-bold">Street</label>
                                            <input type="text" name="site_address" class="form-control" value="{{setting('site_address')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Country</label>
                                            <input type="text" name="site_country" class="form-control" value="{{setting('site_country')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">State</label>
                                            <input type="text" name="site_state" class="form-control" value="{{setting('site_state')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">City</label>
                                            <input type="text" name="site_city" class="form-control" value="{{setting('site_city')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Postal Code</label>
                                            <input type="text" name="site_pincode" class="form-control" value="{{setting('site_pincode')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Email</label>
                                            <input type="email" name="site_email" class="form-control" value="{{setting('site_email')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName" class="form-label fw-bold">Phone</label>
                                            <input type="text" name="site_phone" class="form-control" value="{{setting('site_phone')}}">
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <h6 class="form-label fw-bold">App Dwonload</h6>
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text px-2 py-0"><i class="bx bxl-play-store fs-5"></i></span>
                                                        <input type="url" required name="play_store_app_link"class="form-control" value="{{setting('play_store_app_link')}}" placeholder="Play Store Link" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text px-2 py-0"><i class="lni lni-app-store fs-5"></i></span>
                                                        <input type="url" required name="apple_store_app_link"class="form-control" value="{{setting('apple_store_app_link')}}" placeholder="Apple Store Link" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <h6 class="form-label fw-bold">Social Media</h6>
                                            @php
                                                $socials = json_decode(setting('site_social_links'));
                                            @endphp
                                            <select class="multi-select" id="socials" multiple>
                                                <option {{(isset($socials->youtube))?'selected':''}} value="youtube">YouTube</option>
                                                <option {{(isset($socials->facebook))?'selected':''}} value="facebook">Facebook</option>
                                                <option {{(isset($socials->twitter))?'selected':''}} value="twitter">Twitter</option>
                                                <option {{(isset($socials->instagram))?'selected':''}} value="instagram">Instagram</option>
                                                <option {{(isset($socials->linkedin))?'selected':''}} value="linkedin">LinkedIn</option>
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
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST" role="form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" name="site_logo" value="{{setting('site_logo')}}">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">FrontEnd Logo</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="{{setting('site_logo') ?? 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'}}" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" name="site_favicon" value="{{setting('site_favicon')}}">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">FrontEnd Favicon</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="{{setting('site_favicon') ?? 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'}}" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" name="admin_logo" value="{{setting('admin_logo')}}">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">Admin Logo</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="{{setting('admin_logo') ?? 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'}}" class="img-fluid" alt="">
                                                    <div class="imgbox-action">
                                                        <a href="javascript:void(0)" class="removeImage"><i class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="insert-image" data-bs-toggle="modal" data-bs-target="#media-box">Choose Image</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="imgbox">
                                                <input type="hidden" class="form-control" name="admin_favicon" value="{{setting('admin_favicon')}}">
                                                <div class="imgbox-title">
                                                    <label for="frontLogo" class="form-label fw-bold">Admin Favicon</label>
                                                </div>
                                                <div class="preview-wrapper">
                                                    <img src="{{setting('admin_favicon') ?? 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'}}" class="img-fluid" alt="">
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
                                <form class="needs-validation" action="{{ route('admin.setting.store') }}" method="POST" role="form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Google Analytics ID</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bxl-google fs-5"></i></span>
                                                <input type="text" class="form-control" name="google_analytics_id" value="{{setting('google_analytics_id')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Analytics View ID</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bx-line-chart fs-5"></i></span>
                                                <input type="text" class="form-control" name="google_analytics_view_id" value="{{setting('google_analytics_view_id')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold">Google Captcha</label>
                                            <div class="">
                                                <div class="form-check form-check-inline cursor-pointer">
                                                    <input type="radio" class="form-check-input cursor-pointer" @if(setting('google_captcha') == 1) checked @endif name="google_captcha" id="inlineRadio1" value="1">
                                                    <label class="form-check-label cursor-pointer" for="inlineRadio1">On</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input cursor-pointer" @if(setting('google_captcha') == 0) checked @endif name="google_captcha" id="inlineRadio2" value="0">
                                                    <label class="form-check-label cursor-pointer" for="inlineRadio2">Off</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Captcha Site Key</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bxl-google fs-5"></i></span>
                                                <input type="text" class="form-control" name="google_captcha_site_key" value="{{setting('google_captcha_site_key')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Captcha Secret Key</label>
                                            <div class="input-group">
                                                <span class="input-group-text px-2 py-0"><i class="bx bxl-google fs-5"></i></span>
                                                <input type="text" class="form-control" name="google_captcha_secret_key" value="{{setting('google_captcha_secret_key')}}">
                                            </div>
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab5" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.page-setting-store') }}" method="POST" role="form">
                                    @csrf
                                    <input type="hidden" name="page_setting" value="home_page_settings" />
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <div class="row g-2">
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[0]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[0]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[1]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[1]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[2]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[2]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 4</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[3]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[3]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 5</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[4]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[4]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 6</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[5]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[5]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 7</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[6]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[6]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 8</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[7]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[7]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 9</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[8]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[8]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 10 Block 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[9]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[9]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 10 Block 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[10]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[10]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section 10 Block 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'edit'=>$homeSections->sections[11]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sections_limit[]" min="0" value="{{$homeSections->sections_limit[11]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row g-2">
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$homeSections->sidebars[0]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$homeSections->sidebars_limit[0]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$homeSections->sidebars[1]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$homeSections->sidebars_limit[1]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$homeSections->sidebars[2]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$homeSections->sidebars_limit[2]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 4</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$homeSections->sidebars[3]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$homeSections->sidebars_limit[3]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 5</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$homeSections->sidebars[4]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$homeSections->sidebars_limit[4]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab6" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.page-setting-store') }}" method="POST" role="form">
                                    @csrf
                                    <input type="hidden" name="page_setting" value="category_page_settings">
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <div class="row g-2">
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label fw-bold">News Limit Per Page</label>
                                                    <input type="number" required class="form-control" name="news_per_page" min="0" value="{{$categoryPageSetting->news_per_page}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Bottom Section</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'bottom_section','edit'=>$categoryPageSetting->bottom_section])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="bottom_section_limit" min="0" value="{{$categoryPageSetting->bottom_section_limit}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row g-2">
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$categoryPageSetting->sidebars[0]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$categoryPageSetting->sidebars_limit[0]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$categoryPageSetting->sidebars[1]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$categoryPageSetting->sidebars_limit[1]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$categoryPageSetting->sidebars[2]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$categoryPageSetting->sidebars_limit[2]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab7" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.page-setting-store') }}" method="POST" role="form">
                                    @csrf
                                    <input type="hidden" name="page_setting" value="single_page_settings">
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <div class="row g-2">
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label fw-bold">Category News Limit</label>
                                                    <input type="number" required class="form-control" name="category_news_limit" min="0" value="{{$singlePageSetting->category_news_limit}}">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label fw-bold">Related News Limit</label>
                                                    <input type="number" required class="form-control" name="related_news_limit" min="0" value="{{$singlePageSetting->related_news_limit}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Bottom Section</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'bottom_section','edit'=>$singlePageSetting->bottom_section])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="bottom_section_limit" min="0" value="{{$singlePageSetting->bottom_section_limit}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row g-2">
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$singlePageSetting->sidebars[0]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$singlePageSetting->sidebars_limit[0]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$singlePageSetting->sidebars[1]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$singlePageSetting->sidebars_limit[1]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$singlePageSetting->sidebars[2]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$singlePageSetting->sidebars_limit[2]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 4</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$singlePageSetting->sidebars[3]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$singlePageSetting->sidebars_limit[3]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab8" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.page-setting-store') }}" method="POST" role="form">
                                    @csrf
                                    <input type="hidden" name="page_setting" value="author_page_settings">
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <div class="row g-2">
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label fw-bold">News Limit Per Page</label>
                                                    <input type="number" required class="form-control" name="news_per_page" min="0" value="{{$authorPageSetting->news_per_page}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Section</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'section','edit'=>$authorPageSetting->section])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="section_limit" min="0" value="{{$authorPageSetting->section_limit}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row g-2">
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$authorPageSetting->sidebars[0]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$authorPageSetting->sidebars_limit[0]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$authorPageSetting->sidebars[1]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$authorPageSetting->sidebars_limit[1]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$authorPageSetting->sidebars[2]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$authorPageSetting->sidebars_limit[2]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 4</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$authorPageSetting->sidebars[3]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$authorPageSetting->sidebars_limit[3]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab9" role="tabpanel">
                                <form class="needs-validation" action="{{ route('admin.setting.page-setting-store') }}" method="POST" role="form">
                                    @csrf
                                    <input type="hidden" name="page_setting" value="tag_page_settings">
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <div class="row g-2">
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label fw-bold">News Limit Per Page</label>
                                                    <input type="number" required class="form-control" name="news_per_page" min="0" value="{{$tagPageSetting->news_per_page}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Bottom Section</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'bottom_section','edit'=>$tagPageSetting->bottom_section])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="bottom_section_limit" min="0" value="{{$tagPageSetting->bottom_section_limit}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row g-2">
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 1</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$tagPageSetting->sidebars[0]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$tagPageSetting->sidebars_limit[0]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 2</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$tagPageSetting->sidebars[1]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$tagPageSetting->sidebars_limit[1]}}">
                                                </div>
                                                <div class="col-md-9 mb-2">
                                                    <label class="form-label fw-bold">Sidebar 3</label>
                                                    @includeIf('backpanel.setting.categories', ['categories' => $categories,'name'=>'sidebars[]','edit'=>$tagPageSetting->sidebars[2]])
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label fw-bold">Limit</label>
                                                    <input type="number" required class="form-control" name="sidebars_limit[]" value="{{$tagPageSetting->sidebars_limit[2]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
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
            <input type="url" required placeholder="https://youtube.com/example/video" class="form-control" value="{{isset(json_decode(setting('site_social_links'))->youtube)?json_decode(setting('site_social_links'))->youtube:''}}" name="site_social_links[youtube]">
        </div>
    </div>
</script>
<script type="template" id="facebook">
    <div class="col-md-6" id="facebook-input">
        <label class="form-label fw-bold">Facebook URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-facebook fs-5"></i></span>
            <input type="url" required placeholder="https://facebook.com/example/user" class="form-control" value="{{isset(json_decode(setting('site_social_links'))->facebook)?json_decode(setting('site_social_links'))->facebook:''}}" name="site_social_links[facebook]">
        </div>
    </div>
</script>
<script type="template" id="twitter">
    <div class="col-md-6" id="twitter-input">
        <label class="form-label fw-bold">Twitter URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-twitter fs-5"></i></span>
            <input type="url" required placeholder="https://twitter.com/example/user" class="form-control" value="{{isset(json_decode(setting('site_social_links'))->twitter)?json_decode(setting('site_social_links'))->twitter:''}}" name="site_social_links[twitter]">
        </div>
    </div>
</script>
<script type="template" id="instagram">
    <div class="col-md-6" id="instagram-input">
        <label class="form-label fw-bold">Instagram URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-instagram fs-5"></i></span>
            <input type="url" required placeholder="https://instagram.com/example/user" class="form-control" value="{{isset(json_decode(setting('site_social_links'))->instagram)?json_decode(setting('site_social_links'))->instagram:''}}" name="site_social_links[instagram]">
        </div>
    </div>
</script>
<script type="template" id="linkedin">
    <div class="col-md-6" id="linkedin-input">
        <label class="form-label fw-bold">LinkedIn URL</label>
        <div class="input-group">
            <span class="input-group-text px-2 py-0"><i class="bx bxl-linkedin fs-5"></i></span>
            <input type="url" required placeholder="https://linkedin.com/example/user" class="form-control" value="{{isset(json_decode(setting('site_social_links'))->linkedin)?json_decode(setting('site_social_links'))->linkedin:''}}" name="site_social_links[linkedin]">
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
    $('.multi-select').select2({
        theme: 'bootstrap4',
        multiple: true,
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $(document).ready(function() {
        function socialInputs() {
            var html = '';
            $.each($("#socials").val(), function (index, element) { 
                var template = $('#' + element).html();
                html += template;
            });
            $('#socials-inputs').html(html);
        }
        socialInputs();
        $("#socials").on('change', function() {
            socialInputs();
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
