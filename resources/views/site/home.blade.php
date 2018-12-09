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
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img class="image" src="img/team-1.jpg" alt="">
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
                <img src="img/team-2.jpg" alt="">
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
                <img src="img/team-3.jpg" alt="">
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
                <img src="img/team-4.jpg" alt="">
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

        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img src="img/team-5.jpg" alt="">
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
                <img src="img/team-6.jpg" alt="">
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
                <img src="img/team-7.jpg" alt="">
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
                <img src="img/team-8.jpg" alt="">
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