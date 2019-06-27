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

Route::any("/",             ['as' => '/',         'uses' => "CarrosController@index_site"]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix'=>'marcas', 'where'=>['id'=>'[0-9]+']], function() {
	    Route::any("",             ['as' => 'marcas',         'uses' => "MarcasController@index"]);
	    Route::get("create",       ['as' => 'marcas.create',  'uses' => "MarcasController@create"]);
	    Route::get("{id}/destroy", ['as' => 'marcas.destroy', 'uses' => "MarcasController@destroy"]);
	    Route::get("{id}/edit",    ['as' => 'marcas.edit',    'uses' => "MarcasController@edit"]);
	    Route::put("{id}/update",  ['as' => 'marcas.update',  'uses' => "MarcasController@update"]);
	    Route::post("store",       ['as' => 'marcas.store',   'uses' => "MarcasController@store"]);
	});

	Route::group(['prefix'=>'carros', 'where'=>['id'=>'[0-9]+']], function() {
		Route::any("",             ['as' => 'carros',         'uses' => "CarrosController@index"]);
		Route::get("relatorio",    ['as' => 'carros.relatorio','uses' => "CarrosController@geraPdf"]);
	    Route::get("create",       ['as' => 'carros.create',  'uses' => "CarrosController@create"]);
	    Route::get("{id}/destroy", ['as' => 'carros.destroy', 'uses' => "CarrosController@destroy"]);
	    Route::get("{id}/edit",    ['as' => 'carros.edit',    'uses' => "CarrosController@edit"]);
	    Route::put("{id}/update",  ['as' => 'carros.update',  'uses' => "CarrosController@update"]);
	    Route::post("store",       ['as' => 'carros.store',   'uses' => "CarrosController@store"]);
	});
	
	Route::group(['prefix'=>'vendedores', 'where'=>['id'=>'[0-9]+']], function() {
	    Route::any("",             ['as' => 'vendedores',         'uses' => "VendedoresController@index"]);
	    Route::get("create",       ['as' => 'vendedores.create',  'uses' => "VendedoresController@create"]);
	    Route::get("{id}/destroy", ['as' => 'vendedores.destroy', 'uses' => "VendedoresController@destroy"]);
	    Route::get("{id}/edit",    ['as' => 'vendedores.edit',    'uses' => "VendedoresController@edit"]);
	    Route::put("{id}/update",  ['as' => 'vendedores.update',  'uses' => "VendedoresController@update"]);
	    Route::post("store",       ['as' => 'vendedores.store',   'uses' => "VendedoresController@store"]);
	});

	Route::group(['prefix'=>'clientes', 'where'=>['id'=>'[0-9]+']], function() {
	    Route::any("",             ['as' => 'clientes',         'uses' => "ClientesController@index"]);
	    Route::get("create",       ['as' => 'clientes.create',  'uses' => "ClientesController@create"]);
	    Route::get("{id}/destroy", ['as' => 'clientes.destroy', 'uses' => "ClientesController@destroy"]);
	    Route::get("{id}/edit",    ['as' => 'clientes.edit',    'uses' => "ClientesController@edit"]);
	    Route::put("{id}/update",  ['as' => 'clientes.update',  'uses' => "ClientesController@update"]);
	    Route::post("store",       ['as' => 'clientes.store',   'uses' => "ClientesController@store"]);
	});

	Route::group(['prefix'=>'pedidos', 'where'=>['id'=>'[0-9]+']], function() {
		Route::get("",             ['as' => 'pedidos',          'uses' => "PedidosController@index"]);
		Route::get("relatorio",    ['as' => 'pedidos.relatorio','uses' => "PedidosController@geraPdf"]);
	    Route::get("create",       ['as' => 'pedidos.create',   'uses' => "PedidosController@create"]);
	    Route::get("{id}/destroy", ['as' => 'pedidos.destroy',  'uses' => "PedidosController@destroy"]);
	    Route::get("{id}/edit",    ['as' => 'pedidos.edit',     'uses' => "PedidosController@edit"]);
	    Route::put("{id}/update",  ['as' => 'pedidos.update',   'uses' => "PedidosController@update"]);
		Route::post("store",       ['as' => 'pedidos.store',    'uses' => "PedidosController@store"]);
		
		Route::get('createmaster', ['as'=>'pedidos.createmaster', 'uses'=>'PedidosController@createmaster']);
		Route::post('masterdetail', ['as'=>'pedidos.masterdetail', 'uses'=>'PedidosController@masterdetail']);
	});
});
