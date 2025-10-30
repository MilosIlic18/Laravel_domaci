@extends('layouts.layout')


    @section('title')

        Admin Add Product

    @endsection


    @section('contents')

        <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="{{route('product.store')}}">
            {{ csrf_field() }}
            <h1 class="text-xl text-center">Dodaj proizvod</h1>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Naziv</label>
                <input  id="name" name="name" value="{{old('name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv" />
                @error('name')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Kolicina</label>
                <input id="amount" type="number" name="amount" value="{{old('amount')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite kolicina" />
                @error('amount')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Cena</label>
                <input id="price" type="number" name="price" value="{{old('price')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite cenu" />
                @error('price')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Slika</label>
                <input  id="image" name="image" value="{{old('image')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite link slike sa interneta" />
                @error('image')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Opis</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Unesite opis proizvoda">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Dodaj proizvod</button>        
        </form>

    @endsection
