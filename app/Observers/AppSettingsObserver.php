<?php

namespace App\Observers;

use App\AppSettings;
use Illuminate\Support\Facades\Cache;
class AppSettingsObserver
{
    /**
     * Handle the app settings "created" event.
     *
     * @param  \App\AppSettings  $appSettings
     * @return void
     */
    public function created(AppSettings $appSettings)
    {
        //
    }

    /**
     * Handle the app settings "updated" event.
     *
     * @param  \App\AppSettings  $appSettings
     * @return void
     */
    public function updated(AppSettings $appSettings)
    {
        Cache::forget("appsettings");
    }

    /**
     * Handle the app settings "deleted" event.
     *
     * @param  \App\AppSettings  $appSettings
     * @return void
     */
    public function deleted(AppSettings $appSettings)
    {
        //
    }

    /**
     * Handle the app settings "restored" event.
     *
     * @param  \App\AppSettings  $appSettings
     * @return void
     */
    public function restored(AppSettings $appSettings)
    {
        //
    }

    /**
     * Handle the app settings "force deleted" event.
     *
     * @param  \App\AppSettings  $appSettings
     * @return void
     */
    public function forceDeleted(AppSettings $appSettings)
    {
        //
    }
}
