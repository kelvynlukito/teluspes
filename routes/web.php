<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.master');
    })->name('dashboard');

    Route::get('/ruangan/index', 'App\Http\Controllers\RuanganController@index')->name('ruangan.index');
    Route::get('/ruangan/create', 'App\Http\Controllers\RuanganController@create')->name('ruangan.create');
    Route::post('/ruangan/store', 'App\Http\Controllers\RuanganController@store')->name('ruangan.store');
    Route::get('/ruangan/edit/{id}', 'App\Http\Controllers\RuanganController@edit')->name('ruangan.edit');
    Route::post('/ruangan/update/{id}', 'App\Http\Controllers\RuanganController@update')->name('ruangan.update');
    Route::delete('/ruangan/delete/{id}', 'App\Http\Controllers\RuanganController@destroy')->name('ruangan.delete');

    Route::get('/reservasi/index', 'App\Http\Controllers\ReservasiController@index')->name('reservasi.index');
    Route::put('/reservasi/update/{id}/', 'App\Http\Controllers\ReservasiController@updateStatus')->name('reservasi.update');
    Route::delete('/reservasi/delete/{id}', 'App\Http\Controllers\ReservasiController@destroy')->name('reservasi.delete');

    //Gedung
    Route::get('/gedung/index', 'App\Http\Controllers\GedungController@index')->name('gedung.index');
    Route::get('/gedung/create', 'App\Http\Controllers\GedungController@create')->name('gedung.create');
    Route::post('/gedung/store', 'App\Http\Controllers\GedungController@store')->name('gedung.store');
    Route::get('/gedung/edit/{id}', 'App\Http\Controllers\GedungController@edit')->name('gedung.edit');
    Route::post('/gedung/update/{id}', 'App\Http\Controllers\GedungController@update')->name('gedung.update');
    Route::delete('/gedung/delete/{id}', 'App\Http\Controllers\GedungController@destroy')->name('gedung.delete');

    //user
    Route::get('/user/index', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::post('/user/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.delete');
});
