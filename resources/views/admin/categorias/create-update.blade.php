@extends('admin.templates.template')
@section('title', $title)
@section('content')
<blockquote>
      <h5>
        <b>{{ isset($categoria) ? $categoria->nome : 'Cadastro de Categoria' }}</b>
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
    @if(isset($categoria))
        {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'class' => 'col s12', 'method' => 'put']) !!}
    @else
        {!! Form::open(['route' => 'admin.categorias.store', 'class' => 'col s12', 'method' => 'post']) !!}
    @endif
      <div class="row">
        <div class="input-field col s4">
          {!! Form::text('nome', null, ['class' => 'validate', 'placeholder' => 'Nome']) !!}
          {!! Form::label('nome', 'Nome') !!}
        </div>
        <div class="input-field col s4">
          {!! Form::text('slug', null, ['class' => 'validate', 'placeholder' => 'Slug']) !!}
          {!! Form::label('slug', 'Slug') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::text('icon', null, ['class' => 'validate', 'placeholder' => 'Icon']) !!}
            {!! Form::label('icon', 'Icon') !!}
          <span class="helper-text" data-error="wrong" data-success="right">
          <a href="https://materializecss.com/icons.html" target="_blank">Visualizar Icons</a>
          </span>
        </div>
      </div>
      {!! Form::submit('Salvar', ['class'=>'waves-effect waves-light btn']) !!}
    {!! Form::close() !!}
  </div>
@endsection
