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
              <td><strong>Entrega</strong></td>
              <td><a href="#"><i class="fa fa-car"></i> Calcular Entrega</a></td>
            </tr>
            <tr>
              <td><strong>Total</strong></td>
              <td>R$ 180,00</td>
            </tr>
          </tbody>  
        </table> 
        <a href="{{ route('finaliza.compra') }}">  
        <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
          FINALIZAR A COMPRA
        </button> 
        </a>              
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
  @endpush

@endsection