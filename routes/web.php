<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookController;


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register.store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [RegisterController::class, 'create'])->name('login');
Route::post('/login.store', [RegisterController::class, 'loginstore'])->name('login.store');
Route::get('/userdetails', [RegisterController::class, 'view'])->name('details');
Route::get('/useredit/{id}', [RegisterController::class, 'edit'])->name('edit');
Route::post('/userupdate/{id}', [RegisterController::class, 'update'])->name('update');
Route::get('/userdelete/{id}', [RegisterController::class, 'drop'])->name('delete');



Route::get('/category', [RegisterController::class, 'catcreate'])->name('catcreate');
Route::post('/category.store', [RegisterController::class, 'catstore'])->name('catstore');
Route::get('/category.view', [RegisterController::class, 'catview'])->name('catview');
Route::get('/category.edit/{id}', [RegisterController::class, 'catedit'])->name('catedit');
Route::post('/category.update/{id}', [RegisterController::class, 'catupdate'])->name('catupdate');
Route::get('/category.delete/{id}', [RegisterController::class, 'catdelete'])->name('catdelete');

//book

Route::get('/book', [BookController::class, 'create'])->name('bookcreate');
Route::post('/book.store', [BookController::class,'bookstore'])->name('bookstore');
Route::get('/book.view', [BookController::class, 'view'])->name('view');
