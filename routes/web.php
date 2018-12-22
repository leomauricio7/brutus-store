<?php

Auth::routes();

Route::group(['namespace' => 'Site'], function(){
    Route::get('/home', 'SiteController@index')->name('home');
    Route::get('/produtos', 'SiteController@produtos')->name('produtos');
    Route::get('/produto/{slug}', 'SiteController@showProduto')->name('show.produto');
    Route::get('/produtos/categoria/{categoria?}', 'SiteController@categoria')->name('produtos.categoria');
    Route::get('/sobre', 'SiteController@sobre')->name('sobre');
    Route::get('/contato', 'SiteController@contato')->name('contato');

    //carrinho de compras
    Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho');
    Route::get('/carrinho/adicionar', function(){
        return redirect()->route('home');
    });
    Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
    Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
    //rota de finalizar compra
    Route::post('/finaliza-compra', 'CarrinhoController@finalizaCompra')->name('finaliza.compra');
    Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
    Route::get('/', function(){return redirect()->route('home');});
});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'auth'], function(){
    //home
    Route::get('/', 'AdminController@index')->name('admin.home');
    //banners
    Route::get('/banners', 'BannerController@index')->name('admin.banners');
    Route::get('/banners/create', 'BannerController@create')->name('admin.banners.create');
    Route::post('/banners/create', 'BannerController@store')->name('admin.banners.store');
    Route::get('/banners/{id}/edit', 'BannerController@edit')->name('admin.banners.edit');
    Route::put('/banners/update/{id}', 'BannerController@update')->name('admin.banners.update');
    Route::get('/banners/delete/{id}', 'BannerController@destroy')->name('admin.banners.destroy');
    //produtos
    Route::get('/produtos', 'ProdutoController@index')->name('admin.produtos');
    Route::get('/produtos/create', 'ProdutoController@create')->name('admin.produtos.create');
    Route::post('/produtos/create', 'ProdutoController@store')->name('admin.produtos.store');
    Route::get('/produtos/{id}/edit', 'ProdutoController@edit')->name('admin.produtos.edit');
    Route::put('/produtos/update/{id}', 'ProdutoController@update')->name('admin.produtos.update');
    Route::get('/produtos/delete/{id}', 'ProdutoController@destroy')->name('admin.produtos.destroy');
    //pedidos
    Route::get('/pedidos', 'PedidoController@index')->name('admin.pedidos');
    //categorias
    Route::get('/categorias', 'CategoriaController@index')->name('admin.categorias');
    Route::get('/categorias/create', 'CategoriaController@create')->name('admin.categorias.create');
    Route::post('/categorias/create', 'CategoriaController@store')->name('admin.categorias.store');
    Route::get('/categorias/delete/{id}', 'CategoriaController@destroy')->name('admin.categorias.destroy');
    Route::get('/categorias/{id}/edit', 'CategoriaController@edit')->name('admin.categorias.edit');
    Route::put('/categorias/update/{id}', 'CategoriaController@update')->name('admin.categorias.update');
    //cupons
    Route::get('/cupons', 'CupomController@index')->name('admin.cupons');
    Route::get('/cupons/create', 'CupomController@create')->name('admin.cupons.create');
    Route::post('/cupons/create', 'CupomController@store')->name('admin.cupons.store');
    Route::get('/cupons/{id}/edit', 'CupomController@edit')->name('admin.cupons.edit');
    Route::put('/cupons/update/{id}', 'CupomController@update')->name('admin.cupons.update');
    Route::get('/cupons/delete/{id}', 'CupomController@destroy')->name('admin.cupons.destroy');
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
