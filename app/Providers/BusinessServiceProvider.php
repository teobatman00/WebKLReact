<?php

namespace App\Providers;

use App\Services\Interfaces\MediaServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\MediaService;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class BusinessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            MediaServiceInterface::class,
            MediaService::class
        );
        $this->app->singleton(
            PostServiceInterface::class,
            PostService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
