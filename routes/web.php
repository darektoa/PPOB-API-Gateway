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
        Route::get('/{product:id}', [ProductController::class, 'show']);
    });

    // TRANSACTION
    Route::prefix('/transactions')->group(function() {
        Route::get('/', [TransactionController::class, 'index']);
    });
});