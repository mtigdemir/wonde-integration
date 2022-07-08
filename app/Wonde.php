<?php

namespace App;

use Illuminate\Support\Facades\Facade;
use Tests\WondeServiceFake;
use Wonde\Client;

class Wonde extends Facade
{
    /**
     * Wonde Client Instance
     *
     * @return Client
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
