@extends('layouts.layout')


    @section('title')

        Admin Products

    @endsection


    @section('contents')

    <h1 class="mb-[5px] text-xl">Proizvodi</h1>
    
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Naziv
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kolicina
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cena
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slika
                    </th>
                    <th scope="col" class="px-6 py-3 hidden md:block">
                        Opis
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="bg-white border-b border-gray-200">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$product->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$product->amount}}
                    </td>
                    <td class="px-6 py-4">
                        {{$product->price}} Eur
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{$product->image}}" alt="Ne postoji" class="h-[50px] w-[50px]">
                    </td>
                    <td class="px-6 py-4 hidden md:block">
                        {{$product->description}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
