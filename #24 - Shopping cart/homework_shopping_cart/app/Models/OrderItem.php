<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    const TABLE = "order_items";
    protected $table = self::TABLE;
    protected $fillable =[
        Order::TABLE."_id",
        Product::TABLE."_id",
        "amount",
        "price"
    ];
}
