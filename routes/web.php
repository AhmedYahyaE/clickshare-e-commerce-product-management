<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });




    // Laravel Breeze Routes
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php'; // Laravel Breeze Authentication Routes



// Products Routes
Route
    ::middleware('auth') // Apply 'auth' Middleware for Authentication
    ->group(function() {
        Route::get('/', function() { // Redirect '/' to '/products/index' route
            return redirect()->route('products.index');
        });

        Route::resource('products', ProductController::class); // Multiple Resource Controller Routes (index, create, store, show, edit, update, destroy) with route names
    })
;
