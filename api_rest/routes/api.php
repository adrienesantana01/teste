<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->name('api.')->group(function(){
	Route::prefix('musica')->group(function(){
		Route::get('/', 'MusicaController@index')->name('index_Musica');
		Route::get('/{id}', 'MusicaController@show')->name('single_Musica');
		Route::post('/', 'MusicaController@store')->name('store_Musica');
		Route::put('/{id}', 'MusicaController@update')->name('update_Musica');
		Route::delete('/{id}', 'MusicaController@delete')->name('delete_Musica');
		Route::delete('/', 'MusicaController@drop')->name('delete_All_Musica');
	});

	Route::prefix('video')->group(function(){
		Route::get('/', 'VideoController@index')->name('index_Video');
		Route::get('/{id}', 'VideoController@show')->name('single_Video');
		Route::post('/', 'VideoController@store')->name('store_Video');
		Route::put('/{id}', 'VideoController@update')->name('update_Video');
		Route::delete('/{id}', 'VideoController@delete')->name('delete_Video');
	});
});
