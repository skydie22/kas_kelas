<?php

use App\Http\Controllers\KasPemasukanController;
use App\Http\Controllers\KasPengeluaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// test
Route::get('/tes', function () {
    return view('kas-pemasukan.pemasukan');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kas-pemasukan', [App\Http\Controllers\KasPemasukanController::class, 'index'])->name('kas-pemasukan');
Route::get('/kas-pengeluaran', [KasPengeluaranController::class, 'index'])->name('kas-pengeluaran');
