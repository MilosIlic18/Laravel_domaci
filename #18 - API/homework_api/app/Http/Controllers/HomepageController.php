<?php

namespace App\Http\Controllers;

use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //
    public function index(){

        $cityFavourites = Auth::check()?UserCities::where('users_id',Auth::user()->id)->get():[];
        return view("pages.home.index",["cityFavourites"=>$cityFavourites]);
    }
}
