<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherInformationRequest;
use App\Repositories\WeatherRepository;

class WeatherInformationController extends Controller
{
    private WeatherRepository $weatherRepository;

    public function __construct() {
        $this->weatherRepository = new WeatherRepository();
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(WeatherInformationRequest $request)
    {
        return response(
            $this->weatherRepository->getWheatersByCityName($request->query->get('query'))
        );
    }

}