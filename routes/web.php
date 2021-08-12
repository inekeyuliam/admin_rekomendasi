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



Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/hotel', 'HomeController@hotel')->name('homehotel');
Route::get('/home/persewaan', 'HomeController@sewa')->name('homesewa');

Route::resource('/hotel', 'HotelController', ['middleware' => 'auth']);
Route::resource('/wisata', 'WisataController', ['middleware' => 'auth']);
Route::resource('/tipewisata', 'TipeWisataController', ['middleware' => 'auth']);
Route::resource('/pengguna', 'PenggunaController', ['middleware' => 'auth']);
Route::resource('/persewaan', 'PersewaanController', ['middleware' => 'auth']);
Route::resource('/jenis_kriteria', 'JenisKriteriaController', ['middleware' => 'auth']);
Route::resource('/kriteria', 'KriteriaController', ['middleware' => 'auth']);
Route::resource('/detailkriteria', 'DetailKriteriaController', ['middleware' => 'auth']);
Route::resource('/kamar', 'KamarController', ['middleware' => 'auth']);
Route::resource('/jeniskamar', 'JenisKamarController', ['middleware' => 'auth']);
Route::resource('/kendaraan', 'KendaraanController', ['middleware' => 'auth']);
Route::resource('/merkkendaraan', 'MerkKendaraanController', ['middleware' => 'auth']);

Route::get('/pengajuan/hotel', 'HotelController@nonaktif');
Route::get('/bobot/hotel', 'HotelController@bobot');
Route::get('/lihat/hotel', 'HotelController@lihat');
Route::get('/lihatbobot/hotel', 'HotelController@lihatbobot');
Route::get('/lihatkamar/hotel', 'HotelController@kamar');
Route::get('/keubah/hotel', 'HotelController@keubah');
Route::get('/keubahbobot/hotel', 'HotelController@keubahbobot');
Route::post('/simpan/bobot/hotel', 'HotelController@simpan');
Route::post('/ubah/hotel', 'HotelController@ubah');
Route::post('/ubahbobot/hotel', 'HotelController@ubahbobot');

Route::get('/pengajuan/persewaan', 'PersewaanController@nonaktif');
Route::get('/bobot/persewaan', 'PersewaanController@bobot');
Route::get('/lihat/persewaan', 'PersewaanController@lihat');
Route::get('/lihatbobot/persewaan', 'PersewaanController@lihatbobot');
Route::get('/lihatkendaraan/persewaan', 'PersewaanController@kendaraan');
Route::get('/keubah/persewaan', 'PersewaanController@keubah');
Route::get('/keubahbobot/persewaan', 'PersewaanController@keubahbobot');
Route::post('/simpan/bobot/persewaan', 'PersewaanController@simpan');
Route::post('/ubah/persewaan', 'PersewaanController@ubah');
Route::post('/ubahbobot/persewaan', 'PersewaanController@ubahbobot');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('detailkriteria/getKriteria/', 'DetailKriteriaController@getKriteria');
Route::get('detailkriteria/getKriteria/{id}', 'DetailKriteriaController@getKriteria');
Route::get('status/hotel/{id}','HotelController@status');
Route::get('status/persewaan/{id}','PersewaanController@status');
Route::get('cekstatus/hotel','HotelController@cekstatus');
Route::post('checkemail', 'PersewaanController@checkemail')->middleware('ajax');

 Route::get('wisata/getKecamatan/', 'WisataController@getKecamatan');
 Route::get('wisata/getKecamatan/{id}', 'WisataController@getKecamatan');
 Route::get('getKelurahan', 'WisataController@getKelurahan');

 Route::get('hotel/getKecamatan/', 'HotelController@getKecamatan');
 Route::get('hotel/getKecamatan/{id}', 'HotelController@getKecamatan');
 Route::get('getKelurahann', 'HotelController@getKelurahan');

 Route::get('persewaan/getKecamatan/', 'PersewaanController@getKecamatan');
 Route::get('persewaan/getKecamatan/{id}', 'PersewaanController@getKecamatan');
 Route::get('getKelurahan', 'PersewaanController@getKelurahan');


 Route::get('googlemap', 'MapController@googleAutoAddress');
