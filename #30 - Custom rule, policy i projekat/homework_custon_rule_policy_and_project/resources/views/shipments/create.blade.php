@extends('layouts.layout')
@section('title')
    Dodaj posiljku
@endsection

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Dodaj novu pošiljku</h1>

        <form action="{{ route('shipments.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <!-- Naslov pošiljke -->
            <div class="mb-4">
                <label for="title" class="block font-medium mb-1">Naslov</label>
                <input type="text" name="title" id="title"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                    @error('title') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Polje "Od" -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="from_city" class="block font-medium mb-1">Grad (od)</label>
                    <input type="text" name="from_city" id="from_city"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        @error('from_city') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                        value="{{ old('from_city') }}" required>
                    @error('from_city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="from_country" class="block font-medium mb-1">Država (od)</label>
                    <input type="text" name="from_country" id="from_country"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        @error('from_country') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                        value="{{ old('from_country') }}" required>
                    @error('from_country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Polje "Do" -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="to_city" class="block font-medium mb-1">Grad (do)</label>
                    <input type="text" name="to_city" id="to_city"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        @error('to_city') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                        value="{{ old('to_city') }}" required>
                    @error('to_city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="to_country" class="block font-medium mb-1">Država (do)</label>
                    <input type="text" name="to_country" id="to_country"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        @error('to_country') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                        value="{{ old('to_country') }}" required>
                    @error('to_country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Dokumenta -->
            <div class="mb-4">
                <label for="documents" class="block font-medium mb-1">Dokumenta</label>
                <input type="file" name="documents[]" id="documents"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2" multiple required>
                @error('documents')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cena -->
            <div class="mb-4">
                <label for="price" class="block font-medium mb-1">Cena</label>
                <input type="number" name="price" id="price"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                    @error('price') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                    value="{{ old('price') }}" required>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Client ID -->
            <div class="mb-4">
                <label for="client" class="block font-medium mb-1">Client ID</label>
                <input type="number" name="clients_id" id="client"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                    @error('clients_id') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                    value="{{ old('clients_id') }}" required>
                @error('clients_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">Status</label>
                <select name="status" id="status"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        @error('status') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror">
                      @foreach(\App\Models\Shipment::ALLOWED_STATUS as $status)
                        <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Detalji -->
            <div class="mb-6">
                <label for="details" class="block font-medium mb-1">Detalji</label>
                <textarea name="details" id="details" rows="4"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                    @error('details') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                    placeholder="Unesite dodatne informacije">{{ old('details') }}</textarea>
                @error('details')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit dugme -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                    Sačuvaj pošiljku
                </button>
            </div>
        </form>
    </div>
@endsection