<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //
    public function index(){
        return view("pages.home.index",["cityTemperatures"=>Weather::all()]);
    }
}
