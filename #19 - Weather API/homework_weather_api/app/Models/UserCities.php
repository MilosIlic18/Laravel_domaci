<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cities;
use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    const TABLE = "user_cities";
    protected $table = self::TABLE;
    protected  $fillable = [
        User::TABLE.'_id',
        Cities::TABLE.'_id',
    ];

    public function city(){
        return $this->hasOne(Cities::class,"id","cities_id");
    }
    
}
