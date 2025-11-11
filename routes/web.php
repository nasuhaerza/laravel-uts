<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ItemController;

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login_process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Modul Barang
Route::get('/item', [ItemController::class, 'index'])->name('brg');
Route::get('/item/create', [ItemController::class, 'create'])->name('brg_create');
Route::post('/item/store', [ItemController::class, 'store'])->name('brg_store');
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('brg_edit');
Route::put('/item/update/{id}', [ItemController::class, 'update'])->name('brg_update');
Route::delete('/item/delete/{id}', [ItemController::class, 'delete'])->name('brg_delete');
