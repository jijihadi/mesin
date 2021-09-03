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
    return view('auth.login');
});



Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/test', 'PemeliharaanController@test')->name('test');
    Route::prefix('admin')->group(function(){
        // data user
        Route::get('/user', 'UserController@index')->name('user');
        Route::get('/user/cari', 'UserController@cari');

        Route::get('/{id}/ubahDataUser', 'UserController@ubah');
        Route::post('/{id}/ubahDataUser/update', 'UserController@update');
        Route::post('/tambahUser/tambah', 'UserController@store')->name('tambahUser.store');
        Route::get('/tambahUser', 'UserController@show')->name('tambahUser');
        // Route::match(['get','post'],'/edit/{id}', 'UserController@edit');
        // Route::match(['get','post'],'/editMesin/{id}', 'MesinController@edit');
        // Route::delete('/user/{id}', 'UserController@delete');
        
        
        // data jabatan
        Route::get('/jabatan', 'JabatanController@jabatan')->name('jabatan');
        Route::get('/{id_jabatan}/ubahJabatan', 'JabatanController@ubah');
        Route::get('/tambahJabatan', 'JabatanController@tambahjabatan')->name('tambahJabatan');
        Route::post('/tambahJabatan/tambah', 'JabatanController@store')->name('tambahJabatan.store');
        Route::post('/{id_jabatan}/ubahJabatan/update', 'JabatanController@update');

        // data pegawai
        Route::get('/pegawai', 'PegawaiController@index')->name('pegawai');
        Route::get('/pegawai/cari', 'PegawaiController@cari')->name('cari');
        Route::get('/tambahPegawai', 'PegawaiController@create')->name('tambahPegawai');
        Route::post('/tambahPegawai/tambah', 'PegawaiController@store')->name('tambahPegawai.store');
        Route::get('/{id_pegawai}/ubahDataPegawai', 'PegawaiController@ubah');
        Route::post('/{id_pegawai}/ubahDataPegawai/update', 'PegawaiController@update')->name('ubahDataPegawai');
        
        // data mesin
        Route::delete('/mesin/{id}', 'MesinController@delete');
        Route::get('/mesin', 'MesinController@index')->name('mesin');
        Route::get('/mesin/cari', 'MesinController@cari');
        Route::get('/tambahMesin', 'MesinController@show')->name('tambahMesin');
        Route::post('/tambahMesin/tambah', 'MesinController@store')->name('tambahMesin.tambah');
        Route::get('/{id_mesin}/ubahDataMesin', 'MesinController@ubah');
        Route::post('/{id_mesin}/ubahDataMesin/update', 'MesinController@update');
        
        
        // data Parameter
        Route::get('/parameter', 'ParameterController@index')->name('parameter');
        Route::get('/{id_parameter}/ubahDataParameter', 'ParameterController@ubah');
        Route::post('/{id_parameter}/ubahDataParameter/update', 'ParameterController@update');
        Route::get('/tambahParameter', 'ParameterController@show')->name('tambahParameter');
        Route::post('/tambahParameter/tambah', 'ParameterController@store')->name('tambahParameter.tambah');
        // Route::delete('/pointcek/{id}', 'PointCheckController@delete');

        // pemeliharaan
        Route::get('/jadwalPemeliharaan', 'PemeliharaanController@index')->name('jadwalPemeliharaan');
        // Route::get('/formPemeliharaan', 'PemeliharaanController@show')->name('formPemeliharaan');
        Route::post('/jadwalPemeliharaan/tambah', 'PemeliharaanController@store')->name('jadwalPemeliharaan.tambah');
        // Route::delete('/jadwalPemeliharaan/{id}', 'PemeliharaanController@delete');
        // Route::get('formEditPemeliharaan/{id}', 'PemeliharaanController@formEditPemeliharaan');
        // Route::match(['get','post'],'/status/{id}', 'PemeliharaanController@status');
        // Route::match(['get','post'],'/editpemeliharaan/{id}', 'PemeliharaanController@edit');

        // perbaikan
        Route::get('/jadwalPerbaikan', 'PerbaikanController@index')->name('jadwalPerbaikan');
        // Route::get('/formPerbaikan', 'PerbaikanController@show')->name('formPerbaikan');
        // Route::post('/jadwalPerbaikan/tambah', 'PerbaikanController@store')->name('jadwalPerbaikan.tambah');
        
        // laporan perbaikan
        Route::get('/laporanPerbaikan', 'LaporanPerbaikanController@index')->name('laporanPerbaikan');
        
        // laporan pemeliharaan
        Route::get('/laporanPemeliharaan', 'LaporanPemeliharaanController@index')->name('laporanPemeliharaan');
        
        // riwayat
        Route::get('/kartuRiwayat', 'KartuRiwayatController@index')->name('kartuRiwayat');
        
    });
    Route::prefix('operator')->group(function(){
        // Route::get('/', 'OperatorController@index')->name('operator')->middleware('akses.admin');
        
        // jadwal pemeliharaan
        Route::get('/jadwalPemeliharaan', 'PemeliharaanController@index')->name('jadwalPemeliharaan');
        Route::get('/{id_pemeliharaan}/formHasilPemeliharaan', 'PemeliharaanController@hasil');
        Route::post('/{id_pemeliharaan}/hasilPemeliharaan/tambah', 'HasilPemeliharaanController@update');
        // jadwal perbaikan
        Route::get('/jadwalPerbaikan', 'PerbaikanController@index')->name('jadwalPerbaikan');
        Route::get('/formPerbaikan', 'PerbaikanController@show')->name('formPerbaikan');
        Route::get('formEditPerbaikan/{id_perbaikan}', 'PerbaikanController@formEditPerbaikan');
        Route::post('/jadwalPerbaikan/tambah', 'PerbaikanController@store')->name('jadwalPerbaikan.store');
        // laporan 
        Route::get('/laporanPerbaikan', 'LaporanPerbaikanController@index')->name('laporanPerbaikan');
        Route::get('/laporanPemeliharaan', 'LaporanPemeliharaanController@index')->name('laporanPemeliharaan');
        Route::get('/kartuRiwayat', 'KartuRiwayatController@index')->name('kartuRiwayat');
        
    });
    Route::prefix('manager')->group(function(){
        // Route::get('/', 'ManagerController@index')->name('manager')->middleware('akses.admin');
        Route::get('/laporanPerbaikan', 'LaporanPerbaikanController@index')->name('laporanPerbaikan');
        Route::get('/laporanPemeliharaan', 'LaporanPemeliharaanController@index')->name('laporanPemeliharaan');
        Route::get('/kartuRiwayat', 'KartuRiwayatController@index')->name('kartuRiwayat');
        
    });
    Route::prefix('teknisi')->group(function(){
        // Route::get('/', 'TeknisiController@index')->name('teknisi')->middleware('akses.admin');
        // Route::get('/dataMesin', 'MesinController@index')->name('mesin');
        Route::get('/jadwalPemeliharaan', 'PemeliharaanController@index')->name('jadwalPemeliharaan');
        Route::post('/jadwalPemeliharaan', 'PemeliharaanController@cari');
        Route::get('/formPemeliharaan', 'PemeliharaanController@show')->name('formPemeliharaan');
        Route::get('/{id_pemeliharaan}/formEditPemeliharaan', 'PemeliharaanController@formEditPemeliharaan');
        Route::post('/{{id_pemeliharaan}}/formEditPemeliharaan/update', 'PemeliharaanController@update');
        Route::get('/{id_pemeliharaan}/detailPemeliharaan', 'PemeliharaanController@detail');
        Route::get('/{id_pemeliharaan}/cetakdetailPemeliharaan', 'PemeliharaanController@cetakPDF');
        Route::get('/{id_perbaikan}/cetakdetailPerbaikan', 'PerbaikanController@cetakPDF');
        Route::get('detailPerbaikan/{id_perbaikan}', 'PerbaikanController@detail');
        // Route::get('/daftarPengajuan/{id}/editProposal', 'DaftarPengajuanController@editProposal');
        Route::get('/jadwalPerbaikan', 'PerbaikanController@index');
        Route::get('/jadwalPerbaikan', 'PerbaikanController@cari');
        Route::get('formHasilPerbaikan/{id_perbaikan}', 'PerbaikanController@hasil');
        Route::post('/{id_perbaikan}/hasilPerbaikan/tambah', 'HasilPerbaikanController@hasilperbaikan');
        Route::get('/laporanPerbaikan', 'LaporanPerbaikanController@index');
        Route::post('/laporanPerbaikan', 'LaporanPerbaikanController@cari');
        Route::get('/laporanPemeliharaan', 'LaporanPemeliharaanController@index');
        Route::post('/laporanPemeliharaan', 'LaporanPemeliharaanController@cari');
        Route::get('/kartuRiwayat', 'KartuRiwayatController@index')->name('kartuRiwayat');
        // Route::get('/kartuMesin', 'KartuRiwayatController@show')->name('kartuMesin');
        Route::get('/kartuMesin', 'KartuRiwayatController@cari');
        Route::get('/kartuMesin/{nama_mesin}', 'KartuRiwayatController@cetakPDF');

        Route::get('/laporanPemeliharaanPDF/{tglawal}/{tglakhir}', 'LaporanPemeliharaanController@cetakPDF')->name('cetakPDF');
        Route::get('/laporanPerbaikanPDF/{tglawal}/{tglakhir}', 'LaporanPerbaikanController@cetakPDF')->name('cetakPDF');
        
    });
});


Auth::routes();