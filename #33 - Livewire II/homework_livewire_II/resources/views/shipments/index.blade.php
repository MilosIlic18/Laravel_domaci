@extends('layouts.layout')
@section('title')
    Pošiljke
@endsection

@section('content')
<div class="bg-gray-100 min-h-screen py-10 px-4">
    <h1 class="text-3xl font-bold text-center mb-8">Pošiljke</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($shipments as $shipment)
        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">
            <h2 class="text-xl font-semibold mb-2">{{ $shipment->title }}</h2>
            <p class="text-gray-600 mb-1">
                <span class="font-medium">Od:</span> {{ $shipment->from_city }}, {{ $shipment->from_country }}
            </p>
            <p class="text-gray-600 mb-1">
                <span class="font-medium">Do:</span> {{ $shipment->to_city }}, {{ $shipment->to_country }}
            </p>
            <p class="text-gray-600 mb-1">
                <span class="font-medium">Cena:</span> ${{ $shipment->price }}
            </p>
            <p class="mb-3">
                <span class="font-medium">Status:</span> 
                @if($shipment->status === \App\Models\Shipment::STATUS_IN_PROGRESS)
                    <span class="text-yellow-500">U toku</span>
                @elseif($shipment->status === \App\Models\Shipment::STATUS_UNASSIGNED)
                    <span class="text-gray-500">Neraspoređeno</span>
                @elseif($shipment->status === \App\Models\Shipment::STATUS_COMPLETED)
                    <span class="text-green-500">Završeno</span>
                @elseif($shipment->status === \App\Models\Shipment::STATUS_PROBLEM)
                    <span class="text-red-500">Problem</span>
                @endif
            </p>
            <div class="flex justify-end">
                <a href="{{ route('shipments.show', $shipment->id) }}" 
                   class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition">
                    Pogledaj
                </a>
            </div>
            <form method="POST" action="{{route('shipments.assignUser',['shipment'=>$shipment->id]) }}" class="flex gap-[10px] mt-[10px] justify-between">
                @csrf
                <input type="hidden" value="{{$shipment->id}}" name="shipment_id">
                <select name="users_id" class="border border-2">
                    <option selected="disabled">None</option>
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded transition">Assigned</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

<livewire:shipments-assigned-list />
@endsection