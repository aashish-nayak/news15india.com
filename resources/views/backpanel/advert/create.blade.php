@extends('layouts.backpanel.master')
@isset($edit)
@php
    $title = 'Edit Advertisement';
@endphp
@else
@php
    $title = 'Add Advertisement';
@endphp
@endisset
@section('title', $title)
@push('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.css') }}" />
<style>
    .dropify-wrapper .dropify-message span.file-icon {
        font-size: 30px;
        color: #CCC;
    }
    
    input {
        position: relative;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        background-position: right;
        background-size: auto;
        cursor: pointer;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 50%;
        width: auto;
        transform: translate(-3%,-50%)
    }
</style>
@endpush
@section('sections')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase d-inline-block align-self-center">{{$title}}</h6>
        <div class="d-flex align-items-center justify-content-center">
            <a href="{{route('admin.advert.index')}}" class="btn btn-primary btn-sm ms-5">View Advertisements</a>
        </div>
    </div>
    <hr class="my-2">
    <form class="needs-validation" action="{{route('admin.advert.store')}}" enctype="multipart/form-data" method="POST" role="form">
        <div class="card radius-10">
            <div class="card-body">
                @csrf
                @isset($edit)
                    <input type="hidden" name="id" value="{{$edit->id}}">
                @endisset
                <div class="row justify-content-start align-items-center">
                    <div class="col-12 position-relative mb-3">
                        <hr>
                        <label for="" class="form-label custom-label-float" style="top: 0%">Personal & Address Details</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="advertiser_name" class="form-label"><b>Advertiser Name</b><span class="text-danger">*</span></label>
                        <input type="text" name="advertiser_name" placeholder="Enter Advertiser Name" required class="form-control" id="advertiser_name" value="@if(old('advertiser_name')){{old('advertiser_name')}}@elseif(isset($edit)){{$edit->advertiser_name}}@endif">
                        @error('advertiser_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="advertiser_number" class="form-label"><b>Advertiser Mobile Number</b><span class="text-danger">*</span></label>
                        <input type="tel" maxlength="12" minlength="10" name="advertiser_number" placeholder="Enter Advertiser Mobile Number" autocomplete="tel" required class="form-control" id="advertiser_number" value="@if(old('advertiser_number')){{old('advertiser_number')}}@elseif(isset($edit)){{$edit->advertiser_number}}@endif">
                        @error('advertiser_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="advertiser_email" class="form-label"><b>Advertiser E-Mail</b><span class="text-danger">*</span></label>
                        <input type="email" name="advertiser_email" placeholder="Enter Advertiser E-Mail" required class="form-control" id="advertiser_email" value="@if(old('advertiser_email')){{old('advertiser_email')}}@elseif(isset($edit)){{$edit->advertiser_email}}@endif">
                        @error('advertiser_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="billing_name" class="form-label"><b>Billing Name</b><span class="text-danger">*</span></label>
                        <input type="text" name="billing_name" placeholder="Enter Billing Name" required class="form-control" id="billing_name" value="@if(old('billing_name')){{old('billing_name')}}@elseif(isset($edit)){{$edit->billing_name}}@endif">
                        @error('billing_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="billing_address" class="form-label"><b>Billing Address</b></label>
                        <input type="text" name="billing_address" placeholder="Enter Billing Address" class="form-control" id="billing_address" value="@if(old('billing_address')){{old('billing_address')}}@elseif(isset($edit)){{$edit->billing_address}}@endif">
                        @error('billing_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="block" class="form-label"><b>Block</b></label>
                        <input type="text" name="block" placeholder="Enter Block" class="form-control" id="block" value="@if(old('block')){{old('block')}}@elseif(isset($edit)){{$edit->block}}@endif">
                        @error('block')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <select name="country" data-edit="101" class="d-none country" required>
                    </select>
                    <div class="col-md-3 mb-3">
                        <label for="state" class="form-label"><b>State</b><span class="text-danger">*</span></label>
                        <select name="state" class="form-control state" data-edit="@if(old('state')){{old('state')}}@elseif(isset($edit)){{$edit->state_id}}@else{{'33'}}@endif" required>
                        </select>
                        @error('state')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="district" class="form-label"><b>District</b><span class="text-danger">*</span></label>
                        <select name="city" class="form-control city" data-edit="@if(old('city')){{old('city')}}@elseif(isset($edit)){{$edit->city_id}}@endif" required>
                            <option>Select State First</option>
                        </select>
                        @error('city')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="pincode" class="form-label"><b>Area Pin Code</b><span class="text-danger">*</span></label>
                        <input type="text" name="pincode" placeholder="Enter Pin Code Number" maxlength="6" required class="form-control" id="pincode" value="@if(old('pincode')){{old('pincode')}}@elseif(isset($edit)){{$edit->pincode}}@endif">
                        @error('pincode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 position-relative mb-3">
                        <hr>
                        <label for="" class="form-label custom-label-float" style="top: 0%">Advertisement Details</label>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="form-title" class="form-label w-100"><b>Package Details</b><span class="text-danger">*</span></label>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="package" id="normal" value="normal" @if ((old('package') && old('package') == 'normal') || (isset($edit) && $edit->package == 'normal')) checked @endif @if (old('package') && !isset($edit)) checked @endif>
                                <label class="form-check-label" for="normal">Normal Advertisement</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="package" id="monthly" value="monthly" @if ((old('package') && old('package') == 'monthly') || (isset($edit) && $edit->package == 'monthly')) checked @endif>
                                <label class="form-check-label" for="monthly">Monthly Advertisement</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="package" id="special" value="special" @if ((old('package') && old('package') == 'special') || (isset($edit) && $edit->package == 'special')) checked @endif>
                                <label class="form-check-label" for="special">Special Package</label>
                            </div>
                        </div>
                        @error('package')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 d-none d-md-block"></div>
                    <div class="col-md-3 mb-3">
                        <label for="ad_type" class="form-label"><b>Advertisement Type</b><span class="text-danger">*</span></label>
                        <select name="ad_type" class="form-control" id="ad_type" required>
                            <option value="">Select Ad Type</option>
                            <option value="govt" @if ((old('ad_type') && old('ad_type') == 'govt') || (isset($edit) && $edit->ad_type == 'govt')) selected @endif>Government Ad</option>
                            <option value="pvt" @if ((old('ad_type') && old('ad_type') == 'pvt') || (isset($edit) && $edit->ad_type == 'pvt')) selected @endif>Private Ad</option>
                        </select>
                        @error('ad_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="ad_category" class="form-label"><b>Advertisement Category</b><span class="text-danger">*</span></label>
                        <select name="ad_category" class="form-control" id="ad_category" required>
                            <option value="">Select Ad Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}" @if((old('ad_category') && old('ad_category') == $cat->id) || (isset($edit) && $edit->ad_category == $cat->id)) selected @endif>{{$cat->category}}</option>
                            @endforeach
                        </select>
                        @error('ad_category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="ad_location" class="form-label"><b>Advertisement Location</b><span class="text-danger">*</span></label>
                        <select name="ad_location[]" class="form-control multi-select" multiple data-placeholder="Select Locations" id="ad_location" required>
                            @foreach ($placements as $place)
                                <option value="{{$place->id}}" @if((old('ad_location') && in_array($place->id,old('ad_location'))) || (isset($edit) && in_array($place->id,$edit->ad_locations->pluck('id')->toArray()))) selected @endif >{{ucwords(str_replace('-',' ',$place->slug))}}</option>
                            @endforeach
                        </select>
                        @error('ad_location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="ad_size" class="form-label"><b>Ad Size</b><span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="ad_width" required value="@if(old('ad_width')){{old('ad_width')}}@elseif(isset($edit)){{$edit->ad_width}}@else{{'100%'}}@endif" placeholder="Width" id="ad_size">
                            <span class="input-group-text">X</span>
                            <input type="text" class="form-control" name="ad_height" required value="@if(old('ad_height')){{old('ad_height')}}@elseif(isset($edit)){{$edit->ad_height}}@else{{'auto'}}@endif" placeholder="Height">
                        </div>
                        @error('ad_width')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="ad_duration" class="form-label"><b>Ad Duration</b><span class="text-danger">*</span></label>
                        <select name="ad_duration" class="form-control" id="ad_duration" required>
                            <option value="1" @if((old('ad_duration') && old('ad_duration') == '1') || (isset($edit) && $edit->ad_duration == '1')) selected @endif>1 Time</option>
                            <option value="5" @if((old('ad_duration') && old('ad_duration') == '5') || (isset($edit) && $edit->ad_duration == '5')) selected @endif>5 a Week</option>
                            <option value="10" @if((old('ad_duration') && old('ad_duration') == '10') || (isset($edit) && $edit->ad_duration == '10')) selected @endif>10 a Week</option>
                            <option value="30" @if((old('ad_duration') && old('ad_duration') == '30') || (isset($edit) && $edit->ad_duration == '30')) selected @endif>1 Month</option>
                        </select>
                        @error('ad_duration')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="publish_date" class="form-label"><b>Publishing Date</b><span class="text-danger">*</span></label>
                        <input type="date" name="publish_date" min="{{now()->toDateString()}}" placeholder="Enter Publishing Date" required class="form-control" id="publish_date" value="@if(old('publish_date')){{old('publish_date')}}@elseif(isset($edit)){{$edit->publish_date}}@endif">
                        @error('publish_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="expire_date" class="form-label"><b>Expire Date</b><span class="text-danger">*</span></label>
                        <input type="date" name="expire_date" min="{{now()->toDateString()}}" placeholder="Enter Expire Date" required class="form-control" id="expire_date" value="@if(old('expire_date')){{old('expire_date')}}@elseif(isset($edit)){{$edit->expire_date}}@endif">
                        @error('expire_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="booking_id" class="form-label"><b>Booking ID</b><span class="text-danger">*</span></label>
                        <input type="text" name="booking_id" readonly placeholder="Enter Booking ID" required class="form-control" id="booking_id" value="@if(old('booking_id')){{old('booking_id')}}@elseif(isset($edit)){{$edit->booking_id}}@else{{$booking_id}}@endif">
                        @error('booking_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 position-relative mb-3">
                        <hr>
                        <label for="" class="form-label custom-label-float" style="top: 0%">Payments Details</label>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-3 text-center">
                                <label for="discount" class="w-100" style="
                                    background-color: #68bb68;
                                    color: black;
                                    padding: 14px 16px;
                                "><b>DISCOUNT COUPON CODE</b></label>
                                <input class="form-control rounded-0 text-center" name="discount" id="discount" style="box-shadow: none; border-color: #dddddd;" type="text" value="@if(old('discount')){{old('discount')}}@elseif(isset($edit)){{$edit->discount}}@endif" placeholder="Enter 6 Digit Coupon Code" maxlength="6">
                            </div>
                            <div class="col-md-7 mb-3">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">TOTAL AMOUNT</th>
                                            <td></td>
                                            <td>100.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">DISCOUNT</th>
                                            <td>10%</td>
                                            <td>100.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">SUBTOTAL AMOUNT</th>
                                            <td></td>
                                            <td>100.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NET PAYBAL AMOUNT</th>
                                            <td></td>
                                            <td>100.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 position-relative mb-3">
                        <hr>
                        <label for="" class="form-label custom-label-float" style="top: 0%;left: 50%;transform: translate(-50%)">Upload Your Advertisement</label>
                    </div>
                    <div class="col-12 text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8 mb-3">
                                <label for="form-title" class="form-label"><b>Advertisement Title</b><span class="text-danger">*</span></label>
                                <input type="text" name="ad_title" placeholder="Enter Advertisement Title" style="box-shadow: none; border-color: #dddddd;" required class="form-control rounded-0" id="form-title" value="@if(old('ad_title')){{old('ad_title')}}@elseif(isset($edit)){{$edit->ad_title}}@endif">
                                <textarea name="ad_description" class="form-control rounded-0" rows="3" placeholder="Write here..." style="box-shadow: none; border-color: #dddddd;">@if(old('ad_description')){{old('ad_description')}}@elseif(isset($edit)){{$edit->ad_description}}@endif</textarea>
                                @error('ad_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="file" class="dropify" @if(!isset($edit)) required @endif data-allowed-file-extensions="png jpg jpeg svg" data-height="300" data-show-remove="false" data-default-file="@if(isset($edit)){{asset('storage/advertisements/'.$edit->ad_image)}}@endif" data-max-file-size="3M" name="ad_image" accept="image/*">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 position-relative mb-3">
                                <hr>
                                <button type="submit" class="btn btn-success btn-lg custom-label-float bg-success" style="top: 0%;left: 50%;transform: translate(-50%)">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
@includeIf('vendor.worlddata.ajax-script')
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.multi-select').select2({
                theme: 'bootstrap4',
                multiple :true,
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
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
        });
    </script>
@endpush
