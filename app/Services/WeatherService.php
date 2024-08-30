<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


Class WeatherService{

    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.weather_api.url');
        $this->apiKey = config('services.weather_api.key');
    }

    public function getWeather($city)
    {
        //$response = Http::get("{$this->apiUrl}?q={$city}&appid={$this->apiKey}&units=metric");

        $response=Http::get("{$this->apiUrl}?q={$city}&appid={$this->apiKey}&units=metric");

        if($response->successful()){
            return $response->json();
        }
        return null;
    }



}
