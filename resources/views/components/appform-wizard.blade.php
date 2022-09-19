<h2 class="text-center mb-4">Reporter Application Form</h2>
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
    <form action="{{route('reporter-application-store')}}" method="POST" enctype="multipart/form-data" role="form">
        <div class="tab-content my-5">
            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    @csrf
                                    <label for="app-name">Applicant Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="app-name" required placeholder="Enter Applicant Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Father-name">Father Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" id="Father-name" required placeholder="Enter Father Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Mother-name">Mother Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" id="Mother-name" required placeholder="Enter Mother Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob">Date Of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dob" id="dob" required placeholder="Enter Date Of Birth">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="age">Age <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" disabled id="age" placeholder="Age">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Gender">Gender <span class="text-danger">*</span></label>
                                    <select id="Gender" class="form-control" name="gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Marital-Status">Marital Status <span class="text-danger">*</span></label>
                                    <select id="Marital-Status" class="form-control" name="marital_status" required>
                                        <option value="Married">Married</option>
                                        <option value="Unmarried">Unmarried</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Blood-Group">Blood Group <span class="text-danger">*</span></label>
                                    <select id="Blood-Group" class="form-control" name="blood_group" required>
                                        <option value="A+">A positive (A+)</option>
                                        <option value="A-">A negative (A-)</option>
                                        <option value="B+">B positive (B+)</option>
                                        <option value="B-">B negative (B-)</option>
                                        <option value="O+">O positive (O+)</option>
                                        <option value="O-">O negative (O-)</option>
                                        <option value="AB+">AB positive (AB+)</option>
                                        <option value="AB-">AB negative (AB-)</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="aadhar">Aadhaar Card Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" maxlength="12" name="aadhar_number" required id="aadhar" placeholder="Enter Aadhaar Card Number ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pan">Pan Card Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" maxlength="10" name="pan_number" required id="pan" placeholder="Enter Pan Card Number ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="file" class="dropify" data-height="80%" name="avatar" required accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="home-address">Home Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="home_address" required id="home-address" placeholder="Enter Home Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="block-tehsil">Block/Tehsil <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="tehsil_block" required id="block-tehsil" placeholder="Enter Block/Tehsil Name">
                        </div>
                        <select name="country_id" data-edit="101" class="d-none country" required>
                        </select>
                        <div class="form-group col-md-6">
                            <label for="State">State <span class="text-danger">*</span></label>
                            <select name="state_id" class="form-control state" required>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="District">District <span class="text-danger">*</span></label>
                            <select name="city_id" class="form-control city" required>
                                <option>Select State First</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pincode">Area Pin Code <span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" name="zip" required maxlength="6" class="form-control" id="pincode" placeholder="Enter Area Pin Code">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="police-station">Police Station <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="police_station" required id="police-station" placeholder="Enter Police Station">
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="Mobile">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="phone_number" required id="Mobile" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="WhatsApp">WhatsApp Number <span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="whatsapp_number" required id="WhatsApp" placeholder="Enter WhatsApp Number">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">E-Mail Address <span class="text-danger">*</span></label>
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" @if (auth('web')->check()) value="{{auth('web')->user()->email}}" disabled @endif required class="form-control" id="email" placeholder="Enter E-Mail Address">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Emergency">Emergency Contact Number <span class="text-danger">*</span></label>
                            <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" name="emergency_number" required id="Emergency" placeholder="Enter Emergency Contact Number">
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="10Marksheet">10<sup>th</sup> Marksheet <span class="text-danger">*</span></label>
                            <input type="file" class="dropify" id="10Marksheet" name="10th_image" required>
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="12Marksheet">12<sup>th</sup> Marksheet <span class="text-danger">*</span></label>
                            <input type="file" class="dropify" id="12Marksheet" name="12th_image" required>
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Graduation">Graduation Marksheet </label>
                            <input type="file" class="dropify" id="Graduation" name="graduation_image">
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Digree">Digree/Diploma</label>
                            <input type="file" class="dropify" id="Digree" name="diploma_image">
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Other">Other Certificate</label>
                            <input type="file" class="dropify" id="Other" name="other_certificate">
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Aadhaar-img">Aadhaar Card <span class="text-danger">*</span></label>
                            <input type="file" class="dropify" id="Aadhaar-img" name="aadhar_image" required>
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Pan-img">Pan Card <span class="text-danger">*</span></label>
                            <input type="file" class="dropify" id="Pan-img" name="pan_image" required>
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Voter-Driving-img">Voter ID/Driving License <span class="text-danger">*</span></label>
                            <input type="file" class="dropify" id="Voter-Driving-img" name="voter_driving_image" required>
                        </div>
                        <div class="form-group col">
                            <label class="border w-100 p-2 border-dark" for="Police-img">Police Verification</label>
                            <input type="file" class="dropify" id="Police-img" name="police_verification">
                        </div>
                        <div class="form-group col mb-5">
                            <label class="border w-100 p-2 border-dark" for="Other-img">Other Document</label>
                            <input type="file" class="dropify" id="Other-img" name="other_document">
                        </div>
                        <div class="col-12 position-relative mb-5">
                            <hr>
                            <div class="col-md-9 position-absolute" style="top: -50%;left: -0.8%;">
                                <div
                                    class="form-row px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                                    <div class="form-group col-md-9 mb-0">
                                        <b>Do You Have Currently Journalism or Used To Do Journalism <span class="text-danger">*</span></b>
                                    </div>
                                    <div class="col text-md-right">
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="customRadioInline1" name="is_journalist" value="1">
                                            <label for="customRadioInline1" class="mb-0">Yes</label>
                                        </div>
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="customRadioInline2" checked name="is_journalist" value="0">
                                            <label for="customRadioInline2" class="mb-0">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-5 d-none" id="reporter-experience">
                        <div class="form-group col-md-5">
                            <label for="Organization">Organization Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="organization_name" id="Organization" placeholder="Enter Organization Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Organization-Type">Organization Type <span class="text-danger">*</span></label>
                            <select id="Organization-Type" class="form-control" name="organization_type">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Designation">Designation <span class="text-danger">*</span></label>
                            <select id="Designation" class="form-control" name="designation">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Start-Journalism">Start Journalism <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="Start-Journalism" name="start_journalism" >
                        </div>
                        <div class="form-group col-md-1">
                            <label for="Total-Experience">Experience<span class="text-danger">*</span></label>
                            <input type="text" disabled class="form-control" id="Total-Experience" placeholder="Experience">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 position-relative mb-5">
                            <hr>
                            <div class="col-md-9 position-absolute" style="top: -50%;left: -0.8%;">
                                <div
                                    class="form-row px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                                    <div class="form-group col-md-9 mb-0">
                                        <b>Do You Have A Personal Office For Journalism <span class="text-danger">*</span></b>
                                    </div>
                                    <div class="col text-md-right">
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="Office1" name="is_personal_office" value="1">
                                            <label for="Office1" class="mb-0">Yes</label>
                                        </div>
                                        <div class="form-group d-inline mr-3">
                                            <input type="radio" id="Office2" checked name="is_personal_office" value="0">
                                            <label for="Office2" class="mb-0">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-5 d-none" id="reporter-office">
                        <div class="form-group col-md-5">
                            <label for="Office-Address">Office Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="office_address" id="Office-Address" placeholder="Enter Office Address">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Block-Tehsil">Block/Tehsil <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="office_tehsil_block"  id="Block-Tehsil" placeholder="Enter Block/Tehsil ">
                        </div>
                        <select name="office_country_id" data-edit="101" class="d-none country" >
                        </select>
                        <div class="form-group col-md-2">
                            <label for="State2">State <span class="text-danger">*</span></label>
                            <select id="State2" name="office_state_id" class="form-control state">
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="city2">District <span class="text-danger">*</span></label>
                            <select id="city2" name="office_city_id" class="form-control city">
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="pincode2">PinCode<span class="text-danger">*</span></label>
                            <input type="text" maxlength="6" name="office_zip" pattern="[0-9]+" class="form-control" id="pincode2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
