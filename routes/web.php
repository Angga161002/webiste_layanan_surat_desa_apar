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

Route::get('/test', function () {
    return view('penduduk.register');
});
//Login admin
Route::get('/login', 'App\Http\Controllers\PegawaiController@login')->name('pegawai.login');
Route::post('/logout', 'App\Http\Controllers\PegawaiController@logout')->name('pegawai.logout');
Route::post('/login/authenticate', 'App\Http\Controllers\PegawaiController@authenticate')->name('pegawai.authenticate');

//Login Penduduk
Route::get('/', 'App\Http\Controllers\PendudukController@login')->name('penduduk.login');
Route::post('/login/authenticatependuduk', 'App\Http\Controllers\PendudukController@authenticate')->name('penduduk.authenticate');
Route::get('/register', 'App\Http\Controllers\PendudukController@register')->name('penduduk.register');
Route::post('/register/authenticatependuduk', 'App\Http\Controllers\PendudukController@authenticateregister')->name('penduduk.authenticateregister');
Route::post('/logout/penduduk', 'App\Http\Controllers\PendudukController@logout')->name('penduduk.logout');

//Penduduk
Route::get('/penduduk', 'App\Http\Controllers\PendudukController@index')->name('penduduk')->middleware('penduduk_auth');
Route::get('/penduduk/profile', 'App\Http\Controllers\PendudukController@profile')->name('penduduk.profile')->middleware('penduduk_auth');
Route::post('/penduduk/profile/edit', 'App\Http\Controllers\PendudukController@profileedit')->name('penduduk.profileedit')->middleware('penduduk_auth');
Route::get('/penduduk/calendar', 'App\Http\Controllers\PendudukController@calendar')->name('penduduk.calendar')->middleware('penduduk_auth');
Route::get('/penduduk/gallery', 'App\Http\Controllers\PendudukController@gallery')->name('penduduk.gallery')->middleware('penduduk_auth');

//Tabel Pengajuan
Route::get('/penduduk/table/pengajuan', 'App\Http\Controllers\PendudukController@pengajuan')->name('penduduk.pengajuan')->middleware('penduduk_auth');
Route::get('/penduduk/tambahpengajuan', 'App\Http\Controllers\PendudukController@tambahpengajuan')->name('penduduk.tambahpengajuan')->middleware('penduduk_auth');
Route::post('/penduduk/addpengajuan', 'App\Http\Controllers\PendudukController@addpengajuan')->name('penduduk.addpengajuan')->middleware('penduduk_auth');
Route::get('/penduduk/table/pengajuan/edit/{pengajuans}', 'App\Http\Controllers\PendudukController@editpengajuan')->name('penduduk.editpengajuan')->middleware('penduduk_auth');
Route::post('/penduduk/table/pengajuan/ubah', 'App\Http\Controllers\PendudukController@ubahpengajuan')->name('penduduk.ubahpengajuan')->middleware('penduduk_auth');
Route::get('/penduduk/table/pengajuan/hapus/{pengajuans}', 'App\Http\Controllers\PendudukController@hapuspengajuan')->name('penduduk.hapuspengajuan')->middleware('penduduk_auth');
Route::get('/penduduk/table/pengajuan/detail/{pengajuans}', 'App\Http\Controllers\PendudukController@detailpengajuan')->name('penduduk.detailpengajuan')->middleware('penduduk_auth');

//Table Jenis Surat
Route::get('/penduduk/table/jenissurat', 'App\Http\Controllers\PendudukController@jenissurat')->name('penduduk.jenissurat')->middleware('penduduk_auth');

//Pegawai
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai')->middleware('pegawai_auth');
Route::get('/pegawai/calendar', 'App\Http\Controllers\PegawaiController@calendar')->name('pegawai.calendar')->middleware('pegawai_auth');
Route::get('/pegawai/gallery', 'App\Http\Controllers\PegawaiController@gallery')->name('pegawai.gallery')->middleware('pegawai_auth');

