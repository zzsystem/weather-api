<?php

namespace App\Jobs;

use App\Repositories\CityRepository;
use App\Repositories\WeatherRepository;
use App\Repositories\WeatherApiRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WeatherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private CityRepository $cityRepository;
    private WeatherRepository $weatherRepository;
    private WeatherApiRepository $weatherApiRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->weatherRepository = new WeatherRepository();
        $this->weatherApiRepository = new WeatherApiRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cities = $this->cityRepository->getAllCities();

        foreach($cities as $city) {
            $result = $this->weatherApiRepository->getWeatherByCoordinates($city->longitude, $city->latitude);

            try {
                $this->weatherRepository->createWeather([
                    'city_id' => $city->id,
                    'name' => $result->weather[0]->main,
                    'longitude' => $result->coord->lon,
                    'latitude' => $result->coord->lat,
                    'temperature' => $result->main->temp,
                    'pressure' => $result->main->pressure,
                    'humidity' => $result->main->humidity,
                    'min_temperature' => $result->main->temp_min,
                    'max_temperature' => $result->main->temp_max,
                ]);
            } catch(\PDOException $e) {
                dd($e->getMessage());
            }
        }
    }
}
