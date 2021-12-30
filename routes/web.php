<?php

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
    return redirect()->route('mobil.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// Harus Login Terlebih dahulu
Route::group(['middleware' => 'auth'], function () {
    // Routes Mobil
    Route::resource("/mobil","MobilController");

    // Routes Transaksi
    Route::resource("/transaksi","TransaksiController");
    Route::get('/transaksi/cetak/{id}','TransaksiController@cetak')->name('transaksi.cetak');

    // Routes Pembeli
    Route::resource("/pembeli","PembeliController");
});

