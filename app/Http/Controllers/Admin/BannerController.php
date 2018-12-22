<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Http\Requests\Admin\BannerFormRequest;

class BannerController extends Controller
{
    private $banner;

    public function __construct(Banner $banner){
        $this->banner = $banner;
    }

    public function index()
    {
        $title = "Banners";
        $banners = $this->banner::paginate(2);
        return view('admin.banners.index', compact('banners','title'));
    }

    public function create()
    {
        $title = "Cadastro de Banner";
        return view('admin.banners.create-update', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerFormRequest $request)
    {
        //pega todo os dados do formulario -> $request->all();
        //pegas os campos especificos -> $request->only(['nome','slug']);
        //pega os campos execeto o que estiver especificado -> $request->except(['_token']);
        //pega um campo especifico -> $request->input('nome')
        //valida os dados
        //$this->validate($request, $this->categoria->rules);
         
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('banners', $nameFile);
            if ( $upload ){
                $dados = $request->except(['_token']);
                $dados['image'] = $nameFile;
                $create = $this->banner::create($dados);
                if($create){
                    $msg = 'Banner cadastrado com sucesso';
                    $request->session()->flash('success', $msg);
                    return redirect()->route('admin.banners', $msg);
                }else{
                    $msg = 'POST: 500 internal server';
                    $request->session()->flash('error', $msg);
                    return redirect()->back();
                }
            }
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
        $banner = $this->banner::find($id);
        $title = "Banner - $banner->id";
        if( empty($banner->id) ) {
            return redirect()->route('admin.banners');
        }
        return view('admin.banners.create-update', compact('banner','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerFormRequest $request, $id)
    {
        //->find() || ->where(coluna,valor)
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('banners', $nameFile);
            if ( $upload ){
                $dados = $request->all();
                $dados['image'] = $nameFile;
                $banner = $this->banner->find($id);
                $update = $banner->update($dados);
                if($update){
                    $msg = 'Categoria alterada com sucesso';
                    $request->session()->flash('success', $msg);
                    return redirect()->route('admin.banners');
                }else{
                    $msg = 'PUT: 500 internal server';
                    $request->session()->flash('error', $msg);
                    return redirect()->back();
                }
            }
        }
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
        $delete = $this->banner->where('id',$id)->delete();
        
        if($delete){
            $msg = 'Banner removido com sucesso';
            $req->session()->flash('success', $msg);
            return redirect()->route('admin.banners');
        }else{
            $msg = 'POST: 500 internal server';
            $req->session()->flash('error', $msg);
            return redirect()->back();
        }
    }
}
