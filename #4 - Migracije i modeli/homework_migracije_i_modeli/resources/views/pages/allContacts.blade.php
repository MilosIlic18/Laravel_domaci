@extends('layouts.layout')


    @section('title')

        Admin Contacts

    @endsection


    @section('contents')

    <h1 class="mb-[5px]">Kontakti</h1>
    @foreach($contacts as $contact)
        <p>{{$contact->email}}</p>
    @endforeach

    @endsection
