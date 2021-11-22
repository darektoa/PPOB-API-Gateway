<?php

namespace App\Http\Controllers\Api;

use App\Helpers\BukalapakHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/test', function() {
  return response()->json(['data' => BukalapakHelper::token()]);
});

Route::prefix('/auth')->group(function() {
  Route::post('/login', []);
});