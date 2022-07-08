<?php

namespace App;

use Illuminate\Support\Facades\Facade;
use Tests\WondeServiceFake;
use Wonde\Client;

class Wonde extends Facade
{
    /**
     * Wonde Service
     *
     * @return WondeService
     */
    protected static function getFacadeAccessor()
    {
        return 'wonde';
    }

    public static function fake()
    {
        static::swap($fake = new WondeServiceFake);

        return $fake;
    }

}
