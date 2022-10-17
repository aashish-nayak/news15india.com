@extends('layouts.frontend.master')
@section('meta-tags')
    @meta([
        'title' => 'Profile - ' . auth('web')->user()->name,
        'prefix' => ' - ' . setting('site_name'),
        'description' => auth('web')->user()->about,
        'image' => setting('site_log'),
        'image_alt' => auth('web')->user()->name,
        'type' => 'Profile',
        'auhtor' => auth('web')->user()->name,
    ])
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/css/select.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/dashboard.css') }}">
@endpush
@section('sections')
    <main class="container-fluid mx-auto position-relative">
        <div class="row">
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto px-0 text-center">
                @includeIf('components.advert',[
                    'img' => asset('front-assets/img/banner.png'),
                    'url' => 'javascript:void(0)',
                    'alt' => 'News15India',
                ])
            </section>
            <!-- Ad Banner  -->
            <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-2 order-md-1">
                <div class="sticky-top" style="z-index:1">
                    @includeIf('components.whatsapp-ad')
                    <div class="ad-box my-2">
                        @includeIf('components.advert',[
                            'img' => asset('front-assets/img/square-ad.png'),
                            'url' => 'javascript:void(0)',
                            'alt' => 'News15India',
                        ])
                    </div>
                    @includeIf('components.poll')
                </div>
            </aside>
            <div class="col-md-9 col-12 px-1 pr-md-1 order-1 order-md-2">
                <div class="profile" style="font-size: 16px">
                    <div class="profile-sidebar">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-5 profile-userpic text-center">
                                <img src="{{ auth('web')->user()->getAvatar() }}" class="text-center img-fluid  border" alt="" loading="lazy">
                            </div>
                            <div class="col-md-3 col-7 profile-usertitle">
                                <div class="profile-usertitle-name">
                                    {{ auth('web')->user()->name }}
                                </div>
                                <div class="profile-usertitle-job">
                                    {{ auth('web')->user()->email }}
                                </div>
                                <div class="profile-userbuttons d-flex justify-content-center">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a hre="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="btn btn-primary btn-sm">Logout</a>
                                    </form>
                                    @if ($submitted == true && $data->admin_id != '' && $data->admin->status != 0)
                                    <a href="{{route('redirect.dashboard')}}" class="btn btn-success btn-sm ml-2">Dashboard</a>
                                    @endif
                                    {{-- <button type="button" class="btn btn-danger btn-sm">Message</button> --}}
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
                                        type="button" role="tab" aria-controls="reporter"
                                        aria-selected="false">Reporter Application</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="complaint-tab" data-toggle="tab" data-target="#complaint"
                                        type="button" role="tab" aria-controls="complaint"
                                        aria-selected="false">Complaint Box</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="surveys-tab" data-toggle="tab" data-target="#surveys"
                                        type="button" role="tab" aria-controls="surveys"
                                        aria-selected="false">Surveys</button>
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
                                <div class="tab-pane fade" id="complaint" role="tabpanel" aria-labelledby="complaint-tab">
                                    <div class="col-12">
                                        <div class="row">
                                            <form action="{{route('user.complaint.store')}}" method="POST" class="col-md-4 border">
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
                                                            <textarea name="complaint_message" class="form-control" rows="6" placeholder="write your complaint message here...">{{old('message')}}</textarea>
                                                        </div>
                                                        @error('complaint_message')
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
                                                        @forelse (auth('web')->user()->complaints()->latest()->get() as $key => $complaint)
                                                        @php
                                                            $show = ($key == 0) ? 'show' : '';
                                                        @endphp
                                                        <div class="card">
                                                            <div class="card-header" id="compaint-heading-{{$key}}">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                                                        data-target="#compaint-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                                        <span>{{$complaint->subject}}</span>
                                                                        <small class="float-right pt-2 text-dark">{{date('h:i A | d M y',strtotime($complaint->created_at))}}</small>
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            
                                                            <div id="compaint-{{$key}}" class="collapse {{$show}}" aria-labelledby="compaint-heading-{{$key}}" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    @if ($complaint->link != '')
                                                                    <span class="text-dark">Complaint Link:</span><br>
                                                                    <small><a href="{{$complaint->link}}" target="_blank">{{$complaint->link}}</a></small> <br>
                                                                    @endif
                                                                    <span class="text-dark">Complaint Message:</span>
                                                                    <p class="mb-4" style="color:#a5a5a5 !important">{{$complaint->complaint_message}}</p>
                                                                    @foreach ($complaint->replies as $reply)
                                                                    <div class="border-top position-relative mb-4 ml-4">
                                                                        <span class="reply-date border">{{($reply->reference->id == auth('web')->id()) ? 'You' : 'Admin'}}</span>
                                                                        <span class="reply-date border" style="right:0px">{{date('h:i A | d M y',strtotime($reply->created_at))}}</span>
                                                                        <p class="mt-4 mb-3">{{$reply->reply}}</p>
                                                                    </div>
                                                                    @endforeach
                                                                    <a type="button" class="btn btn-sm mt-3 py-0" style="font-size: 13px;background-color: #dddddd;" data-complaint="{{$complaint->id}}" id="replyModalBtn">
                                                                        Reply
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <h6 class="py-md-4">No Complaints</h6>
                                                            </div>
                                                        </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="surveys" role="tabpanel" aria-labelledby="surveys-tab">
                                    <div class="col-12">
                                        <a href="{{route('poll')}}" class="btn btn-sm btn-primary mb-3">All Surveys</a>
                                        <table id="surveys-table" class="table table-bordered table-sm w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Voted Option</th>
                                                    <th class="text-center">Vote Date</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                @foreach ($surveys as $key => $survey)
                                                <tr>
                                                    <td scope="row">{{$key+1}}</td>
                                                    <td>{{$survey->poll->question}}</td>
                                                    <td>{{$survey->name}}</td>
                                                    <td class="text-center">
                                                        @php
                                                            $str = strtotime($survey->pivot->created_at);
                                                        @endphp
                                                        <span class="py-1 border-bottom border-success">{{date('h:i A',$str)}}</span> <br>
                                                        <span class="py-1">{{date('d M y',$str)}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>
                <!-- Ad Banner  -->
                <section class="container-fluid my-md-1 mt-1 mx-auto px-0 text-center">
                    @includeIf('components.advert',[
                        'img' => asset('front-assets/img/banner.png'),
                        'url' => 'javascript:void(0)',
                        'alt' => 'News15India',
                    ])
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
<form action="{{route('user.complaint.store-reply')}}" method="post">
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="complaint_id" id="form-complaint-id">
                    <div class="form-group">
                        <textarea name="reply" id="" class="form-control" rows="6" placeholder="Write Your Reply"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="{{asset('assets/plugins/limonte-sweetalert2/sweetalert2.all.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
@if ($submitted == false)
<script src="{{ asset('front-assets/js/dashboard.js') }}"></script>
@endif
<script>
    $(document).ready(function () {
        $(document).on('click',"#replyModalBtn",function(){
            $("#form-complaint-id").val($(this).data('complaint'));
            $("#replyModal").modal('show');
        });
        $("#surveys-tab").one('click',function(){
            setTimeout(() => {
                $("#surveys-table").DataTable({
                    responsive : true,
                    scrollX : true,
                    "columnDefs": [
                        { "width": "5%", "targets": 0 },
                        { "width": "55%", "targets": 1 },
                        { "width": "20%", "targets": 2 },
                        { "width": "20%", "targets": 3 },
        
                    ]
                });
            }, 500);
        });
    });
</script>
@if (Session::has('success'))
<script>
    $(document).ready(function() {
        Swal.fire(
            'Successful!',
            "{{ Session::get('success') }}",
            'success'
        )
    });
</script>
@endif
@if (Session::has('error'))
<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ Session::get('error') }}"
        })
    });
</script>
@endif
@endpush
