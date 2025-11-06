@extends('layouts.layout')


    @section('title')

        Thank you

    @endsection


    @section('contents')

        <div class="flex flex-col items-center justify-center">
            
            <p>Vasa narudzbina je uspesna. Bice dostavljena u roku 5 radnih dana.</p>
            <p>Hvala na poverenju</p>
            <a href="{{route('index')}}">Vrati me na pocetnu stranicu</a>
                
        </div>

    @endsection
