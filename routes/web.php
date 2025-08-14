<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register.store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [RegisterController::class, 'create'])->name('login');
Route::post('/login.store', [RegisterController::class, 'loginstore'])->name('login.store');
Route::get('/userdetails', [RegisterController::class, 'view'])->name('details');
