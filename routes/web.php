<?php

Auth::routes();

Route::group(['namespace' => 'Site'], function(){
    Route::get('/home', 'SiteController@index')->name('home');
    Route::get('/produtos', 'SiteController@produtos')->name('produtos');
    Route::get('/produto/{nameProduto?}', 'SiteController@showProduto')->name('show.produto');
    Route::get('/sobre', 'SiteController@sobre')->name('sobre');
    Route::get('/contato', 'SiteController@contato')->name('contato');
    Route::get('/carrinho', 'SiteController@carrinho')->name('carrinho');
    Route::get('/finaliza-compra', 'SiteController@finalizaCompra')->name('finaliza.compra');
    Route::get('/categoria/{idCategoria?}', 'SiteController@categoria')->name('categoria');
    Route::get('/', function(){return redirect()->route('home');});
});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'auth'], function(){
    //home
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
    //produtos
    Route::get('/produtos', 'ProdutoController@index')->name('admin.produtos');
    Route::get('/produtos/create', 'ProdutoController@create')->name('admin.produtos.create');
    //pedidos
    Route::get('/pedidos', 'PedidoController@index')->name('admin.pedidos');
    //categorias
    Route::get('/categorias', 'CategoriaController@index')->name('admin.categorias');
    Route::get('/categorias/create', 'CategoriaController@create')->name('admin.categorias.create');
    Route::post('/categorias/create', 'CategoriaController@store')->name('admin.categorias.store');
    Route::get('/categorias/delete/{id}', 'CategoriaController@destroy')->name('admin.categorias.destroy');
    //cupons
    Route::get('/cupons', 'CupomController@index')->name('admin.cupons');
    Route::get('/cupons/create', 'CupomController@create')->name('admin.cupons.create');
});

/************** EXEMPLOS DE UTILIZAÇÃO DE ROTAS ************************/
/*
*
*
*
Route::group([], function(){

    //rota com parametros
    Route::get('/categoria/{id_categoria?}', function($id_categoria='all'){
        return "Categoria $id_categoria ";
    })->name('categoria');

    Route::get('/sobre', function () {
        return view('site.sobre');
    })->name('sobre');

    Route::get('/contato', function () {
        return view('site.contato');
    })->name('contato');

    Route::get('/login', function () {
        return view('site.login');
    })->name('login');

    //rota default
    Route::get('/', function(){
        return redirect()->route('home');
    });

});

//grupo de rotas do dashboard
Route::group(['prefix' => 'admin/', 'middleware' => 'auth'], function(){

    Route::get('dashboard', function () {
        return view('admin.home');
    });

});

************************************************************************************/
