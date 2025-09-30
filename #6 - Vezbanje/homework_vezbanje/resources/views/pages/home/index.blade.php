@extends('layout.layout')

    @section('title')
       
        Home

    @endsection

    @section('contents')
        <div class="mt-2">
            @foreach($grades as $grade)
                <p>{{$grade->profesor}} {{$grade->subject}}: {{$grade->grade}}</p>
            @endforeach
        </div>


    @endsection