@extends('site.template.template')
@section('title','Home')
@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/intro-carousel/1.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/intro-carousel/2.jpg" alt="Chicago" style="width:100%;">
      </div>
      
    </div>
  </div>

  <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Produtos</h2>
        </div>
        <div class="row">
            @if(isset($produtos))
              @foreach($produtos as $produto)
                <div class="col-lg-3 col-md-6">
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
      </div>
  </section><!-- #team -->

@endsection