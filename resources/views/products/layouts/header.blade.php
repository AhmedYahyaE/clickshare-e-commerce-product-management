<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name'))</title>

        {{-- Vite CSS Asset Bundler --}}
        @vite('resources/css/app.css')

    </head>
    <body class="bg-gray-100 font-sans text-gray-900 flex flex-col min-h-screen">
        @include('products.layouts.navbar')
