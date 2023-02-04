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

Route::get('/','App\Http\Controllers\Controller@landingPage');
Route::get('/login','App\Http\Controllers\Controller@index');

// //! Admin Foreign Key 7
Route::get("/admin/pegawai",'App\Http\Controllers\PegawaiController@index');
Route::get("/admin/pegawai/create",'App\Http\Controllers\PegawaiController@create');
Route::post("/admin/pegawai/ceate",'App\Http\Controllers\PegawaiController@store');
Route::get("/admin/pegawai/update/{id}",'App\Http\Controllers\PegawaiController@edit');
Route::post("/admin/pegawai/update/{id}",'App\Http\Controllers\PegawaiController@update');
Route::get("/admin/pegawai/delete/{id}",'App\Http\Controllers\PegawaiController@destroy');
Route::get("/admin/bagian",'App\Http\Controllers\BagianController@index');
Route::get("/admin/barang",'App\Http\Controllers\BarangController@index');
Route::get("/admin/barang/create",'App\Http\Controllers\BarangController@index');
Route::post("/admin/barang/ceate",'App\Http\Controllers\BarangController@index');
Route::get("/admin/barang/update/{id}",'App\Http\Controllers\BarangController@edit');
Route::post("/admin/barang/update/{id}",'App\Http\Controllers\BarangController@update');
Route::get("/admin/barang/delete/{id}",'App\Http\Controllers\BarangController@destroy');

// //! Admin Foreign Key 8
// // Monitor Manajer
Route::get("/bullwhip",'App\Http\Controllers\Controller@bullwhip');
Route::get("/bullwhip/graphic",'App\Http\Controllers\Controller@bullwhipGraphic');


// //! Gudang Foreign Key 9
// // CMS Gudang
Route::get("/gudang",'App\Http\Controllers\PengambilanController@gudang');
Route::get("/gudang/pengambilan",'App\Http\Controllers\PengambilanController@index');
// Route::get("/gudang/pengambilan/create",'App\Http\Controllers\BagianController@index');
// Route::post("/gudang/pengambilan/create",'App\Http\Controllers\BagianController@index');

// ! Pesanan Foreign Key 10
// CMS Pesanan
Route::get("/pemesanan",'App\Http\Controllers\PemesananController@index');
// Route::get("/pemesanan/update/{id}",'App\Http\Controllers\BagianController@index');
// Route::post("/pemesanan/update/{id}",'App\Http\Controllers\BagianController@index');
Route::get("/pemesanan/produksi",'App\Http\Controllers\PemesananController@readProduksi');

// ! Produksi Foreign Key 11
// CMS Produksi
Route::get("/produksi",'App\Http\Controllers\ProduksiController@index');
// Route::get("/produksi/create",'App\Http\Controllers\BagianController@index');
// Route::post("/produksi/create",'App\Http\Controllers\BagianController@index');
// Route::get("/produksi/update/{id}",'App\Http\Controllers\BagianController@index');
// Route::post("/produksi/update/{id}",'App\Http\Controllers\BagianController@index');