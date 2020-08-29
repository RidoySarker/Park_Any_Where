<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Observers\AppSettingsObserver;
use App\AppSettings;
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
        AppSettings::observe(AppSettingsObserver::class);
        View::composer(["frontend.Booking.booking","admin.layouts.backend_sidebar"],function ($view_data) {
            
            $view_data->with("appsettings",Cache::rememberForever("appsettings",function(){
                return AppSettings::first();
            }));
        });
    }
}
