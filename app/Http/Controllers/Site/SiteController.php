<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //only -> serve para validar quais metodos devem ser autentificados
    //except -> serve para validar quais metodos não devem ser autentificados
    public function __construct()
    {
        $this->middleware('auth')
            ->only([]);
        $this->middleware('auth')
            ->except([
                'index',
                'sobre',
                'contato',
                'carrinho',
                'produtos',
                'showProduto',
                'finalizaCompra',
            ]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home');
    }

    public function produtos(){
        return view('site.produtos');
    }

    public function showProduto($produto=null){
        $categoria =  'Canivete';
        $valor = '110,00';
        return view('site.showProduto', compact('produto','categoria','valor'));
    }

    public function categoria($idcategoria = null)
    {
        return "Categoria $idcategoria";
    }

    public function sobre()
    {
        return View('site.sobre');
    }

    public function contato()
    {
        return View('site.contato');
    }

    public function carrinho ()
    {
        return view('site.carrinho');
    }

    public function finalizaCompra()
    {
        return View('site.finalizaCompra');
    }
}
