<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('home');
});

//Routes for Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::get('/register/create', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/{register}/edit', [RegisterController::class, 'edit'])->name('register.edit');
Route::put('/register/{register}/update', [RegisterController::class, 'update'])->name('register.update');
Route::delete('/register/{register}/delete', [RegisterController::class, 'delete'])->name('register.delete');

//Routes for Customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}/update',[CustomerController::class,'update'])->name('customer.update');
Route::delete('/customer/{customer}/delete',[CustomerController::class,'delete'])->name('customer.delete');

