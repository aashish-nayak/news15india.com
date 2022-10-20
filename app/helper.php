<?php

use App\Models\Advert;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;

if (!function_exists('formatBytes')) {
    function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}

if (!function_exists('kmb')) {
    function kmb($count, $precision = 2)
    {
        if($count < 1000){
            $n_format = number_format($count / 1);
        }else if ($count < 1000000) {
            // Anything less than a million
            $n_format = number_format($count / 1000) . 'K';
        } else if ($count < 1000000000) {
            // Anything less than a billion
            $n_format = number_format($count / 1000000, $precision) . 'M';
        } else {
            // At least a billion
            $n_format = number_format($count / 1000000000, $precision) . 'B';
        }
        return $n_format;
    }
}
if (!function_exists('buildSetting')) {
    function buildSetting(string $key, $value): array
    {
        return [
            'key' => $key,
            'value' => $value,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];
    }
}

if (!function_exists('createSetting')) {
    function createSetting(string $key, $value = null)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting == null) {
            $setting = Setting::create(buildSetting($key, $value));
        }
        return $setting;
    }
}

if (!function_exists('setting')) {
    function setting($key = null)
    {
        if (!empty($key)) {
            try {
                return Setting::where('key', $key)->first()->value;
            } catch (Exception $exception) {
                return (config('settings.defaults.' . $key) != null) ? config('settings.defaults.' . $key) : null;
            }
        }
    }
}

if (!function_exists('convertYoutube')) {
    function convertYoutube($string)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "www.youtube.com/embed/$2",
            $string
        );
    }
}

if(!function_exists('frontDateFormat')){
    function frontDateFormat($date)
    {
        return Carbon::parse($date)->format('h:i A | d M Y');
    }
}

if(!function_exists('AdvertHTML')){
    function AdvertHTML($loc,$adtext = true){
        $advert = Advert::whereHas('ad_locations',function($query)use($loc){
            $query->where('slug','like',"%$loc%");
        })->where('publish_date','<=',now()->toDateString())
        ->where('expire_date','>=',now()->toDateString())
        ->where('is_approved','approved')
        ->where('status',1)->orderBy('views')->first();
        
        if($advert){
            $advert->plusViews();
            $html = View::make('components.advert', [
                'url' => ($advert->ad_redirect != '') ? route('advert.redirect',$advert->slug) : 'javascript:void(0)',
                'img' => $advert->getImage(),
                'width' => $advert->ad_width,
                'height' => $advert->ad_height,
                'target' => ($advert->ad_redirect != '') ? '_blank' : '_self',
                'ad_text' => $adtext,
            ])->render();
            return new HtmlString($html);
        } else {
            return '';
        }
    }
}