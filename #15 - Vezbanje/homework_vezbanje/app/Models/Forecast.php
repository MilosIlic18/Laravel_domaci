<?php

namespace App\Models;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    //
    const TABLE = 'forecasts';
    const WEATHERS = ['sunny','rainy','snowy','cloudy'];

    protected $table = self::TABLE;
    protected $fillable = [
        Cities::TABLE.'_id',
        'temperature',
        'weather_type',
        'probability',
        'date',
    ];

    function city(){
        return $this->belongsTo(Cities::class,"id");
    }
}
