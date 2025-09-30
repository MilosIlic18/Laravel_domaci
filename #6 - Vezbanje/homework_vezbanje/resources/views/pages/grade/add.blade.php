@extends('layout.layout')

    @section('title')
       
        Add grade

    @endsection

    @section('contents')

        <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="/grade">
            {{ csrf_field() }}
            <h1 class="text-xl text-center">Dodaj ocenu</h1>
            <div class="mb-5">
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Naziv predmeta</label>
                <input  id="subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv predmeta" />
                @error('subject')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Ocena</label>
                <input id="grade" type="number" name="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite ocenu" />
                @error('grade')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="profesor" class="block mb-2 text-sm font-medium text-gray-900">Profesor</label>
                <input id="profesor" name="profesor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite ime profesora" />
                @error('profesor')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Dodaj ocenu</button>        
        </form>

    @endsection