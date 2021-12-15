<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::post('/token', [PartnerController::class, 'token']);
});
