<?php

namespace SafeStudio\Firebase\Facades;

use Illuminate\Support\Facades\Facade;

class FirebaseFacades extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Firebase';
    }

}