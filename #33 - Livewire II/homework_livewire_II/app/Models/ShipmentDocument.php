<?php

namespace App\Models;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;

class ShipmentDocument extends Model
{
    //
    const TABLE = "shipment_documents";
     protected $fillable = [
        'document_title',
        Shipment::TABLE.'_id',
    ];
}
