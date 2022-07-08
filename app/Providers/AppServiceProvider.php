<?php

namespace App\Providers;

use App\WondeService;
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
        $this->app->singleton('wonde', function () {
            if (!config('wonde.token')) {
                throw new \Exception('Missing environment variable, please define WONDE_TOKEN');
            }

            $wondeClient = new \Wonde\Client(config('wonde.token'), storage_path('logs/wonde.log'));

            return new WondeService($wondeClient);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
