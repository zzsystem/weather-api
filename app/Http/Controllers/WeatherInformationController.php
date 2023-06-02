<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherInformationRequest;
use App\Models\Weather;
use Illuminate\Support\Carbon;

class WeatherInformationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(WeatherInformationRequest $request)
    {
        $weathers = Weather::whereHas('city', function ($query) use ($request) {
            $query->where('name', $request->city);
        })
            ->where('created_at', '>', Carbon::now()->subDays(1))
            ->get();

        return response($weathers);
    }

}