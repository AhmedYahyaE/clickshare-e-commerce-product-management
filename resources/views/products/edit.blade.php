@extends('products.layouts.main-layout')

@section('title', 'Edit Clickshare Product')



@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded p-6">
            <h2 class="text-2xl font-semibold mb-6 dark:text-white">Edit Product</h2>

            <!-- Edit Product Form -->
            <form id="edit-product-form" method="POST" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT') {{-- Spoof the PUT method for Laravel --}}

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Product Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-900 dark:text-white dark:border-gray-700"
                        required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-900 dark:text-white dark:border-gray-700"
                        required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product Price -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-900 dark:text-white dark:border-gray-700"
                        required>
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product Quantity -->
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-900 dark:text-white dark:border-gray-700"
                        required>
                    @error('quantity')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg me-4">
                        Cancel
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
