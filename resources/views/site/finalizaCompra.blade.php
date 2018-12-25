@extends('site.template.template')
@section('title','Finalizar Compra')
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
              <a href="{{ route('home')}}"><i class="fa fa-home"></i> Início</a> / Finalizar Compras         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
        <h2>FINALIZAR COMPRAS</h2>
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
        <div class="col-md-offset-2 col-lg-offset-2 col-lg-8 col-md-8">
          @forelse($compras as $compra)  
          <table class="table table-bordered text-center" width="100%" style="text-align: center;">
            <thead style="background-color: #e8e8e8">
              <tr>
                <th scope="col" colspan="2">SEU PEDIDO</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Produto</strong></td>
                @php
                  $total_pedido = 0;
                @endphp
                <td>
                    @foreach($compra->pedido_produtos as $pedido_produto)
                    {{ $pedido_produto->produto->nome }} <img src="{{ url("storage/produtos/{$pedido_produto->produto->image}") }}" width="50px" /> x <strong>{{ $pedido_produto->qtd }}</strong> Unidade
                    <br/>
                    @php
                    $total_produto = ($pedido_produto->produto->valor * $pedido_produto->qtd) - $pedido_produto->descontos;
                    $total_pedido += $total_produto;
                    @endphp  
                  @endforeach              
                </td>
              </tr>
              <tr>
                <td><strong>Subtotal</strong></td>
                <td>R$ {{ number_format( $total_pedido, 2, ',', '.') }}</td>
              </tr>              
              <tr>
                <td><strong>Frete</strong></td>
                <td> 
                  {{ $compra->id_frete == '41106' ? 'PAC': 'SEDEX' }} - R$ {{ number_format( $compra->valor_pedido - $total_pedido, 2, ',', '.') }}                
                </td>
              </tr>
              <tr style="background-color: #e8e8e8">
                <td><strong>Total</strong></td>
                <td>R$ {{ number_format( $compra->valor_pedido, 2, ',', '.') }}</td>
              </tr>
            </tbody>  
          </table>
          
          @push('scripts')
          <script src="/js/zepto.js"></script>
          <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
          <script>
              var Root="http://"+document.location.hostname+"/";
      
              $('#BotaoPagamento').on('click',function(event){
                  event.preventDefault();
              
                  $.ajax({
                      url: Root+"carrinho/pagamento",
                      type: 'POST',
                      dataType:'html',
                      data: { 
                        _token:'{{ csrf_token() }}',
                        valor:'{{ $compra->valor_pedido }}',
                        cep:{{ Auth::user()->cep }},
                        n:{{ Auth::user()->numero }},
                        rua:'{{ Auth::user()->rua }}',
                        bairro:'{{ Auth::user()->bairro }}',
                        cidade:'{{ Auth::user()->cidade }}',
                        uf:'{{ Auth::user()->uf }}',
                        complemento:'{{ Auth::user()->complemento }}',
                        telefone:'{{ Auth::user()->telefone }}',
                        email:'{{ Auth::user()->email }}',
                        },
                      success:function(response){
                          console.log(response)
                          PagSeguroLightbox(response);
                      },
                      error: function (data, textStatus, errorThrown) {
                          console.log(data);
                      },
                  });
              });
          </script> 
          @endpush

          @empty
             <p>Pédido inválido</p> 
          @endforelse
          <table class="table table-bordered text-center" width="100%" style="background-color: #e8e8e8;text-align: justify;">
            <tr>
              <td>
                <div class="radio">
                  <label><input type="radio" name="optradio3" checked>Pagamento com o PagSeguro</label>
                </div>                 
              </td>
              <td><img src="http://brutus.marcelolimawebdesign.com.br/wp-content/plugins/woocommerce-pagseguro/assets/images/pagseguro.png"></td>
            </tr>
            <tr>&nbsp;</tr>
            <tr>
              <td colspan="2">
                Os seus dados pessoais serão utilizados para processar a sua compra, apoiar a sua experiência em todo este site e para outros fins descritos na nossa política de privacidade
              </td>
            </tr>
            <tr>
              <td colspan="2">
                 <label class="checkbox-inline"><input type="checkbox" value="">Li e concordo com o(s) termos e condições do site *</label>
              </td>
            </tr>  
          </table> 
          <div class="text-center">
            <form name="FormPagamento" id="FormPagamento" action="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html" method="post">
              <input id="BotaoPagamento" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-azul-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
            </form>
          </div>
        </div>                        
      </div>
  </div>  
  <div class="row">
    <div class="col-lg-4 col-md-6">  
    </div>    
    <div class="col-lg-4 col-md-6" style="text-align: center;">
    </div> 
    <div class="col-lg-4 col-md-6">  
    </div>          
  </div>

<div class="container">
    <!-- Uncomment below if you wan to use dynamic maps -->
    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
  </div> 
</section>
@endsection