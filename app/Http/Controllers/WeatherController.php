<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Weather;

class WeatherController extends Controller
{
    //

    public function show(Request $request)
    {
        $city = $request->input('city', 'New York');
        $weatherData = Weather::getWeather($city);

        if ($weatherData) {
            return view('weather.show', ['weather' => $weatherData]);
        }

        return redirect()->back()->with('error', 'Unable to fetch weather data.');
    }
}
