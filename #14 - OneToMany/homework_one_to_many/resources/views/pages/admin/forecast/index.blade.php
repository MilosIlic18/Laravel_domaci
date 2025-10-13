@extends('layouts.layout_admin')

    @section('title')
        Home
    @endsection
    @section('contents')
        <form class="w-[450px]" method="POST" action="{{route('forecast.store')}}">
             {{ csrf_field() }}
            <div class="flex gap-[15px]">
                <div class="mb-5">
                    <label for="cities" class="block mb-2 text-sm font-medium text-gray-900">Grad</label>
                    <select id="cities" name="cities_id"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>Odaberi grad</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('cities_id')
                        <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="temperature" class="block mb-2 text-sm font-medium text-gray-900">Temperatura</label>
                    <input  id="temperature" name="temperature" value="{{old('temperature')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite grad" />
                    @error('temperature')
                        <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-[15px]">
                <div class="mb-5 w-[180px]">
                    <label for="weather_type" class="block mb-2 text-sm font-medium text-gray-900">Tip</label>
                    <select id="weather_type" name="weather_type"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>Odaberi tip</option>
                        <option value="rainy">Kisa</option>
                        <option value="snowy">Sneg</option>
                        <option value="sunny">Sunce</option>
                    </select>
                    @error('weather_type')
                        <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="probability" class="block mb-2 text-sm font-medium text-gray-900">Verovatnoca padavina</label>
                    <input  id="probability" type="number" name="probability" value="{{old('probability')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite temperaturu" />
                    @error('probability')
                        <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                    @enderror
                </div>

            </div>
            <div class="flex gap-[15px]">
                <div class="mb-5">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Temperatura</label>
                    <input  id="date" type="datetime-local" name="date" value="{{old('date')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite temperaturu" />
                    @error('date')
                        <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5 flex justify-center items-end">
                    <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Snimi</button>
                </div>
            </div>
        </form>












    
        <div class="flex gap-[10px] flex-wrap ">
            @foreach($cities as $city)
                <div class="flex flex-col border-1 border-gray p-[10px] rounded-xl w-[300px]">
                    <b class="mb-[15px]">{{$city->name}}</b>
                    @foreach($city->forecasts as $forecast)
                        <div class="flex justify-between">
                            <b>{{$forecast->date}}</b>
                            <b>{{$forecast->temperature}} °C</b>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        

    @endsection