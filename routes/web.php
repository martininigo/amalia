<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | This file is where you may define all of the routes that are handled
 * | by your application. Just tell Laravel the URIs it should respond
 * | to using a Closure or controller method. Build something great!
 * |
 */
Route::get ( '/', function () {
	return view ( 'welcome' );
} );

Route::get ( 'insumos', 'InsumosController@index');

Route::get ( 'insumos/create', 'InsumosController@create');

Route::post ('insumos', 'InsumosController@store');

Route::get('/api/v1/insumos/{id?}', 'InsumosRestController@index');

Route::post('/api/v1/insumos', 'InsumosRestController@store');
