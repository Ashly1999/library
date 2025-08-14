<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register.store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [RegisterController::class, 'create'])->name('login');
Route::post('/login.store', [RegisterController::class, 'loginstore'])->name('login.store');
Route::get('/userdetails', [RegisterController::class, 'view'])->name('details');

Route::get('/category', [RegisterController::class, 'catcreate'])->name('catcreate');
Route::post('/category.store', [RegisterController::class, 'catstore'])->name('catstore');
Route::get('/category.view', [RegisterController::class, 'catview'])->name('catview');
Route::get('/category.edit/{id}', [RegisterController::class, 'catedit'])->name('catedit');
Route::post('/category.update/{id}', [RegisterController::class, 'catupdate'])->name('catupdate');
Route::get('/category.delete/{id}', [RegisterController::class, 'catdelete'])->name('catdelete');