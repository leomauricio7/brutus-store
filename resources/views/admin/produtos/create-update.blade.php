@extends('admin.templates.template')
@section('title',$title)
@section('content')
<blockquote>
  <h5>
    <b>{{ isset($produto) ? $produto->nome : 'Novo Produto' }}</b>
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
    @if(isset($produto))
        {!! Form::model($produto, ['route' => ['admin.produtos.update', $produto->id], 'class' => 'col s12', 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'admin.produtos.store', 'class' => 'col s12', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
    @endif
      <div class="row">
        <div class="input-field col s4">
          {!! Form::text('nome', null, ['class'=>'validate', 'placeholder'=>'Nome']) !!}
          {!! Form::label('nome', 'Nome') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::text('valor', null, ['class'=>'validate', 'placeholder'=>'Preço']) !!}
            {!! Form::label('preco', 'Preço') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::text('slug', null, ['class' => 'validate', 'placeholder' => 'Slug']) !!}
            {!! Form::label('slug', 'Slug') !!}
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
            {!! Form::textarea('descricao', null, ['class'=>'materialize-textarea validate', 'placeholder'=>'Descrição (Opcional)']) !!}
            {!! Form::label('descricao', 'Descrição') !!}
        </div>
        <div class="input-field file-field col s4">
            <div class="btn">
                {!! Form::file('image', null) !!}
                {!! Form::label('image', 'Imagen') !!}
            </div>
            <div class="file-path-wrapper">
                {!! Form::text('label', null, ['class' => 'file-path validate', 'placeholder' => 'Imagen']) !!}
            </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
            {!! Form::text('peso', null, ['class'=>'validate', 'placeholder'=>'Peso (Opcional)']) !!}
            {!! Form::label('peso', 'Peso') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::text('largura', null, ['class'=>'validate', 'placeholder'=>'Largura (Opcional)']) !!}
            {!! Form::label('largura', 'Largura') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::text('comprimento', null, ['class'=>'validate', 'placeholder'=>'Comprimento (Opcional)']) !!}
            {!! Form::label('comprimento', 'Comprimento') !!}
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
           <select name="categoria_id" class="validate">
               <option value="">Selecione</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
            {!! Form::label('label_categoria_id', 'Categoria') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::number('quantidade', null, ['class'=>'validate', 'placeholder'=>'Quantidade']) !!}
            {!! Form::label('label_quantidade', 'Quantidade') !!}
        </div>
        <div class="input-field col s4">
            {!! Form::select('ativo', $listStatus, null, ['class'=>'validate', 'placeholder'=>'Selecione']) !!}
            {!! Form::label('ativo', 'Ativo') !!}
        </div>
        
      </div>
      <button type="submit" class="waves-effect waves-light btn">Salvar</button>
    {!! Form::close() !!}
  </div>
@endsection
