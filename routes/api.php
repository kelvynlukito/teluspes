<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get from gedung api
Route::get('/gedung', 'App\Http\Controllers\API\TestController@indexGedung');
Route::post('/postGedung', 'App\Http\Controllers\API\TestController@storeGedung');

//get from ruangan api
Route::get('/ruangan', 'App\Http\Controllers\API\TestController@indexRuangan');
Route::post('/postRuangan', 'App\Http\Controllers\API\TestController@storeRuangan');

//get from user api
Route::get('/user', 'App\Http\Controllers\API\TestController@indexUser');
Route::post('/postUser', 'App\Http\Controllers\API\TestController@storeUser');
