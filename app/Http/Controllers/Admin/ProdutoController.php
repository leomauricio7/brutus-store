<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Produto;
use App\Models\Admin\Categoria;
use App\Http\Requests\Admin\ProdutoFormrequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $produto;

    public function __construct(Produto $produto){
        $this->produto = $produto;
    } 

    public function index()
    {
        $title = 'Produtos';
        $produtos = $this->produto->paginate(4);
        return view('admin.produtos.index', compact('produtos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Novo Produto";
        $categorias = Categoria::select('id','nome')->get();
        $ativo = [
            'S'=>'Sim',
            'N'=>'Não'
        ];
        $tamanho = [
            'ND'=>'Não Definido',
            'P'=>'P',
            'M'=>'M',
            'G'=>'G',
            'GG'=>'GG'
        ];
        return view('admin.produtos.create-update', compact('categorias', 'ativo','title','tamanho'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoFormrequest $request)
    {
        $dados = $request->except(['_token']);

        $create = $this->produto::create($dados);
        if($create){
            $msg = 'Produto cadastrado com sucesso';
            $request->session()->flash('success', $msg);
            return redirect()->route('admin.produtos', $msg);
        }else{
            $msg = 'POST: 500 internal server';
            $request->session()->flash('error', $msg);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto::find($id);
        $title = "Produto - $produto->nome";
        if( empty($cupon->id) ) {
            return redirect()->route('admin.produtos');
        }
        $categorias =  Categoria::all();
        $ativo = ['S'=>'Sim','N'=>'Não'];
        $tamanho = ['P'=>'P','M'=>'M','G'=>'G','GG'=>'GG'];
        return view('admin.produtos.create-update', compact('produto', 'categorias', 'ativo','title','tamanho'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoFormrequest $request, $id)
    {
        $dados = $request->all();
        $produto = $this->produto->find($id);
        $update = $produto->update($dados);
        if($update){
            $msg = 'Produto alterado com sucesso';
            $request->session()->flash('success', $msg);
            return redirect()->route('admin.produtos');
        }else{
            $msg = 'PUT: 500 internal server';
            $request->session()->flash('error', $msg);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $req, $id)
    {
        $delete = $this->produto->where('id',$id)->delete();
        
        if($delete){
            $msg = 'Produto removido com sucesso';
            $req->session()->flash('success', $msg);
            return redirect()->route('admin.produtos');
        }else{
            $msg = 'POST: 500 internal server';
            $req->session()->flash('error', $msg);
            return redirect()->back();
        }
    }
}
