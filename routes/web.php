<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatHerbalController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TerapiController;
use App\Http\Controllers\PenterapiController;
use App\Http\Controllers\PelayananController;

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

// Route Default
Route::get('/', [HomeController::class, 'index'])->name('/')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('/login')->middleware('guest');

// Route authentifikasi
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// Route Dashboard
Route::middleware(['isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/user/changepicture', [DashboardController::class, 'changeImage']);
    
    // Route buat obat herbal
    Route::resource('/dashboard/obat-herbal', ObatHerbalController::class);
    
    // Route terapi
    Route::resource('/dashboard/terapi', TerapiController::class);
    
    // Route Penterapi
    Route::resource('/dashboard/penterapi', PenterapiController::class)->parameters(['penterapi' => 'user']);
    
    // Route Pasien
    Route::resource('/dashboard/data-pasien', PasienController::class)->parameters(['data-pasien' => 'pasien']);
    
    // Route Pendaftaran
    Route::resource('/dashboard/pendaftaran', PendaftaranController::class);
});









// Route Penterapi
Route::middleware(['auth'])->group(function () { 
    // searching
    Route::get('/pelayanan/search', [PelayananController::class, 'search']);

    // pelayanan
    Route::get('/pelayanan', [PelayananController::class, 'index']);
    Route::get('/pelayanan/periksa/{pasien:id}', [PelayananController::class, 'periksa']);
    Route::post('/pelayanan/store/{pendaftaran:id}', [PelayananController::class, 'store']);

    // pembayaran
    Route::get('/pelayanan/pembayaran/{pendaftaran:id}', [PelayananController::class, 'pembayaran']);
    Route::get('/pembayaran/selesai/{pendaftaran:id}', [PelayananController::class, 'selesai']);
});