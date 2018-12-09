@extends('site.template.template')
@section('title','Finalizar Compra')
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
              <a href="./index.php"><i class="fa fa-home"></i> Início</a> / Finalizar Compras         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
        <h2>FINALIZAR COMPRAS</h2>
        <p>Preencha os campos abaixo para finalizar sua compra.</p>  
        <div class="col-lg-6 col-md-6">

          <div class="form-group">
            <label for="usr">Nome Completo:</label>
            <input type="text" class="form-control" id="usr">
          </div>
          <div class="form-group">
            <label for="pwd">CEP:</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Informe o CEP">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>   
          <div class="form-group">
            <label for="pwd">Endereço:</label>
            <input type="text" class="form-control" id="pwd">
          </div>  
          <div class="form-group">
            <label for="pwd">Bairro:</label>
            <input type="text" class="form-control" id="pwd">
          </div>  
          <div class="form-group">
            <label for="pwd">Complemento:</label>
            <input type="text" class="form-control" id="pwd">
          </div>  
          <div class="form-group">
            <label for="pwd">Cidade:</label>
            <input type="text" class="form-control" id="pwd">
          </div>   
          <div class="form-group">
            <label for="pwd">Estado:</label>
            <input type="text" class="form-control" id="pwd">
          </div>    
          <div class="form-group">
            <label for="pwd">Telefone:</label>
            <input type="text" class="form-control" id="pwd">
          </div>   
          <div class="form-group">
            <label for="pwd">E-mail:</label>
            <input type="text" class="form-control" id="pwd">
          </div>                                                                               
          <div class="form-group">
            <label for="comment">Informações complementares sobre o pedido:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
          </div>
        </div>     
        <div class="col-lg-6 col-md-6">
          <table class="table table-bordered text-center" width="100%" style="text-align: center;">
            <thead style="background-color: #e8e8e8">
              <tr>
                <th scope="col" colspan="2">SEU PEDIDO</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Produto</strong></td>
                <td>
                  Descrição do Produto x <strong>1</strong><!-- AQUI PEGA O VALOR DA SESSÃO ANTERIOR (QUANTIDADE) -->
                  <br/>                
                </td>
              </tr>
              <tr>
                <td><strong>Subtotal</strong></td>
                <td>R$ 180,00</td>
              </tr>              
              <tr>
                <td><strong>Entrega</strong></td>
                <td>
                  <div class="radio">
                    <label><input type="radio" name="optradio1" checked>PAC: R$18,80 - Entrega em 5 dias úteis</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio2">SEDEX: R$20,21 - Entrega em 1 dia útil</label>
                  </div>                  
                </td>
              </tr>
              <tr style="background-color: #e8e8e8">
                <td><strong>Total</strong></td>
                <td>R$ 180,00</td>
              </tr>
            </tbody>  
          </table>    
          <table class="table table-bordered text-center" width="100%" style="background-color: #e8e8e8;text-align: justify;">
            <tr>
              <td>
                <div class="radio">
                  <label><input type="radio" name="optradio3" checked>Pagamento com o PagSeguro</label>
                </div>                 
              </td>
              <td><img src="http://brutus.marcelolimawebdesign.com.br/wp-content/plugins/woocommerce-pagseguro/assets/images/pagseguro.png"></td>
            </tr>
            <tr>&nbsp;</tr>
            <tr>
              <td colspan="2">
                Os seus dados pessoais serão utilizados para processar a sua compra, apoiar a sua experiência em todo este site e para outros fins descritos na nossa política de privacidade
              </td>
            </tr>
            <tr>
              <td colspan="2">
                 <label class="checkbox-inline"><input type="checkbox" value="">Li e concordo com o(s) termos e condições do site *</label>
              </td>
            </tr>  
          </table> 
            <a href="./index?p=finalizar-compras">  
            <button class="btn btn-default-search-top btn-block" type="submit" style="font-weight: bold;">
              FINALIZAR PEDIDO
            </button> 
            </a>                             
        </div>                        
      </div>
  </div>  
  <div class="row">
    <div class="col-lg-4 col-md-6">
        
    </div>    
    <div class="col-lg-4 col-md-6" style="text-align: center;">



    </div> 
    <div class="col-lg-4 col-md-6">
        
    </div>          
  </div>

  <div class="container">
    <!-- Uncomment below if you wan to use dynamic maps -->
    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
  </div>

</section><!-- #contact -->
@endsection