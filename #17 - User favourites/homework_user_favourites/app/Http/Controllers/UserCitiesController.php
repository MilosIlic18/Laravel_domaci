<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    //
    public function favourite(Request $request,Cities $city) {
        $user = Auth::user();
        if($user === null)
            return back()->with('error','Morate biti ulogovani da stavite grad u omiljene gradove');

        UserCities::create([
            'cities_id'=>$city->id,
            'users_id'=> $user->id
        ]);
        return back();
    }
    public function unFavourite($city){
        UserCities::where(['cities_id'=>$city,'users_id'=>Auth::user()->id])->first()->delete();
        return back();
    }
}
