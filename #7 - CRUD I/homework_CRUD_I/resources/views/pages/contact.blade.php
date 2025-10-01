@extends('layouts.layout')


    @section('title')

        Contact

    @endsection


    @section('contents')

    

        <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="/contacts">
            {{ csrf_field() }}
            <h1 class="text-xl text-center">Kontakt forma</h1>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input  id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@gmail.com" />
                @error('email')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="theme" class="block mb-2 text-sm font-medium text-gray-900">Tema</label>
                <input id="theme" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="tema poruke" />
                @error('subject')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Poruka</label>
                <textarea id="message" name="message" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Poruka"></textarea>
                @error('message')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Posalji</button>
        
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.5970131897902!2d20.43168927660239!3d44.80940077688858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6ff7d8bd086f%3A0x392b1d076a6670d8!2sCrown%20Plaza%20Belgrade!5e0!3m2!1ssr!2srs!4v1758893840877!5m2!1ssr!2srs" width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </form>


    @endsection
