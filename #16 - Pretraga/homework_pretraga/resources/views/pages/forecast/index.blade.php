@extends('layouts.layout_blank')

    @section('title')
        Pretraga - {{$searchParam}}
    @endsection
    @section('contents')
 
        <div class="flex flex-wrap gap-[20px] p-[10px] mx-center">
            @foreach($cities as $city)
                    @php
                        $weatherType =  App\Http\Helpers\ForecastHelper::getIconsByWeatherType($city->todayForecast->weather_type);
                    @endphp
                    <a href="{{route('user.index')}}" class="bg-blue-500 text-white p-[8px] w-[200px] rounded-xl"><i class="{{$weatherType}}"></i> {{$city->name}}</a>
            @endforeach
        </div>

    @endsection