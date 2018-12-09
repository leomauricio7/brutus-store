@extends('site.template.template')
@section('title','contato')
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
      <div class="container">
        <div class="section-header">
          <h2>CONTATO</h2>
          <p>Canal para atendimento ao cliente da Brutus.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Endereço</h3>
              <address>Rua Fulano de Tal, 12 - Natal/RN</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telefone</h3>
              <p><a href="tel:+155895548855">+55 (084) 99777-7777</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>E-mail</h3>
              <p><a href="mailto:info@example.com">contato@brutusstore.com.br</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <!-- Uncomment below if you wan to use dynamic maps -->
        <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
      </div>

      <div class="container">
        <div class="form">
          <div id="sendmessage">Mensagem enviada com sucesso!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Menssagem"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Enviar</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
    @endsection