<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityTemperature extends Model
{
    //
    const TABLE = "city_temperatures";
    protected $table = self::TABLE;
    protected $fillable = ["city","temperature"];
}
