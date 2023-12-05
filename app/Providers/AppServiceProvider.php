<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

use App\Models\Banner;
use App\Models\Setting;

use App\Models\Collection;
use App\Models\Post;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        //
        Paginator::useBootstrap();

        Str::macro('currency', function ($price,$currency = "MAD" ){
            return number_format($price, 2 , '.', ' '). ' '.$currency;
        });

        Str::macro('number', function ($value){
            return number_format($value);
        });

        view()->composer(['*'], function($view) {
            $settings = Cache::remember('settings', now()->addDays(1) , function () {
                return Setting::first();
            });
            $view->with( 'settings' , $settings );
        });

        view()->composer(['frontend.pages*'], function($view) {

           

            $banners = Cache::remember('banners', now()->addDays(1) , function () {
                return Banner::where('status', 1)
                            ->get();
            });
            $view->with( 'banners' , $banners );


            // BLOG--------------------

            $collections = Cache::remember('collections', now(), function () {
                return Collection::get();
            });
            
            $view->with('collections', $collections);


            $postss = Cache::remember('postss', now()->addDays(0) , function () {
                return Post::latest()
                            ->where('status', 1)
                            ->get();
            });
            $view->with('postss', $postss );

        });


        
       
    }
}
