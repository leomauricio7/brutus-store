<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Categoria;

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
        $categorias = $this->categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pega todo os dados do formulario -> $request->all();
        //pegas os campos especificos -> $request->only(['nome','slug']);
        //pega os campos execeto o que estiver especificado -> $request->except(['_token']);
        //pega um campo especifico -> $request->input('nome')
        $dados = $request->except(['_token']);
        
        $create = $this->categoria::create($dados);
        if($create){
            return redirect()->route('admin.categorias');
        }else{
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //->find() || ->where(coluna,valor)
        $categoria = $this->categoria->find($id);
        $update = $categoria->update([
            'nome'=>'',
            'icon'=>'',
            'slug'=>''
        ]);
        if($update){
            return;
        }else{
            return;
        }
        //dd($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = $this->categoria::all();
        //->delete() || destroy(id)
        $delete = $this->categoria->where('id',$id)->delete();
        
        if($delete){
            return redirect()->route('admin.categorias');
        }else{
            return redirect()->back();
        }
    }
}
