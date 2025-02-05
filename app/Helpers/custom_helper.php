<?php

use App\Models\Admin;

if(!function_exists('project_name')) {
    function project_name() {
        return env('APP_NAME');
    }
}

if(!function_exists('superadmin_asset')) {
    function superadmin_asset($path) {
        return asset('template/'.$path);
    }
}

if (!function_exists('site_logo')) {
    function site_logo($class = '') {
        return "<img src='". asset('/METER_logo_light_bg.png') ."' alt='". project_name() ." Logo' class='$class' style='height: 200px;'>";
    }
}

if(!function_exists('mobile_logo')) {
    function mobile_logo($class = '') {
        return "<img src='". asset('/favicon/favicon.webp') ."' alt='". project_name() ." Logo' class='$class' style='height: 100px;'>";
    }
}

if(!function_exists('admin_status')) {
    function admin_status($status) {
        return Admin::STATUS[$status];
    }
}

if(!function_exists('admin_asset')) {
    function admin_asset($path) {
        return asset('template/'.$path);
    }
}
