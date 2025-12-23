<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //
    use HasFactory;

    const TABLE = 'shipments';
    protected $table = self::TABLE;


    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_UNASSIGNED  = 'unassigned';
    const STATUS_COMPLETED   = 'completed';
    const STATUS_PROBLEM     = 'problem';
    
    public const ALLOWED_STATUS = [
        self::STATUS_IN_PROGRESS,
        self::STATUS_UNASSIGNED,
        self::STATUS_COMPLETED,
        self::STATUS_PROBLEM,
    ];

    protected $fillable = [
        'title',
        'from_city',
        'from_country',
        'to_city',
        'to_country',
        'price',
        'status',
        User::TABLE.'_id',
        'details',
    ];

    public function setStatusAttribute($status){
        !in_array($status,self::ALLOWED_STATUS) ? throw new Exception('Invalid status') : $this->status = $status;
    }
}
