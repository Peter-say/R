<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*", function ($view) {
            $view->with([
                'web_assets' => url('/') . env('RESOURCE_URL') . '/web',
                'dashboard_assets' => url('/') . env('RESOURCE_URL') . '/dashboard',

            ]);
        });
    }
}
