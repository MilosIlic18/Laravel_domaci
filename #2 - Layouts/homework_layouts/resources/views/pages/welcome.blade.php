@extends('layouts.layout')


    @section('title')

        Home

    @endsection


    @section('contents')

    <h1>Trenutno vreme je {{date('H:i:s')}}</h1>

    @endsection
