<?php

namespace App\Models;

use App\Models\Weather;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    //

    const TABLE = 'cities';
    protected $table = self::TABLE;

    protected $fillable = ['name'];

    function forecasts() {
        return $this->hasMany(Forecast::class)->orderBy('date');
    }
    function weather() {
        return $this->hasOne(Weather::class);
    }
    function todayForecast() {
        return $this->hasOne(Forecast::class)->whereDate('date', Carbon::today());
    }
}
