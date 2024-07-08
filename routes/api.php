<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ContactController;

Route::prefix('v1')->group(function () {
    Route::post('/contact', [ContactController::class, 'store']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
