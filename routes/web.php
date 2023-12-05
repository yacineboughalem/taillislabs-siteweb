<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;



Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
Route::get('/storage-link', function() {
    Artisan::call('storage:link');
    return "Storage is Linked";
});

Route::get('/locale/{lang}', [ Front\HomeController::class , 'lang' ] );


Route::get('/', [ Front\HomeController::class , 'index' ] )->name('home');


Route::get('/blog',[ Front\BlogController::class , 'blog'])->name('blog');
Route::get('/blog/{slug}',[ Front\BlogController::class , 'showBlog'])->name('showBlog');
Route::get('/blog/category/{slug}',[ Front\BlogController::class , 'postByCategory'])->name('postByCategory');

Route::post('/contactMessage', 'HomeController@contactMail')->name('contactMessage');
// Route::get('/','HomeController@index');





Route::get('/our-services', function () {
    return view('frontend.pages.metiers.index');
})->name("services");

Route::get('/our-services/digital-transformation-consulting', function () {
    return view('frontend.pages.metiers.conseil');
})->name("services.digital");
Route::get('/our-services/uxui-design', function () {
    return view('frontend.pages.metiers.uxui');
})->name("services.uxui");
Route::get('/our-services/software-development', function () {
    return view('frontend.pages.metiers.devlogiciel');
})->name("services.devsoftware");
Route::get('/our-services/web-and-mobile-development', function () {
    return view('frontend.pages.metiers.devwebmobile');
})->name("services.webmobile");
Route::get('/our-services/innovation', function () {
    return view('frontend.pages.metiers.innovation');
})->name("services.innovation");

// Route::get('/about', function () {
//     return view('front.taillislabs.about');
// });

// Route::post('/message', 'HomeController@message')->name('message');

Route::get('/terms-and-condition', function () {
    return view('frontend.pages.terms-and-condition');
});

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

Route::post('/contact'          ,[ Front\ContactController::class , 'messageContact'])->name('messageContact');



// ADMIN ROOT
Route::group(['prefix' => '/panel', 'as'=> 'admin.'], function () {

    Route::get('/',function(){ return redirect()->route('admin.dashboard'); });
    // auth routes
    Route::get('/login'                  ,[ Admin\Auth\LoginController::class , 'showLoginForm'])->name('login');
    Route::post('/login'                 ,[ Admin\Auth\LoginController::class , 'login']        );
    Route::post('/logout'                ,[ Admin\Auth\LoginController::class , 'logout']       )->name('logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard',         [Admin\DashboardController::class , 'index' ])->name('dashboard');
        
        Route::resource('/admin',         Admin\AdminController::class);
        
        Route::resource('/banner', Admin\BannerController::class);
        Route::get('banner/enable/{id}',[Admin\BannerController::class, 'enable'])->name('enable'); 
     
        // Settings
        Route::get('/settings',             [Admin\SettingsController::class , 'index' ])->name('settings')->middleware('admin_super');
        Route::post('/settings',            [Admin\SettingsController::class , 'index' ])->name('settings.update')->middleware('admin_super');
      
        //POSTs
        Route::resource('collection',Admin\Blog\CollectionController::class);
        Route::resource('collection-work',Admin\Blog\CollectionController::class);
        Route::resource('post', Admin\Blog\PostController::class);
        Route::get('pending/post', [Admin\Blog\PostController::class, 'pending'])->name('post.pending');
        Route::get('/post/{id}/approve', [Admin\Blog\PostController::class, 'approval'])->name('post.approve');
        Route::get('post/enable/{id}',[Admin\Blog\PostController::class, 'enable'])->name('post.enable'); 

        Route::resource('partners', Admin\PartnersController::class);
      
    });

});


Route::group(['prefix' => '/panel/media'], function () {
    Route::group(['middleware' => 'auth:admin'], function () { 
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});







