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
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
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

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul a:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul a {
            color: #93a3b5;
            font-size: 16px;
            font-weight: 500;
            padding: 5px 10px;
            display: block;
        }

        .profile-usermenu ul a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul a.active {
            border-bottom: none;
        }

        .profile-usermenu ul a.active {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }

        .dashboard-stat,
        .portlet {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
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
                {{-- <div class="container-fluid mx-auto px-0 mt-1">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="col-md-3 col-12 bg-primary w-100 p-4 text-center">
                            @isset(auth('web')->user()->details->avatar->filename)
                                <img loading="lazy"
                                    src="{{ asset('storage/media/' . auth('web')->user()->details->avatar->filename) }}"
                                    class="text-center img-fluid author-avatar" alt="">
                            @else
                                <img src="{{ asset('front-assets/img/user.png') }}" class="text-center img-fluid author-avatar"
                                    alt="" loading="lazy">
                            @endisset
                        </div>
                        <div class="col-md-9 col-12" style="background-color: #d8d8d8;">
                            <div class="col-12 px-1 text-center flag-author-border">
                                <span class="flag-color-news flag-color"><b>NEWS</b></span><span
                                    class="flag-color-15 flag-color"><b>15</b></span><span
                                    class="flag-color-india flag-color"><b>INDIA</b> </span>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="col-md-6 col-12 px-4 my-3 author-des">
                                    <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2"
                                        style="font-size:18px">
                                        <i class="mr-md-3 mr-2 fas fa-user"></i>
                                        <p class="text-secondary-clr m-0" style="font-size:18px">
                                            {{ auth('web')->user()->name }}
                                        </p>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2"
                                        style="font-size:18px">
                                        <i class="mr-md-3 mr-2 fas fa-envelope"></i>
                                        <p class="text-secondary-clr m-0" style="font-size:18px">
                                            {{ auth('web')->user()->email }}
                                        </p>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2"
                                        style="font-size:18px">
                                        <i class="mr-md-3 mr-2 fas fa-user-crown"></i>
                                        <p class="text-secondary-clr m-0" style="font-size:18px">
                                            {{ 'User' }}
                                        </p>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex text-secondary-clr mb-2"
                                        style="font-size:18px">
                                        <i class="mr-md-3 mr-2 fas fa-map-marker"></i>
                                        <p class="text-secondary-clr m-0" style="font-size:18px">
                                            {{ auth('web')->user()->details->city->name . ', ' . auth('web')->user()->details->country->name }}
                                        </p>
                                    </a>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-12 mb-2 mb-md-0">
                                        </div>
                                        <div class="col-md-12 mb-3 text-center mt-md-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row profile" style="font-size: 16px">
                    <div class="col-md-3">
                        <div class="profile-sidebar">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic text-center">
                                @isset(auth('web')->user()->details->avatar)
                                    <img loading="lazy"
                                        src="{{ asset('storage/user-avatars/' . auth('web')->user()->details->avatar) }}"
                                        class="text-center img-fluid author-avatar border" alt="">
                                @else
                                    <img src="{{ asset('front-assets/img/user.png') }}"
                                        class="text-center img-fluid author-avatar border" alt="" loading="lazy">
                                @endisset
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    {{ auth('web')->user()->name }}
                                </div>
                                <div class="profile-usertitle-job">
                                    {{ auth('web')->user()->email }}
                                </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons mb-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a hre="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="btn btn-primary btn-sm">Logout</a>
                                </form>
                                {{-- <button type="button" class="btn btn-success btn-sm">Follow</button>
                          <button type="button" class="btn btn-danger btn-sm">Message</button> --}}
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <div class="portlet light bordered m-0 rounded-0">
                                <div class="row list-separated justify-content-between">
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="uppercase profile-stat-title">
                                            {{ auth('web')->user()->followings->count() }} </div>
                                        <div class="uppercase profile-stat-text"> Followings </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="uppercase profile-stat-title">
                                            @if (auth('web')->user()->user_ip != null)
                                            {{ auth('web')->user()->user_ip->user_stats->count() }}
                                            @else
                                            0
                                            @endif
                                        </div>
                                        <div class="uppercase profile-stat-text"> Views </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="uppercase profile-stat-title">
                                            {{ auth('web')->user()->comments->count() }} </div>
                                        <div class="uppercase profile-stat-text"> Comments </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu m-0">
                                <ul class="nav flex-column border-0" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <li>
                                        <a type="button" class=" active" id="v-pills-home-tab" data-toggle="tab"
                                            data-target="#v-pills-home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true"><i class="fa fa-home"></i>Profile</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-content">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
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
                            </div>
                        </div>
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
