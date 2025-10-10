<?php

namespace App\Models;

use App\Models\Weather;
use App\Models\Forecast;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    //

    const TABLE = 'cities';
    protected $table = self::TABLE;
    protected $fillable = ['name'];

    function temperatures() {
        return $this->hasMany(Forecast::class);
    }
    function weather() {
        return $this->hasOne(Weather::class);
    }
}
