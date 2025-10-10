<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{
    //
    function index($city) {
        
        $forecast = [
            "beograd"   => [22,21,20,18],
            "sarajevo"  => [10,15,14,9],
        ];
        $keyCity = strtolower($city);
        if(key_exists($keyCity,$forecast))
            dd($forecast[$keyCity]);
        
        dd("Ovaj grad ne postoji");
    }
}
