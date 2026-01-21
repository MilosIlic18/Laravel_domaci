@extends('layouts.layout')
    @section('title')
        Pošiljka {{$shipment->title}}
    @endsection

    @section('content')
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">

            {{-- Header --}}
            <div class="p-6 border-b bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800">
                    {{ $shipment->title }}
                </h2>

                <p class="mt-2">
                    <span class="text-sm font-medium text-gray-600">Status:</span>

                    @if ($shipment->status === \App\Models\Shipment::STATUS_IN_PROGRESS)
                        <span class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">
                            U toku
                        </span>
                    @elseif ($shipment->status === \App\Models\Shipment::STATUS_UNASSIGNED)
                        <span class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600">
                            Neraspoređeno
                        </span>
                    @elseif ($shipment->status === \App\Models\Shipment::STATUS_COMPLETED)
                        <span class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                            Završeno
                        </span>
                    @elseif ($shipment->status === \App\Models\Shipment::STATUS_PROBLEM)
                        <span class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">
                            Problem
                        </span>
                    @endif
                </p>
            </div>

            {{-- Body --}}
            <div class="p-6 space-y-5">

                {{-- Ruta --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">Polazište</p>
                        <p class="font-medium text-gray-800">
                            {{ $shipment->from_city }}, {{ $shipment->from_country }}
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">Odredište</p>
                        <p class="font-medium text-gray-800">
                            {{ $shipment->to_city }}, {{ $shipment->to_country }}
                        </p>
                    </div>
                </div>

                {{-- Cena --}}
                <div class="flex items-center justify-between bg-indigo-50 p-4 rounded-lg">
                    <span class="text-sm font-medium text-indigo-700">Cena pošiljke</span>
                    <span class="text-xl font-semibold text-indigo-800">
                        ${{ $shipment->price }}
                    </span>
                </div>

                {{-- Detalji --}}
                @if ($shipment->details)
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Detalji</p>
                        <p class="text-gray-700 bg-gray-50 p-4 rounded-lg">
                            {{ $shipment->details }}
                        </p>
                    </div>
                @endif

                {{-- Dokumenta --}}
                @if ($shipment->documents)
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Dokumenti</p>
                        <div class="flex flex-wrap gap-[5px]">
                            @foreach($shipment->documents as $document)
                                <a target="_blank" href="/storage/documents/{{ $document->document_title }}" class="text-gray-700 bg-gray-50 p-4 rounded-lg">
                                    {{ $document->document_title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 bg-gray-50 border-t flex justify-end items-center">
                

                <div class="space-x-2">
                    <a href="{{ route('shipments.index') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Vrati se
                    </a>
                </div>
            </div>

        </div>
    @endsection