@extends('layouts.layout')


    @section('title')

        Admin Edit Contact

    @endsection


    @section('contents')

    

        <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="{{route('contact.edit',$contact)}}">
            {{ csrf_field() }}
            @method('PUT')
            <h1 class="text-xl text-center">Izmeni kontakt</h1>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input  id="name" name="id" value="{{$contact->id}}" class="hidden" />
                <input  id="email" name="email" value="{{$contact->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@gmail.com" />
                @error('email')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="theme" class="block mb-2 text-sm font-medium text-gray-900">Tema</label>
                <input id="theme" name="subject" value="{{$contact->subject}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="tema poruke" />
                @error('subject')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Poruka</label>
                <textarea id="message" name="message" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Poruka">{{$contact->message}}</textarea>
                @error('message')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Izmeni kontakt</button>
        </form>


    @endsection
