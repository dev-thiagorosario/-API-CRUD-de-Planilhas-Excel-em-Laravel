<?php

namespace App\Providers;

use App\Repositories\CreateUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CreateUserRepository;
use App\Usecases\CreateUserUsecase;
use App\Usecases\CreateUserUsecaseInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CreateUserRepositoryInterface::class,
            CreateUserRepository::class
        );

        $this->app->bind(
            CreateUserUsecaseInterface::class,
            CreateUserUsecase::class
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
