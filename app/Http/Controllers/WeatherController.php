<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Weather;

class WeatherController extends Controller
{
    //

    // public function show(Request $request)
    // {
    //     $city = $request->input('city', 'New York'); // Default city if none provided
    //     $weatherData = Weather::getWeather($city);
    //     return response()->json($weatherData);
    // }


    public function show()
    {
        return view("weather.show");
    }

    // app/Http/Controllers/WeatherController.php

    public function fetchWeatherData(Request $request)
    {
        $city = $request->input('city', 'New York'); // Default city if none provided
        $weatherData = Weather::getWeather($city); // Use the facade to interact with the service

        return response()->json($weatherData);
    }
}
