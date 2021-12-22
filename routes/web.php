<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::post('/token', [PartnerController::class, 'token']);
});


// WITH PARTNER AUTHENTICATION
Route::middleware('auth.partner')->group(function() {
    // PRODUCT
    Route::prefix('/products')->group(function() {
        Route::get('/', [ProductController::class, 'index']);
    });
});