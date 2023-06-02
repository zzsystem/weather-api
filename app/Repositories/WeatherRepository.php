<?php

namespace App\Repositories;

use App\Interfaces\WeatherRepositoryInterface;
use App\Models\Weather;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class WeatherRepository implements WeatherRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getWheatersByCityName(string $cityName): Collection
    {
        return Weather::whereHas('city', function ($query) use ($cityName) {
            $query->where('name', $cityName);
        })
            ->where('created_at', '>', Carbon::now()->subDays(1))
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function createWeather(array $weatherData): Weather
    {
        return Weather::create($weatherData);
    }
}