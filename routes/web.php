<?php

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
//    return redirect()->route('login');

    return view('welcome');
})->name('index');

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('index');
})->name('logout-account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
    'prefix' => 'dashboard',
    'namespace' => 'Dashboard',
    'as' => 'dashboard.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'HomeController')->name('index');
    Route::resource('/kapal', 'KapalController');
    Route::resource('/transaksi', 'TransaksiController');
    Route::get('/transaksi/{id}/tambah-kategori-pekerjaan', 'Transaksi\KategoriPekerjaanController@create')
        ->name('transaksi.kategori-pekerjaan.create');
    Route::post('/transaksi/{id}/tambah-kategori-pekerjaan', 'Transaksi\KategoriPekerjaanController@store')
        ->name('transaksi.kategori-pekerjaan.store');
    Route::get('/transaksi/{id}/kategori-pekerjaan/{kategori_id}/tambah-uraian', 'Transaksi\UraianController@create')
        ->name('transaksi.uraian.create');
    Route::post('/transaksi/{id}/kategori-pekerjaan/{kategori_id}/tambah-uraian', 'Transaksi\UraianController@store')
        ->name('transaksi.uraian.store');
    Route::resource('/jenis-kapal', 'JenisKapalController');
    Route::resource('/satuan', 'SatuanController');
    Route::resource('/kategori-pekerjaan', 'KategoriPekerjaanController');
});
