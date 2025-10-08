@extends('layouts.layout_admin')

@section('title')
    Home
@endsection


@section('contents')
 <h1 class="mb-[15px] mx-[5px] text-xl text-bold">Prognoza</h1>


    <div class="relative overflow-x-auto my-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Grad
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Temperatura (°C)
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Akcija
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($cityTemperatures as $cityTemperature)
                <tr class="bg-white border-b border-gray-200">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{$cityTemperature->city}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$cityTemperature->temperature}}
                    </td>
                    <td class="px-6 py-4 flex gap-[5px] justify-center">
                        <a href="{{route('weather.destroy',$cityTemperature)}}" class="mb-[5px] text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">Obrisi</a>
                        <a href="{{route('weather.show',$cityTemperature)}}" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">Izmeni</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection