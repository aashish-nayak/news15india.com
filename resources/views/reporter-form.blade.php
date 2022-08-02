<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
</head>
<body>
    <div class="container-fluid mt-1">
        <div class="alert alert-danger my-2 text-center">
            <strong>UserName</strong> Please Complete Enquiry Form
        </div>
        <form action="" method="post" id="enquiry-form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 px-0">
                    <h5 class="bg-primary text-center text-light py-1">Persnol Detail</h5>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="form-group row">
                        <label for="applicant_name" class="col-md-4 col-form-label">Applicant Name:</label>
                        <input type="text" class="form-control-sm col-md-8" name="applicant_name" id="applicant_name"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="father_name" class="col-md-4 col-form-label">Father Name:</label>
                        <input type="text" class="form-control-sm col-md-8" name="father_name" id="father_name"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="mother_name" class="col-md-4 col-form-label">Mother Name:</label>
                        <input type="text" class="form-control-sm col-md-8" name="mother_name" id="mother_name"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="adharcard" class="col-md-4 col-form-label">Adhar Card Number:</label>
                        <input type="text" class="form-control-sm col-md-8" name="adharcard" id="adharcard"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="pancard" class="col-md-4 col-form-label">Pan Card Number:</label>
                        <input type="text" class="form-control-sm col-md-8" name="pancard" id="pancard" value="">
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="form-group row">
                        <label for="birth_date" class="col-md-4 col-form-label">Date Of Birth:</label>
                        <input type="date" class="form-control-sm col-md-8" name="birth_date" id="birth_date"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label">Age:</label>
                        <input type="number" class="form-control-sm col-md-8" name="age" id="age" value="">
                    </div>
                    <div class="form-group row">
                        <label for="marital_status" class="col-md-4">Marital Status:</label>
                        <div class="col-md-8">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="marital_status" value="Married">
                                    Married
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="marital_status" value="Unmarried">
                                    Unmarried
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4">Gender:</label>
                        <div class="col-md-8">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" value="Male"> Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" value="Female"> Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="blood_group" class="col-md-4 col-form-label">Blood Group:</label>
                        <select class="form-control col-md-8" name="blood_group" id="blood_group">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mt-3">
                    <!-- <div class="h-75 m-auto" style="border: 2px solid red;">
                    <span style="display: block;" class="h-100">Applicant Image</span>
                    <div class="form-group custom-file px-0 border border-light">
                      <input type="file" class="form-control-file my-2" name="applicant_image" id="applicant_image">
                    </div>
                </div> -->
                    <div class="card">
                        <div class="card-header text-center bg-dark text-light font-weight-bold">Applicant Image:</div>
                        <div class="card-body px-0 py-0">
    
                        </div>
                        <div class="card-footer px-0 py-0">
                            <div class="form-group custom-file px-0 bg-dark text-light">
                                <input type="file" class="form-control-file my-2" name="applicant_image"
                                    id="applicant_image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    <h5 class="bg-primary text-center text-light py-1">Address Detail</h5>
                </div>
                <div class="col-12 mt-3">
                    <div class="form-group row">
                        <label for="home_address" class="col-md-2 col-form-label">Home Address:</label>
                        <input type="text" class="form-control-sm col-md-10" name="home_address" id="home_address"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="block" class="col-md-2 col-form-label">Block:</label>
                        <input type="text" class="form-control-sm col-md-3" name="block" id="block"
                            value="">
                        <label for="district" class="col-md-2 col-form-label">District:</label>
                        <input type="text" class="form-control-sm col-md-5" name="district" id="district"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-2 col-form-label">State:</label>
                        <input type="text" class="form-control-sm col-md-2" name="state" id="state"
                            value="">
                        <label for="pincode" class="col-md-1 col-form-label">Pincode:</label>
                        <input type="number" class="form-control-sm col-md-2" name="pincode" id="pincode"
                            value="">
                        <label for="police_station" class="col-md-2 col-form-label">Police Station:</label>
                        <input type="text" class="form-control-sm col-md-3" name="police_station" id="police_station"
                            value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    <h5 class="bg-primary text-center text-light py-1">Contact Detail</h5>
                </div>
                <div class="col-12 mt-3">
                    <div class="form-group row">
                        <label for="mobile_no" class="col-md-2 col-form-label">Mobile No:</label>
                        <input type="tel" class="form-control-sm col-md-4" name="mobile_no" id="mobile_no"
                            value="">
                        <label for="whatsapp" class="col-md-2 col-form-label">WhatsApp No:</label>
                        <input type="tel" class="form-control-sm col-md-4" name="whatsapp" id="whatsapp"
                            value="">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Email Address:</label>
                        <input type="email" class="form-control-sm col-md-4" name="email" id="email"
                            value="">
                        <label for="mobile_no" class="col-md-2 col-form-label">Emergency Contact No:</label>
                        <input type="tel" class="form-control-sm col-md-4" name="emergency_contact"
                            id="emergency_contact" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0 mb-3">
                    <h5 class="bg-primary text-center text-light py-1">Education Detail</h5>
                </div>
                <div class="col-12 ml-1 row justify-content-between">
    
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">10<small>th</small>
                                Markshit:</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="10th_markshit"
                                        id="10th_markshit">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">10<small>th</small> Markshit</div>
                <span style="display: block; height: 140px" id="10thdocument"> -->
                        <?php
                        // if($user_data[0]["10th"] !== ""){
                        //    echo '<img src="'.USER_IMAGE_SITE_PATH.$user_data[0]["10th"].'">';
                        // }
                        ?>
                        <!-- </span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="10th_markshit" id="10th_markshit">
                </div> -->
                    </div>
    
    
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
    
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">12<small>th</small>
                                Markshit:</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="12th_markshit" id="email">
                                </div>
                            </div>
                        </div>
    
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">12<small>th</small> Markshit</div>
                <span style="display: block; height: 140px">-->
                        <?php
                        // if($user_data[0]["12th"] !== ""){
                        //    echo '<img src="'.USER_IMAGE_SITE_PATH.$user_data[0]["12th"].'">';
                        // }
                        ?>
                        <!--</span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="12th_markshit" id="email">
                </div> -->
    
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
    
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Graduation Markshit:
                            </div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="graduation_markshit"
                                        id="graduation_markshit">
                                </div>
                            </div>
                        </div>
    
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Graduation Markshit</div>
                <span style="display: block; height: 140px"> -->
                        <?php
                        // if($user_data[0]["graduation"] !== ""){
                        //    echo '<img src="'.USER_IMAGE_SITE_PATH.$user_data[0]["graduation"].'">';
                        // }
                        ?>
                        <!-- </span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="graduation_markshit" id="graduation_markshit">
                </div> -->
    
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
    
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Post Graduation:</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="post_graduation"
                                        id="post_graduation">
                                </div>
                            </div>
                        </div>
    
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Post Graduation</div>
                <span style="display: block; height: 140px"> -->
    
                        <!-- </span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="post_graduation" id="post_graduation">
                </div> -->
    
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Other</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="other" id="other">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 px-0 mb-3">
                    <h5 class="bg-primary text-center text-light py-1">Veryfication Document</h5>
                </div>
                <div class="col-12 ml-1 row justify-content-between">
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Adharcard</div>
                <span style="display: block; height: 140px">this is my div</span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="adharcard_image" id="adharcard_image">
                </div> -->
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Aadharcard:</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="adharcard_image"
                                        id="adharcard_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Pancard</div>
                <span style="display: block; height: 140px">this is my div</span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="pancard" id="pancard">
                </div> -->
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Pancard:</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="pancard" id="pancard">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Election Voter Id</div>
                <span style="display: block; height: 140px">this is my div</span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="voter_id"  id="voter_id">
                </div> -->
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Election Voter ID:
                            </div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="voter_id" id="voter_id">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Police Verification</div>
                <span style="display: block; height: 140px">this is my div</span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="police_verification" id="police_verification">
                </div> -->
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Police Verification:
                            </div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="police_verification"
                                        id="police_verification">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 px-0" style="border: 2px solid gray;">
                        <!-- <div class="bg-dark text-light text-center font-weight-bold">Other Document</div>
                <span style="display: block; height: 140px">this is my div</span>
                <div class="form-group custom-file px-0 bg-dark text-light">
                  <input type="file" class="form-control-file" name="other_document" id="other_document">
                </div> -->
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light font-weight-bold">Other Document:</div>
                            <div class="card-body px-0 py-0">
    
                            </div>
                            <div class="card-footer px-0 py-0">
                                <div class="form-group custom-file px-0 bg-dark text-light">
                                    <input type="file" class="form-control-file" name="other_document"
                                        id="other_document">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 px-0">
                    <h6 class="bg-primary text-center text-light py-1">
                        Do You Currenctly journalism or used To Do Journalism : &nbsp;&nbsp;
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input currently_journalism"
                                    name="currently_journalism" value="Yes"> <span class="text-white">Yes</span>
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input currently_journalism"
                                    name="currently_journalism" value="No"> <span class="text-white">No</span>
                            </label>
                        </div>
                    </h6>
                </div>
                <div class="col-12 mt-3" id="currentlyJournalism">
                    <div class="form-group row">
                        <label for="organization_name" class="col-md-2 col-form-label">Organization Name:</label>
                        <input type="text" class="form-control-sm col-md-4" name="organization_name"
                            id="organization_name" value="">
                        <label for="organization_type" class="col-md-2 col-form-label">Organization Type:</label>
                        <input type="text" class="form-control-sm col-md-4" name="organization_type"
                            id="organization_type" value="">
                    </div>
                    <div class="form-group row">
                        <label for="designation" class="col-md-2 col-form-label">Designation:</label>
                        <input type="text" class="form-control-sm col-md-3" name="designation" id="designation"
                            value="">
                        <label for="start_journalism" class="col-md-2 col-form-label">Start Journalism:</label>
                        <input type="text" class="form-control-sm col-md-2" name="start_journalism"
                            id="start_journalism" value="">
                        <label for="expriance" class="col-md-1 col-form-label">Expriance:</label>
                        <input type="text" class="form-control-sm col-md-2" name="expriance" id="expriance"
                            value="">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 px-0">
                    <h6 class="bg-primary text-center text-light py-1">
                        Do You Have Persnol Office : &nbsp;&nbsp;
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input persnol_office" name="persnol_office"
                                    value="Yes"> <span class="text-white">Yes</span>
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input persnol_office" name="persnol_office"
                                    value="No"> <span class="text-white">No</span>
                            </label>
                        </div>
                    </h6>
                </div>
                <div class="col-12 mt-3" id="persnol_office">
                    <div class="form-group row">
                        <label for="office_address" class="col-md-2 col-form-label">Office Address:</label>
                        <input type="text" class="form-control-sm col-md-10" name="office_address"
                            id="office_address" value="">
                    </div>
                    <div class="form-group row">
                        <label for="block" class="col-md-2 col-form-label">Block:</label>
                        <input type="text" class="form-control-sm col-md-4" name="office_block" id="office_block"
                            value="">
                        <label for="destrict" class="col-md-2 col-form-label">Destrict:</label>
                        <input type="text" class="form-control-sm col-md-4" name="office_destrict"
                            id="office_destrict" value="">
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-2 col-form-label">State:</label>
                        <input type="text" class="form-control-sm col-md-4" name="office_state" id="office_state"
                            value="">
                        <label for="pincode" class="col-md-2 col-form-label">Pincode:</label>
                        <input type="text" class="form-control-sm col-md-4" name="office_pincode" id="office_pincode"
                            value="">
                    </div>
                </div>
            </div>
            <div id="msg-container">
                <strong id="msg-container-text"></strong>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary w-100 mt-2 font-weight-bold">
        </form>
    </div>
</body>
</html>