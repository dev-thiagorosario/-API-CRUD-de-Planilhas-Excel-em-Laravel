<?php

namespace App\Providers;

use App\Repositories\CreateUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CreateUserRepository;
use App\Usecases\CreateUserUsecase;
use App\Usecases\CreateUserUsecaseInterface;
use App\Repositories\LoginRepositoryInterface;
use App\Repositories\LoginRepository;
use App\Usecases\LoginUsecaseInterface;
use App\Usecases\LoginUsecase;


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
            LoginUsecaseInterface::class,
            LoginUsecase::class
        );

        $this->app->bind(
            LoginRepositoryInterface::class,
            LoginRepository::class
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
