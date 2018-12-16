<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Categoria;
use App\Http\Requests\Admin\CategoriaFormRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $categoria;

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
    }

    public function index()
    {
        $title = "Categorias";
        $categorias = $this->categoria::paginate(4);
        return view('admin.categorias.index', compact('categorias','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastro de categoria";
        return view('admin.categorias.create-update', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {
        //pega todo os dados do formulario -> $request->all();
        //pegas os campos especificos -> $request->only(['nome','slug']);
        //pega os campos execeto o que estiver especificado -> $request->except(['_token']);
        //pega um campo especifico -> $request->input('nome')
        //valida os dados
        //$this->validate($request, $this->categoria->rules);

        $dados = $request->except(['_token']);
        $create = $this->categoria::create($dados);
        if($create){
            $msg = 'Categoria cadastrada com sucesso';
            $request->session()->flash('success', $msg);
            return redirect()->route('admin.categorias', $msg);
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
        $categoria = $this->categoria::find($id);
        $title = "Categoria - $categoria->nome";
        if( empty($categoria->id) ) {
            return redirect()->route('admin.categorias');
        }
        return view('admin.categorias.create-update', compact('categoria','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        //->find() || ->where(coluna,valor)
        $dados = $request->all();
        $categoria = $this->categoria->find($id);
        $update = $categoria->update($dados);
        if($update){
            $msg = 'Categoria alterada com sucesso';
            $request->session()->flash('success', $msg);
            return redirect()->route('admin.categorias');
        }else{
            $msg = 'PUT: 500 internal server';
            $request->session()->flash('error', $msg);
            return redirect()->back();
        }
        //dd($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        //->delete() || destroy(id)
        $delete = $this->categoria->where('id',$id)->delete();
        
        if($delete){
            $msg = 'Categoria removida com sucesso';
            $req->session()->flash('success', $msg);
            return redirect()->route('admin.categorias');
        }else{
            $msg = 'POST: 500 internal server';
            $req->session()->flash('error', $msg);
            return redirect()->back();
        }
    }
}
