<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\WebPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('posts.index'));

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [AuthSessionController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthSessionController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthSessionController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthSessionController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthSessionController::class, 'logout'])->middleware('auth')->name('logout');

Route::resource('posts', WebPostController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::middleware('auth')->group(function (): void {
    Route::get('/posts/create', [WebPostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [WebPostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [WebPostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [WebPostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [WebPostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/{post}/comments', [WebPostController::class, 'addComment'])->name('posts.comments.store');
});
