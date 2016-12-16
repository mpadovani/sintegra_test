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


Route::get('/', function () {
    return view('welcome');
});


Route::get('listar-sintegra', 'Sintegra\SintegraController@loadSintegra');
Route::get('atualizarTabelaSintegra', 'Sintegra\SintegraController@loadTableSintegra');


/* ROUTES API */

Route::post('api/sintegra', 'Api\SintegraApiController@postSintegraCNPJ');
Route::delete('api/delete-sintegra/{id}', 'Api\SintegraApiController@deleteSintegra');
/* FIM */