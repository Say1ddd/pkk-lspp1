<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', [KategoriController::class, 'count'])->name('dashboard');

    // crud
    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('barangmasuk', BarangMasukController::class);
    Route::resource('barangkeluar', BarangKeluarController::class);
});

// AuthController, login, logout, dan register
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'regisForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
