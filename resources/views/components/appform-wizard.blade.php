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
    <div class="tab-content">
        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="app-name">Applicant Name</label>
                                <input type="text" class="form-control" id="app-name"
                                    placeholder="Enter Applicant Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Father-name">Father Name</label>
                                <input type="text" class="form-control" id="Father-name"
                                    placeholder="Enter Father Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Mother-name">Mother Name</label>
                                <input type="text" class="form-control" id="Mother-name"
                                    placeholder="Enter Mother Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" class="form-control" id="dob" placeholder="Enter Date Of Birth">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" disabled id="age" placeholder="Age">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Gender">Gender</label>
                                <select id="Gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Marital-Status">Marital Status</label>
                                <select id="Marital-Status" class="form-control">
                                    <option>Married</option>
                                    <option>Unmarried</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Blood-Group">Blood Group</label>
                                <select id="Blood-Group" class="form-control">
                                    <option>A positive (A+)</option>
                                    <option>A negative (A-)</option>
                                    <option>B positive (B+)</option>
                                    <option>B negative (B-)</option>
                                    <option>O positive (O+)</option>
                                    <option>O negative (O-)</option>
                                    <option>AB positive (AB+)</option>
                                    <option>AB negative (AB-)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aadhar">Aadhaar Card Number</label>
                                <input type="text" class="form-control" id="aadhar"
                                    placeholder="Enter Aadhaar Card Number ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pan">Pan Card Number</label>
                                <input type="text" class="form-control" id="pan"
                                    placeholder="Enter Pan Card Number ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="file" name="" class="dropify" id="" data-height="80%">
                    </div>
                </div>
            </div>
        </div>
        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="home-address">Home Address</label>
                    <input type="text" class="form-control" id="home-address" placeholder="Enter Home Address">
                </div>
                <div class="form-group col-md-6">
                    <label for="block-tehsil">Block/Tehsil</label>
                    <input type="text" class="form-control" id="block-tehsil"
                        placeholder="Enter Block/Tehsil Name">
                </div>
                <select id="country" name="country" data-edit="101" class="d-none">
                </select>
                <div class="form-group col-md-6">
                    <label for="State">State</label>
                    <select id="State" name="state" class="form-control">

                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="District">District</label>
                    <select id="District" name="city" class="form-control">

                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="pincode">Area Pin Code</label>
                    <input type="text" pattern="[0-9]+" maxlength="6" class="form-control" id="pincode"
                        placeholder="Enter Area Pin Code">
                </div>
                <div class="form-group col-md-4">
                    <label for="police-station">Police Station</label>
                    <input type="text" class="form-control" id="police-station"
                        placeholder="Enter Police Station">
                </div>
            </div>
        </div>
        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
            <div class="form-row my-5">
                <div class="form-group col-md-3">
                    <label for="Mobile">Mobile Number</label>
                    <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" id="Mobile"
                        placeholder="Enter Mobile Number">
                </div>
                <div class="form-group col-md-3">
                    <label for="WhatsApp">WhatsApp Number</label>
                    <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" id="WhatsApp"
                        placeholder="Enter WhatsApp Number">
                </div>
                <div class="form-group col-md-3">
                    <label for="email">E-Mail Address</label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="10"
                        class="form-control" id="email" placeholder="Enter E-Mail Address">
                </div>
                <div class="form-group col-md-3">
                    <label for="Emergency">Emergency Contact Number</label>
                    <input type="text" pattern="[0-9]+" maxlength="10" class="form-control" id="Emergency"
                        placeholder="Enter Emergency Contact Number">
                </div>
            </div>
        </div>
        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
            <div class="form-row">
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="10Marksheet">10<sup>th</sup> Marksheet</label>
                    <input type="file" class="dropify" id="10Marksheet">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="12Marksheet">12<sup>th</sup> Marksheet</label>
                    <input type="file" class="dropify" id="12Marksheet">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Graduation">Graduation Marksheet </label>
                    <input type="file" class="dropify" id="Graduation">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Digree">Digree/Diploma</label>
                    <input type="file" class="dropify" id="Digree">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Other">Other Certificate</label>
                    <input type="file" class="dropify" id="Other">
                </div>
            </div>
        </div>
        <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
            <div class="form-row">
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Aadhaar-img">Aadhaar Card</label>
                    <input type="file" class="dropify" id="Aadhaar-img">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Pan-img">Pan Card </label>
                    <input type="file" class="dropify" id="Pan-img">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Voter-Driving-img">Voter ID/Driving
                        License</label>
                    <input type="file" class="dropify" id="Voter-Driving-img">
                </div>
                <div class="form-group col">
                    <label class="border w-100 p-2 border-dark" for="Police-img">Police Verification</label>
                    <input type="file" class="dropify" id="Police-img">
                </div>
                <div class="form-group col mb-5">
                    <label class="border w-100 p-2 border-dark" for="Other-img">Other Document</label>
                    <input type="file" class="dropify" id="Other-img">
                </div>
                <div class="col-12 position-relative mb-5">
                    <hr>
                    <div class="col-md-9 position-absolute" style="top: -50%;left: -0.8%;">
                        <div
                            class="form-row px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                            <div class="form-group col-md-9 mb-0">
                                <b>Do You Have Currently Journalism or Used To Do Journalism</b>
                            </div>
                            <div class="col text-md-right">
                                <div class="form-group d-inline mr-3">
                                    <input type="radio" id="customRadioInline1" name="is_journalism"
                                        value="1">
                                    <label for="customRadioInline1" class="mb-0">Yes</label>
                                </div>
                                <div class="form-group d-inline mr-3">
                                    <input type="radio" id="customRadioInline2" checked name="is_journalism"
                                        value="0">
                                    <label for="customRadioInline2" class="mb-0">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mb-5 d-none" id="reporter-experience">
                <div class="form-group col-md-5">
                    <label for="Organization">Organization Name</label>
                    <input type="text" class="form-control" id="Organization"
                        placeholder="Enter Organization Name">
                </div>
                <div class="form-group col-md-2">
                    <label for="Organization-Type">Organization Type</label>
                    <select id="Organization-Type" class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="Designation">Designation</label>
                    <select id="Designation" class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="Start-Journalism">Start Journalism</label>
                    <input type="date" class="form-control" id="Start-Journalism">
                </div>
                <div class="form-group col-md-1">
                    <label for="Total-Experience">Experience</label>
                    <input type="text" disabled class="form-control" id="Total-Experience"
                        placeholder="Experience">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 position-relative mb-5">
                    <hr>
                    <div class="col-md-9 position-absolute" style="top: -50%;left: -0.8%;">
                        <div
                            class="form-row px-4 py-2 border border-secondary align-items-center justify-content-md-between bg-light">
                            <div class="form-group col-md-9 mb-0">
                                <b>Do You Have A Personal Office For Journalism</b>
                            </div>
                            <div class="col text-md-right">
                                <div class="form-group d-inline mr-3">
                                    <input type="radio" id="Office1" name="is_office" value="1">
                                    <label for="Office1" class="mb-0">Yes</label>
                                </div>
                                <div class="form-group d-inline mr-3">
                                    <input type="radio" id="Office2" checked name="is_office" value="0">
                                    <label for="Office2" class="mb-0">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mb-5 d-none" id="reporter-office">
                <div class="form-group col-md-5">
                    <label for="Office-Address">Office Address</label>
                    <input type="text" class="form-control" id="Office-Address"
                        placeholder="Enter Office Address">
                </div>
                <div class="form-group col-md-2">
                    <label for="Block-Tehsil">Block/Tehsil</label>
                    <input type="text" name="" class="form-control" id="Block-Tehsil"
                        placeholder="Enter Block/Tehsil ">
                </div>
                <div class="form-group col-md-2">
                    <label for="State2">State</label>
                    <select id="State2" name="state" class="form-control">
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="city2">District</label>
                    <select id="city2" name="city" class="form-control">
                    </select>
                </div>
                <div class="form-group col">
                    <label for="pincode2">Pin Code</label>
                    <input type="text" maxlength="6" pattern="[0-9]+" class="form-control" id="pincode2">
                </div>
            </div>
        </div>
    </div>
</div>
