<?php

namespace App\Interfaces;

/**
 * Interface WeatherApiRepositoryInterface
 *
 * This interface represents a contract for a weather API repository.
 */
interface WeatherApiRepositoryInterface 
{
    /**
     * Get weather information by coordinates.
     *
     * @param float $longitude The longitude of the location.
     * @param float $latitude The latitude of the location.
     * @return mixed Returns the weather information as a mixed type.
     */
    public function getWeatherByCoordinates(float $longitude, float $latitude): mixed;
}