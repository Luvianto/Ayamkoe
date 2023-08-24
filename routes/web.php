<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Route::post('/login',[UserController::class,'login'] )
->name('login.submit');

Route::post('/register',[UserController::class,'register'] )
->name('register.submit');

Route::middleware('guest')->group(function() {

    Route::get('/dashboard', function () {
        return view('dashboard');})
    ->name('dashboard');

    Route::get('/login', function () {
        return view('login');})
    ->name('login');

    Route::get('/daftar', function () {
        return view('daftar');})
    ->name('daftar');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout',[UserController::class,'logout'
    ])->name('logout');

    Route::get('/halamanUtama', function () {
        return view('halamanUtama');
    })->name('halamanUtama');

    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pesanan', PesananController::class);

    Route::post('pesanan/{pembayaran}', [PesananController::class,'storePesanan'])->name('pesanan.storePesanan');
    Route::get('pesanan/create/{pembayaran}', [PesananController::class,'createPesanan'])->name('pesanan.createPesanan');
    Route::get('pesanan/tampil/{pembayaran}', [PesananController::class,'showNonEditable'])->name('pesanan.showNonEditable');
    Route::get('pesanan/edit/{pembayaran}', [PesananController::class,'showEditKaryawan'])->name('pesanan.showEditKaryawan');
    Route::get('pesanans/pelanggan', [PembayaranController::class,'indexPelanggan'])->name('pembayaran.indexPelanggan');
    Route::get('pesanan/{pembayaran}', [PembayaranController::class,'editPesanan'])->name('pesanan.editPesanan');
    Route::put('pembayaran/metode/{pembayaran}', [PembayaranController::class,'setMetode'])->name('pembayaran.setMetode');
    // Route::put('pesanan/{pesanan}/{pembayaran}', [PembayaranController::class,'update'])->name('pesanan.update');

    Route::resource('produk', ProdukController::class);
    Route::resource('user',UserController::class);
});
