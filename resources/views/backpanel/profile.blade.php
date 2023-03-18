@extends('layouts.backpanel.master')
@section('title','Profile')
@section('sections')
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{auth('admin')->user()->getAvatar()}}" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{auth('admin')->user()->name}}</h4>
                                <p class="text-secondary mb-1">{{implode(',',auth('admin')->user()->roles->pluck('name')->toArray())}}</p>
                                <p class="text-muted font-size-sm">{{auth('admin')->user()->details->city->name}}, {{auth('admin')->user()->details->state->name}}</p>
                                {{-- <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-outline-primary">Message</button> --}}
                            </div>
                        </div>
                        <hr class="my-4">
                        <p class="p-2">{{auth('admin')->user()->details->about}}</p>
                        <ul class="list-group list-group-flush">
                            @if(auth('admin')->user()->details->website)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-globe me-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>Website</h6>
                                <span class="text-secondary">{{auth('admin')->user()->details->website}}</span>
                            </li>
                            @endif
                            @if(auth('admin')->user()->details->facebook)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook me-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">{{str_replace('https://www.facebook.com/','',auth('admin')->user()->details->facebook)}}</span>
                            </li>
                            @endif
                            @if(auth('admin')->user()->details->instagram)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram me-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">{{str_replace('https://www.instagram.com/','',auth('admin')->user()->details->instagram)}}</span>
                            </li>
                            @endif
                            @if(auth('admin')->user()->details->twitter)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter me-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">{{'@'.str_replace('https://twitter.com/','',auth('admin')->user()->details->twitter)}}</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="{{route('admin.profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name <i class="text-danger">*</i></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required name="name" class="form-control" value="@if(old('name')){{old('name')}}@elseif(auth('admin')->check()){{auth('admin')->user()->name}}@endif">
                                </div>
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" readonly value="{{auth('admin')->user()->email}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone <i class="text-danger">*</i></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required name="phone" minlength="9" maxlength="15" class="form-control" value="@if(old('phone')){{old('phone')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->phone}}@endif">
                                </div>
                                @error('phone')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" class="form-control" value="@if(old('address')){{old('address')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->address}}@endif">
                                </div>
                                @error('address')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <select name="country_id" data-edit="101" class="d-none country" required>
                                </select>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State <i class="text-danger">*</i></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="state_id" class="form-control state" data-edit="@if(old('state_id')){{old('state_id')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->state_id}}@endif" required>
                                    </select>
                                    @error('state_id')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City <i class="text-danger">*</i></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="city_id" class="form-control city" data-edit="@if(old('city_id')){{old('city_id')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->city_id}}@endif" required>
                                        <option>Select State First</option>
                                    </select>
                                    @error('city_id')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ZipCode <i class="text-danger">*</i></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="number" required class="form-control" name="zip" value="@if(old('zip')){{old('zip')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->zip}}@endif">
                                    @error('zip')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Profile Pic</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" class="form-control" name="avatar" accept="image/*">
                                    @error('avatar')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea name="about" class="form-control" rows="3">@if(old('about')){{old('about')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->about}}@endif</textarea>
                                </div>
                                @error('about')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Facebook</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="url" name="facebook" class="form-control" value="@if(old('facebook')){{old('facebook')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->facebook}}@endif" placeholder="https://www.facebook.com"/>
                                </div>
                                @error('facebook')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Instagram</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="url" name="instagram" class="form-control" value="@if(old('instagram')){{old('instagram')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->instagram}}@endif" placeholder="https://www.instagram.com"/>
                                </div>
                                @error('instagram')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Twitter</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="url" name="twitter" class="form-control" value="@if(old('twitter')){{old('twitter')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->twitter}}@endif" placeholder="https://www.twitter.com"/>
                                </div>
                                @error('twitter')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Website</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="url" name="website" class="form-control" value="@if(old('website')){{old('website')}}@elseif(auth('admin')->check()){{auth('admin')->user()->details->website}}@endif" placeholder="https://www.website.com"/>
                                </div>
                                @error('website')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@includeIf('vendor.worlddata.ajax-script')
@endpush