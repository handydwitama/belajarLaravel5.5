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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listbarang', 'HomeController@listBarang')->name('user.listbarang');
Route::get('/pembelian', 'HomeController@pembelian')->name('user.pembelian');
Route::post('/pembelian', 'HomeController@ajaxHarga')->name('ajaxharga');
Route::post('/proses_pembelian', 'HomeController@prosesPembelian')->name('proses.pembelian');
Route::get('/history', 'HomeController@historyPembelian')->name('history.pembelian');
Route::get('/printpdf1', 'HomeController@printPdf1')->name('printpdf.user');

Route::prefix('admin')->group(function () {
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
		Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		Route::post('/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
		Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::get('/listuser', 'AdminController@listUser')->name('listuser');
		Route::get('/listbarang', 'AdminController@adminListBarang')->name('admin.listbarang');
		Route::get('/laporan', 'AdminController@laporan')->name('laporan');
		Route::get('/detail_laporan', 'AdminController@detailLaporan')->name('detail.laporan');
		Route::get('/edit_user', 'AdminController@editUser')->name('edit.user');
		Route::post('/edit_user', 'AdminController@editUserPost')->name('edit.user.post');
		Route::post('/remove_user', 'AdminController@removeUser')->name('remove.user');
		Route::post('/restore_user', 'AdminController@restoreUser')->name('restore.user');
		Route::get('/addbarang', 'AdminController@addBarang')->name('add.barang');
		Route::post('/addbarang', 'AdminController@addBarangPost')->name('add.barang.post');
		Route::get('/edit_barang', 'AdminController@editBarang')->name('edit.barang');
		Route::post('/edit_barang', 'AdminController@editBarangPost')->name('edit.barang.post');
		Route::post('/remove_barang', 'AdminController@removeBarang')->name('remove.barang');
		Route::post('/restore_barang', 'AdminController@restoreBarang')->name('restore.barang');
		
});

