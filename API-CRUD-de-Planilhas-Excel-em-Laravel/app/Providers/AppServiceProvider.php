<?php

namespace App\Providers;

use App\Repositories\CreateUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CreateUserRepository;
use App\Usecases\CreateUserUsecase;
use App\Usecases\CreateUserUsecaseInterface;
use App\Repositories\LoginUserRepositoryInterface;
use App\Repositories\LoginUserRepository;
use App\Usecases\LoginUserUsecaseInterface;
use App\Usecases\LoginUserUsecase;


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

        $this->app->bind(
            LoginUserUsecaseInterface::class,
            LoginUserUsecase::class
        );

        $this->app->bind(
            LoginUserRepositoryInterface::class,
            LoginUserRepository::class
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
