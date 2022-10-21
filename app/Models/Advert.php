<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'admin_id',
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
        'views',
        'clicks',
        'editable_views',
        'editable_clicks',
        'total_amount',
        'discount',
        'subtotal_amount',
        'net_amount',
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function ad_locations()
    {
        return $this->belongsToMany(AdvertPlacement::class, 'advert_advert_placement', 'advert_id', 'advert_placement_id');
    }

    public function advert_category()
    {
        return $this->belongsTo(AdvertCategory::class, 'ad_category', 'id');
    }

    public function plusViews($up = 1)
    {
        return $this->update(['views' => $this->views + $up]);
    }

    public function plusClicks($up = 1)
    {
        return $this->update(['clicks' => $this->clicks + $up]);
    }

    public function resetViews()
    {
        return $this->update(['views' => 0]);
    }

    public function resetClicks()
    {
        return $this->update(['clicks' => 0]);
    }

    public function deleteImage()
    {
        if (Storage::exists('public/advertisements/' . $this->ad_image)) {
            Storage::delete('public/advertisements/' . $this->ad_image);
        }
    }

    public function getImage()
    {
        return asset('storage/advertisements/' . $this->ad_image);
    }
}
