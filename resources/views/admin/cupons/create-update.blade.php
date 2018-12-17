@extends('admin.templates.template')
@section('title', $title)
@section('content')
<blockquote>
  <h5>
    <b>{{ isset($cupon) ? $cupon->nome : 'Novo Cupon' }}</b>
  </h5>
</blockquote>
@if(isset($errors) && count($errors) > 0)
  <div class="card-panel red darken-1">
    @foreach($errors->all() as $error)
      <p style="color: #FFF;">{{ $error }} </p>
    @endforeach
  </div>
@endif
<hr>
<div class="row">
    @if(isset($cupon))
        {!! Form::model($cupon, ['route' => ['admin.cupons.update', $cupon->id], 'class' => 'col s12', 'method' => 'put']) !!}
    @else
        {!! Form::open(['route' => 'admin.cupons.store', 'class' => 'col s12', 'method' => 'post']) !!}
    @endif
      <div class="row">
        <div class="input-field col s3">
          {!! Form::text('nome', null, ['class'=>'validate', 'placeholder'=>'Nome']) !!}
          {!! Form::label('nome', 'Nome') !!}
        </div>
        <div class="input-field col s3">
            {!! Form::text('localizador', null, ['class'=>'validate', 'placeholder'=>'Localizador']) !!}
            {!! Form::label('localizador', 'Localizador') !!}
        </div>
        <div class="input-field col s3">
          {!! Form::text('dthr_validade', null, ['class'=>'datepicker','placeholder'=>'Validade do cupon']) !!}
          {!! Form::label('dtrh_validade', 'Validade') !!}
        </div>
        <div class="input-field col s3">
            {!! Form::select('ativo', $status, null, ['class'=>'validate', 'placeholder'=>'Selecione']) !!}
            {!! Form::label('ativo', 'Situação') !!}
          </div>
      </div>
      <div class="row">
            <div class="input-field col s3">
              {!! Form::select('modo_desconto', $modo_desconto, null, ['class'=>'validate', 'placeholder'=>'Selecione']) !!}
              {!! Form::label('modo_desconto', 'Modo Desconto') !!}
            </div>
            <div class="input-field col s3">
                {!! Form::text('desconto', null, ['class'=>'validate', 'placeholder'=>'Ex: 5.99']) !!}
                {!! Form::label('desconto', 'Desconto') !!}
            </div>
            <div class="input-field col s3">
                {!! Form::select('modo_limite', $modo_limite, null, ['class'=>'validate', 'placeholder'=>'Selecione']) !!}
                {!! Form::label('modo_limite', 'Modo Limite') !!}
              </div>
            <div class="input-field col s3">
                {!! Form::text('limite', null, ['class'=>'validate', 'placeholder'=>'Ex: 9.99']) !!}
                {!! Form::label('limite', 'Limite') !!}
            </div>
      </div>
      {!! Form::submit('Salvar', ['class'=>'waves-effect waves-light btn']) !!}
    {!! Form::close() !!}
  </div>
@endsection
