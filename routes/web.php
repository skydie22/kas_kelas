<?php

use App\Http\Controllers\KasPemasukanController;
use App\Http\Controllers\KasPengeluaranController;
use App\Http\Controllers\rekapController;
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




Auth::routes();


//get
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::get('/kas-pemasukan', [App\Http\Controllers\KasPemasukanController::class, 'index'])->name('kas.pemasukan');
Route::get('/kas-pengeluaran', [KasPengeluaranController::class, 'index'])->name('kas.pengeluaran');

//post
Route::post('/kas-pemasukan/add', [App\Http\Controllers\KasPemasukanController::class, 'storePemasukan'])->name('tambah.pemasukan');
Route::post('/kas-pengeluaran/add', [App\Http\Controllers\KasPengeluaranController::class, 'storePengeluaran'])->name('tambah.pengeluaran');


//put
Route::put('/kas-pemasukan/edit/{id}', [KasPemasukanController::class, 'update']);
Route::put('/kas-pengeluaran/edit/{id}', [KasPengeluaranController::class, 'update']);


//delete
Route::delete('/kas-pemasukan/delete/{id}', [KasPemasukanController::class, 'destroy']);
Route::delete('/kas-pengeluaran/delete/{id}', [KasPengeluaranController::class, 'destroy']);


//rekap
Route::get('/rekap' , [rekapController::class , 'index']);
