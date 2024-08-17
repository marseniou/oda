<?php

use App\Models\Post;
use App\Models\Concert;
use App\Models\Setting;
use App\Models\Musician;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    $site_name = Setting::where('key', 'site_name')->select('value')->first();
    $site_description = Setting::where('key', 'site_description')->select('value')->first();    
    $image = Setting::where('key', 'hero_image')->select('value')->first();    
    $musicians=  Musician::active()->select('name', 'instrument', 'image', 'slug')->take(3)->get();
    $concert=  Concert::current()->take(1)->first();
    //dd($concert);
    return view('welcome', compact('site_name', 'site_description', 'image', 'musicians', 'concert'));
})->name('welcome');

Route::get('/blog', function () {
    $posts = Post::active()->publishedAt()->orderBy('published_at', 'DESC')->paginate(5);
    
    return view('blog', compact('posts'));
})->name('blog');

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('post', compact('post'));
})->name('post');
Route::get('/musicians/{musician:slug}', function ($slug) {
    $musician = Musician::where('slug', $slug)->first();
    
    return view('musician', compact('musician'));
})->name('musician');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
//Route::post('/contact', [ContactController::class, 'send'])->name('contact_send');

Route::get('/concerts', function () {
    $concerts = Concert::Current()->paginate(5);
    return view('concerts', compact('concerts'));
})->name('concerts');