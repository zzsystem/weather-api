<?php

namespace App\Jobs;

use App\Models\City;
use App\Models\Weather;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class WeatherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cities = City::all();

        foreach($cities as $city) {
            $response = Http::withUrlParameters([
                'url' => env('OPEN_WEATHER_MAP_URL'),
                'lon' => $city->longitude,
                'lat' => $city->latitude,
                'appId' => env('OPEN_WEATHER_MAP_TOKEN'),
            ])->get('{+url}?lat={lat}&lon={lon}&appid={appId}&units=metric');

            $result = json_decode($response->getBody()->getContents());

            try {
                Weather::create([
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
