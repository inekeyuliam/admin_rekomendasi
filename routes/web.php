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
Route::resource('/modelkendaraan', 'ModelKendaraanController', ['middleware' => 'auth']);
Route::resource('/gambarhotel', 'GambarHotelController', ['middleware' => 'auth']);
Route::resource('/gambarkamar', 'GambarKamarController', ['middleware' => 'auth']);
Route::resource('kamar.gambarkamar', 'GambarKamarController', ['middleware' => 'auth']);
Route::resource('/gambarwisata', 'GambarWisataController', ['middleware' => 'auth']);
Route::resource('wisata.gambarwisata', 'GambarWisataController', ['middleware' => 'auth']);
Route::resource('/gambarsewa', 'GambarPersewaanController', ['middleware' => 'auth']);

Route::get('export/hotel/terverifikasi', 'HotelController@export_terverifikasi');
Route::get('cetak_pdf/hotel/terverifikasi', 'HotelController@cetak_pdf_terverifikasi');
Route::get('export/hotel/permintaan', 'HotelController@export_permintaan');
Route::get('pengajuan/cetak_pdf/hotel/permintaan', 'HotelController@cetak_pdf_permintaan');
Route::get('/pengajuan/hotel', 'HotelController@nonaktif');
Route::get('/bobot/hotel', 'HotelController@bobot');
Route::get('/lihat/hotel', 'HotelController@lihat');
Route::get('/lihatbobot/hotel', 'HotelController@lihatbobot');
Route::get('/lihatkamar/hotel', 'HotelController@kamar');
Route::get('/keubah/hotel/{id}', 'HotelController@keubah');
Route::get('/keubahbobot/hotel', 'HotelController@keubahbobot');
Route::post('/simpan/bobot/hotel', 'HotelController@simpan');
Route::post('/ubah/hotel/{id}', 'HotelController@ubah');
Route::post('/ubahbobot/hotel', 'HotelController@ubahbobot');
Route::get('/alasan/tolak/hotel/{id}', 'HotelController@createalasan');
Route::post('/store/tolak/hotel/{id}', 'HotelController@storealasan');

Route::get('export/persewaan/terverifikasi', 'PersewaanController@export_terverifikasi');
Route::get('cetak_pdf/persewaan/terverifikasi', 'PersewaanController@cetak_pdf_terverifikasi');
Route::get('export/persewaan/permintaan', 'PersewaanController@export_permintaan');
Route::get('pengajuan/cetak_pdf/persewaan/permintaan', 'PersewaanController@cetak_pdf_permintaan');
Route::get('/pengajuan/persewaan', 'PersewaanController@nonaktif');
Route::get('/bobot/persewaan', 'PersewaanController@bobot');
Route::get('/lihat/persewaan', 'PersewaanController@lihat');
Route::get('/lihatbobot/persewaan', 'PersewaanController@lihatbobot');
Route::get('/lihatkendaraan/persewaan', 'PersewaanController@kendaraan');
Route::get('/keubah/persewaan/{id}', 'PersewaanController@keubah');
Route::get('/keubahbobot/persewaan', 'PersewaanController@keubahbobot');
Route::post('/simpan/bobot/persewaan', 'PersewaanController@simpan');
Route::post('/ubah/persewaan/{id}', 'PersewaanController@ubah');
Route::post('/ubahbobot/persewaan', 'PersewaanController@ubahbobot');
Route::get('/alasan/tolak/persewaan/{id}', 'PersewaanController@createalasan');
Route::get('/store/tolak/persewaan/{id}', 'PersewaanController@storealasan');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('detailkriteria/getKriteria/', 'DetailKriteriaController@getKriteria');
Route::get('detailkriteria/getKriteria/{id}', 'DetailKriteriaController@getKriteria');
Route::get('status/hotel/{id}','HotelController@status');
Route::get('status/persewaan/{id}','PersewaanController@status');
Route::get('cekstatus/hotel','HotelController@cekstatus');
Route::post('checkemail', 'PersewaanController@checkemail')->middleware('ajax');

Route::get('export/wisata', 'WisataController@export');
Route::get('cetak_pdf/wisata', 'WisataController@cetak_pdf');
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

//user
Route::get('/index', 'RekomendasiWisataController@index');
Route::get('/about', 'RekomendasiWisataController@aboutme');
Route::get('/rekomendasi/wisata', 'RekomendasiWisataController@form');
Route::get('/gethasil', 'RekomendasiWisataController@ambilhasil')->name('kirimbobot');
Route::get('/detailwisata/{id}', 'RekomendasiWisataController@show');
Route::get('/daftar/wisata', 'RekomendasiWisataController@daftar');
Route::post('/storekriteria', 'RekomendasiWisataController@kriteria');
Route::post('/review/wisata/{id}', 'RekomendasiWisataController@update');
Route::post('/showWisata', 'RekomendasiWisataController@showWisata');
Route::post('/filter/wisata', 'RekomendasiWisataController@filter');
Route::post('/filter/lokasi/wisata', 'RekomendasiWisataController@filterlokasi');
Route::post('/filter/harga/wisata', 'RekomendasiWisataController@hargawisata');
Route::post('/filter/waktu/wisata', 'RekomendasiWisataController@filterwaktu');
Route::get('/livesearch/lokasi/wisata', 'RekomendasiWisataController@action')->name('live_search_wisata.action');

Route::get('/rekomendasi/hotel', 'RekomendasiHotelController@form');
Route::get('/gethasilhotel', 'RekomendasiHotelController@ambilhasil')->name('kirimbobothotel');
Route::get('/detailhotel/{id}', 'RekomendasiHotelController@show');
Route::post('/review/hotel/{id}', 'RekomendasiHotelController@update');
Route::get('/daftar/hotel', 'RekomendasiHotelController@daftar');
Route::post('/storekriteria/hotel', 'RekomendasiHotelController@kriteria');
Route::post('/showHotel', 'RekomendasiHotelController@showHotel');
Route::post('/filter/hotel', 'RekomendasiHotelController@filter');
Route::post('/filter/lokasi/hotel', 'RekomendasiHotelController@filterlokasi');
Route::get('/livesearch/lokasi/hotel', 'RekomendasiHotelController@action')->name('live_search_hotel.action');

Route::get('/rekomendasi/persewaan', 'RekomendasiPersewaanController@form');
Route::get('/gethasilpersewaan', 'RekomendasiPersewaanController@ambilhasil')->name('kirimbobotsewa');
Route::get('/detailpersewaan/{id}', 'RekomendasiPersewaanController@show');
Route::post('/review/persewaan/{id}', 'RekomendasiPersewaanController@update');
Route::get('/daftar/persewaan', 'RekomendasiPersewaanController@daftar');
Route::post('/storekriteria/persewaan', 'RekomendasiPersewaanController@kriteria');
Route::post('/showPersewaan', 'RekomendasiPersewaanController@showPersewaan');
Route::post('/filter/persewaan', 'RekomendasiPersewaanController@filter');
Route::post('/filter/lokasi/persewaan', 'RekomendasiPersewaanController@filterlokasi');
Route::get('/livesearch/lokasi/persewaan', 'RekomendasiPersewaanController@action')->name('live_search.action');

