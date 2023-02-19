<?php

namespace App\Providers;

use FTP\Connection;
use Illuminate\Console\Application;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(Connection::class, function (Application $app){
            return new Connection(config('riak'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
