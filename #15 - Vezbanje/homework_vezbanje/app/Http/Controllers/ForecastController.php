<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ForecastController extends Controller
{
    //
    function index() {
        return view("pages.admin.forecast.index",["cities"=>Cities::all()]);
    }
    function show(Cities $city) {
        return view("pages.admin.forecast.show",["city"=>$city]);
    }
    function store(Request $request) {
        
        $request->validate([
            'cities_id'=>'required|integer',
            'temperature'=>'required|integer',
            'weather_type'=>'required|in:rainy,sunny,snowy',
            'date'=>'required|date',
            'probability'=> Rule::when(request()->input('weather_type') !== 'sunny', ['required', 'integer', 'min:1', 'max:100']),
        ]);
        Forecast::create($request->all());
        return back();
    }
}
