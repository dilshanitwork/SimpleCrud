<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', fn () => view('register'));
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', fn () => view('login'))->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', fn () => view('dashboard'))->middleware('auth');

Route::get('/users', [UserController::class, 'users'])->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'updateUser'])->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->middleware('auth');
