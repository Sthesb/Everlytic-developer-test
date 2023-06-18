<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserListingRepository;
use App\Repositories\UserListingRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserListingRepositoryInterface::class, UserListingRepository::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
