<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Constants\Roles as CodeRoles;


if (!function_exists('set_active_menu')) {
    
    function set_active_menu($uri, $output = 'active') {
        if( is_array($uri) ) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)){
                return $output;
            }
        }
    }
}

if (!function_exists('route_redirect_user')) {
    
    function route_redirect_user($codeRole) {
        if($codeRole == CodeRoles::ADMINISTRATOR) {
            return route('app.administrator.dashboard');
        } else if($codeRole == CodeRoles::KEMENTERIAN_PERHUBUNGAN) {
            return route('app.nasional.dashboard');
        } else if($codeRole == CodeRoles::BPTD) {
            return route('app.bptd.dashboard');
        } else if($codeRole == CodeRoles::DINAS_PERHUBUNGAN_PROVINSI) {
            return route('app.dishub-prov.dashboard');
        } else if($codeRole == CodeRoles::DINAS_PERHUBUNGAN_KOTA) {
            return route('app.dishub-kota.dashboard');
        } else if($codeRole == CodeRoles::DINAS_PERHUBUNGAN_KABUPATEN) {
            return route('app.dishub-kab.dashboard');
        }
    }
}
