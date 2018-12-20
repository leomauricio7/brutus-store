@extends('site.template.template')
@section('title','Produtos')
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
          <div class="col-lg-6 col-md-6">
            <div class="section-header">
              <h2>Produtos</h2>         
            </div> 
          </div>    
          <div class="col-lg-6 col-md-6">
              <div class="filtro" style="font-size: 12px;text-align: right;">
                <label for="staticEmail" class="col-sm-6 col-form-label" style="padding-top: 8px;">Ordenar por:</label>
                <div class="col-sm-6">
                <form>
                  <div class="form-group">               
                    <select class="form-control form-control-sm">
                      <option>Menor Preço <i class="fa fa-cart-plus"></i></option>
                      <option>Maior Preço</option>
                      <option>Ordem Crescente</option>
                      <option>Ordem Decrescente</option>
                    </select>
                  </div>
                </form> 
                </div>                                                                
              </div> 
          </div>                
        </div>             
        <div class="row">          
            <div class="col-lg-3 col-md-6">
              <ul class="list-group">
                <li class="list-group-item active" style="font-weight: bold;">CATEGORIAS</li>
                @if(isset($categorias))
                @foreach($categorias as $categoria)
                  <li class="list-group-item"><a href="{{ route('produtos.categoria', $categoria->slug) }}">{{ $categoria->nome}}</a></li>
                @endforeach
                @endif             
              </ul>
            </div>   
            <div class="col-lg-9 col-md-6">            
              @if(isset($produtos))
              @foreach($produtos as $produto)
                <div class="col-lg-4 col-md-6">
                    <div class="member">
                        <div class="pic">
                          <img class="image" src="{{ url("storage/produtos/{$produto->image}") }}" alt="">
                            <div class="middle">
                              <div class="text"><a href="{{ route('show.produto', $produto->slug)}}"><i class="fa fa-search"></i></a></div>
                            </div>
                        </div>
                        <div class="details">
                          <h4>{{ $produto->nome }}</h4>
                          <span>R$ {{ $produto->valor }}</span>
                          <div class="carrinho">
                            <a href=""><i class="fa fa-cart-plus"></i></a>
                          </div>                
                        </div>
                      </div>
                </div>
              @endforeach
              @endif
                                      
            </div>  
            <div style="text-align: center;">
                <ul class="pagination">
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                </ul>              
              </div>                                                
        </div>
    </div>
    @endsection