<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin\Categoria;
use App\Models\Admin\Produto;
use App\Models\Admin\Pedido;
use App\Models\Admin\PedidoProduto;

class CarrinhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $title = "Carrinho";
        $categorias = Categoria::all();
        $produtos = Produto::all();
        $pedidos = Pedido::where([
            'status'  => 'RE',
            'user_id' => Auth::id()
            ])->get();
        return view('site.carrinho',compact('categorias','produtos','title','pedidos'));
    }

    public function adicionar()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduto = $req->input('id');

        $produto = Produto::find($idproduto);
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->route('carrinho');
        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
            ]);

        if( empty($idpedido) ) {
            $pedido_novo = Pedido::create([
                'user_id' => $idusuario,
                'status'  => 'RE'
                ]);

            $idpedido = $pedido_novo->id;

        }

        PedidoProduto::create([
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto,
            'valor'      => $produto->valor,
            'status'     => 'RE'
            ]);

        $req->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('carrinho');

    }

    public function remover()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('pedido_id');
        $idproduto          = $req->input('produto_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
            ]);

        if( empty($idpedido) ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
            return redirect()->route('carrinho');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
            ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
                ])->delete();
        }

        $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('carrinho');
    }

    public function finalizaCompra()
    {
        $title = 'Finaliza Compra';

        $categorias = Categoria::all();

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido = $req->input('pedido_id');
        $valor = $req->input('valor_total');
        $idusuario = Auth::id();

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho');
        }

        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->exists();
        if(!$check_produtos) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho');
        }

        PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->update([
                'status' => 'AP'
            ]);
        Pedido::where([
                'id' => $idpedido
            ])->update([
                'status' => 'AP',
                'valor_pedido'=> $valor,
            ]);
        
        $req->session()->flash('mensagem-sucesso', 'Pedido finalizado com sucesso!');

        return redirect()->route('carrinho.compras');
    }

    public function compras()
    {
        $categorias = Categoria::all();
        $compras = Pedido::where([
            'status'  => 'AP',
            'user_id' => Auth::id()
            ])->orderBy('created_at', 'desc')->get();

        $cancelados = Pedido::where([
            'status'  => 'CA',
            'user_id' => Auth::id()
            ])->orderBy('updated_at', 'desc')->get();

        return view('site.finalizaCompra', compact('compras', 'cancelados', 'categorias'));

    }
    
    public function calculaFrete(Request $req){
        $cepOrigem = '59570000';
        $cepDestino = $req->input('cep');
        $valor = $req->input('valor');
        $tipoFrete = $req->input('tipo_frete');
        $idpedido = $req->input('pedido_id');

        Pedido::where([
            'id' => $idpedido
        ])->update([
            'id_frete'=> $tipoFrete,
        ]);

        $data = [
            'nCdEmpresa'=> '',
            'sDsSenha'=> '',
            'nCdServico'=> $tipoFrete,
            'sCepOrigem'=> $cepOrigem,
            'sCepDestino'=> $cepDestino,
            'nVlPeso'=> '1',
            'nCdFormato'=> '1',
            'nVlComprimento'=> '16',
            'nVlAltura'=> '5',
            'nVlLargura'=> '15',
            'nVlDiametro'=> '0',
            'sCdMaoPropria'=> 's',
            'nVlValorDeclarado'=> $valor,
            'sCdAvisoRecebimento' => 'n',
            'StrRetorno' => 'xml',
        ];

        $data = http_build_query($data);

        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

        $curl = curl_init($url . '?' . $data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        $result = simplexml_load_string($result);
        $frete = $result->cServico;

        $categorias = Categoria::all();
        $produtos = Produto::all();
        $pedidos = Pedido::where([
            'status'  => 'RE',
            'user_id' => Auth::id()
            ])->get();

        return view('site.carrinho',compact('categorias','produtos','pedidos','frete'));
    }  

    public function pagSeguro(Request $req){

        $Data = [
            "email"=>"brutusbrasil@outlook.com",
            "token"=>"D6D57BC4E25E4D4687D24BFFEE7B2CC9",//PROD->D304B3144BC74FDC9B9069C72DA33E52
            "currency"=>"BRL",
            "itemId1"=>"1",
            "itemDescription1"=>"Loja BrutusStore",
            "itemAmount1"=>$req->input('valor'),
            "itemQuantity1"=>"1",
            "itemWeight1"=>"1000",
            "reference"=>"83783783737",
            "senderName"=>'Loja Brutus Store',
            "senderAreaCode"=>"84",
            "senderPhone"=>$req->input('telefone'),
            "senderEmail"=>"v89864271047003043906@sandbox.pagseguro.com.br",
            "shippingType"=>"1",
            "shippingAddressStreet"=>$req->input('rua'),
            "shippingAddressNumber"=>$req->input('n'),
            "shippingAddressComplement"=>$req->input('complemento'),
            "shippingAddressDistrict"=>$req->input('bairro'),
            "shippingAddressPostalCode"=>$req->input('cep'),
            "shippingAddressCity"=>$req->input('cidade'),
            "shippingAddressState"=>$req->input('uf'),
            "shippingAddressCountry"=>"BRA"
        ];

        
        $BuildQuery=http_build_query($Data);
        //produção -> retirar o nome sandbox da url
        //produção -> trocar o token
        $Url="https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
        
        $Curl=curl_init($Url);

        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST, true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS, $BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);
        
        $Xml=simplexml_load_string($Retorno);

        echo $Xml->code;
        
    }

}