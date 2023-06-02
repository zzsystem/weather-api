<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use Illuminate\Support\Collection;

class CityRepository implements CityRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllCities(): Collection
    {
        return City::all();
    }

    /**
     * {@inheritDoc}
     */
    public function createCity(array $cityData): City
    {
        return  City::create($cityData);
    }
}