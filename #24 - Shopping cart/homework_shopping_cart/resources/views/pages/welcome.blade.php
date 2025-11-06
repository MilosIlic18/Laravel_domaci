@extends('layouts.layout')


    @section('title')

        Home

    @endsection


    @section('contents')
    @if ($hour >= 0 && $hour <= 12)
        <h1>Dobro jutro!</H1>
    @else
        <h1>Dobar dan</H1>
    @endif
    <h1>Trenutno vreme je {{$currentTime}}</h1>
    <h1>Sati je {{$hour}}</h1>
    
        <div class="flex gap-5 mt-[20px] flex-wrap justify-center items-center">
            @foreach($products as $product)
                <div class="flex flex-col gap-[20px] mt-[10px] bg-gray-200 rounded-md p-6 w-[300px] justify-center items-center">
                    <img src="{{$product->image}}" alt="{{$product->name}}" class="h-[220px] w-full">
                    <p>{{$product->name}}</p>
                    <p>Cena {{$product->price}} eur</p>
                    <div>
                        <a href="{{route('product.permalink',$product)}}" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Procitaj vise</a>
                    </div>
                </div>
            @endforeach
        </div>

    @endsection
