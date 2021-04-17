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

//Route::get('/', function () {
//    return view('home.index ');
//});
//Route::get('/', function () {
//    return view('home.minor ');
//});

    Route::get('login', 'AuthController@index')->name('login');
    Route::post('login', 'AuthController@authenticate')->name('login');
    Route::get('logout', 'AuthController@logout');
//    Route::get('sdsdsds', 'AuthController@a')->name('setujui.kirim');
//    Route::get('test', 'TestController@a')->name('t');
//Route::resource('module-akses', 'ModuleAksesController');
//Route::resource('jenis-toko', 'JenisTokoController');
Route::group(['middleware' => ['auth', 'check-module']], function () {
    Route::resource('pegawai', 'PegawaiController');
    Route::get('/', 'DashboardController@index')->name('dashboard');

//Route::resource('jenis-topologi', 'JenisTopologiController');
    Route::resource('topologi', 'TopologiController');
    Route::resource('spk', 'SpkController', ['except' => ['create']]);
    Route::resource('spk-item', 'SpkItemController',['except' => ['create','destroy']]);
    Route::delete('spk-item/{spk}/{toko}','SpkItemController@destroy')->name('spk-item.destroy');

///setting
    Route::prefix('setting')->group(function () {
        Route::resource('spk-jenis', 'SpkJenisController',['create','edit','show']);
        Route::resource('jabatan', 'JabatanController',['except' => ['create','edit','show']]);
        Route::delete('manajemen-modul/{jabatan}/{item}',['uses' => 'ModuleAksesController@destroy','as'=>'manajemen-modul.destroy']);
        Route::resource('manajemen-modul', 'ModuleAksesController',['except' => ['create','destroy']]);
    });
//Alfamrt
    Route::prefix('alfamart')->group(function () {
        Route::resource('toko', 'TokoController');
        Route::resource('branch', 'BranchController');
        Route::resource('biaya', 'DetailHargaController',['except' => ['create','destroy']]);

    });

    Route::prefix('ajax')->group(function () {
        Route::post('getModule', ['uses' => 'AjaxController@getModulesAccess','as'=>'ajax.getmodule']);
        Route::get('getModule/{roleID}', ['uses' => 'AjaxController@getModulesAccess2']);
    });
//    Laporan
Route::prefix('laporan')->group(function () {
//    //Route::resource('maintenance', 'LaporanMtcController',['except' => ['create']],['names'=>['index'=>'pemeliharaan.index','store'=>'pemeliharaan.store','create'=>'pemeliharaan.create','show'=>'pemeliharaan.show','destroy'=>'pemeliharaan.destroy']]);
    Route::resource('pemeliharaan', 'LaporanMtcController',['except' => ['create']]);
    Route::prefix('pemeliharaan')->group(function () {
        Route::get('show/{item}/{lap}/', 'LaporanMtcController@showmtc')->name('show.mtc');
        Route::post('show/{item}/{lap}/', 'LaporanMtcController@update')->name('show.store');
        Route::delete('show/{item}/{lap}/', 'LaporanMtcController@destroy')->name('show.destroy');
//      //Route::resource('show','MtcItemController',['except' => ['create','show']]);
    });
    Route::post('pemeliharaan/{id1}/create', 'LaporanMtcController@store')->name('store2');
    Route::get('pemeliharaan/buat/{id}/', 'LaporanMtcController@create')->name('store2.create');

    Route::resource('invoice', 'InvoiceController');
    Route::put('invoice/konfirmasi/{id}', 'InvoiceController@konfirmasi')->name('inv.konfirmasi');
    Route::get('invoice/show/{id}', 'InvoiceController@showinv')->name('inv.show');

    Route::resource('surat-tugas', 'SuratTugasController');

});

Route::get('ganti-kata-sandi', 'PegawaiController@change');
Route::post('ganti-kata-sandi', ['uses' => 'PegawaiController@changePassword','as' => 'ganti-sandi']);
//Route::resource('biaya', 'DetailHargaController',['except' => ['create','destroy']]);
});