@extends('layouts.layout')

    @section('title')
        Home
    @endsection

    @section('contents')
        <div class="flex flex-wrap gap-[10px] p-[5px]">
            @foreach($products as $product)
                <div class="flex-col gap-4">
                    <h1>Naziv: {{$product->name}}</h1>
                    <p>Cena: {{$product->price}}</p>
                    <p>Opis: {{$product->description}}</p>
                </div>

            @endforeach
        </div>
    @endsection