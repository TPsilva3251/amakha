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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'loja',
    'middleware'=> 'auth',
    'namespace' => 'V1',
], function () {
    Route::get('produtos/{id?}', 'ProdutoController@listaProdutos')->name('produtos');
    Route::get('produto', 'ProdutoController@listaProduto')->name('produto');
    //Criando ROTA para o controller ProdutoController
    Route::get('produto/lista', 'ProdutoController@index')->name('produto.lista');
    Route::post('produto/store', 'ProdutoController@store')->name('produto.store');

    Route::get('cupom/desconto/listar', 'CupomDescontoController@index')->name('cupom.desconto.listar');
    Route::post('cupom/desconto/store', 'CupomDescontoController@store')->name('cupom.desconto.store');

    //Criando as ROTAS para o carrinho de compras
    Route::get('carrinho/index', 'CarrinhoController@index')->name('carrinho.index');

    Route::get('carrinho/show/{value}/{id?}', 'CarrinhoController@show')->name('carrinho.show');
    Route::get('carrinho/shown/{value}', 'CarrinhoController@shown')->name('car.show');
    Route::post('carrinho/store', 'CarrinhoController@store')->name('carrinho.store');

    Route::delete('carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
    Route::post('carrinho/produto/adicionar', 'CarrinhoController@addProduto')->name('carrinho.produto.adicionar');

    Route::post('concluir/compras', 'CarrinhoController@concluir')->name('concluir.compras');
    Route::get('compras', 'CarrinhoController@compras')->name('compras');

    //Criando as Rotas para o Cliente
    Route::get('/cliente', 'ClienteController@index')->name('cliente.index');
    Route::post('/clientestore', 'ClienteController@store')->name('cliente.store');
    Route::get('/clientecart/{id}', 'ClienteController@cart')->name('cliente.cart');
});
