<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AnnoncesRepositoryInterface;
use App\Interfaces\AppartementsRepositoryInterface;
use App\Interfaces\UserPublicRepositoryInterface;
use App\Repositories\AnnoncesRepository;
use App\Repositories\AppartementsRepository;
use App\Repositories\UserPublicRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AnnoncesRepositoryInterface::class, AnnoncesRepository::class);
        $this->app->bind(AppartementsRepositoryInterface::class, AppartementsRepository::class);
        $this->app->bind(UserPublicRepositoryInterface::class, UserPublicRepository::class);
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
