<?php

use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Support\Facades\App;

if(!function_exists('project_name')) {
    function project_name() {
        if(App::getLocale() == 'ar') {
            return 'ميتر';
        }
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
    function admin_asset($path = null) {
        return asset('admin/'.$path);
    }
}

if(!function_exists('owner_status')) {
    function owner_status() {
        return Owner::STATUS_VALUES;
    }
}


if(!function_exists('owner_status_verified')) {
    /**
     * Get the verified status of the owner
     * @return string
     * @see Owner::STATUS_VERIFIED
     */
    function owner_status_verified() : string {
        return Owner::STATUS_VERIFIED;
    }
}

if(!function_exists('owner_status_pending')) {
    /**
     * Get the pending status of the owner
     * @return string
     * @see Owner::STATUS_PENDING
     */
    function owner_status_pending() : string {
        return Owner::STATUS_PENDING;
    }
}

if(!function_exists('owner_status_suspended')) {
    /**
     * Get the suspended status of the owner
     * @return string
     * @see Owner::STATUS_PENDING
     */
    function owner_status_suspended() : string {
        return Owner::STATUS_PENDING;
    }
}

/**
 * Customize Date Format
 * @param string $date
 * @param string|null $format default is 'd-m-Y'
 * @return string
 * @see \Carbon\Carbon::format()
 */
function format_date(string $date, ?string $format = 'd-m-Y') : string {
    return \Carbon\Carbon::parse($date)->format($format);
}
