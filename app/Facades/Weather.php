<?php


namespace App\Facades;

use App\Services\WeatherService;
use Illuminate\Support\Facades\Facade;

Class Weather extends Facade
{

    public static function getFacadeAccessor()
    {
        return  WeatherService::class;
    }

}
