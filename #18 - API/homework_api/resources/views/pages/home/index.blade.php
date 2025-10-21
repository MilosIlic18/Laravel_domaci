@extends('layouts.layout_blank')

    @section('title')
        Home
    @endsection
    @section('contents')


    <div class="flex flex-wrap gap-[10px] items-center justify-center">
        @foreach($cityFavourites as $cityFavourite)
            @php
                $weatherType =  App\Http\Helpers\ForecastHelper::getIconsByWeatherType($cityFavourite->city->todayForecast->weather_type);
                $color      =   App\Http\Helpers\ForecastHelper::getColorByTemperature($cityFavourite->city->todayForecast->temperature);
            @endphp
                       
                <p  class="bg-[rgb(30,41,57)] text-white p-[8px] w-[250px] rounded-xl flex gap-[6px] items-center">
                    <i class="{{$weatherType}}"></i> 
                    <b class="{{$color}}">{{$cityFavourite->city->todayForecast->temperature}} °C</b>
                    <b>{{$cityFavourite->city->name}}</b>
                
                </p>
        @endforeach
    </div>

    <div class="min-h-screen flex justify-center items-center">
        <form method="GET" action="{{route('user.forecast.index')}}" class="flex flex-col gap-[15px] w-[400px]">
            <h1 class="text-white text-4xl"><i class="fa-solid fa-house"></i> Pronadji svoj grad</h1>
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <p class="text-red-900 text-center">{{ \Illuminate\Support\Facades\Session::get('error')}}</p>
            @endif
            <div>
                <input name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite ime grada" />
            </div>
            <div class=" w-full">
                <button type="submit"   class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-brands fa-searchengin"></i> Pretraga</button>
            </div>
        </form>

    </div>
        

    @endsection