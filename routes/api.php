<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\ProductAPIController;
use App\Http\Controllers\API\APIAuthenticationController;

/*
    // Default Sacntum Route
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
*/



// Products API Routes
Route::
    prefix('v1') // Apply API Versioning ('v1')
    ->group(function() {
        // Publicly Accessible Routes (No Authentication Required)
        Route::post('/authenticate', [APIAuthenticationController::class, 'authenticate']); // API Login/Authenticate Route

        // Authenticated Routes (Authentication Required) using 'auth:sanctum' Middleware    // User must send the 'Authroization' Header with the 'Bearer' Token they received from the 'authenticate' route
        Route::middleware('auth:sanctum')->group(function() { // Use 'auth:sanctum' Middleware for Authentication
            Route::get('/products', [ProductAPIController::class, 'index']); // All Products
        });
    })
;
