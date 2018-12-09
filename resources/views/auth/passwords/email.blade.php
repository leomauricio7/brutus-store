@extends('site.template.template')
@section('title','Recupera Senha')
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
              <a href="{{ route('home') }}"><i class="fa fa-home"></i> Início</a> / Senha Perdida         
            </div>                  
        </div>                      
    </div>   
  <div class="container"> 
  <div class="row">
    <div class="col-lg-4 col-md-6">
        
    </div>    
    <form method="POST" action="{{ route('password.email') }}" class="col-lg-4 col-md-6" style="border:1px solid #e8e8e8;border-radius: 8px;padding-top:15px;background: #e8e8e8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @csrf
        <table class="table" width="100%">
          <thead>
            <tr>
              <th scope="col" style="text-align: center;font-size: 18px">SENHA PERDIDA</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align: justify;">
                Perdeu sua senha? Digite seu nome de usuário ou endereço de e-mail. Você receberá um link por e-mail para criar uma nova senha.                
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="pwd">Nome de usuário ou e-mail *:</label>
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>                  
              </td>
            </tr>
            <tr>
              <td align="center">
                <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
                  Redefinir Senha
                </button>               
              </td>
            </tr>
          </tbody>  
        </table>              
    </form> 
    <div class="col-lg-4 col-md-6">
        
    </div>          
  </div>

  <div class="container">
    <!-- Uncomment below if you wan to use dynamic maps -->
    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
  </div>

</section><!-- #contact -->
@endsection
