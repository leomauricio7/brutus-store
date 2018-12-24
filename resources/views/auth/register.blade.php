    @extends('site.template.template')
    @section('title','Cadastro')
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

        <section id="contact" class="wow fadeInUp">
            <div class="container" id="team" class="wow fadeInUp">
                <div class="row">
                    <div class="section-header">
                    <a href="{{ route('home')}}"><i class="fa fa-home"></i> Início</a> / Cadastro         
                    </div>                  
                </div>                    
            <div class="col-lg-12 col-md-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome completo</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pwd" class="col-md-4 col-form-label text-md-right">Telefone:</label>
                                <div class="col-md-4">
                                    <input type="text" name="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="name" value="{{ old('telefone') }}" >
                                    @if ($errors->has('telefone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telefone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirma Senha</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="pwd" class="col-md-4 col-form-label text-md-right">CEP:</label>
                                <div class="col-md-6">
                                    <input type="number" id="cep" name="cep" class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" value="{{ old('cep') }}" placeholder="Informe o CEP">
                                    @if ($errors->has('cep'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cep') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Endereço/Rua:</label>
                                <div class="col-md-8">
                                    <input type="text" id="rua" name="rua" class="form-control{{ $errors->has('rua') ? ' is-invalid' : '' }}" value="{{ old('rua') }}">
                                    @if ($errors->has('rua'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rua') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> 

                            <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Número:</label>
                                    <div class="col-md-4">
                                        <input type="number" id="numero "name="numero" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" value="{{ old('numero') }}">
                                        @if ($errors->has('numero'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>  
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Bairro:</label>
                                <div class="col-md-6">
                                    <input type="text" id="bairro" name="bairro" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" value="{{ old('bairro') }}">
                                    @if ($errors->has('bairro'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bairro') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Complemento:</label>
                                <div class="col-md-8">
                                    <input type="text" name="complemento" class="form-control{{ $errors->has('complemento') ? ' is-invalid' : '' }}" value="{{ old('complemento') }}">
                                    @if ($errors->has('complemento'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('complemento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Cidade:</label>
                                <div class="col-md-4">
                                    <input type="text" id="cidade" name="cidade" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" value="{{ old('cidade') }}">
                                    @if ($errors->has('cidade'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cidade') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">UF:</label>
                                <div class="col-md-2">
                                    <input type="text" id="uf" name="uf" class="form-control{{ $errors->has('uf') ? ' is-invalid' : '' }}" value="{{ old('uf') }}">
                                    @if ($errors->has('uf'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('uf') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                               Finalizar Cadastro
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
    <script src="/js/busca_cep.js"></script>
    @endpush
@endsection
