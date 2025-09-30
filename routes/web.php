<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GrnController;
use App\Http\Controllers\ItemController;



Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register.store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [RegisterController::class, 'create'])->name('login');
Route::post('/login.store', [RegisterController::class, 'loginstore'])->name('login.store');
Route::get('/userdetails', [RegisterController::class, 'view'])->name('details');
Route::get('/useredit/{id}', [RegisterController::class, 'edit'])->name('edit');
Route::post('/userupdate/{id}', [RegisterController::class, 'update'])->name('updatestore');
Route::get('/userdelete/{id}', [RegisterController::class, 'drop'])->name('drop');

Route::get('/category', [RegisterController::class, 'catcreate'])->name('catcreate');
Route::post('/category.store', [RegisterController::class, 'catstore'])->name('catstore');
Route::get('/category.view', [RegisterController::class, 'catview'])->name('catview');
Route::get('/category.edit/{id}', [RegisterController::class, 'catedit'])->name('catedit');
Route::post('/category.update/{id}', [RegisterController::class, 'catupdate'])->name('catupdate');
Route::get('/category.delete/{id}', [RegisterController::class, 'catdelete'])->name('catdelete');

//book
Route::get('/book', [BookController::class, 'create'])->name('bookcreate');
Route::post('/bookstore', [BookController::class,'bookstore'])->name('bookstore');
Route::get('/book.view', [BookController::class, 'view'])->name('view');
Route::get('/bookedit/{id}',[BookController::class, 'edit'])->name('bookedit');
Route::post('/updatestore/{id}', [BookController::class, 'update'])->name('update');
Route::get('/delete/{id}', [BookController::class, 'delete'])->name('delete');
Route::get('/book.search', [BookController::class, 'search'])->name('books.search');

Route::post('/logout', [BookController::class, 'logout'])->name('logout');


Route::get('/layout', [RegisterController::class, 'indexes'])->name('layout');

Route::get('/task', [TaskController::class, 'create'])->name('task');
Route::get('/palin', [TaskController::class, 'view'])->name('palin');


Route::get('/grn/create', [GrnController::class, 'create'])->name('grn.create');
Route::post('/grn/store', [GrnController::class, 'store'])->name('grn.store');

Route::get('/item/create', [ItemController::class, 'index'])->name('item.create');
Route::post('/item/create',[ItemController::class, 'store'])->name('item.store');


Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');