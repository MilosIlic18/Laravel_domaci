<?php

namespace App\Models;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    //
    const TABLE = 'forecasts';
    protected $table = self::TABLE;
    protected $fillable = [
        Cities::TABLE.'_id',
        'temperature',
        'date',
    ];

    function city(){
        return $this->belongsTo(Cities::class);
    }
}
