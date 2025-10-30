@extends('layouts.layout')


    @section('title')

        Single Product

    @endsection


    @section('contents')

    <div class="flex flex-col gap-[10px] md:gap-0 md:flex-row">
           
            <div class="w-full md:w-[50%]">
                <img src="{{$product->image}}" alt="{{$product->name}}" />
            </div>

            <div class="w-full md:w-[50%] flex flex-col px-[15px] md:px-0 gap-[10px]">
                <h1 class="text-blue-500 font-bold text-[36px] text-center">{{$product->name}}</h1>
                <h1 class="font-bold text-[15px]">Cena: {{$product->price}}</h1>

                <h1 class="font-bold text-[15px]">Dostupnost: @if($product->amount > 0)<b class="text-green-500">Dostupno</b>@else <b class="text-red-500">Rasprodato</b> @endif</h1>

                <h1 class="font-bold text-[15px]">Kolicina: {{$product->amount}}</h1>
                <h1 class="font-bold text-[15px]">Opis</h1>
                <p>{{$product->description}}</p>
                <form class="max-w-[150px] mt-10 flex flex-col gap-[10px]" method="POST" action="{{route('cart.store')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="number" name="amount" placeholder="Unesi kolicinu" value="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <button  class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Dodaj u korpu</button>
                </form>
                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <p class="text-red-900">{{ \Illuminate\Support\Facades\Session::get('error')}}</p>
                @endif
            </div>
            
    </div>

    @endsection
