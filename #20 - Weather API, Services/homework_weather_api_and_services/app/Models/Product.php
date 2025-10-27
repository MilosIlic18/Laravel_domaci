<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const TABLE = "products";
    protected $table = self::TABLE;
    protected $fillable =[
        'name',
        'description',
        'amount',
        'price',
        'image'
    ];
    //
}
