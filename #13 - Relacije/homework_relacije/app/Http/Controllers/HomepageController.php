<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //
    public function index(){
        return view("pages.home.index",["cityTemperatures"=>Cities::all()]);
    }
}
