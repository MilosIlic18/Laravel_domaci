<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    const TABLE = "orders";
    protected $table=self::TABLE;
    protected $fillable = [
        User::TABLE."_id",
        "status",
        "price"
    ];
}
