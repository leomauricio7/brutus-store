<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Categoria;
use App\Models\Admin\Produto;
use App\Models\Admin\Pedido;


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
            ->only(
                [
                'finalizaCompra'
                ]);
        $this->middleware('auth')
            ->except([
                'index',
                'sobre',
                'contato',
                'produtos',
                'showProduto',
                'categoria',  
            ]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $produtos = Produto::paginate(8);
        $title = 'Home';  
        return view('site.home', compact('produtos','categorias','title'));
    }

    public function produtos(){
        $title = "Produtos";
        $produtos = Produto::paginate(6);
        $categorias = Categoria::all();
        return view('site.produtos', compact('categorias','produtos','title'));
    }

    public function showProduto($slug){
        $produto = Produto::where('slug', $slug)->get();
        $categorias = Categoria::all();
        $categoriasProd = Categoria::where('id', $produto[0]->categoria_id)->get();
        $categoria = $categoriasProd[0]->nome;
        $title = $produto[0]->nome;
        $produtosRelacionados = Produto::where('categoria_id', $produto[0]->categoria_id)->paginate(4);
        return view('site.showProduto', compact('produto','categoria','categorias','title','produtosRelacionados'));
    }

    public function categoria($categoria)
    {
        $categorias = Categoria::all();
        $categoriasEnviada = Categoria::where('slug', $categoria)->get();
        $produtos = Produto::where('categoria_id', $categoriasEnviada[0]->id)->paginate(6);
        $title = $categoriasEnviada[0]->nome;
        return view('site.produtos', compact('categorias','produtos','title'));
    }

    public function sobre()
    {
        $title = 'Sobre';
        $categorias = Categoria::all();
        return View('site.sobre',compact('categorias','title'));
    }

    public function contato()
    {
        $title = 'Contato';
        $categorias = Categoria::all();
        return View('site.contato',compact('categorias','title'));
    }
}
