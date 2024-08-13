<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $site_name = Setting::where('key','site_name')->select('value')->first();
    $site_description = Setting::where('key','site_description')->select('value')->first();
    
    return view('welcome', compact('site_name', 'site_description'));
});
