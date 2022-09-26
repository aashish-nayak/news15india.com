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
    <link rel="stylesheet" href="{{ asset('front-assets/css/dashboard.css') }}">
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
                                    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reporter-tab" data-toggle="tab" data-target="#reporter"
                                        type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Reporter Application</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="complaint-tab" data-toggle="tab" data-target="#complaint"
                                        type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Complaint Box</button>
                                </li>
                            </ul>
                            <div class="tab-content my-3" id="myTabContent">
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                    @if ($submitted == false)
                                    @includeIf('components.appform-wizard')
                                    @else
                                    <div class="container py-5">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div id="tracking-pre"></div>
                                                <div id="tracking">
                                                    <div class="tracking-list d-md-flex">
                                                        @php
                                                            $doneicon = 'status-intransit';
                                                            $donelist = 'tracking-item';
                                                            $currenticon = 'status-current blinker';
                                                            $currentlist = 'tracking-item';
                                                            $pendingicon = 'status-intransit';
                                                            $pendinglist = 'tracking-item-pending';
                                                            if($data->app_status == 'pending'){
                                                                $doneicon = 'status-current blinker';
                                                                $donelist = 'tracking-item';
                                                                $currenticon = 'status-intransit';
                                                                $currentlist = 'tracking-item-pending';
                                                                $pendingicon = 'status-intransit';
                                                                $pendinglist = 'tracking-item-pending';
                                                            }elseif ($data->app_status == 'processing') {
                                                                $doneicon = 'status-intransit';
                                                                $donelist = 'tracking-item';
                                                                $currenticon = 'status-current blinker';
                                                                $currentlist = 'tracking-item';
                                                                $pendingicon = 'status-intransit';
                                                                $pendinglist = 'tracking-item-pending';
                                                            }else{
                                                                $doneicon = 'status-intransit';
                                                                $donelist = 'tracking-item';
                                                                $currenticon = 'status-intransit';
                                                                $currentlist = 'tracking-item';
                                                                $pendingicon = 'status-intransit';
                                                                $pendinglist = 'tracking-item';
                                                            }
                                                        @endphp
                                                        <div class="{{$donelist}}">
                                                            <div class="tracking-icon {{$doneicon}}">
                                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="tracking-date">
                                                                <i class="far fa-user-edit process-icon"></i>
                                                            </div>
                                                            <div class="tracking-content">Form Submitted<span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->updated_at)->format('d M Y, h:i A')}}</span></div>
                                                        </div>
                                                        <div class="{{$currentlist}}">
                                                            <div class="tracking-icon {{$currenticon}}">
                                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="tracking-date">
                                                                <i class="far fa-spinner process-icon"></i>
                                                            </div>
                                                            <div class="tracking-content">Data Checking in Process<span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->updated_at)->format('d M Y, h:i A')}}</span></div>
                                                        </div>
                                                        <div class="{{$pendinglist}}">
                                                            <div class="tracking-icon {{$pendingicon}}">
                                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="tracking-date">
                                                                @if ($data->app_status == 'rejected')
                                                                <i class="far fa-times-circle process-icon"></i>
                                                                @else
                                                                <i class="far fa-check-circle process-icon"></i>
                                                                @endif
                                                            </div>
                                                            @if ($data->app_status == 'rejected')
                                                            <div class="tracking-content">Application Rejected<span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->updated_at)->format('d M Y, h:i A')}}</span></div>
                                                            @else
                                                            <div class="tracking-content">Application Done<span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->updated_at)->format('d M Y, h:i A')}}</span></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade show active" id="complaint" role="tabpanel" aria-labelledby="complaint-tab">
                                    <div class="col-12">
                                        <div class="row">
                                            <form action="" class="col-md-4 border">
                                                @csrf
                                                <h4 class="text-center px-3 py-2 text-dark mb-3" style="background-color: #dddddd;margin: 0px -15px;">Write Your Complaint</h3>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="profile_details_text">Name Of Complainant:</label>
                                                            <input type="text" name="name" class="form-control" value="@if(old('name')){{old('name')}}@else{{auth('web')->user()->name}}@endif" required placeholder="Complainant Name">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="profile_details_text">Complaint Subject:</label>
                                                            <select name="subject" class="form-control">
                                                                <option value="News Related">News Related</option>
                                                                <option value="Survey Related">Survey Related</option>
                                                                <option value="Advertisement Related">Advertisement Related</option>
                                                                <option value="User Data Related">User Data Related</option>
                                                            </select>
                                                        </div>
                                                        @error('subject')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="profile_details_text">Complaint Link: </label>
                                                            <input type="text" name="link" class="form-control" value="{{old('link')}}" required placeholder="News Link, Advertisement Number, Survey Link :">
                                                        </div>
                                                        @error('link')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="profile_details_text">Complaint Message :</label>
                                                            <textarea name="message" class="form-control" rows="6" placeholder="write your complaint message here...">{{old('message')}}</textarea>
                                                        </div>
                                                        @error('message')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <button type="submit" class="btn btn-sm btn-success px-4">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-md-8">
                                                <div class="border position-relative mt-3">
                                                    <div class="d-inline-block px-3 py-1 complaint-replies-header">
                                                        <h5 class="m-0">All Complaints</h5>
                                                    </div>
                                                    <div class="accordion mt-4 accordion-height" id="accordionExample">
                                                        @foreach (range(1,15) as $key => $complent)
                                                        @php
                                                            $show = ($key == 0) ? 'show' : '';
                                                        @endphp
                                                        <div class="card">
                                                            <div class="card-header" id="compaint-heading-{{$key}}">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                                                        data-target="#compaint-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                                        Collapsible Group Item #1
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            
                                                            <div id="compaint-{{$key}}" class="collapse {{$show}}" aria-labelledby="compaint-heading-{{$key}}" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <span class="text-dark">Compaint Message:</span>
                                                                    <p class="mb-4" style="color:#a5a5a5 !important">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit commodi accusamus, quae similique excepturi iste voluptas officia pariatur rem quidem veniam praesentium provident corporis aliquam. Aliquid harum minima saepe eius.</p>
                                                                    @foreach (range(1,5) as $reply)
                                                                    <div class="border-top position-relative mb-4 ml-4">
                                                                        <span class="reply-date">20.7.2022</span>
                                                                        <span class="reply-date" style="right:0px">Admin</span>
                                                                        <p class="mt-4 mb-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, atque?</p>
                                                                    </div>
                                                                    @endforeach
                                                                    <a type="button" class="btn btn-sm mt-3 py-0" style="font-size: 13px;background-color: #dddddd;" data-toggle="modal" data-target="#replyModal">
                                                                        Reply
                                                                      </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Reply</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea name="" id="" class="form-control" rows="6" placeholder="Write Your Reply"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    @if ($submitted == false)
    <script src="{{ asset('front-assets/js/dashboard.js') }}"></script>
    @endif
@endpush
