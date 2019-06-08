<?php

namespace App\Providers;

use Illuminate\Support\Facades\Redis;
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Hack to make Laravel Telescope catch Redis events while using Redis as a cache
         */
        if (app()->environment() !== 'local') {
            // For previously resolved connections.
            foreach ((array)Redis::connections() as $connection) {
                $connection->setEventDispatcher($this->app->make('events'));
            }

            // For new connections.
            Redis::enableEvents();
        }
    }
}
