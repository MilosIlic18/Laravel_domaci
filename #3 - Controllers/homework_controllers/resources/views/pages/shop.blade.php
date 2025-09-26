@extends('layouts.layout')


    @section('title')

        Shop

    @endsection


    @section('contents')

    <h1 class="mb-[5px]">Prodavnica</h1>
    @foreach($products as $product)
        @if(str_contains($product,"Iphone"))
            <p>{{$product}} - SUPER SNIZENJE</p>
        @else
            <p>{{$product}}</p>
        @endif
    @endforeach

    @endsection
