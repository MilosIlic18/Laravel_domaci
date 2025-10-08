@extends('layouts.layout')

    @section('title')
        Home
    @endsection
    @section('contents')
    <h1 class="mb-[15px] mx-[5px] text-xl text-bold">Prognoza</h1>
    
        <div class="flex flex-col gap-[10px]">
            @foreach($cityTemperatures as $cityTemperature)
                <div class="flex justify-between border-1 border-gray p-[10px] rounded-xl">
                    <b>{{$cityTemperature->city}}</b>
                    <p>{{$cityTemperature->temperature}} °C</p>
                </div>
            @endforeach
        </div>
        

    @endsection