<?php

namespace SafeStudio\Firebase;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap firebase services.
     *
     * @return void
     */
    public function boot()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Firebase', 'SafeStudio\Firebase\Facades\FirebaseFacades');
    }

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
