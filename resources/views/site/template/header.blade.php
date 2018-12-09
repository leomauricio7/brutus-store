<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="contact-info float-left">
              <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contato@brutusstore.com.br</a>
              <i class="fa fa-phone"></i> +55 (084) 99777-7777
            </div>
          </div> 
          <div class="col-lg-3 col-md-6">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Pesquisa produto...">
                  <div class="input-group-btn">
                    <button class="btn btn-default-search-top" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
          </div> 
          <div class="col-lg-3 col-md-6">
            <div class="social-links float-right">   
              <a href="{{ route('login') }}" class="twitter"><i class="fa fa-arrow-right"></i> Entrar</a>
              <a href="{{ route('carrinho') }}" class="facebook"><i class="fa fa-shopping-cart"></i> Carrinho</a>
            </div>
          </div>                               
        </div>        
    </div>
  </section>
 
<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!--<h1><a href="#body" class="scrollto">Brutus<span>Store</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}"><img src="{{ url('img/logo.png') }}" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{ route('home') }}">Início</a></li>
          <li><a href="{{route('sobre')}}">Sobre a Empresa</a></li>        
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Produtos
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-airsoft.png') }}">
                  Airsoft
                </a>
              </li>    
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-alicate.png') }}">
                  Alicates
                </a>
              </li>                         
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-bandoleira.png') }}">
                  Bandoleiras
                </a>
              </li>  
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-bastao.png') }}">
                  Bastões
                </a>
              </li>   
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-bolsa.png') }}">
                  Bolsas
                </a>
              </li>  
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-camisa.png') }}">
                  Camisas
                </a>
              </li> 
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-canivete.png') }}">
                  Canivetes
                </a>
              </li> 
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-carregador.png') }}">
                  Carregadores
                </a>
              </li>
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-chapeu.png') }}">
                  Chapéus
                </a>
              </li>  
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-cinto.png') }}">
                  Cintos
                </a>
              </li>  
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-colete.png') }}">
                  Coletes
                </a>
              </li>                                                                                                                        
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-faca.png') }}">
                  Facas
                </a>
              </li>
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-lanterna.png') }}">
                  Lanternas
                </a>
              </li> 
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-mochila.png') }}">
                  Mochilas
                </a>
              </li>              
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-multiuso.png') }}">
                  Multiuso
                </a>
              </li> 
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-patch.png') }}">
                  Patch
                </a>
              </li> 
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-porta-carregador.png') }}">
                  Porta carregador
                </a>
              </li> 
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-pulseira.png') }}">
                  Pulseiras
                </a>
              </li>  
              <li>
                <a href="{{ route('show.produto','teste') }}">
                  <img src="{{ url('img/cat/cat-spray.png') }}">
                  Spray de Pimenta
                </a>
              </li> 
              <li>
                <a href="{{ route('produtos') }}" style="color: #186548">
                  <img src="{{ url('img/cat/cat-todos.png') }}">
                  Ver todos
                </a>
              </li>                         
            </ul>
          </li>  
          <li><a href="{{ route('produtos') }}"><i class="fa fa-shopping-bag"></i> Promoções</a></li>                  
          <li><a href="{{ route('contato') }}">Contato</a></li>                             
        </ul>             
      </nav><!-- #nav-menu-container -->            
    </div>        
  </header><!-- #header -->
  <!--==========================
    Intro Section
  ============================-->