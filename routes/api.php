<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\ProductAPIController;

/*
    // Default Sacntum Route
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
*/



// Products API

Route::
    prefix('v1')                     // Apply API Versioning and auth:sanctum middleware
    // ->middleware('auth:sanctum') // Use auth:sanctum Middleware for Authentication
    ->group(function() {
        Route::get('/products', [ProductAPIController::class, 'index']);
});
