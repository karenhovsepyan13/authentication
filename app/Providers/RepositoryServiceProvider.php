<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\Read\UserReadRepository;
use App\Repositories\User\Write\UserWriteRepository;
use App\Repositories\Product\Read\ProductReadRepository;
use App\Repositories\Product\Write\ProductWriteRepository;
use App\Repositories\User\Read\UserReadRepositoryInterface;
use App\Repositories\User\Write\UserWriteRepositoryInterface;
use App\Repositories\Product\Read\ProductReadRepositoryInterface;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );
        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );
        $this->app->bind(
            ProductReadRepositoryInterface::class,
            ProductReadRepository::class
        );
        $this->app->bind(
            ProductWriteRepositoryInterface::class,
            ProductWriteRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
