@extends('layouts.layout')

    @section('title')
        Create Products
    @endsection

    @section('contents')
        <form action="{{ route('products.store') }}" method="POST"
            class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    maxlength="64"
                    value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                        focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-[5px]"
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">
                    Price
                </label>
                <input
                    name="price"
                    id="price"
                    min="0"
                    value="{{ old('price') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                        focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-[5px]"
                >
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Description
                </label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                        focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full rounded-md bg-indigo-600 px-4 py-2
                    text-white font-medium hover:bg-indigo-700
                    focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                Save
            </button>
        </form>
    @endsection