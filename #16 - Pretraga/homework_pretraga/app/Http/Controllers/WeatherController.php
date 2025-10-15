<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    function index() {
        return view('pages.admin.weather.index',["cityTemperatures"=>Weather::with('city')->get()]);
    }
    function show(Weather $weather) {
        return view('pages.admin.weather.edit',["cityTemperature"=>$weather,"cities"=>Cities::all()]);   
    }
    function store(Request $request) {
        $request->validate([
            'cities_id'=> 'required|integer|unique:weathers',
            'temperature' => 'required'
        ]);
        
        Weather::create($request->all());
        return redirect()->route('weather.index');
    }
    function update(Request $request,Weather $weather) {
        $request->validate([
            'cities_id'=> 'required|integer',
            'temperature' => 'required'
        ]);
        
        $weather->update($request->all());
        return redirect()->route('weather.index');
    }
    function destroy(Weather $weather) {
        $weather->delete();
        return redirect()->route('weather.index');        
    }
}
