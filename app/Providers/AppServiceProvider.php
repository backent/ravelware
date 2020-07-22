<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\Database\Infrastructure\Database;
use App\Support\Database\FileDatabase;

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
        $this->app->bind(Database::class, function($app) {
            return new FileDatabase();
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
