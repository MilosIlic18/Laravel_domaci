<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    const TABLE = "grades";
    protected $table = self::TABLE;
    protected $fillable =[
        'subject',
        'grade',
        'profesor'        
    ];

    function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
