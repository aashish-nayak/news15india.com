<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = [
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'marital_status' => 'required',
            'blood_group' => 'required',
            'aadhar_number' => 'required|unique:reporters',
            'pan_number' => 'required|unique:reporters',
            'home_address' => 'required',
            'tehsil_block' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zip' => 'required',
            'police_station' => 'required',
            'phone_number' => 'required|unique:reporters',
            'whatsapp_number' => 'required',
            'emergency_number' => 'required',
            // 'organization_name' => [],
            // 'organization_type' => [],
            // 'designation' => [],
            // 'start_journalism' => [],
            // 'office_address' => [],
            // 'office_tehsil_block' => [],
            // 'office_country_id' => [],
            // 'office_state_id' => [],
            // 'office_city_id' => [],
            // 'office_zip' => [],
            // 'avatar' => [],
            // '10th_image' => [],
            // '12th_image' => [],
            // 'aadhar_image' => [],
            // 'pan_image' => [],
            // 'voter_driving_image' => [],
            // 'graduation_image' => [],
            // 'diploma_image' => [],
            // 'other_certificate' => [],
            // 'police_verification' => [],
            // 'other_document' => [],
        ];
        if(auth('web')->check() == false){
            $data['email'] = 'required|email|unique:reporters';
        }
        return $data;
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'father_name.required' => 'Father Name is required',
            'mother_name.required' => 'Mother Name is required',
            'dob.required' => 'Date of Birth is required',
            'gender.required' => 'Gender is required',
            'marital_status.required' => 'Marital Status is required',
            'blood_group.required' => 'Blood Group is required',
            'aadhar_number.required' => 'Aadhar Number is required',
            'pan_number.required' => 'Pan Number is required',
            'home_address.required' => 'Home Address is required',
            'tehsil_block.required' => 'Block/Tehsil is required',
            'country_id.required' => 'Country is required',
            'state_id.required' => 'State is required',
            'city_id.required' => 'City is required',
            'zip.required' => 'Zip is required',
            'police_station.required' => 'Police Station is required',
            'phone_number.required' => 'Phone Number is required',
            'whatsapp_number.required' => 'Whatsapp is required',
            'emergency_number.required' => 'Emergency is required',
        ];
    }
}
