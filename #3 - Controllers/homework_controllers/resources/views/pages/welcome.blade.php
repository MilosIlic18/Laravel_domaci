@extends('layouts.layout')


    @section('title')

        Home

    @endsection


    @section('contents')
    @if ($sat >= 0 && $sat <= 12)
        <h1>Dobro jutro!</H1>
    @else
        <h1>Dobar dan</H1>
    @endif
    <h1>Trenutno vreme je {{$trenutnoVreme}}</h1>
    <h1>Sati je {{$sat}}</h1>
    

    @endsection
