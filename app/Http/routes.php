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

Route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

Route::get('/clientes', ['as' => 'site.clientes', 'uses' => 'Site\ClienteController@index']);
Route::get('/cliente/adicionar', ['as' => 'site.cliente.adicionar', 'uses' => 'Site\ClienteController@adicionar']);
Route::post('/cliente/salvar', ['as' => 'site.cliente.salvar', 'uses' => 'Site\ClienteController@salvar']);
Route::get('/cliente/editar/{id}', ['as' => 'site.cliente.editar', 'uses' => 'Site\ClienteController@editar']);
Route::put('/cliente/atualizar/{id}', ['as' => 'site.cliente.atualizar', 'uses' => 'Site\ClienteController@atualizar']);
Route::get('/cliente/excluir/{id}', ['as' => 'site.cliente.excluir', 'uses' => 'Site\ClienteController@excluir']);

Route::get('/produtos', ['as' => 'site.produtos', 'uses' => 'Site\ProdutoController@index']);
Route::get('/produto/adicionar', ['as' => 'site.produto.adicionar', 'uses' => 'Site\ProdutoController@adicionar']);
Route::post('/produto/salvar', ['as' => 'site.produto.salvar', 'uses' => 'Site\ProdutoController@salvar']);
Route::get('/produto/editar/{id}', ['as' => 'site.produto.editar', 'uses' => 'Site\ProdutoController@editar']);
Route::put('/produto/atualizar/{id}', ['as' => 'site.produto.atualizar', 'uses' => 'Site\ProdutoController@atualizar']);
Route::get('/produto/excluir/{id}', ['as' => 'site.produto.excluir', 'uses' => 'Site\ProdutoController@excluir']);
Route::get('/ajax/produto/{id}', ['as' => 'site.produto.ajax', 'uses' => 'Site\ProdutoController@ajaxProduto']);

Route::get('/produto/{id}/{titulo?}', ['as' => 'site.produto.detalhe','uses'=>'Site\ProdutoController@detalheProduto']);


Route::get('/pedidos', ['as' => 'site.pedidos', 'uses' => 'Site\PedidoController@index']);
Route::get('/pedido/adicionar', ['as' => 'site.pedido.adicionar', 'uses' => 'Site\PedidoController@adicionar']);
Route::post('/pedido/salvar', ['as' => 'site.pedido.salvar', 'uses' => 'Site\PedidoController@salvar']);
Route::get('/pedido/editar/{id}', ['as' => 'site.pedido.editar', 'uses' => 'Site\PedidoController@editar']);
Route::put('/pedido/atualizar/{id}', ['as' => 'site.pedido.atualizar', 'uses' => 'Site\PedidoController@atualizar']);
Route::get('/pedido/excluir/{id}', ['as' => 'site.pedido.excluir', 'uses' => 'Site\PedidoController@excluir']);


Route::get('/galerias/{id}', ['as' => 'site.galerias', 'uses' => 'Site\GaleriaController@index']);
Route::get('/galerias/adicionar/{id}', ['as' => 'site.galerias.adicionar', 'uses' => 'Site\GaleriaController@adicionar']);
Route::post('/galerias/salvar/{id}', ['as' => 'site.galerias.salvar', 'uses' => 'Site\GaleriaController@salvar']);
Route::get('/galerias/editar/{id}', ['as' => 'site.galerias.editar', 'uses' => 'Site\GaleriaController@editar']);
Route::put('/galerias/atualizar/{id}', ['as' => 'site.galerias.atualizar', 'uses' => 'Site\GaleriaController@atualizar']);
Route::get('/galerias/excluir/{id}', ['as' => 'site.galerias.excluir', 'uses' => 'Site\GaleriaController@excluir']);


