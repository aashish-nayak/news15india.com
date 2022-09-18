@extends('layouts.frontend.master')
@section('meta-tags')
    @meta([
        'title' => 'Profile - ' . auth('web')->user()->name,
        'prefix' => ' - ' . setting('site_name'),
        'description' => auth('web')->user()->about,
        'image' => setting('site_log'),
        'image_alt' => auth('web')->user()->name,
        'type' => 'User',
        'auhtor' => auth('web')->user()->name,
    ])
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.css') }}" />
    <style>
        body {
            background: #F1F3FA;
        }

        .profile-content .form-control,
        .profile-content .btn {
            font-size: 1.6rem;
        }

        /* Profile container */
        .profile {
            margin: 4px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 110px;
            height: 110px;
            object-fit: cover;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: auto;
        }

        .dashboard-stat,
        .portlet {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
        }
        .profile-usermenu .nav-tabs .nav-link{
            background-color: transparent;
            color: #333;
            font-weight: 500;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }
        .profile-usermenu .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
            background-color: transparent;
            color: #333;
            border-color: #dee2e6 #dee2e6 #fff;
        }
        .portlet {
            margin-top: 0;
            margin-bottom: 25px;
            padding: 0;
            border-radius: 4px;
        }

        .portlet.bordered {
            border-left: 2px solid #e6e9ec !important;
        }

        .portlet.light {
            padding: 12px 20px 15px;
            background-color: #fff;
        }

        .portlet.light.bordered {
            border: 1px solid #e7ecf1 !important;
        }

        .list-separated {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .profile-stat {
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-stat-title {
            color: #7f90a4;
            font-size: 25px;
            text-align: center;
        }

        .uppercase {
            text-transform: uppercase !important;
        }

        .profile-stat-text {
            color: #5b9bd1;
            font-size: 10px;
            font-weight: 600;
            text-align: center;
        }

        .profile-desc-title {
            color: #7f90a4;
            font-size: 17px;
            font-weight: 600;
        }

        .profile-desc-text {
            color: #7e8c9e;
            font-size: 14px;
        }

        .margin-top-20 {
            margin-top: 20px !important;
        }

        [class*=" fa-"]:not(.fa-stack),
        [class*=" glyphicon-"],
        [class*=" icon-"],
        [class^=fa-]:not(.fa-stack),
        [class^=glyphicon-],
        [class^=icon-] {
            display: inline-block;
            line-height: 14px;
            -webkit-font-smoothing: antialiased;
        }

        .profile-desc-link i {
            width: 22px;
            font-size: 19px;
            color: #abb6c4;
            margin-right: 5px;
        }


        @media screen and (max-width: 992px) {
            /* .profile-userpic img {
                height: 150px;
                object-fit: cover;
            } */
        }

        .sw.sw-justified>.nav .nav-link, .sw.sw-justified>.nav>li {
            flex-basis: fit-content;
        }
        .auto-height{
            height: auto !important;
        }
    </style>
@endpush
@section('sections')
    <main class="container-fluid mx-auto position-relative">
        <div class="row">
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img loading="lazy" src="{{ asset('front-assets/img/banner.png') }}"
                        class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
            <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-2 order-md-1">
                <div class="sticky-top" style="z-index:1">
                    @includeIf('components.whatsapp-ad')
                    <div class="ad-box my-2">
                        <p class="m-0 text-center bg-secondary text-light" style="font-size:1.2rem">Advertisement</p>
                        <div class="box">
                            <a href="javascript:void(0)"><img src="{{ asset('front-assets/img/square-ad.png') }}"
                                    style="height: 250px;object-fit:cover;" class="w-100" loading="lazy"
                                    alt=""></a>
                        </div>
                    </div>
                    @includeIf('components.poll')
                </div>
            </aside>
            <div class="col-md-9 col-12 px-1 pr-md-1 order-1 order-md-2">
                <div class="profile" style="font-size: 16px">
                    <div class="profile-sidebar">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-5 profile-userpic text-center">
                                @isset(auth('web')->user()->details->avatar)
                                    @php
                                        $avatar = auth('web')->user()->details->avatar;
                                        $default = 'https://eu.ui-avatars.com/api/?name=' . auth('web')->user()->name . '&size=250';
                                        if (Storage::exists('public/users-avatar/' . $avatar)) {
                                            $avatar = asset('storage/users-avatar/' . $avatar);
                                        } else {
                                            $avatar = $default;
                                        }
                                    @endphp
                                    <img loading="lazy" src="{{ $avatar }}" class="text-center img-fluid  border"
                                        alt="">
                                @else
                                    <img src="{{ asset('front-assets/img/user.png') }}" class="text-center img-fluid  border"
                                        alt="" loading="lazy">
                                @endisset
                            </div>
                            <div class="col-md-3 col-7 profile-usertitle">
                                <div class="profile-usertitle-name">
                                    {{ auth('web')->user()->name }}
                                </div>
                                <div class="profile-usertitle-job">
                                    {{ auth('web')->user()->email }}
                                </div>
                                <div class="profile-userbuttons">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a hre="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="btn btn-primary btn-sm">Logout</a>
                                    </form>
                                    {{-- <button type="button" class="btn btn-success btn-sm">Follow</button>
                                    <button type="button" class="btn btn-danger btn-sm">Message</button> --}}
                                </div>
                            </div>
                            <div class="col-md-3 portlet light m-0 ">
                                <div class="row list-separated justify-content-between">
                                    <div class="col-4">
                                        <div class="uppercase profile-stat-title">
                                            {{ auth('web')->user()->followings->count() }} </div>
                                        <div class="uppercase profile-stat-text"> Followings </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="uppercase profile-stat-title">
                                            @if (auth('web')->user()->user_ip != null)
                                                {{ auth('web')->user()->user_ip->user_stats->count() }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                        <div class="uppercase profile-stat-text"> Views </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="uppercase profile-stat-title">
                                            {{ auth('web')->user()->comments->count() }} </div>
                                        <div class="uppercase profile-stat-text"> Comments </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-content mt-3">
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu m-0">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-toggle="tab" data-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reporter-tab" data-toggle="tab" data-target="#reporter"
                                        type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Reporter Application</button>
                                </li>
                            </ul>
                            <div class="tab-content my-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <h3 class="text-center">Edit Personal Information</h3>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Full Name:</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{auth('web')->user()->name}}" required>
                                                </div>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Email Address:</label>
                                                    <input type="email" name="email" readonly class="form-control"
                                                        value="{{auth('web')->user()->email}}" required>
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Mobile Number:</label>
                                                    <input type="tel" name="phone_number" class="form-control"
                                                        value="{{auth('web')->user()->details->phone_number}}" required pattern=[0-9]{10}>
                                                </div>
                                                @error('phone_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">WhatsApp Number:</label>
                                                    <input type="tel" name="whatsapp_number" class="form-control" value="{{auth('web')->user()->details->whatsapp_number}}" pattern=[0-9]{10}>
                                                </div>
                                                @error('whatsapp_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Gender:</label>
                                                    <select name="gender" class="form-control">
                                                        <option {{(auth('web')->user()->details->gender == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                                        <option {{(auth('web')->user()->details->gender == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                                    </select>
                                                </div>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Profile Image:</label>
                                                    <input type="file" name="avatar" accept="image/*">
                                                </div>
                                                @error('avatar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Address:</label>
                                                    <input type="text" name="address" class="form-control"
                                                        value="{{auth('web')->user()->details->address}}" >
                                                </div>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Pincode:</label>
                                                    <input type="text" name="zip" class="form-control"
                                                        value="{{auth('web')->user()->details->zip}}">
                                                </div>
                                                @error('zip')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">Country:</label>
                                                    <select name="country" class="form-control" required data-edit="{{auth('web')->user()->details->country_id}}">
                                                        <option selected disabled>Select Country</option>
                                                    </select>
                                                    @error('country')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">State:</label>
                                                    <select name="state" class="form-control" required data-edit="{{auth('web')->user()->details->state_id}}">
                                                        <option selected disabled>Select Country First</option>
                                                    </select>
                                                    @error('state')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="profile_details_text">City:</label>
                                                    <select name="city" class="form-control" required data-edit="{{auth('web')->user()->details->city_id}}">
                                                        <option selected disabled>Select State First</option>
                                                    </select>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="reporter" role="tabpanel" aria-labelledby="reporter-tab">
                                    @includeIf('components.appform-wizard')
                                </div>
                            </div>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>
                <!-- Ad Banner  -->
                <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                    <a href="javascript:void(0)"><img loading="lazy" src="{{ asset('front-assets/img/banner.png') }}"
                            class="w-100 banner-height" alt="" srcset=""></a>
                </section>
                <!-- Ad Banner  -->
                @isset($poll)
                    <div class="container-fluid mx-auto">
                        <div class="row row-cols-md-2 row-cols-1">
                            @includeIf('components.poll', ['poll' => $poll])
                        </div>
                    </div>
                @endisset
                <!-- Ad Banner  -->
            </div>
        </div>
    </main>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
    <script>
        
        function dateToYears(that,changeInput = "#age") {
            let dob = new Date($(that).val());
            let today = new Date();
            let age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $(changeInput).val(age);
        }
        $(function() {
            "use strict";
            $(document).ready(function() {
                $("input[name='is_journalist']").on('change',function () {
                    $("#reporter-experience").toggleClass('d-none', $(this).val());
                    $("#reporter-experience input[name='organization_name']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-experience select[name='organization_type']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-experience select[name='designation']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-experience input[name='start_journalism']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                });
                $("input[name='is_personal_office']").on('change',function () {
                    $("#reporter-office").toggleClass('d-none', $(this).val());
                    $("#reporter-office input[name='office_address']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office input[name='office_tehsil_block']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office select[name='office_country_id']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office select[name='office_state_id']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office select[name='office_city_id']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office input[name='office_zip']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
                });
                $('.dropify').dropify({
                    messages: {
                        'default': 'Drag and drop a file here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong appended.'
                    },
                    error: {
                        'fileSize': 'The file size is too big (2M max).'
                    },
                });
                // Toolbar extra buttons
                var btnFinish = $('<button></button>').attr('type', 'submit').text('Finish').addClass(
                    'btn btn-info sw-btn-group-extra d-none').on('click', function() {
                    alert('Finish Clicked');
                });
                $("#reporter-tab").click(function (e) {
                    setTimeout(() => {
                        $(document).find('#smartwizard').smartWizard({
                            selected: 0,
                            theme: 'arrows',
                            transition: {
                                animation: 'slide-horizontal',
                            },
                            toolbarSettings: {
                                toolbarPosition: "top",
                                toolbarExtraButtons: [btnFinish]
                            },
                        });
                    }, 500);
                });
                $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                    if ($('button.sw-btn-next').hasClass('disabled')) {
                        $('button.sw-btn-next').hide();
                        $('.sw-btn-group-extra').removeClass('d-none');
                        $("#smartwizard .tab-content").addClass('auto-height');
                    } else {
                        $('button.sw-btn-next').show();
                        $('.sw-btn-group-extra').addClass('d-none');
                        $("#smartwizard .tab-content").removeClass('auto-height');
                    }
                });
                $('header a,footer a,#mySidenav a').on('click', function (e) {
                    e.preventDefault();
                    if(confirm('Are you sure want to Leave this page?')){
                        window.location.href = $(this).attr('href');
                    }
                    return false;
                });
                $("#dob").on('change',function (e) {
                    dateToYears(this,'#age')
                });
                $("#Start-Journalism").on('change',function (e) {
                    dateToYears(this,'#Total-Experience')
                });
            });
        });
    </script>
@endpush
