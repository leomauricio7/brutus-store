<!DOCTYPE html>
  <html lang="pt-br"> 
    <head>
        <title>Brutusstore | @yield('title')</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="{{ url('css/styleAdmin.css') }}"/>
        <link rel="icon" href="{{ url('img/logo.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <nav class="person">
            <div class="nav-wrapper">
            <a href="#" class="brand-logo"><img class="responsive-img" src="{{ url('img/logo.png')}}" alt="" width="140"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('admin.home') }}"><i class="material-icons left">account_balance</i>Home</a></li>
                    <li><a href="{{ route('admin.banners') }}"><i class="material-icons left">photo</i>Banners</a></li>
                    <li><a href="{{ route('admin.produtos') }}"><i class="material-icons left">business_center</i>Produtos</a></li>
                    <li><a href="{{ route('admin.pedidos') }}"><i class="material-icons left">add_shopping_cart</i>Pedidos</a></li>
                    <li><a href="{{ route('admin.categorias') }} "><i class="material-icons left">assistant_photo</i>Categorias</a></li>
                    <li><a href="{{ route('admin.cupons') }}"><i class="material-icons left">card_giftcard</i>Cumpons</a></li>
                </ul>
            </div>
        </nav>

        <div class="progress" id="load">
            <div class="indeterminate"></div>
        </div>
      
        <div class="container">

        <div style="margin-top: 50px;"></div>
            @yield('content')
        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large blue tooltipped" data-position="left" data-tooltip="{{ Auth::user()->name }}">
                <i class="large material-icons">account_circle</i>
            </a>
            <ul>
                <li class="tooltipped" data-position="left" data-tooltip="sair">
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="btn-floating red"><i class="material-icons">exit_to_app</i>
                    </a>
                </li>
    
                <li class="tooltipped" data-position="left" data-tooltip="recarregar"><a href="{{ route('admin.home') }}"class="btn-floating yellow darken-1"><i class="material-icons">cached</i></a></li>
            </ul>
        </div>

       <div style="margin-top: 50px;"></div>

        <footer class="page-footer person">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"><img class="responsive-img" src="{{ url('img/logo.png')}}" alt=""></h5>
                <p class="grey-text text-lighten-4">Aqui vai ficar a descrição do ramo da loja.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Redes Sociais</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">WhatsApp</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Copyright - Brutusstore
            <a class="grey-text text-lighten-4 right" href="#!">Desenvolvimento : Leonardo Mauricio</a>
            </div>
          </div>
        </footer>
        <!-- Compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
          $(document).ready(function(){
                $(setTimeout(
                function(){
                    $('#load').hide()
                }, 1000));
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.datepicker').datepicker({
                    'format':'yyyy/mm/dd'
                });
                $('.tooltipped').tooltip();
                $('select').formSelect();
                $('.fixed-action-btn').floatingActionButton();
                $("#remove").click(function(){
                    M.Toast.dismissAll();
                });
            });
        </script>
        @if(!Auth::guest())
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">
                {{ csrf_field() }}
            </form>
        @endif
    </body>
  </html>