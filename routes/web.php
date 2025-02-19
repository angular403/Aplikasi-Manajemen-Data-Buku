<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class)->middleware('auth');
    Route::resource('penerbit', PenerbitController::class)->middleware('auth');
    Route::resource('buku', BukuController::class)->middleware('auth');
});

// Route untuk login dan logout
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');

// Route Untuk Tes
Route::get('/tes', function(){
    return view('test');
});
