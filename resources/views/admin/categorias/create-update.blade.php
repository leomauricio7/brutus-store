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
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s4">
          {!! Form::text('slug', null, ['class' => 'validate', 'placeholder' => 'Slug']) !!}
          <label for="last_name">Slug</label>
        </div>
        <div class="input-field col s4">
            {!! Form::text('icon', null, ['class' => 'validate', 'placeholder' => 'Icon']) !!}
            <label for="last_name">Icon</label>
          <span class="helper-text" data-error="wrong" data-success="right">
          <a href="https://materializecss.com/icons.html" target="_blank">Visualizar Icons</a>
          </span>
        </div>
      </div>
      {!! Form::submit('Salvar', ['class'=>'btn waves-effect waves-light green']) !!}
    {!! Form::close() !!}
  </div>
@endsection
