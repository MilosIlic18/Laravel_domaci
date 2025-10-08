<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityTemperature;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //
    public function index(){
        return view("pages.home.index",["cityTemperatures"=>CityTemperature::all()]);
    }
}
