<?php

use App\Http\Controllers\laporanController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\obatController;
use App\Http\Controllers\pasienController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\tagihanController;
use App\Http\Controllers\tindakanController;
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

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
Route::resource('/dashboard',mainController::class);


Route::get('/pasien', function () {
    return view('dashboard.pasien.show');
});
Route::resource('/pasien',pasienController::class);

Route::get('/obat', function () {
    return view('dashboard.obat.show');
});
Route::resource('/obat',obatController::class);


Route::get('/pegawai', function () {
    return view('dashboard.pegawai.show');
});
Route::resource('/pegawai',pegawaiController::class);

Route::get('/tindakan', function () {
    return view('dashboard.tindakan.show');
});
Route::resource('/tindakan',tindakanController::class);

Route::get('/tagihan', function () {
    return view('dashboard.tagihan.show');
});
Route::resource('/tagihan',tagihanController::class);


Route::get('/laporan', function () {
    return view('dashboard.laporan.show');
});
Route::resource('/laporan',laporanController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
