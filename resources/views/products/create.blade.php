@extends('products.layouts.main-layout')

@section('title', 'Create New Product')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center my-6">Create New Product</h1>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <!-- Product Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Product Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <x-input-label for="description" :value="__('Product Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Product Price -->
            <div class="mb-4">
                <x-input-label for="price" :value="__('Product Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Product Quantity -->
            <div class="mb-4">
                <x-input-label for="quantity" :value="__('Product Quantity')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" required />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Create Product') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
