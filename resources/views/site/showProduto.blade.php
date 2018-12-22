@extends('site.template.template')
@section('title',$title)
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
    <div class="container" id="team" class="wow fadeInUp">
        <div class="row">
            <div class="section-header">
              <a href="{{ route('home') }}"><i class="fa fa-home"></i> Início</a> / Categoria / Descrição do Produto         
            </div>                  
        </div>                      
    </div>    
    <div class="container">
        <div class="card">
          <div class="container-fliud">
            @if(isset($produto))
            @foreach($produto as $prod)
            <div class="wrapper row">
              <div class="preview col-md-6">
                
                <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img src="{{ url("storage/produtos/{$prod->image}") }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-2"><img src="{{ url("storage/produtos/{$prod->image}") }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-3"><img src="{{ url("storage/produtos/{$prod->image}") }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-4"><img src="{{ url("storage/produtos/{$prod->image}") }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-5"><img src="{{ url("storage/produtos/{$prod->image}") }}" width="400" height="252" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ url("storage/produtos/{$prod->image}") }}" /></a></li>
                  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{ url("storage/produtos/{$prod->image}") }}" /></a></li>
                  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{ url("storage/produtos/{$prod->image}") }}" /></a></li>
                  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{ url("storage/produtos/{$prod->image}") }}" /></a></li>
                  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{ url("storage/produtos/{$prod->image}") }}" /></a></li>
                </ul>
                
              </div>
              <div class="details col-md-6">
                <h3 class="product-title">{{ $prod->nome }}</h3>
                <div class="rating">
                  <div class="stars">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </div>
                </div>
                <p class="product-description">
                  {{ $prod->descricao }}
                </p>
                <h4 class="price">Valor: <span>R$ {{ number_format($prod->valor, 2, ',', '.') }}</span></h4>
                <h5 class="sizes">Categoria: {{ $categoria }}
                  <span class="size" data-toggle="tooltip" title="small"></span>
                </h5>
                
                <form method="POST" class="action" action="{{ route('carrinho.adicionar') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $prod->id }}">
                    <button class="add-to-cart btn btn-default" type="submit">
                      <i class="fa fa-cart-plus"></i> ADICIONAR AO CARRINHO
                    </button>
                </form>
                
              </div>
            </div>

            <div class="row" style="padding-top: 20px;">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><strong>Descrição do Produto</strong></a></li>
                <li><a data-toggle="tab" href="#menu1"><strong>Informações Técnicas</strong></a></li>
                <li><a data-toggle="tab" href="#menu2"><strong>Avaliações</strong></a></li>
              </ul>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active" style="padding: 20px;">
                  <p>
                    {{ $prod->descricao}}
                  </p>
                </div>
                <div id="menu1" class="tab-pane fade" style="padding: 20px;">
                  <p>
                   <b>Tamanho: </b>{{ $prod->tamanho}}ml  <b>Largura: </b>{{ $prod->largura }}ml
                   <b>Comprimento: </b>{{ $prod->comprimento}}ml  <b>Peso: </b>{{ $prod->peso }}kg
                  </p>
                </div>
                <div id="menu2" class="tab-pane fade" style="padding: 20px;">
                  <p>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.
                  </p>
                </div>
              </div>              
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>

  <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Produtos Relacionados</h2>
        </div>
        <div class="row">

            @if(isset($produtosRelacionados))
            @foreach($produtosRelacionados as $prodRel)
              <div class="col-lg-3 col-md-6">
                <div class="member">
                  <div class="pic">
                    <img class="image" src="{{ url("storage/produtos/{$prodRel->image}") }}" alt="">
                      <div class="middle">
                        <div class="text"><a href="{{ route('show.produto', $prodRel->slug)}}"><i class="fa fa-search"></i></a></div>
                      </div>
                  </div>
                  <div class="details">
                    <h4>{{ $prodRel->nome }}</h4>
                    <span>R$ {{ number_format($prodRel->valor, 2, ',', '.') }}</span>
                    <form method="POST" class="carrinho" action="{{ route('carrinho.adicionar') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $prodRel->id }}">
                        <button type="submit"><i class="fa fa-cart-plus"></i></button>
                    </form>               
                  </div>
                </div>
              </div>
            @endforeach
          @endif

        </div>              

      </div>
    </section><!-- #team -->   
    @endsection   