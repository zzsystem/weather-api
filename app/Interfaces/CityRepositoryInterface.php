<?php

namespace App\Interfaces;
use App\Models\City;
use Illuminate\Support\Collection;

/**
 * Interface CityRepositoryInterface
 *
 * This interface represents a contract for a city repository.
 */
interface CityRepositoryInterface 
{
    /**
     * Get all cities.
     *
     * @return Collection Returns a collection of cities.
     */
    public function getAllCities(): Collection;

    /**
     * Create a new city.
     *
     * @param array $cityData The data for the new city.
     * @return City Returns the newly created city.
     */
    public function createCity(array $cityData): City;
}