<?php

namespace App\Providers;

use App\Repository\Client\ClientDevRepository;
use App\Repository\Client\ClientRepository;
use App\Repository\Client\ClientSassRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    function register()
    {
        if (REPOSITORY_USE_DEV)
        {
            $this->app->bind(ClientRepository::class, ClientDevRepository::class);
        }
        else
        {
            $this->app->bind(ClientRepository::class, ClientSassRepository::class);
        }
    }

    function boot()
    {
        //
    }
}
