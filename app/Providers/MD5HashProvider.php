<?php

namespace App\Providers;

use App\Services\MD5Hash;
use Illuminate\Hashing\HashServiceProvider;
use Illuminate\Support\Facades\App;

class MD5HashProvider extends HashServiceProvider
{
    public function boot()
    {
        App::bind('hash', function () {
            return new MD5Hash;
        });
    }
}
