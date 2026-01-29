<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoApiController;

Route::get('/productos', [ProductoApiController::class, 'index']);
Route::post('/productos', [ProductoApiController::class, 'store']);
Route::put('/productos/{producto}', [ProductoApiController::class, 'update']);
Route::delete('/productos/{producto}', [ProductoApiController::class, 'destroy']);
