@extends('site.template.template')
@section('title','Carrinho')
@section('content')
<section id="call-to-action" class="wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 text-center text-lg-left">
        <h3 class="cta-title">Ganhe Cupons Promocionais</h3>
        <p class="cta-text">
          Inscreva-se cadastrando seu e-mail e receba Cupons com Descontos Especiais.
        </p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="#">Call To Action</a>
      </div>
    </div>

  </div>
</section><!-- #call-to-action -->

<!--==========================
  Our Team Section
============================-->    

<!--==========================
  Contact Section
============================-->
<section id="contact" class="wow fadeInUp">
    <div class="container" id="team" class="wow fadeInUp">
        <div class="row">
            <div class="section-header">
              <a href="./index.php"><i class="fa fa-home"></i> Início</a> / Carrinho         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
        <h2>CARRINHO DE COMPRAS</h2>
        <p>Lista de produtos adicionados</p>
          @if (Session::has('mensagem-sucesso'))
            <div class="alert alert-success">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
          @endif
          @if (Session::has('mensagem-falha'))
              <div class="alert alert-danger">
                  <strong>{{ Session::get('mensagem-falha') }}</strong>
              </div>
          @endif
          @forelse($pedidos as $pedido)            
          <table class="table table-bordered text-center">
            <thead style="background-color: #e8e8e8">
              <tr>
                <th scope="col"></th>
                <th scope="col">Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Desconto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $total_pedido = 0;
                  $total_geral = 0;
              @endphp
              @foreach($pedido->pedido_produtos as $pedido_produto)
              <tr>
                <th scope="row" style="text-align: center;">
                  <a onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" data-toggle="tooltip" data-placement="left" title="Remover produto?"><i class="fa fa-trash-o"></i></a>
                </th>
                <td><img src="{{ url("storage/produtos/{$pedido_produto->produto->image}") }}" width="100px" /></td>
                <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($pedido_produto->descontos, 2, ',', '.') }}</td>
                <td>
                    <button class="btn btn-link btn-xs" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1)"><i class="material-icons">remove_circle_outline</i></button>
                      {{ $pedido_produto->qtd }} 
                    <button class="btn btn-link btn-xs" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})"><i class="material-icons">add_circle_outline</i></button>
                </td>
                @php
                  $total_produto = ($pedido_produto->produto->valor * $pedido_produto->qtd) - $pedido_produto->descontos;
                  $total_pedido += $total_produto;
                  $total_geral += $total_pedido;
                @endphp
               <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
              </tr>
              @endforeach
              <tr>
                <th scope="row"></th>
                <td colspan="5">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="CUPOM DE DESCONTO">
                      <div class="input-group-btn">
                        <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
                          APLICAR DESCONTO
                        </button>
                      </div>
                    </div>
                  </form>              
                </td>
              </tr>
            </tbody>
          </table>   
      </div>
  </div>  
  <div class="row">
    <div class="col-lg-4 col-md-6">       
    </div>  
    <div class="col-lg-4 col-md-6" style="text-align: center;">
        <table class="table table-bordered text-center" width="100%">
          <thead>
            <tr>
              <th scope="col" colspan="2">TOTAL NO CARRINHO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Subtotal</strong></td>
              <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Frete</strong></td>
                <td>
                  <a id="frete" style="cursor: pointer;"><i class="fa fa-car"></i> Calcular Frete</a>

                  <form method="POST" action="{{ route('calcula.frete') }}" id="form-frete">
                      {{ csrf_field() }}
                      <input type="hidden" name="valor" value="{{ number_format($total_pedido, 2, ',', '.') }}">
                      <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                      <div class="form-group">
                          <input type="radio" name="tipo_frete" value="41106" required>PAC
                          <input type="radio" name="tipo_frete" value="40010" required>SEDEX
                      </div>
                      <div class="input-group input-group-sm">
                      <input type="text" name="cep" placeholder="informe um cep" class="form-control" aria-describedby="sizing-addon3" required autofocus>
                      <span class="input-group-btn">
                          <button class="btn btn-default-search-top btn-sm" type="submit">calcular</button>
                        </span>
                    </div>
                  </form>

                </td>
            </tr>
            @if(isset($frete))
            <tr>
              @php
                $total_geral = $total_pedido + $frete->Valor;
              @endphp
              <td><strong>Entrega</strong></td>
              <td>Frete: <strong>R$ {{ $frete->Valor }}</strong> <br> Entrega em <strong> {{ $frete->PrazoEntrega }} dias uteis.</strong></td>
            </tr>
            @endif
            <tr>
              <td><strong>Total</strong></td>
              <td>R$ {{ number_format($total_geral, 2, ',', '.') }}</td>
            </tr>
          </tbody>  
        </table> 

        <form method="POST" action="{{ route('finaliza.compra') }}">
            {{ csrf_field() }}
            <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
            <input type="hidden" name="valor_total" value="{{ $total_geral }}">
            <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
                FINALIZAR PEDIDO
              </button>  
        </form>
             
    </div> 
    <div class="col-lg-4 col-md-6">
        
    </div>   
    @empty
      <p>carrinho está vazio</p>
    @endforelse         
  </div>
</section>

  <form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <input type="hidden" name="pedido_id">
      <input type="hidden" name="produto_id">
      <input type="hidden" name="item">
  </form>
  <form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id">
  </form>

  @push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>
    <script>
      $(document).ready(function(){
        $('#form-frete').hide();
        $('#frete').click(function(){
          $('#form-frete').show('slow');
          $('#frete').hide();
        });
      })
    </script>
  @endpush

@endsection