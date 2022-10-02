@extends('layouts.backpanel.master')
@section('title', 'View Application Form')
@push('plugin-css')
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.css') }}" />
@endpush
@push('css')
    <style>
        .dropify-wrapper .dropify-message span.file-icon {
            font-size: 18px;
            color: #CCC;
        }
    </style>
@endpush
@section('sections')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-6">
                    <h4 class="card-title m-0 d-flex align-items-center"><i class="bx bx-group fs-3 mt-1 me-2"></i>
                        <span>View Application Form</span>
                    </h4>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.reporter.index') }}" id="trash" class="btn btn-info btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#step-1" role="tab" aria-selected="true">
                            Personal Details
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#step-2" role="tab" aria-selected="false">
                            Address Details
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#step-3" role="tab" aria-selected="false">
                            Contact Details
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#step-4" role="tab" aria-selected="false">
                            Education Details
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#step-5" role="tab" aria-selected="false">
                            Verified Documents
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="step-1" role="tabpanel">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-6 mb-3">
                                        @csrf
                                        <label for="app-name">Applicant Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@else{{$reporter->name}}@endif" id="app-name" required placeholder="Enter Applicant Name" >
                                        @error('name')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-6 mb-3">
                                        <label for="Father-name">Father Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="father_name" value="@if(old('father_name')){{old('father_name')}}@else{{$reporter->father_name}}@endif" id="Father-name" required placeholder="Enter Father Name">
                                        @error('father_name')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-6 mb-3">
                                        <label for="Mother-name">Mother Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mother_name" value="@if(old('mother_name')){{old('mother_name')}}@else{{$reporter->mother_name}}@endif" id="Mother-name" required placeholder="Enter Mother Name">
                                        @error('mother_name')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-4 mb-3">
                                        <label for="dob">Date Of Birth<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="dob" value="@if(old('dob')){{old('dob')}}@else{{$reporter->dob}}@endif" id="dob" required placeholder="Enter Date Of Birth">
                                        @error('dob')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-2 mb-3">
                                        <label for="age">Age<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" disabled id="age" value="{{$reporter->getAge()}}" placeholder="Age">
                                    </div>
                                    <div class="form-group mb-3 col-md-2">
                                        <label for="Gender">Gender<span class="text-danger">*</span></label>
                                        <select id="Gender" class="form-control" name="gender" required>
                                            <option value="Male" {{(old('gender') == 'Male' || $reporter->gender == 'Male') ? 'selected' : ''}}>Male</option>
                                            <option value="Female" {{(old('gender') == 'Female' || $reporter->gender == 'Female') ? 'selected' : ''}}>Female</option>
                                            <option value="Other" {{(old('gender') == 'Other' || $reporter->gender == 'Other') ? 'selected' : ''}}>Other</option>
                                        </select>
                                        @error('gender')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-3 mb-3">
                                        <label for="Marital-Status">Marital Status<span class="text-danger">*</span></label>
                                        <select id="Marital-Status" class="form-control" name="marital_status" required>
                                            <option value="Married" {{(old('marital_status') == 'Married' || $reporter->marital_status == 'Married') ? 'selected' : ''}}>Married</option>
                                            <option value="Unmarried" {{(old('marital_status') == 'Unmarried' || $reporter->marital_status == 'Unmarried') ? 'selected' : ''}}>Unmarried</option>
                                        </select>
                                        @error('marital_status')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-3 mb-3">
                                        <label for="Blood-Group">Blood Group<span class="text-danger">*</span></label>
                                        <select id="Blood-Group" class="form-control" name="blood_group" required>
                                            <option value="A+" {{(old('blood_group') == 'A+' || $reporter->blood_group == 'A+') ? 'selected' : ''}} >A positive (A+)</option>
                                            <option value="A-" {{(old('blood_group') == 'A-' || $reporter->blood_group == 'A-') ? 'selected' : ''}} >A negative (A-)</option>
                                            <option value="B+" {{(old('blood_group') == 'B+' || $reporter->blood_group == 'B+') ? 'selected' : ''}} >B positive (B+)</option>
                                            <option value="B-" {{(old('blood_group') == 'B-' || $reporter->blood_group == 'B-') ? 'selected' : ''}} >B negative (B-)</option>
                                            <option value="O+" {{(old('blood_group') == 'O+' || $reporter->blood_group == 'O+') ? 'selected' : ''}} >O positive (O+)</option>
                                            <option value="O-" {{(old('blood_group') == 'O-' || $reporter->blood_group == 'O-') ? 'selected' : ''}} >O negative (O-)</option>
                                            <option value="AB+" {{(old('blood_group') == 'AB+' || $reporter->blood_group == 'AB+') ? 'selected' : ''}} >AB positive (AB+)</option>
                                            <option value="AB-" {{(old('blood_group') == 'AB-' || $reporter->blood_group == 'AB-') ? 'selected' : ''}} >AB negative (AB-)</option>
                                        </select>
                                        @error('blood_group')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-4 mb-3">
                                        <label>Designation<span class="text-danger">*</span></label>
                                        <select class="form-control" name="applied_designation">
                                            <option {{(old('applied_designation') == 'Reporter' || $reporter->applied_designation == 'Reporter') ? 'selected' : ''}} value="Reporter">Reporter</option>
                                            <option {{(old('applied_designation') == 'Bureau Chief' || $reporter->applied_designation == 'Bureau Chief') ? 'selected' : ''}} value="Bureau Chief">Bureau Chief</option>
                                            <option {{(old('applied_designation') == 'Sub Editor' || $reporter->applied_designation == 'Sub Editor') ? 'selected' : ''}} value="Sub Editor">Sub Editor</option>
                                            <option {{(old('applied_designation') == 'Editor' || $reporter->applied_designation == 'Editor') ? 'selected' : ''}} value="Editor">Editor</option>
                                            <option {{(old('applied_designation') == 'State Head' || $reporter->applied_designation == 'State Head') ? 'selected' : ''}} value="State Head">State Head</option>
                                            <option {{(old('applied_designation') == 'Advertisement Head' || $reporter->applied_designation == 'Advertisement Head') ? 'selected' : ''}} value="Advertisement Head">Advertisement Head</option>
                                            <option {{(old('applied_designation') == 'Video Editor' || $reporter->applied_designation == 'Video Editor') ? 'selected' : ''}} value="Video Editor">Video Editor</option>
                                            <option {{(old('applied_designation') == 'Content Writer' || $reporter->applied_designation == 'Content Writer') ? 'selected' : ''}} value="Content Writer">Content Writer</option>
                                        </select>
                                        @error('applied_designation')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-6 mb-3">
                                        <label for="aadhar">Aadhaar Card Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" maxlength="12" name="aadhar_number" value="@if(old('aadhar_number')){{old('aadhar_number')}}@else{{$reporter->aadhar_number}}@endif" required id="aadhar" placeholder="Enter Aadhaar Card Number ">
                                        @error('aadhar_number')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 col-md-6 mb-3">
                                        <label for="pan">Pan Card Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" maxlength="10" name="pan_number" value="@if(old('pan_number')){{old('pan_number')}}@else{{$reporter->pan_number}}@endif" required id="pan" placeholder="Enter Pan Card Number ">
                                        @error('pan_number')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="border w-100 p-2 border-dark dropify-label-custom">Passport Size Photo<span class="text-danger">*</span></label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" data-height="75%" data-max-file-size="3M" name="avatar" value="{{old('avatar')}}" data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter->avatar)}}" required accept="image/*">
                                @error('avatar')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step-2" role="tabpanel">
                        <div class="row">
                            <div class="form-group mb-3 col-12">
                                <label for="home-address">Home Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="home_address" value="@if(old('home_address')){{old('home_address')}}@else{{$reporter->home_address}}@endif" required id="home-address" placeholder="Enter Home Address">
                                @error('home_address')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="block-tehsil">Block/Tehsil<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tehsil_block" value="@if(old('tehsil_block')){{old('tehsil_block')}}@else{{$reporter->tehsil_block}}@endif" required id="block-tehsil" placeholder="Enter Block/Tehsil Name">
                                @error('tehsil_block')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <select name="country_id" data-edit="101" class="d-none country" required>
                            </select>
                            <div class="form-group mb-3 col-md-6">
                                <label for="State">State<span class="text-danger">*</span></label>
                                <select name="state_id" class="form-control state" data-edit="@if(old('state_id')){{old('state_id')}}@else{{$reporter->state_id}}@endif" required>
                                    
                                </select>
                                @error('state_id')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label for="District">District<span class="text-danger">*</span></label>
                                <select name="city_id" class="form-control city" data-edit="@if(old('city_id')){{old('city_id')}}@else{{$reporter->city_id}}@endif" required>
                                    <option>Select State First</option>
                                </select>
                                @error('city_id')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label for="pincode">Area Pin Code<span class="text-danger">*</span></label>
                                <input type="text" pattern="[0-9]+" name="zip" value="@if(old('zip')){{old('zip')}}@else{{$reporter->zip}}@endif" required maxlength="6" class="form-control" id="pincode" placeholder="Enter Area Pin Code">
                                @error('zip')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label for="police-station">Police Station<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="police_station" value="@if(old('police_station')){{old('police_station')}}@else{{$reporter->police_station}}@endif" required id="police-station" placeholder="Enter Police Station">
                                @error('police_station')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step-3" role="tabpanel">
                        <div class="row">
                            <div class="form-group mb-3 col-md-3">
                                <label for="Mobile">Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="phone_number" value="@if(old('phone_number')){{old('phone_number')}}@else{{$reporter->phone_number}}@endif" required id="Mobile" placeholder="Enter Mobile Number">
                                @error('phone_number')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-3">
                                <label for="WhatsApp">WhatsApp Number<span class="text-danger">*</span></label>
                                <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="whatsapp_number" value="@if(old('whatsapp_number')){{old('whatsapp_number')}}@else{{$reporter->whatsapp_number}}@endif" required id="WhatsApp" placeholder="Enter WhatsApp Number">
                                @error('whatsapp_number')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-3">
                                <label for="email">E-Mail Address<span class="text-danger">*</span></label>
                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" value="@if(old('email')){{old('email')}}@else{{$reporter->email}}@endif" required class="form-control" id="email" placeholder="Enter E-Mail Address">
                                @error('email')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-3">
                                <label for="Emergency">Emergency Contact Number<span class="text-danger">*</span></label>
                                <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="emergency_number" value="@if(old('emergency_number')){{old('emergency_number')}}@else{{$reporter->emergency_number}}@endif" required id="Emergency" placeholder="Enter Emergency Contact Number">
                                @error('emergency_number')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step-4" role="tabpanel">
                        <div class="row">
                            <div class="form-group mb-3 col">
                                <label class="border w-100 p-2 border-dark dropify-label-custom">10<sup>th</sup> Marksheet<span class="text-danger">*</span></label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="10th_image" data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['10th_image'])}}" required accept="image/*" data-max-file-size="3M">
                                @error('10th_image')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="border w-100 p-2 border-dark dropify-label-custom" >12<sup>th</sup> Marksheet<span class="text-danger">*</span></label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="12th_image" data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['12th_image'])}}" required accept="image/*" data-max-file-size="3M">
                                @error('12th_image')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="border w-100 p-2 border-dark dropify-label-custom">Graduation Marksheet </label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="graduation_image" @if($reporter['graduation_image'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['graduation_image'])}}" @endif accept="image/*" data-max-file-size="3M">
                                @error('graduation_image')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="border w-100 p-2 border-dark dropify-label-custom" >Digree/Diploma</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg"  name="diploma_image" @if($reporter['diploma_image'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['diploma_image'])}}" @endif accept="image/*" data-max-file-size="3M">
                                @error('diploma_image')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="border w-100 p-2 border-dark dropify-label-custom" >Other Certificate</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="other_certificate" @if($reporter['other_certificate'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['other_certificate'])}}" @endif accept="image/*" data-max-file-size="3M">
                                @error('other_certificate')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step-5" role="tabpanel">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group mb-3 col">
                                    <label class="border w-100 p-2 border-dark dropify-label-custom" >Aadhaar Card<span class="text-danger">*</span></label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="aadhar_image" @if($reporter['aadhar_image'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['aadhar_image'])}}" @endif required accept="image/*" data-max-file-size="3M">
                                    @error('aadhar_image')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col">
                                    <label class="border w-100 p-2 border-dark dropify-label-custom" >Pan Card<span class="text-danger">*</span></label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="pan_image" @if($reporter['pan_image'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['pan_image'])}}" @endif required accept="image/*" data-max-file-size="3M">
                                    @error('pan_image')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-3">
                                    <label class="border w-100 p-2 border-dark dropify-label-custom" >Voter ID/Driving License<span class="text-danger">*</span></label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="voter_driving_image" @if($reporter['voter_driving_image'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['voter_driving_image'])}}" @endif required accept="image/*" data-max-file-size="3M">
                                    @error('voter_driving_image')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col">
                                    <label class="border w-100 p-2 border-dark dropify-label-custom" >Police Verification</label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="police_verification" @if($reporter['police_verification'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['police_verification'])}}" @endif accept="image/*" data-max-file-size="3M">
                                    @error('police_verification')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col mb-5">
                                    <label class="border w-100 p-2 border-dark dropify-label-custom" >Other Document</label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="other_document" @if($reporter['other_document'] != '') data-default-file="{{asset('storage/reporter-application/'.$reporter->email.'/'.$reporter['other_document'])}}" @endif accept="image/*" data-max-file-size="3M">
                                    @error('other_document')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 position-relative">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8 position-absolute" style="top: -25%;left: -0.8%;">
                                            <div
                                                class="d-flex px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                                                <div class="form-group col-md-9 mb-0">
                                                    <b>Do You Have Currently Journalism or Used To Do Journalism<span class="text-danger">*</span></b>
                                                </div>
                                                <div class="col text-md-right">
                                                    <div class="form-group d-inline mr-3">
                                                        <input type="radio" id="customRadioInline1" name="is_journalist" value="1" {{(old('is_journalist') == '1' || $reporter->is_journalist == '1') ? 'checked' : ''}}>
                                                        <label for="customRadioInline1" class="mb-0">Yes</label>
                                                    </div>
                                                    <div class="form-group d-inline mr-3">
                                                        <input type="radio" id="customRadioInline2" name="is_journalist" value="0" {{(old('is_journalist') == '0' || $reporter->is_journalist == '0') ? 'checked' : 'checked'}}>
                                                        <label for="customRadioInline2" class="mb-0">No</label>
                                                    </div>
                                                    @error('is_journalist')
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" id="reporter-experience">
                                <div class="form-group col-md-4">
                                    <label for="Organization">Channel/Newspaper Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="organization_name" value="@if(old('organization_name')){{old('organization_name')}}@else{{$reporter->organization_name}}@endif" id="Organization" placeholder="Enter Organization Name">
                                    @error('organization_name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Organization-Type">Type<span class="text-danger">*</span></label>
                                    <select id="Organization-Type" class="form-control" name="organization_type">
                                        <option {{(old('organization_type') == '' || $reporter->organization_type == '') ? 'selected' : 'selected'}} disabled></option>
                                        <option {{(old('organization_type') == 'Web News Channel' || $reporter->organization_type == 'Web News Channel') ? 'selected' : ''}} value="Web News Channel">Web News Channel</option>
                                        <option {{(old('organization_type') == 'T.V Channel' || $reporter->organization_type == 'T.V Channel') ? 'selected' : ''}} value="T.V Channel">T.V Channel</option>
                                        <option {{(old('organization_type') == 'OTT Channel' || $reporter->organization_type == 'OTT Channel') ? 'selected' : ''}} value="OTT Channel">OTT Channel</option>
                                        <option {{(old('organization_type') == 'YouTube Channel' || $reporter->organization_type == 'YouTube Channel') ? 'selected' : ''}} value="YouTube Channel">YouTube Channel</option>
                                        <option {{(old('organization_type') == 'Daily Newspaper' || $reporter->organization_type == 'Daily Newspaper') ? 'selected' : ''}} value="Daily Newspaper">Daily Newspaper</option>
                                        <option {{(old('organization_type') == 'Weekly Newspaper' || $reporter->organization_type == 'Weekly Newspaper') ? 'selected' : ''}} value="Weekly Newspaper">Weekly Newspaper</option>
                                        <option {{(old('organization_type') == 'SemiMonthly Newspaper' || $reporter->organization_type == 'SemiMonthly Newspaper') ? 'selected' : ''}} value="SemiMonthly Newspaper">SemiMonthly Newspaper</option>
                                        <option {{(old('organization_type') == 'Monthly Newspaper' || $reporter->organization_type == 'Monthly Newspaper') ? 'selected' : ''}} value="Monthly Newspaper">Monthly Newspaper</option>
                                    </select>
                                    @error('organization_type')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Designation">Designation<span class="text-danger">*</span></label>
                                    <select id="Designation" class="form-control" name="designation">
                                        <option {{(old('designation') == '' || $reporter->designation == '') ? 'selected' : 'selected'}} disabled></option>
                                        <option {{(old('designation') == 'Reporter' || $reporter->designation == 'Reporter') ? 'selected' : ''}} value="Reporter">Reporter</option>
                                        <option {{(old('designation') == 'Bureau Chief' || $reporter->designation == 'Bureau Chief') ? 'selected' : ''}} value="Bureau Chief">Bureau Chief</option>
                                        <option {{(old('designation') == 'Sub Editor' || $reporter->designation == 'Sub Editor') ? 'selected' : ''}} value="Sub Editor">Sub Editor</option>
                                        <option {{(old('designation') == 'Editor' || $reporter->designation == 'Editor') ? 'selected' : ''}} value="Editor">Editor</option>
                                        <option {{(old('designation') == 'State Head' || $reporter->designation == 'State Head') ? 'selected' : ''}} value="State Head">State Head</option>
                                        <option {{(old('designation') == 'Advertisement Head' || $reporter->designation == 'Advertisement Head') ? 'selected' : ''}} value="Advertisement Head">Advertisement Head</option>
                                        <option {{(old('designation') == 'Video Editor' || $reporter->designation == 'Video Editor') ? 'selected' : ''}} value="Video Editor">Video Editor</option>
                                        <option {{(old('designation') == 'Content Writer' || $reporter->designation == 'Content Writer') ? 'selected' : ''}} value="Content Writer">Content Writer</option>
                                    </select>
                                    @error('designation')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Start-Journalism">Start Journalism<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="Start-Journalism" name="start_journalism" value="@if(old('start_journalism')){{old('start_journalism')}}@else{{$reporter->start_journalism}}@endif" >
                                    @error('start_journalism')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Total-Experience">Experience<span class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" value="{{$reporter->exp()}}" id="Total-Experience" placeholder="Experience">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 position-relative mt-5">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8 position-absolute" style="top: -25%;left: -0.8%;">
                                            <div class="d-flex px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                                                <div class="form-group col-md-9 mb-0">
                                                    <b>Do You Have A Personal Office For Journalism<span class="text-danger">*</span></b>
                                                </div>
                                                <div class="col text-md-right">
                                                    <div class="form-group d-inline mr-3">
                                                        <input type="radio" id="Office1" name="is_personal_office" value="1" {{(old('is_personal_office') == '1' || $reporter->is_personal_office == '1') ? 'checked' : ''}}>
                                                        <label for="Office1" class="mb-0">Yes</label>
                                                    </div>
                                                    <div class="form-group d-inline mr-3">
                                                        <input type="radio" id="Office2" name="is_personal_office" value="0" {{(old('is_personal_office') == '0' || $reporter->is_personal_office == '0') ? 'checked' : 'checked'}}>
                                                        <label for="Office2" class="mb-0">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('is_personal_office')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" id="reporter-office">
                                <div class="form-group col-md-4">
                                    <label for="Office-Address">Office Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="office_address" value="@if(old('office_address')){{old('office_address')}}@else{{$reporter->office_address}}@endif" id="Office-Address" placeholder="Enter Office Address">
                                    @error('office_address')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Block-Tehsil">Block/Tehsil<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="office_tehsil_block" value="@if(old('office_tehsil_block')){{old('office_tehsil_block')}}@else{{$reporter->office_tehsil_block}}@endif"  id="Block-Tehsil" placeholder="Enter Block/Tehsil ">
                                    @error('office_tehsil_block')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <select name="office_country_id" data-edit="101" class="d-none country" >
                                </select>
                                <div class="form-group col-md-2">
                                    <label for="State2">State<span class="text-danger">*</span></label>
                                    <select id="State2" name="office_state_id" class="form-control state" data-edit="@if(old('office_state_id')){{old('office_state_id')}}@else{{$reporter->office_state_id}}@endif">
                                    </select>
                                    @error('office_state_id')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="city2">District<span class="text-danger">*</span></label>
                                    <select id="city2" name="office_city_id" class="form-control city" data-edit="@if(old('office_city_id')){{old('office_city_id')}}@else{{$reporter->office_city_id}}@endif">
                                    </select>
                                    @error('office_city_id')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pincode2">PinCode<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="6" name="office_zip" value="@if(old('office_zip')){{old('office_zip')}}@else{{$reporter->office_zip}}@endif" pattern="[0-9]+" class="form-control" id="pincode2">
                                    @error('office_zip')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
    <script>
        $(document).ready(function () {
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