<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EncounterController;

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    });

    Route::get('/hperson', App\Http\Controllers\HpersonController::class);
    Route::get('/encounters', [EncounterController::class, 'index']);
    Route::post('/encounters/generate', [EncounterController::class, 'generate']);

    // create a route group for encounter
    // Route::prefix('encounters')->group(function () {
    //     Route::get('/', [EncounterController::class, 'index']);
    //     Route::post('/generate', [EncounterController::class, 'generate']);
    // });
});
