<?php

namespace App\Models;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    //
    const TABLE = "weathers";
    protected $table = self::TABLE;
    protected $fillable = [
        Cities::TABLE.'_id',
        'temperature',
    ];
    
    function city(){
        return $this->belongsTo(Cities::class,"id");
    }
}
