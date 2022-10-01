<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_ip',
        'admin_id',
        'name',
        'father_name',
        'mother_name',
        'email',
        'phone_number',
        'whatsapp_number',
        'emergency_number',
        'dob',
        'gender',
        'avatar',
        'applied_designation',
        'marital_status',
        'blood_group',
        'home_address',
        'tehsil_block',
        'country_id',
        'state_id',
        'city_id',
        'zip',
        'police_station',
        'aadhar_number',
        'aadhar_image',
        'pan_number',
        'pan_image',
        'voter_driving_image',
        '10th_image',
        '12th_image',
        'graduation_image',
        'diploma_image',
        'police_verification',
        'other_certificate',
        'other_document',
        'is_journalist',
        'organization_name',
        'organization_type',
        'designation',
        'start_journalism',
        'is_personal_office',
        'office_address',
        'office_tehsil_block',
        'office_country_id',
        'office_state_id',
        'office_city_id',
        'office_zip',
        'app_status',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function office_country()
    {
        return $this->belongsTo(Country::class,'office_country_id');
    }

    public function office_state()
    {
        return $this->belongsTo(State::class,'office_state_id');
    }

    public function office_city()
    {
        return $this->belongsTo(City::class,'office_city_id');
    }

    public function payment()
    {
        return $this->morphOne(Payment::class,__FUNCTION__,'reference_type','reference_id','id');
    }
}
