<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    const TABLE = "contacts";
    protected $table = self::TABLE;
    protected $fillable = [
        'email',
        'subject',
        'message'
    ];
}
