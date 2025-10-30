@extends('layouts.layout')


    @section('title')

        Cart

    @endsection


    @section('contents')



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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @endsection
