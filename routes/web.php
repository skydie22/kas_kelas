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




Auth::routes();


//get
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kas-pemasukan', [App\Http\Controllers\KasPemasukanController::class, 'index'])->name('kas.pemasukan');
Route::get('/kas-pengeluaran', [KasPengeluaranController::class, 'index'])->name('kas.pengeluaran');

//post
Route::post('/kas-pemasukan/add',[App\Http\Controllers\KasPemasukanController::class, 'storePemasukan'])->name('tambah.pemasukan');


//put
Route::put('/kas-pemasukan/edit/{id}', [KasPemasukanController::class, 'update']);

//delete
Route::delete('/kas-pemasukan/delete/{id}', [KasPemasukanController::class , 'destroy']);