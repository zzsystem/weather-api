<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherSchemaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response(Weather::first()->attributesToArray());
    }
}