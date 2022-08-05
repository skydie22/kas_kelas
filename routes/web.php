    <?php

use App\Http\Controllers\KasPemasukanController;
use App\Http\Controllers\KasPengeluaranController;
use App\Http\Controllers\rekapController;
use App\Http\Controllers\UserController;
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



Route::group(['middleware' => 'auth'] , function() {

//get
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::get('/kas-pemasukan', [App\Http\Controllers\KasPemasukanController::class, 'index'])->name('kas.pemasukan')->middleware('role:bendahara');
Route::get('/kas-pengeluaran', [KasPengeluaranController::class, 'index'])->name('kas.pengeluaran')->middleware('role:bendahara');

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
Route::get('/rekap', [rekapController::class, 'index']);

// Manage user
Route::get('/manage-bendahara', [UserController::class, 'index'])->name('users.index')->middleware('role:ketua');

Route::post('/user/add', [UserController::class, 'store'])->name('users.add')->middleware('role:ketua');

Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('users.delete')->middleware('role:ketua');

// Edit profile

Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile')->middleware('role:bendahara');

Route::put('/edit-profile', [UserController::class, 'editProfile'])->name('users.edit_profile')->middleware('role:bendahara');

});


