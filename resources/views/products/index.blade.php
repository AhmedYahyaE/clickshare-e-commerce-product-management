@extends('products.layouts.main-layout')

@section('title', 'Clickshare Products')



@section('content')
    {{-- <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center my-6">Products</h1>

        <div id="products-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> {{-- Will be filled by fetchProductsFromAPI() method in app.js --}}

    {{-- </div> --}}
    {{-- </div> --}}


    <div id="products-container" class="products-container">
        <h1 class="text-center my-4">Product List</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
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
