<?php

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

Route::get('/', function () {
    return view('welcome');
});
//Penduduk

//Pegawai
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai');
Route::get('/pegawai/table/penduduk', 'App\Http\Controllers\PegawaiController@penduduk')->name('pegawai.penduduk');
Route::get('/pegawai/table/pengajuan', 'App\Http\Controllers\PegawaiController@pengajuan')->name('pegawai.pengajuan');
Route::get('/pegawai/table/jenissurat', 'App\Http\Controllers\PegawaiController@jenissurat')->name('pegawai.jenissurat');
Route::get('/pegawai/calendar', 'App\Http\Controllers\PegawaiController@calendar')->name('pegawai.calendar');
Route::get('/pegawai/gallery', 'App\Http\Controllers\PegawaiController@gallery')->name('pegawai.gallery');
