<?php

use Illuminate\Support\Facades\Auth;
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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login-post', 'AuthController@postLogin')->name('login.post');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/listbuku', 'ListbukuController@index')->name('listbuku');
    Route::post('/listbuku/favorite', 'ListbukuController@favorite')->name('listbuku.favorite');

    //koleksibuku
    Route::get('/koleksibuku', 'KoleksipribadiController@index')->name('koleksibuku.index');
    Route::delete('/koleksibuku/{id}', 'KoleksipribadiController@destroy')->name('koleksibuku.destroy');

    //peminjaman
    Route::get('/peminjaman/{id}', 'PeminjamanController@index')->name('peminjaman.index');
    Route::post('/peminjaman', 'PeminjamanController@pinjamBuku')->name('peminjaman.pinjamBuku');

    //ulasan
    Route::get('/ulasan', 'UlasanbukuController@index')->name('ulasan.index');
    Route::get('/ulasan/{id}', 'UlasanbukuController@create')->name('ulasan.create');
    Route::post('/ulasan', 'UlasanbukuController@store')->name('ulasan.store');
    Route::get('/ulasan/{id}/show', 'UlasanbukuController@show')->name('ulasan.show');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //KatgeoriBuku
    Route::get('/kategoribuku', 'KategoribukuController@index')->name('kategoribuku.index');
    Route::get('/kategoribuku/create', 'KategoribukuController@create')->name('kategoribuku.create');
    Route::post('/kategoribuku', 'KategoribukuController@store')->name('kategoribuku.store');
    Route::get('/kategoribuku/{id}/edit', 'KategoribukuController@edit')->name('kategoribuku.edit');
    Route::put('/kategoribuku/{id}', 'KategoribukuController@update')->name('kategoribuku.update');
    Route::delete('/kategoribuku/{id}', 'KategoribukuController@destroy')->name('kategoribuku.destroy');

    //Buku
    Route::get('/buku', 'BukuController@index')->name('buku.index');
    Route::get('/buku/create', 'BukuController@create')->name('buku.create');
    Route::post('/buku', 'BukuController@store')->name('buku.store');
    Route::get('/buku/{id}/edit', 'BukuController@edit')->name('buku.edit');
    Route::get('/get-buku/{id}', 'BukuController@show')->name('buku.show');
    Route::put('/buku/{id}', 'BukuController@update')->name('buku.update');
    Route::delete('/buku/{id}', 'BukuController@destroy')->name('buku.destroy');

    //User
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user', 'UserController@store')->name('user.store');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'UserController@update')->name('user.update');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');

    //peminjaman
    Route::get('/riwayatpeminjaman', 'PeminjamanController@riwayatPeminjaman')->name('peminjaman.riwayatPeminjaman');
    Route::get('/riwayatpengembalian', 'PeminjamanController@riwayatPengembalian')->name('peminjaman.riwayatPengembalian');
    Route::post('/kembalikanbuku', 'PeminjamanController@kembalikanBuku')->name('peminjaman.kembalikanBuku');
});