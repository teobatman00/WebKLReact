<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CommentServiceInterface;
use App\Services\Interfaces\MediaServiceInterface;
use App\Services\Interfaces\PostMetaServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\RoleServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\MediaService;
use App\Services\PostMetaService;
use App\Services\PostService;
use App\Services\RoleService;
use App\Services\TagService;
use App\Services\UserService;
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
        $this->app->singleton(
            CategoryServiceInterface::class,
            CategoryService::class
        );
        $this->app->singleton(
            CommentServiceInterface::class,
            CommentService::class
        );
        $this->app->singleton(
            PostMetaServiceInterface::class,
            PostMetaService::class
        );
        $this->app->singleton(
            RoleServiceInterface::class,
            RoleService::class
        );
        $this->app->singleton(
            TagServiceInterface::class,
            TagService::class
        );
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
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
