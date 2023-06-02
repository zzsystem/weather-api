<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Kecskemét', 'latitude' => 46.906441, 'longitude' => 19.689720],
            ['name' => 'Budapest', 'latitude' => 47.497913, 'longitude' => 19.040236],
            ['name' => 'Szeged', 'latitude' => 46.253620, 'longitude' => 20.146130],
        ];

        foreach($cities as $city) {
            City::create($city);
        }
    }
}
