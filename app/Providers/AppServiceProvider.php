<?php

namespace App\Providers;

use App\Contracts\DelieveryServiceContract;
use App\Contracts\NotificationContractsService;
use App\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\MovieRepositoryInterface;
use App\Services\Emailnotification;
use App\Services\FedexService;
use App\Services\UpsService;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
