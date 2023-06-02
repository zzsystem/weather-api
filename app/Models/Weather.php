<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Weather extends Model
{
    use HasFactory;

    protected $table = 'weathers';
    protected $fillable = [
        'city_id',
        'name',
        'longitude',
        'latitude',
        'temperature',
        'pressure',
        'humidity',
        'min_temperature',
        'max_temperature',
    ];

    public function city(): HasOne
    {
        return $this->hasOne(City::class);
    }
}