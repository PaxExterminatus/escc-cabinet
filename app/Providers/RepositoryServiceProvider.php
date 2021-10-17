<?php

namespace App\Providers;

use App\Repository\Client\ClientRepository;
use App\Repository\Client\ClientSassRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ClientRepository::class, ClientSassRepository::class);
    }

    public function boot()
    {
        //
    }
}
