<?php
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
