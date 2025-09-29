@extends('layouts.layout')


    @section('title')

        Home

    @endsection


    @section('contents')
    @if ($sat >= 0 && $sat <= 12)
        <h1>Dobro jutro!</H1>
    @else
        <h1>Dobar dan</H1>
    @endif
    <h1>Trenutno vreme je {{$trenutnoVreme}}</h1>
    <h1>Sati je {{$sat}}</h1>
    
    <div class="flex gap-5 mt-[20px] flex-wrap justify-center items-center">
        @foreach($products as $product)
            <div class="flex flex-col gap-[10px] mt-[10px] bg-gray-200 rounded-md p-6 h-[300px] w-[300px]">
                <img src="{{$product->image}}" alt="{{$product->name}}" class="h-[200px] w-full">
                <p>{{$product->name}}</p>
                <p>Cena {{$product->price}} eur</p>
            </div>
        @endforeach
    </div>

    @endsection
