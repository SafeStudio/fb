<?php

namespace SafeStudio\Firebase;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Firebase', function () {
            return new Firebase();
        });
    }
}
