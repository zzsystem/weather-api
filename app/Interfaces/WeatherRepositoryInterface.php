<?php

namespace App\Interfaces;
use App\Models\Weather;
use Illuminate\Support\Collection;

/**
 * Interface WeatherRepositoryInterface
 *
 * This interface represents a contract for a weather repository.
 */
interface WeatherRepositoryInterface 
{
    /**
     * Get weather information by city name.
     *
     * @param string $cityName The name of the city.
     * @return Collection Returns a collection of weather information.
     */
    public function getWheatersByCityName(string $cityName): Collection;

    /**
     * Create a new weather entry.
     *
     * @param array $weatherData The data for the new weather entry.
     * @return Weather Returns the newly created weather entry.
     */
    public function createWeather(array $weatherData): Weather;
}