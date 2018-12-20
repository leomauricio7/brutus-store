<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cupon;
use App\Http\Requests\Admin\CuponFormrequest;

class CupomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $cupon;

    public function __construct(Cupon $cupon){
        $this->cupon = $cupon;
    }

    public function index()
    {
        $title = "Cupons";
        $cupons = $this->cupon::paginate(2);
        return view('admin.cupons.index', compact('cupons','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Novo Cupon";
        $modo_desconto = [
                'valor'=> 'Valor',
                'porc' =>'Porcentagem',
            ];
        $modo_limite= [
            'valor'=> 'Valor',
            'qtd' =>'Quantidade',
        ];
        $status = [
            'S'=> 'Sim',
            'N' =>'Não',
        ];
        return view('admin.cupons.create-update',compact('title','modo_desconto','modo_limite','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuponFormrequest $request)
    {
        $dados = $request->except(['_token']);
        $create = $this->cupon::create($dados);
        if($create){
            $msg = 'Cupon cadastrado com sucesso';
            $request->session()->flash('success', $msg);
            return redirect()->route('admin.cupons', $msg);
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
        $modo_desconto = [
                'valor'=> 'Valor',
                'porc' =>'Porcentagem',
            ];
        $modo_limite= [
            'valor'=> 'Valor',
            'qtd' =>'Quantidade',
        ];
        $status = [
            'S'=> 'Sim',
            'N' =>'Não',
        ];
        $cupon = $this->cupon::find($id);
        $title = "Cupon - $cupon->localizador";
        if( empty($cupon->id) ) {
            return redirect()->route('admin.cupons');
        }
        return view('admin.cupons.create-update', compact('cupon','title','modo_desconto','modo_limite','status'));
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
        $dados = $request->all();
        $cupon = $this->cupon->find($id);
        $update = $cupon->update($dados);
        if($update){
            $msg = 'Cupon alterado com sucesso';
            $request->session()->flash('success', $msg);
            return redirect()->route('admin.cupons');
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
    public function destroy(Request $req, $id)
    {
        $delete = $this->cupon->where('id',$id)->delete();
        
        if($delete){
            $msg = 'Cupon removido com sucesso';
            $req->session()->flash('success', $msg);
            return redirect()->route('admin.cupons');
        }else{
            $msg = 'POST: 500 internal server';
            $req->session()->flash('error', $msg);
            return redirect()->back();
        }
    }
}
