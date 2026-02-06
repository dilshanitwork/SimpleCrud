<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

Route::get('/register/create', [RegisterController::class, 'create'])->name('register.create');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/register/{register}/edit', [RegisterController::class, 'edit'])->name('register.edit');

Route::put('/register/{register}/update', [RegisterController::class, 'update'])->name('register.update');

Route::delete('/register/{register}/delete', [RegisterController::class, 'delete'])->name('register.delete');