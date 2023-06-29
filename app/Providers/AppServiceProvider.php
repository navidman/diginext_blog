<?php

namespace App\Providers;

use App\Facades\PostFacade;
use App\Facades\UserFacade;
use App\Facades\VideoFacade;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Repositories\VideoRepository;
use App\Services\PostService;
use App\Services\UserService;
use App\Services\VideoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Facades
        UserFacade::shouldProxyTo(UserService::class);
        PostFacade::shouldProxyTo(PostService::class);
        VideoFacade::shouldProxyTo(VideoService::class);

        //Repositories
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class,
        );

        $this->app->bind(
            VideoRepositoryInterface::class,
            VideoRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
