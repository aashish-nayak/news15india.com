<?php

use App\Models\Setting;
use Carbon\Carbon;

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