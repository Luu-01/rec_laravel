<?php

use App\Http\Controllers\Api\ApiBlogController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [ApiBlogController::class, 'index']);
Route::get('/posts/{post}', [ApiBlogController::class, 'show']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/posts', [ApiBlogController::class, 'store']);
    Route::put('/posts/{post}', [ApiBlogController::class, 'update']);
    Route::delete('/posts/{post}', [ApiBlogController::class, 'destroy']);
    Route::post('/posts/{post}/comments', [ApiBlogController::class, 'addComment']);
});
