<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'App\Http\Controllers\ContactsController@index');
Route::get('/{id}', 'App\Http\Controllers\ContactsController@show');
Route::post('/', 'App\Http\Controllers\ContactsController@store');
Route::put('/update/{id}', 'App\Http\Controllers\ContactsController@update');
Route::delete('/destroy/{id}', 'App\Http\Controllers\ContactsController@destroy');
