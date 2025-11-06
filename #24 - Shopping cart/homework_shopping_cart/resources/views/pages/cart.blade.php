@extends('layouts.layout')


    @section('title')

        Cart

    @endsection


    @section('contents')


        @if($cart)
            @if(\Illuminate\Support\Facades\Session::has('info'))
                <p class="text-red-900 text-center">{{ \Illuminate\Support\Facades\Session::get('info')}}</p>
            @endif
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Naziv proizvoda
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kolicina
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cena po proizvodu (eur)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ukupna cena (eur)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr class="bg-white border-b border-gray-200">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->name}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                @php
                                    $amount = App\Http\Helpers\CartHelper::getAmountCard($item)
                                @endphp
                                {{$amount}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->price}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                @php
                                    $totalPrice = $amount * $item->price
                                @endphp
                                {{ number_format($totalPrice, 2, '.', '') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end mt-[10px] gap-[10px]">
                    <a href="{{route('cart.destroy')}}" class="mb-[5px] text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ponisti korpu</a>
                    <form action="{{route('cart.orderStore')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center" value="Zavrsi narudzbinu"/>
                    </form>
                </div>
            </div>
        @else
            <div class="flex flex-col justify-center items-center">
                <div class="bg-red-400 border-2 border-red-600 text-white text-center p-[10px] w-[400px]">
                    <h1 class="p-[10px] text-xl">Vasa korpa je prazna</h1>
                    <a href="{{route('index')}}">Nastavite kupovinu</a>
                </div>
            </div>
        @endif


    @endsection
