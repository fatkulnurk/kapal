<?php
Route::group([
    'prefix' => 'web',
    'namespace' => 'Api\Web',
    'as' => 'api.web'
], function () {
    Route::get('/', 'HomeController');
    Route::get('/kapal', 'KapalController');
    Route::get('/satuan', 'SatuanController');
    Route::get('/kategori-pekerjaan', 'KategoriPekerjaanController');
    Route::get('/jenis-kapal', 'JenisKapalController');
    Route::get('/perusahaan', 'PerusahaanController');
    Route::get('/user', 'UserController');
});
