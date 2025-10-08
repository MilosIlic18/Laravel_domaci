<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityTemperature;

class WeatherController extends Controller
{
    //
    function index() {
        return view('pages.admin.weather.index',["cityTemperatures"=>CityTemperature::all()]);
    }
    function show(CityTemperature $cities) {
        return view('pages.admin.weather.edit',["cityTemperature"=>$cities]);   
    }
    function store(Request $request) {
        $request->validate([
            'city'=> 'required|string',
            'temperature' => 'required'
        ]);
        
        CityTemperature::create($request->all());
        return redirect()->route('weather.index');
    }
    function update(Request $request,CityTemperature $cities) {
        $request->validate([
            'city'=> 'required|string',
            'temperature' => 'required'
        ]);
        
        $cities->update($request->all());
        return redirect()->route('weather.index');
    }
    function destroy(CityTemperature $cities) {
        $cities->delete();
        return redirect()->route('weather.index');        
    }
}
