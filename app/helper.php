<?php

use App\Models\Setting;

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
if(!function_exists('buildSetting')){
    function buildSetting(string $key, $value) : array {
        return [
            'key' => $key,
            'value' => $value,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];
    }
}

if(!function_exists('createSetting')){
    function createSetting(string $key, $value = null)
    {
        $setting = Setting::where('key',$key)->first();
        if($setting == null){
            $setting = Setting::create(buildSetting($key,$value));
        }
        return $setting;
    }
}

if (!function_exists('setting')) {
    function setting($key = null)
    {
        if (!empty($key)) {
            try {
                return Setting::where('key',$key)->first()->value;
            } catch (Exception $exception) {
                return null;
            }
        }
    }
}

