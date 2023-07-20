<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [LoginController::class, 'index'])->name('/')->middleware('guest');

// Route authentifikasi
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isAdmin');
Route::post('/user/changepicture', [DashboardController::class, 'changeImage']);


// Route buat obat herbal
Route::resource('/dashboard/obat-herbal', ObatHerbalController::class)->middleware('isAdmin');

// Route terapi
Route::resource('/dashboard/terapi', TerapiController::class)->middleware('isAdmin');

// Route Penterapi
Route::resource('/dashboard/penterapi', PenterapiController::class)->middleware('isAdmin')->parameters(['penterapi' => 'user']);

// Route Pasien
Route::resource('/dashboard/data-pasien', PasienController::class)->middleware('isAdmin')->parameters(['data-pasien' => 'pasien']);

// Route Pendaftaran
Route::resource('/dashboard/pendaftaran', PendaftaranController::class)->middleware('isAdmin');









// Route Penterapi
Route::get('/pelayanan', [PelayananController::class, 'index'])->middleware('auth');
Route::get('/pelayanan/periksa/{pasien:id}', [PelayananController::class, 'periksa'])->middleware('auth');
Route::post('/pelayanan/store', [PelayananController::class, 'store']);