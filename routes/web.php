<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\WebPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('posts.index'));

Route::get('/register', [AuthSessionController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthSessionController::class, 'register'])->name('register.store');
Route::get('/login', [AuthSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthSessionController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthSessionController::class, 'logout'])->middleware('auth')->name('logout');

Route::resource('posts', WebPostController::class);
