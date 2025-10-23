@extends('layouts.layout_admin')

@section('title')
    Save temperature
@endsection

@section('contents')




 <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="{{route('weather.store')}}">
            {{ csrf_field() }}
            <h1 class="text-xl text-center">Kreiraj temperaturu</h1>
            <div class="mb-5">
                <label for="cities" class="block mb-2 text-sm font-medium text-gray-900">Grad</label>
                <select id="cities" name="cities_id"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option>Odaberi grad</option>
                    @foreach(App\Models\Cities::all() as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @error('cities_id')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="temperature" class="block mb-2 text-sm font-medium text-gray-900">Temperatura</label>
                <input  id="temperature" name="temperature" value="{{old('temperature')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite temperaturu" />
                @error('temperature')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Kreiraj prognozu</button>
        </form>

@endsection