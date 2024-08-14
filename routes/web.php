<?php

use App\Models\Post;
use App\Models\Concert;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $site_name = Setting::where('key', 'site_name')->select('value')->first();
    $site_description = Setting::where('key', 'site_description')->select('value')->first();    
    $image = Setting::where('key', 'hero_image')->select('value')->first();    
    
    return view('welcome', compact('site_name', 'site_description', 'image'));
})->name('welcome');

Route::get('/blog', function () {
    $posts = Post::active()->paginate(5);
    
    return view('blog', compact('posts'));
})->name('blog');

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('post', compact('post'));
})->name('post');

Route::get('/concerts', function () {
    $concerts = Concert::Current()->paginate(5);
    return view('concerts', compact('concerts'));
})->name('concerts');