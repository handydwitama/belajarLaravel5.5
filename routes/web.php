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
Route::post('/pembelian', 'HomeController@ajaxHarga')->name('ajaxharga');;
Route::post('/proses_pembelian', 'HomeController@prosesPembelian')->name('proses.pembelian');
Route::get('/history', 'HomeController@historyPembelian')->name('history.pembelian');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::post('/admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


