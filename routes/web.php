<?php

use Illuminate\Support\Facades\Route;

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
//Front
Route::get('/', 'FrontController@index')->name('front');
//Front Buku
Route::get('front/buku', 'FrontController@buku')->name('front_buku');
//front baca buku
Route::get('/front/buku/single/{buku_slug}', 'FrontController@bukusingle')->name('buku_sungle');

Route::group(['middleware' => 'auth'], function() {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('master-data/kategori', 'MasterData\KategoriController');
    Route::resource('master-data/pengarang', 'MasterData\PengarangController');
    Route::resource('master-data/penerbit', 'MasterData\PenerbitController');
    Route::resource('master-data/role', 'MasterData\RoleController');
    Route::resource('master-data/user', 'UserController');
    Route::resource('master-data/otonom', 'MasterData\OtonomController');

    Route::resource('buku', 'BukuController');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return redirect('dashboard');
});

Route::get('/password/reset', function() {
    return redirect('dashboard');
});

Route::get('/register', function() {
    return redirect('dashboard');
});