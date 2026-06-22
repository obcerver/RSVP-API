<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;

// Public login route
Route::post('/login', [AuthController::class, 'login']);

// Guarded routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/guests', GuestController::class);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
