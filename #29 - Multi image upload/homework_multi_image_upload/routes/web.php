<?php

use App\Http\Controllers\Shipment\ShipmentController;
use Illuminate\Support\Facades\Route;


Route::redirect('','shipments');

Route::resource('shipments',ShipmentController::class);