<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Dodaj novu pošiljku</h1>
    <form wire:submit="submit">
        
        <!-- Naslov pošiljke -->
        <div class="mb-4">
                <label for="title" class="block font-medium mb-1">Naslov</label>
                <input type="text" wire:model="title" id="title"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                    "
                    required>
        </div>
         <!-- Polje "Od" -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="from_city" class="block font-medium mb-1">Grad (od)</label>
                    <input type="text" wire:model="fromCity" id="from_city"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2"
                        required> 
                </div>
                <div>
                    <label for="from_country" class="block font-medium mb-1">Država (od)</label>
                    <input type="text" wire:model="fromCountry" id="from_country"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2"
                        required>
                </div>
            </div>
        <!-- Polje "Do" -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="to_city" class="block font-medium mb-1">Grad (do)</label>
                    <input type="text" wire:model="toCity" id="to_city"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2"
                        required>
                </div>
                <div>
                    <label for="to_country" class="block font-medium mb-1">Država (do)</label>
                    <input type="text" wire:model="toCountry" id="to_country"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2" required>
                    
                </div>
            </div>
             <!-- Dokumenta -->
            <div class="mb-4">
                <label for="documents" class="block font-medium mb-1">Dokumenta</label>
                <input type="file" wire:model="documents" id="documents"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2" multiple required>
                @error('documents')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Cena -->
            <div class="mb-4">
                    <label for="price" class="block font-medium mb-1">Cena</label>
                    <input type="number" wire:model="price" id="price"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        "
                        required>
            </div>
            <!-- Client ID -->
            <div class="mb-4">
                    <label for="client" class="block font-medium mb-1">Client</label>
                    <input type="number" wire:blur="validateUser" wire:model="clientsId" id="client"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                        "
                        required>
                        <p>{{$clientError}}</p>
            </div>
            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">Status</label>
                <select wire:model="status" id="status"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2">
                      @foreach($statuses as $singleStatus)
                        <option value="{{  $singleStatus }}">
                            {{ $singleStatus }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Detalji -->
            <div class="mb-6">
                <label for="details" class="block font-medium mb-1">Detalji</label>
                <textarea wire:model="details" id="details" rows="4"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2
                    @error('details') border-red-500 ring-red-300 @else border-gray-300 ring-blue-400 @enderror"
                    placeholder="Unesite dodatne informacije"></textarea>
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
