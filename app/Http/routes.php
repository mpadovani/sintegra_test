<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group([ 'middleware' => [ 'auth'] ] , function() {
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('listar-sintegra', 'Sintegra\SintegraController@loadSintegra');
	Route::get('atualizarTabelaSintegra', 'Sintegra\SintegraController@loadTableSintegra');
});

/* ROUTES API */

Route::group([ 'middleware' => [ 'auth:api'] ] , function() {
	Route::post('api/sintegra', 'Api\SintegraApiController@postSintegraCNPJ');
	Route::delete('api/delete-sintegra/{id}', 'Api\SintegraApiController@deleteSintegra');
});
/* FIM */

/* LOGIN E REGISTRO */

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('registrar', 'Auth\AuthController@getRegister');
Route::post('registrar', 'Auth\AuthController@postRegister');