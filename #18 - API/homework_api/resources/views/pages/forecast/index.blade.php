@extends('layouts.layout_blank')

    @section('title')
        Pretraga - {{$searchParam}}
    @endsection
    @section('contents')

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="flex flex-col items-center">
                <p class="text-red-900 text-center text-xl p-[10px]">{{ \Illuminate\Support\Facades\Session::get('error')}}</p>
                <a href="/login" class="text-white bg-blue-500 text-white p-[8px] text-center w-[200px] rounded-xl">Ulogujte se</a>
            </div>
        @endif
 
        <div class="flex flex-wrap gap-[20px] p-[10px] mx-center mt-[10px]">
            @foreach($cities as $city)
                    @php
                        $weatherType =  App\Http\Helpers\ForecastHelper::getIconsByWeatherType($city->todayForecast->weather_type);
                    @endphp
                    <div class="flex gap-[10px] items-center">
                        @if(in_array($city->id,$userFavourites))

                            <a href="{{route('user.city.unFavourite',['city'=>$city->id])}}">
                                <i class="fa-solid fa-heart text-white text-[18px] p-[8px] bg-blue-500 rounded-xl"></i>
                            </a>
                        @else
                            <a href="{{route('user.city.favourite',['city'=>$city->id])}}">
                                <i class="fa-regular fa-heart text-white text-[18px] p-[8px] bg-blue-500 rounded-xl"></i>
                            </a>
                        @endif
                       
                        <a href="{{route('user.index')}}"  class="bg-blue-500 text-white p-[8px] w-[200px] rounded-xl flex gap-[6px] items-center"><i class="{{$weatherType}}"></i> {{$city->name}}</a>
                    </div>
            @endforeach
        </div>

    @endsection