//Tabel Pegawai
Route::get('/pegawai/table/pegawai', 'App\Http\Controllers\PegawaiController@pegawai')->name('pegawai.pegawai')->middleware('pegawai_auth');
Route::get('/pegawai/table/pegawai/add', 'App\Http\Controllers\PegawaiController@addpegawai')->name('pegawai.addpegawai')->middleware('pegawai_auth');
Route::post('/pegawai/table/pegawai/tambah', 'App\Http\Controllers\PegawaiController@tambahpegawai')->name('pegawai.tambahpegawai')->middleware('pegawai_auth');
Route::get('/pegawai/table/pegawai/edit/{pegawais}', 'App\Http\Controllers\PegawaiController@editpegawai')->name('pegawai.editpegawai')->middleware('pegawai_auth');
Route::post('/pegawai/table/pegawai/ubah', 'App\Http\Controllers\PegawaiController@ubahpegawai')->name('pegawai.ubahpegawai')->middleware('pegawai_auth');
Route::get('/pegawai/table/pegawai/hapus/{pegawais}', 'App\Http\Controllers\PegawaiController@hapuspegawai')->name('pegawai.hapuspegawai')->middleware('pegawai_auth');

//Tabel Penduduk
Route::get('/pegawai/table/penduduk', 'App\Http\Controllers\PegawaiController@penduduk')->name('pegawai.penduduk')->middleware('pegawai_auth');
Route::get('/pegawai/table/penduduk/add', 'App\Http\Controllers\PegawaiController@addpenduduk')->name('pegawai.addpenduduk')->middleware('pegawai_auth');
Route::post('/pegawai/table/penduduk/tambah', 'App\Http\Controllers\PegawaiController@tambahpenduduk')->name('pegawai.tambahpenduduk')->middleware('pegawai_auth');
Route::get('/pegawai/table/penduduk/hapus/{penduduks}', 'App\Http\Controllers\PegawaiController@hapuspenduduk')->name('pegawai.hapuspenduduk')->middleware('pegawai_auth');
Route::get('/pegawai/table/penduduk/detail/{penduduks}', 'App\Http\Controllers\PegawaiController@detailpenduduk')->name('pegawai.detailpenduduk')->middleware('pegawai_auth');


//Tabel Pengajuan
Route::get('/pegawai/table/pengajuan', 'App\Http\Controllers\PegawaiController@pengajuan')->name('pegawai.pengajuan')->middleware('pegawai_auth');
Route::get('/pegawai/table/pengajuan/edit/{pengajuans}', 'App\Http\Controllers\PegawaiController@editpengajuan')->name('pegawai.editpengajuan')->middleware('pegawai_auth');
Route::post('/pegawai/table/pengajuan/ubah', 'App\Http\Controllers\PegawaiController@ubahpengajuan')->name('pegawai.ubahpengajuan')->middleware('pegawai_auth');
Route::get('/pegawai/table/pengajuan/hapus/{pengajuans}', 'App\Http\Controllers\PegawaiController@hapuspengajuan')->name('pegawai.hapuspengajuan')->middleware('pegawai_auth');
Route::get('/pegawai/table/pengajuan/detail/{pengajuans}', 'App\Http\Controllers\PegawaiController@detailpengajuan')->name('pegawai.detailpengajuan')->middleware('pegawai_auth');

//Tabel Jenis Surat
Route::get('/pegawai/table/jenissurat', 'App\Http\Controllers\PegawaiController@jenissurat')->name('pegawai.jenissurat')->middleware('pegawai_auth');
Route::get('/pegawai/table/jenissurat/add', 'App\Http\Controllers\PegawaiController@addjenissurat')->name('pegawai.addjenissurat')->middleware('pegawai_auth');
Route::post('/pegawai/table/jenissurat/tambah', 'App\Http\Controllers\PegawaiController@tambahjenissurat')->name('pegawai.tambahjenissurat')->middleware('pegawai_auth');
Route::get('/pegawai/table/jenissurat/edit/{jenissurats}', 'App\Http\Controllers\PegawaiController@editjenissurat')->name('pegawai.editjenissurat')->middleware('pegawai_auth');
Route::post('/pegawai/table/jenissurat/ubah', 'App\Http\Controllers\PegawaiController@ubahjenissurat')->name('pegawai.ubahjenissurat')->middleware('pegawai_auth');
Route::get('/pegawai/table/jenissurat/hapus/{jenissurats}', 'App\Http\Controllers\PegawaiController@hapusjenissurat')->name('pegawai.hapusjenissurat')->middleware('pegawai_auth');
