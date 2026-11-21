<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio.index')->name('inicio');
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
// Solo administrador (va primero para que /posts/create no choque con /posts/{post})
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::delete('/posts/imagenes/{image}', [PostController::class, 'eliminarImagen'])->name('posts.imagenes.destroy');
    Route::resource('posts', PostController::class)->except(['index', 'show']);
});

// Cualquier usuario con sesión (navegar publicaciones y consultar/buscar categorías)
// Cualquier usuario con sesión
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
});