<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class ForecastController extends Controller
{
    //
    function index() {
        return view("pages.admin.forecast.index",["cities"=>Cities::with("forecasts")->get()]);
    }
    function show(Cities $city) {
        return view("pages.admin.forecast.show",["city"=>$city]);
    }
    function search(Request $request) {
        Artisan::call('weather:get-real-forecast',['city'=>$request->get('city')]);

        $cities = Cities::with('todayForecast')->where('name','LIKE','%'.$request->get("city").'%')->get();

        if(count($cities) === 0)
            return back()->with("error","Nismo pronasli gradove koji su za vase kriterijume ");

        $userFavourites = Auth::check()?Auth::user()->cityFavourites->pluck('cities_id')->toArray():[];

        return view("pages.forecast.index",["searchParam"=>$request->get("city"),"cities"=>$cities,"userFavourites"=>$userFavourites]);
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
