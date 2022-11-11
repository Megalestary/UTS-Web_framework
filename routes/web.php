<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PegawaiController;

use App\Http\Controllers\KebutuhanController;

use App\Http\Controllers\KategoriController;

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
Route::get('/pegawai', [PegawaiController::class,'index'])->name('index');
Route::post('/Pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/delete/${id}', [PegawaiController::class,'destroy'])->name('pegawai.destroy');

Route::get('/kebutuhan', [KebutuhanController::class,'index'])->name('index');
Route::post('/Kebutuhan/store', [KebutuhanController::class, 'store'])->name('kebutuhan.store');
Route::delete('/kebutuhan/delete/${id}', [kebutuhanController::class,'destroy'])->name('kebutuhan.destroy');
Route::post('/kebutuhan/update', [kebutuhanController::class,'update'])->name('kebutuhan.update');

Route::get('/kategori', [KategoriController::class,'index'])->name('index');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::delete('/kategori/delete/${id}', [KategoriController::class,'destroy'])->name('kategori.destroy');
