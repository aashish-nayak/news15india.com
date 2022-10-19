<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'advertiser_name',
        'advertiser_number',
        'advertiser_email',
        'billing_name',
        'billing_address',
        'block',
        'country_id',
        'state_id',
        'city_id',
        'pincode',
        'package',
        'ad_type',
        'ad_category',
        'ad_location',
        'ad_width',
        'ad_height',
        'ad_duration',
        'publish_date',
        'expire_date',
        'discount',
        'ad_title',
        'ad_description',
        'ad_image',
        'ad_redirect',
        'is_approved',
        'status',
    ];

    public function ad_locations()
    {
        return $this->belongsToMany(AdvertPlacement::class,'advert_advert_placement','advert_id','advert_placement_id');
    }

    public function advert_category()
    {
        return $this->belongsTo(AdvertCategory::class,'ad_category','id');
    }
}
