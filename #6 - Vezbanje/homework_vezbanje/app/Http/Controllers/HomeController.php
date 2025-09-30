<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(){
        return view("pages.home.index",["grades"=>Grade::all()]);
    }
}
