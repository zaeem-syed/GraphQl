<?php

namespace App\Providers;

use App\Models\Post;
use App\Services\UpsService;
use App\Services\FedexService;
use App\Observers\PostObserver;
use App\Services\Emailnotification;
use App\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;
use App\Contracts\DelieveryServiceContract;
use App\Repositories\MovieRepositoryInterface;
use App\Contracts\NotificationContractsService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(NotificationContractsService::class,Emailnotification::class);
        $this->app->bind(DelieveryServiceContract::class,UpsService::class);
        $this->app->bind(DelieveryServiceContract::class,FedexService::class);

        Post::observe(PostObserver::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
