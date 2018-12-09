@extends('site.template.template')
@section('title','Produto')
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
            <div class="wrapper row">
              <div class="preview col-md-6">
                
                <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img src="{{ url('img/team-1.jpg') }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-2"><img src="{{ url('img/team-1.jpg') }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-3"><img src="{{ url('img/team-1.jpg') }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-4"><img src="{{ url('img/team-1.jpg') }}" width="400" height="252" /></div>
                  <div class="tab-pane" id="pic-5"><img src="{{ url('img/team-1.jpg') }}" width="400" height="252" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ url('img/team-1.jpg') }}" /></a></li>
                  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{ url('img/team-1.jpg') }}" /></a></li>
                  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{ url('img/team-1.jpg') }}" /></a></li>
                  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{ url('img/team-1.jpg') }}" /></a></li>
                  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{ url('img/team-1.jpg') }}" /></a></li>
                </ul>
                
              </div>
              <div class="details col-md-6">
                <h3 class="product-title">{{ $produto }}</h3>
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
                  Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.
                </p>
                <h4 class="price">Valor: <span>R$ {{ $valor }}</span></h4>
                <h5 class="sizes">Categoria:
                  <span class="size" data-toggle="tooltip" title="small">{{ $categoria}}</span>
                </h5>
                <div class="action">
                  <a href="{{ route('carrinho') }}"><button class="add-to-cart btn btn-default" type="button"><i class="fa fa-cart-plus"></i> ADICIONAR AO CARRINHO</button></a>
                </div>
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
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.
                  </p>
                </div>
                <div id="menu1" class="tab-pane fade" style="padding: 20px;">
                  <p>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.
                  </p>
                </div>
                <div id="menu2" class="tab-pane fade" style="padding: 20px;">
                  <p>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.
                  </p>
                </div>
              </div>              
            </div>

          </div>
        </div>
      </div>

  <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Produtos Relacionados</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img class="image" src="{{ url('img/team-1.jpg') }}" alt="">
                  <div class="middle">
                    <div class="text"><i class="fa fa-search"></i></div>
                  </div>
              </div>
              <div class="details">
                <h4>Descrição do Produto</h4>
                <span>R$ 149,90</span>
                <div class="carrinho">
                  <a href=""><i class="fa fa-cart-plus"></i></a>
                </div>                
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img class="image" src="{{ url('img/team-2.jpg') }}" alt="">
                  <div class="middle">
                    <div class="text"><i class="fa fa-search"></i></div>
                  </div>
              </div>
              <div class="details">
                <h4>Descrição do Produto</h4>
                <span>R$ 149,90</span>
                <div class="carrinho">
                  <a href=""><i class="fa fa-cart-plus"></i></a>
                </div>
              </div>          
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img class="image" src="{{ url('img/team-3.jpg') }}" alt="">
                  <div class="middle">
                    <div class="text"><i class="fa fa-search"></i></div>
                  </div>
              </div>
              <div class="details">
                <h4>Descrição do Produto</h4>
                <span>R$ 149,90</span>
                <div class="carrinho">
                  <a href=""><i class="fa fa-cart-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img class="image" src="{{ url('img/team-4.jpg') }}" alt="">
                  <div class="middle">
                    <div class="text"><i class="fa fa-search"></i></div>
                  </div>
              </div>
              <div class="details">
                <h4>Descrição do Produto</h4>
                <span>R$ 149,90</span>
                <div class="carrinho">
                  <a href=""><i class="fa fa-cart-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>              

      </div>
    </section><!-- #team -->   
    @endsection   