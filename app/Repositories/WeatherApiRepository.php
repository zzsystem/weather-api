<?php

namespace App\Repositories;

use App\Interfaces\WeatherApiRepositoryInterface;
use Illuminate\Support\Facades\Http;

class WeatherApiRepository implements WeatherApiRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getWeatherByCoordinates(float $longitude, float $latitude): mixed
    {
        $response = Http::withUrlParameters([
            'url' => env('OPEN_WEATHER_MAP_URL'),
            'lon' => $longitude,
            'lat' => $latitude,
            'appId' => env('OPEN_WEATHER_MAP_TOKEN'),
        ])->get('{+url}?lat={lat}&lon={lon}&appid={appId}&units=metric');

        return json_decode($response->getBody()->getContents());
    }
}