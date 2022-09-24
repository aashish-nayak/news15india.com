
<h2 class="text-center mb-4 border-bottom pb-3" style="border-width: 2px !important">Reporter Application Form</h2>

@if($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endforeach
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
    {{ Session::get('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div id="smartwizard">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link py-3" href="#step-1"> <strong>Personal Details</strong><br></a>
        </li>
        <li class="nav-item">
            <a class="nav-link py-3" href="#step-2"> <strong>Address Details</strong> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link py-3" href="#step-3"> <strong>Contact Details</strong> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link py-3" href="#step-4"> <strong>Education Details</strong> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link py-3" href="#step-5"> <strong>Verified Documents</strong></a>
        </li>
    </ul>
    <form action="{{route('reporter-application-store')}}" method="POST" enctype="multipart/form-data" id="reporter-form" role="form">
        <div class="tab-content" style="margin-bottom: 70px;">
            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    @csrf
                                    <label for="app-name">Applicant Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@elseif(auth('web')->check()){{auth('web')->user()->name}}@endif" id="app-name" required placeholder="Enter Applicant Name" >
                                    @error('name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Father-name">Father Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" value="{{old('father_name')}}" id="Father-name" required placeholder="Enter Father Name">
                                    @error('father_name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Mother-name">Mother Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" value="{{old('mother_name')}}" id="Mother-name" required placeholder="Enter Mother Name">
                                    @error('mother_name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob">Date Of Birth<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dob" value="{{old('dob')}}" id="dob" required placeholder="Enter Date Of Birth">
                                    @error('dob')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="age">Age<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" disabled id="age" placeholder="Age">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Gender">Gender<span class="text-danger">*</span></label>
                                    <select id="Gender" class="form-control" name="gender" required>
                                        <option value="Male" {{(old('gender') == 'Male') ? 'selected' : ''}}>Male</option>
                                        <option value="Female" {{(old('gender') == 'Female') ? 'selected' : ''}}>Female</option>
                                        <option value="Other" {{(old('gender') == 'Other') ? 'selected' : ''}}>Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Marital-Status">Marital Status<span class="text-danger">*</span></label>
                                    <select id="Marital-Status" class="form-control" name="marital_status" required>
                                        <option value="Married" {{(old('marital_status') == 'Married') ? 'selected' : ''}}>Married</option>
                                        <option value="Unmarried" {{(old('marital_status') == 'Unmarried') ? 'selected' : ''}}>Unmarried</option>
                                    </select>
                                    @error('marital_status')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Blood-Group">Blood Group<span class="text-danger">*</span></label>
                                    <select id="Blood-Group" class="form-control" name="blood_group" required>
                                        <option value="A+" {{(old('blood_group') == 'A+') ? 'selected' : ''}} >A positive (A+)</option>
                                        <option value="A-" {{(old('blood_group') == 'A-') ? 'selected' : ''}} >A negative (A-)</option>
                                        <option value="B+" {{(old('blood_group') == 'B+') ? 'selected' : ''}} >B positive (B+)</option>
                                        <option value="B-" {{(old('blood_group') == 'B-') ? 'selected' : ''}} >B negative (B-)</option>
                                        <option value="O+" {{(old('blood_group') == 'O+') ? 'selected' : ''}} >O positive (O+)</option>
                                        <option value="O-" {{(old('blood_group') == 'O-') ? 'selected' : ''}} >O negative (O-)</option>
                                        <option value="AB+" {{(old('blood_group') == 'AB+') ? 'selected' : ''}} >AB positive (AB+)</option>
                                        <option value="AB-" {{(old('blood_group') == 'AB-') ? 'selected' : ''}} >AB negative (AB-)</option>
                                    </select>
                                    @error('blood_group')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Designation<span class="text-danger">*</span></label>
                                    <select class="form-control" name="applied_designation">
                                        <option {{(old('applied_designation') == 'Reporter') ? 'selected' : ''}} value="Reporter">Reporter</option>
                                        <option {{(old('applied_designation') == 'Bureau Chief') ? 'selected' : ''}} value="Bureau Chief">Bureau Chief</option>
                                        <option {{(old('applied_designation') == 'Sub Editor') ? 'selected' : ''}} value="Sub Editor">Sub Editor</option>
                                        <option {{(old('applied_designation') == '"Editor"') ? 'selected' : ''}} value="Editor">Editor</option>
                                        <option {{(old('applied_designation') == 'State Head') ? 'selected' : ''}} value="State Head">State Head</option>
                                        <option {{(old('applied_designation') == 'Advertisement Head') ? 'selected' : ''}} value="Advertisement Head">Advertisement Head</option>
                                        <option {{(old('applied_designation') == 'Video Editor') ? 'selected' : ''}} value="Video Editor">Video Editor</option>
                                        <option {{(old('applied_designation') == 'Content Writer') ? 'selected' : ''}} value="Content Writer">Content Writer</option>
                                    </select>
                                    @error('applied_designation')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="aadhar">Aadhaar Card Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" maxlength="12" name="aadhar_number" value="{{old('aadhar_number')}}" required id="aadhar" placeholder="Enter Aadhaar Card Number ">
                                    @error('aadhar_number')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pan">Pan Card Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" maxlength="10" name="pan_number" value="{{old('pan_number')}}" required id="pan" placeholder="Enter Pan Card Number ">
                                    @error('pan_number')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="border w-100 p-2 border-dark dropify-label-custom">Passport Size Photo<span class="text-danger">*</span></label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" data-height="68%" data-max-file-size="3M" name="avatar" value="{{old('avatar')}}" required accept="image/*">
                            @error('avatar')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="home-address">Home Address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="home_address" value="@if(old('home_address')){{old('home_address')}}@elseif(auth('web')->check()){{auth('web')->user()->details->address}}@endif" required id="home-address" placeholder="Enter Home Address">
                            @error('home_address')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="block-tehsil">Block/Tehsil<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="tehsil_block" value="{{old('tehsil_block')}}" required id="block-tehsil" placeholder="Enter Block/Tehsil Name">
                            @error('tehsil_block')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <select name="country_id" data-edit="101" class="d-none country" required>
                        </select>
                        <div class="form-group col-md-6">
                            <label for="State">State<span class="text-danger">*</span></label>
                            <select name="state_id" class="form-control state" data-edit="@if(old('state_id')){{old('state_id')}}@elseif(auth('web')->check()){{auth('web')->user()->details->state_id}}@endif" required>
                                
                            </select>
                            @error('state_id')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="District">District<span class="text-danger">*</span></label>
                            <select name="city_id" class="form-control city" data-edit="@if(old('city_id')){{old('city_id')}}@elseif(auth('web')->check()){{auth('web')->user()->details->city_id}}@endif" required>
                                <option>Select State First</option>
                            </select>
                            @error('city_id')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pincode">Area Pin Code<span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" name="zip" value="@if(old('zip')){{old('zip')}}@elseif(auth('web')->check()){{auth('web')->user()->details->zip}}@endif" required maxlength="6" class="form-control" id="pincode" placeholder="Enter Area Pin Code">
                            @error('zip')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="police-station">Police Station<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="police_station" value="{{old('police_station')}}" required id="police-station" placeholder="Enter Police Station">
                            @error('police_station')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="Mobile">Mobile Number<span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="phone_number" value="@if(old('phone_number')){{old('phone_number')}}@elseif(auth('web')->check()){{auth('web')->user()->details->phone_number}}@endif" required id="Mobile" placeholder="Enter Mobile Number">
                            @error('phone_number')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="WhatsApp">WhatsApp Number<span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="whatsapp_number" value="@if(old('whatsapp_number')){{old('whatsapp_number')}}@elseif(auth('web')->check()){{auth('web')->user()->details->whatsapp_number}}@endif" required id="WhatsApp" placeholder="Enter WhatsApp Number">
                            @error('whatsapp_number')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">E-Mail Address<span class="text-danger">*</span></label>
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" @if (auth('web')->check()) value="{{auth('web')->user()->email}}" disabled @else value="{{old('email')}}" @endif required class="form-control" id="email" placeholder="Enter E-Mail Address">
                            @error('email')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Emergency">Emergency Contact Number<span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="emergency_number" value="{{old('emergency_number')}}" required id="Emergency" placeholder="Enter Emergency Contact Number">
                            @error('emergency_number')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom">10<sup>th</sup> Marksheet<span class="text-danger">*</span></label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="10th_image" required accept="image/*" data-max-file-size="3M">
                            @error('10th_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >12<sup>th</sup> Marksheet<span class="text-danger">*</span></label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="12th_image" required accept="image/*" data-max-file-size="3M">
                            @error('12th_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom">Graduation Marksheet </label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="graduation_image" accept="image/*" data-max-file-size="3M">
                            @error('graduation_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Digree/Diploma</label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg"  name="diploma_image" accept="image/*" data-max-file-size="3M">
                            @error('diploma_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Other Certificate</label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="other_certificate" accept="image/*" data-max-file-size="3M">
                            @error('other_certificate')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Aadhaar Card<span class="text-danger">*</span></label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="aadhar_image" required accept="image/*" data-max-file-size="3M">
                            @error('aadhar_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Pan Card<span class="text-danger">*</span></label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="pan_image" required accept="image/*" data-max-file-size="3M">
                            @error('pan_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Voter ID/Driving License<span class="text-danger">*</span></label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="voter_driving_image" required accept="image/*" data-max-file-size="3M">
                            @error('voter_driving_image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Police Verification</label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="police_verification" accept="image/*" data-max-file-size="3M">
                            @error('police_verification')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col mb-5">
                            <label class="border w-100 p-2 border-dark dropify-label-custom" >Other Document</label>
                            <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg svg" name="other_document" accept="image/*" data-max-file-size="3M">
                            @error('other_document')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 position-relative mb-5">
                            <hr>
                            <div class="col-md-8 position-absolute" style="top: -50%;left: -0.8%;">
                                <div
                                    class="form-row px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                                    <div class="form-group col-md-9 mb-0">
                                        <b>Do You Have Currently Journalism or Used To Do Journalism<span class="text-danger">*</span></b>
                                    </div>
                                    <div class="col text-md-right">
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="customRadioInline1" name="is_journalist" value="1" {{(old('is_journalist') == '1') ? 'checked' : ''}}>
                                            <label for="customRadioInline1" class="mb-0">Yes</label>
                                        </div>
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="customRadioInline2" name="is_journalist" value="0" {{(old('is_journalist') == '0') ? 'checked' : 'checked'}}>
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
                    <div class="form-row mb-5 d-none" id="reporter-experience">
                        <div class="form-group col-md-5">
                            <label for="Organization">Channel/Newspaper Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="organization_name" id="Organization" placeholder="Enter Organization Name">
                            @error('organization_name')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Organization-Type">Type<span class="text-danger">*</span></label>
                            <select id="Organization-Type" class="form-control" name="organization_type">
                                <option {{(old('organization_type') == '') ? 'selected' : 'selected'}} disabled></option>
                                <option {{(old('organization_type') == 'Web News Channel') ? 'selected' : ''}} value="Web News Channel">Web News Channel</option>
                                <option {{(old('organization_type') == 'T.V Channel') ? 'selected' : ''}} value="T.V Channel">T.V Channel</option>
                                <option {{(old('organization_type') == 'OTT Channel') ? 'selected' : ''}} value="OTT Channel">OTT Channel</option>
                                <option {{(old('organization_type') == 'YouTube Channel') ? 'selected' : ''}} value="YouTube Channel">YouTube Channel</option>
                                <option {{(old('organization_type') == 'Daily Newspaper') ? 'selected' : ''}} value="Daily Newspaper">Daily Newspaper</option>
                                <option {{(old('organization_type') == 'Weekly Newspaper') ? 'selected' : ''}} value="Weekly Newspaper">Weekly Newspaper</option>
                                <option {{(old('organization_type') == 'SemiMonthly Newspaper') ? 'selected' : ''}} value="SemiMonthly Newspaper">SemiMonthly Newspaper</option>
                                <option {{(old('organization_type') == 'Monthly Newspaper') ? 'selected' : ''}} value="Monthly Newspaper">Monthly Newspaper</option>
                            </select>
                            @error('organization_type')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Designation">Designation<span class="text-danger">*</span></label>
                            <select id="Designation" class="form-control" name="designation">
                                <option {{(old('designation') == '') ? 'selected' : 'selected'}} disabled></option>
                                <option {{(old('designation') == 'Reporter') ? 'selected' : ''}} value="Reporter">Reporter</option>
                                <option {{(old('designation') == 'Bureau Chief') ? 'selected' : ''}} value="Bureau Chief">Bureau Chief</option>
                                <option {{(old('designation') == 'Sub Editor') ? 'selected' : ''}} value="Sub Editor">Sub Editor</option>
                                <option {{(old('designation') == '"Editor"') ? 'selected' : ''}} value="Editor">Editor</option>
                                <option {{(old('designation') == 'State Head') ? 'selected' : ''}} value="State Head">State Head</option>
                                <option {{(old('designation') == 'Advertisement Head') ? 'selected' : ''}} value="Advertisement Head">Advertisement Head</option>
                                <option {{(old('designation') == 'Video Editor') ? 'selected' : ''}} value="Video Editor">Video Editor</option>
                                <option {{(old('designation') == 'Content Writer') ? 'selected' : ''}} value="Content Writer">Content Writer</option>
                            </select>
                            @error('designation')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Start-Journalism">Start Journalism<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="Start-Journalism" name="start_journalism" value="{{old('start_journalism')}}" >
                            @error('start_journalism')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-1">
                            <label for="Total-Experience">Experience<span class="text-danger">*</span></label>
                            <input type="text" disabled class="form-control" id="Total-Experience" placeholder="Experience">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 position-relative mb-5">
                            <hr>
                            <div class="col-md-8 position-absolute" style="top: -50%;left: -0.8%;">
                                <div
                                    class="form-row px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                                    <div class="form-group col-md-9 mb-0">
                                        <b>Do You Have A Personal Office For Journalism<span class="text-danger">*</span></b>
                                    </div>
                                    <div class="col text-md-right">
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="Office1" name="is_personal_office" value="1" {{(old('is_personal_office') == '1') ? 'checked' : ''}}>
                                            <label for="Office1" class="mb-0">Yes</label>
                                        </div>
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="Office2" name="is_personal_office" value="0" {{(old('is_personal_office') == '0') ? 'checked' : 'checked'}}>
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
                    <div class="form-row mb-5 d-none" id="reporter-office">
                        <div class="form-group col-md-5">
                            <label for="Office-Address">Office Address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="office_address" value="{{old('office_address')}}" id="Office-Address" placeholder="Enter Office Address">
                            @error('office_address')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Block-Tehsil">Block/Tehsil<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="office_tehsil_block" value="{{old('office_tehsil_block')}}"  id="Block-Tehsil" placeholder="Enter Block/Tehsil ">
                            @error('office_tehsil_block')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <select name="office_country_id" data-edit="101" class="d-none country" >
                        </select>
                        <div class="form-group col-md-2">
                            <label for="State2">State<span class="text-danger">*</span></label>
                            <select id="State2" name="office_state_id" class="form-control state" data-edit="{{old('office_state_id')}}">
                            </select>
                            @error('office_state_id')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="city2">District<span class="text-danger">*</span></label>
                            <select id="city2" name="office_city_id" class="form-control city" data-edit="{{old('office_city_id')}}">
                            </select>
                            @error('office_city_id')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="pincode2">PinCode<span class="text-danger">*</span></label>
                            <input type="text" maxlength="6" name="office_zip" value="{{old('office_zip')}}" pattern="[0-9]+" class="form-control" id="pincode2">
                            @error('office_zip')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
