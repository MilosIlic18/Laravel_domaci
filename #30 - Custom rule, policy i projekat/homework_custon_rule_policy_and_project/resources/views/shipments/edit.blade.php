@extends('layouts.layout')
@section('title')
    Izmeni posiljku
@endsection

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Izmeni pošiljku</h1>

        <form action="{{ route('shipments.update', $shipment) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Naslov -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Naslov</label>
                <input type="text" name="title"
                    value="{{ old('title', $shipment->title) }}"
                    class="w-full border rounded px-3 py-2 @error('title') border-red-500 @else border-gray-300 @enderror"
                    required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Od -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Grad (od)</label>
                    <input type="text" name="from_city"
                        value="{{ old('from_city', $shipment->from_city) }}"
                        class="w-full border rounded px-3 py-2 @error('from_city') border-red-500 @else border-gray-300 @enderror"
                        required>
                    @error('from_city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block font-medium mb-1">Država (od)</label>
                    <input type="text" name="from_country"
                        value="{{ old('from_country', $shipment->from_country) }}"
                        class="w-full border rounded px-3 py-2 @error('from_country') border-red-500 @else border-gray-300 @enderror"
                        required>
                    @error('from_country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Do -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Grad (do)</label>
                    <input type="text" name="to_city"
                        value="{{ old('to_city', $shipment->to_city) }}"
                        class="w-full border rounded px-3 py-2 @error('to_city') border-red-500 @else border-gray-300 @enderror"
                        required>
                    @error('to_city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block font-medium mb-1">Država (do)</label>
                    <input type="text" name="to_country"
                        value="{{ old('to_country', $shipment->to_country) }}"
                        class="w-full border rounded px-3 py-2 @error('to_country') border-red-500 @else border-gray-300 @enderror"
                        required>
                    @error('to_country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Dokumenta -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Dokumenta</label>
                <input type="file" name="documents[]" multiple
                    class="w-full border rounded px-3 py-2 @error('documents') border-red-500 @else border-gray-300 @enderror">
                @error('documents')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cena -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Cena</label>
                <input type="number" name="price"
                    value="{{ old('price', $shipment->price) }}"
                    class="w-full border rounded px-3 py-2 @error('price') border-red-500 @else border-gray-300 @enderror"
                    required>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trucker ID -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Trucker ID</label>
                <input type="number" name="users_id"
                    value="{{ old('users_id', $shipment->users_id) }}"
                    class="w-full border rounded px-3 py-2 @error('users_id') border-red-500 @else border-gray-300 @enderror"
                    required>
                @error('users_id')
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
                <label class="block font-medium mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @else border-gray-300 @enderror">
                    @foreach(\App\Models\Shipment::ALLOWED_STATUS as $status)
                        <option value="{{ $status }}" {{ old('status', $shipment->status) === $status ? 'selected' : '' }}>
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
                <label class="block font-medium mb-1">Detalji</label>
                <textarea name="details" rows="4"
                    class="w-full border rounded px-3 py-2 @error('details') border-red-500 @else border-gray-300 @enderror">{{ old('details', $shipment->details) }}</textarea>
                @error('details')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Sačuvaj izmene
                </button>
            </div>
        </form>
    </div>

@endsection