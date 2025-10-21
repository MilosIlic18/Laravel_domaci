@extends('layouts.layout_admin')

    @section('title')
        Home
    @endsection
    @section('contents')
    <h1 class="mb-[15px] mx-[5px] text-xl text-bold">Prognoza za grad {{$city->name}}</h1>
    
        <div class="flex flex-col gap-[10px]">
            @foreach($city->forecasts as $forecast)
                    <div class="flex justify-between border-1 border-gray p-[10px] rounded-xl">
                    <b class='w-[200px]'>{{ \Carbon\Carbon::parse($forecast->date)->format('Y-m-d') }}</b>
                        <p>{{$forecast->temperature}} °C</p>
                </div>
            @endforeach
        </div>
        

    @endsection