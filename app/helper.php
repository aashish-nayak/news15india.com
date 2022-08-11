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
if (!function_exists('setting')) {
    function setting($key = null, $default = null)
    {
        if (!empty($key)) {
            try {
                return Setting::get($key, $default);
            } catch (Exception $exception) {
                return $default;
            }
        }
    }
}
