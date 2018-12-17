<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Brutus Store - @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ url('img/favicon.png') }}" rel="icon">
  <link href="{{ url('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->


  <!-- Libraries CSS Files -->
  <link href="{{ url('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ url('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('css/carrousel.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('lib/bootstrap/bootstrap.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
</head>

<body id="body">
  <!--==========================
    Top Bar
  ============================-->
  @include('site.template.header')

  @yield('content')
  <main id="main">
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center text-lg-left">
            <p class="cta-text">
              Inscreva-se cadastrando seu e-mail e receba <strong>Cupons Promocionais</strong> com Descontos Especiais.
            </p>
          </div>
          <div class="col-lg-6 text-center">
            <div class="form">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Informe seu E-mail!">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="fa fa-arrow-right"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>            
          </div>
        </div>
      </div>
    </section><!-- #call-to-action -->

  </main>

  <!--==========================
    Footer
  ============================-->
  @include('site.template.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{ url('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ url('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('lib/easing/easing.min.js') }}"></script>
  <script src="{{ url('lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ url('lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ url('lib/wow/wow.min.js') }}"></script>
  <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ url('lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ url('lib/sticky/sticky.js') }}"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="{{ url('contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ url('js/main.js') }}"></script>

</body>
</html>
