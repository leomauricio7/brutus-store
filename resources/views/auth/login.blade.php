@extends('site.template.template')
@section('title','Minha Conta')
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
              <a href="{{ route('home') }}"><i class="fa fa-home"></i> Início</a> / Minha Conta         
            </div>                  
        </div>                      
    </div>   
  <div class="container"> 
  <div class="row">
    <div class="col-lg-4 col-md-6">
        
    </div>    
    <form method="post" action="{{ route('login') }}" class="col-lg-4 col-md-6" style="border:1px solid #e8e8e8;border-radius: 8px;padding-top:15px;background: #e8e8e8">
        @csrf
        <table class="table" width="100%">
          <thead>
            <tr>
              <th scope="col" style="text-align: center;font-size: 18px">INSIRA SEUS DADOS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="form-group">
                  <label for="pwd">E-mail *:</label>
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>                 
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label for="pwd">Senha *:</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>                  
              </td>
            </tr>
            <tr>
              <td align="center">
                <button type="submit" class="btn btn-default-search-top" style="font-weight: bold;">
                    Acessar
                </button>       
              </td>
            </tr>
            <tr>
              <td>
              @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                       Esqueceu sua senha?
                    </a>
                @endif    
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
