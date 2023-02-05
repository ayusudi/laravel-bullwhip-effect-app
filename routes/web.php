<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SessionNamaBagian;
 

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
Route::post('/login','App\Http\Controllers\Controller@doLoginDevelopment');
Route::get('/logout','App\Http\Controllers\Controller@logout');

// //! Admin Foreign Key 7
Route::group(['prefix' => 'admin', 'middleware' => [SessionNamaBagian::class]] ,function () {
  // CRUD Pegawai
  Route::get("/pegawai",'App\Http\Controllers\PegawaiController@index');
  Route::get("/pegawai/create",'App\Http\Controllers\PegawaiController@create');
  Route::post("/pegawai/ceate",'App\Http\Controllers\PegawaiController@store');
  Route::get("/pegawai/update/{id}",'App\Http\Controllers\PegawaiController@edit');
  Route::post("/pegawai/update/{id}",'App\Http\Controllers\PegawaiController@update');
  Route::get("/pegawai/delete/{id}",'App\Http\Controllers\PegawaiController@destroy');
  // CRUD Bagian
  Route::get("/bagian",'App\Http\Controllers\BagianController@index');
  Route::get("/bagian/create",'App\Http\Controllers\BagianController@create');
  Route::post("/bagian/create",'App\Http\Controllers\BagianController@store');
  Route::get("/bagian/update/{id}",'App\Http\Controllers\BagianController@edit');
  Route::post("/bagian/update/{id}",'App\Http\Controllers\BagianController@update');
  Route::get("/bagian/delete/{id}",'App\Http\Controllers\BagianController@destroy');
  // CRUD Barang
  Route::get("/barang",'App\Http\Controllers\BarangController@index');
  Route::get("/barang/create",'App\Http\Controllers\BarangController@create');
  Route::post("/barang/create",'App\Http\Controllers\BarangController@store');
  Route::get("/barang/update/{id}",'App\Http\Controllers\BarangController@edit');
  Route::post("/barang/update/{id}",'App\Http\Controllers\BarangController@update');
  Route::get("/barang/delete/{id}",'App\Http\Controllers\BarangController@destroy');
});


// //! Manajer Foreign Key 8
Route::group(['prefix' => 'bullwhip', 'middleware' => [SessionNamaBagian::class]] , function () {
  Route::get("/",'App\Http\Controllers\Controller@bullwhip');
  Route::get("/graphic",'App\Http\Controllers\Controller@bullwhipGraphic');
});

// //! Gudang Foreign Key 9
Route::group(['prefix' => 'gudang', 'middleware' => [SessionNamaBagian::class]] , function () {
  Route::get("/",'App\Http\Controllers\PengambilanController@gudang');
  Route::get("/pengambilan",'App\Http\Controllers\PengambilanController@index');
});

// ! Pesanan Foreign Key 10
Route::group(['prefix' => 'pemesanan', 'middleware' => [SessionNamaBagian::class]] , function () {
  Route::get("/",'App\Http\Controllers\PemesananController@index');
  Route::get("/produksi",'App\Http\Controllers\PemesananController@readProduksi');
});

// ! Produksi Foreign Key 11
Route::group(['prefix' => 'produksi', 'middleware' => [SessionNamaBagian::class]] , function () {
  Route::get("/",'App\Http\Controllers\ProduksiController@index');
  Route::get("/update/{id}",'App\Http\Controllers\ProduksiController@update');
});