<?php

namespace App\Providers;

use App\Repository\ApartmentRepository;
use App\Repository\CategoryRepository;
use App\Repository\Interface\ActiveApartmentRepositoryInterface;
use App\Repository\Interface\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ActiveApartmentRepositoryInterface::class,ApartmentRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
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
