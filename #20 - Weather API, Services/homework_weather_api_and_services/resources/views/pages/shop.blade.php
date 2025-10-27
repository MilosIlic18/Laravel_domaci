@extends('layouts.layout')


    @section('title')

        Shop

    @endsection


    @section('contents')

    <h1 class="mb-[5px]">Prodavnica</h1>
    @foreach($products as $product)
        <div>
            <p>{{$product->name}}</p>
            <p>{{$product->description}}</p>
        </div>
    @endforeach

    @endsection
