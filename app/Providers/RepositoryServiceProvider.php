<?php

namespace App\Providers;

use App\Repository\EncuestasRepo;
use App\Repository\iEncuestasRepo;
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
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(iEncuestasRepo::class,EncuestasRepo::class);
    }
}
