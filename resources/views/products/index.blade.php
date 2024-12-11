@extends('products.layouts.main-layout')

@section('title', 'Clickshare Products')



@section('content')
    {{-- Display a Success Message when a product is created or edited --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-500 text-white p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif



    <div id="products-container" class="products-container">
        <h1 class="text-center my-4">Product List</h1>

        <!-- Button to open Create Product form -->
        <div class="mb-4 text-center">
            <a href="{{ route('products.create') }}" class="inline-block bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Create Product
            </a>
        </div>

        <table id="products-table-body" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="products-table-body">
                {{-- Will be filled by fetchProductsFromAPI() method in app.js --}}
            </tbody>
        </table>

        {{-- Pagination --}}
        <div id="pagination" class="pagination-container">
            {{-- Will be filled by fetchProductsFromAPI() method in app.js --}}
        </div>
    </div>
@endsection
