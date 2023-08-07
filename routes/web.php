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
Route::get('/pegawai/calendar', 'App\Http\Controllers\PegawaiController@calendar')->name('pegawai.calendar');
Route::get('/pegawai/gallery', 'App\Http\Controllers\PegawaiController@gallery')->name('pegawai.gallery');

//Tabel Pegawai
Route::get('/pegawai/table/pegawai', 'App\Http\Controllers\PegawaiController@pegawai')->name('pegawai.pegawai');
Route::get('/pegawai/table/pegawai/add', 'App\Http\Controllers\PegawaiController@addpegawai')->name('pegawai.addpegawai');
Route::post('/pegawai/table/pegawai/tambah', 'App\Http\Controllers\PegawaiController@tambahpegawai')->name('pegawai.tambahpegawai');
Route::get('/pegawai/table/pegawai/edit/{pegawais}', 'App\Http\Controllers\PegawaiController@editpegawai')->name('pegawai.editpegawai');
Route::post('/pegawai/table/pegawai/ubah', 'App\Http\Controllers\PegawaiController@ubahpegawai')->name('pegawai.ubahpegawai');
Route::get('/pegawai/table/pegawai/hapus/{pegawais}', 'App\Http\Controllers\PegawaiController@hapuspegawai')->name('pegawai.hapuspegawai');

//Tabel Penduduk
Route::get('/pegawai/table/penduduk', 'App\Http\Controllers\PegawaiController@penduduk')->name('pegawai.penduduk');
Route::get('/pegawai/table/penduduk/add', 'App\Http\Controllers\PegawaiController@addpenduduk')->name('pegawai.addpenduduk');
Route::post('/pegawai/table/penduduk/tambah', 'App\Http\Controllers\PegawaiController@tambahpenduduk')->name('pegawai.tambahpenduduk');
Route::get('/pegawai/table/penduduk/hapus/{penduduks}', 'App\Http\Controllers\PegawaiController@hapuspenduduk')->name('pegawai.hapuspenduduk');
Route::get('/pegawai/table/penduduk/detail/{penduduks}', 'App\Http\Controllers\PegawaiController@detailpenduduk')->name('pegawai.detailpenduduk');


//Tabel Pengajuan
Route::get('/pegawai/table/pengajuan', 'App\Http\Controllers\PegawaiController@pengajuan')->name('pegawai.pengajuan');

//Tabel Jenis Surat
Route::get('/pegawai/table/jenissurat', 'App\Http\Controllers\PegawaiController@jenissurat')->name('pegawai.jenissurat');
Route::get('/pegawai/table/jenissurat/add', 'App\Http\Controllers\PegawaiController@addjenissurat')->name('pegawai.addjenissurat');
Route::post('/pegawai/table/jenissurat/tambah', 'App\Http\Controllers\PegawaiController@tambahjenissurat')->name('pegawai.tambahjenissurat');
Route::get('/pegawai/table/jenissurat/edit/{jenissurats}', 'App\Http\Controllers\PegawaiController@editjenissurat')->name('pegawai.editjenissurat');
Route::post('/pegawai/table/jenissurat/ubah', 'App\Http\Controllers\PegawaiController@ubahjenissurat')->name('pegawai.ubahjenissurat');
Route::get('/pegawai/table/jenissurat/hapus/{jenissurats}', 'App\Http\Controllers\PegawaiController@hapusjenissurat')->name('pegawai.hapusjenissurat');

