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
        {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'class' => 'col s12', 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'admin.categorias.store', 'class' => 'col s12', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
    @endif
      <div class="row">
        <div class="input-field col s4">
          {!! Form::text('nome', null, ['class' => 'validate', 'placeholder' => 'Nome', 'id'=>'name']) !!}
          {!! Form::label('nome', 'Nome') !!}
        </div>
        <div class="input-field col s4">
          {!! Form::text('slug', null, ['class' => 'validate', 'placeholder' => 'Slug', 'id'=>'slug']) !!}
          {!! Form::label('slug', 'Slug') !!}
        </div>
        <div class="input-field file-field col s4">
          <div class="btn">
              {!! Form::file('icon', null) !!}
              {!! Form::label('icon', 'File') !!}
          </div>
          <div class="file-path-wrapper">
              {!! Form::text('label', null, ['class' => 'file-path validate', 'placeholder' => 'Icon']) !!}
          </div>
        </div>
      </div>
      {!! Form::submit('Salvar', ['class'=>'waves-effect waves-light btn']) !!}
    {!! Form::close() !!}
  </div>
@endsection
