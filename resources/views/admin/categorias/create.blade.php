@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Cadastro de Categoria</h5>
</blockquote>
<hr>
<div class="row">
    <form method="post" action="{{ route('admin.categorias.store') }}"class="col s12">
      {!! csrf_field() !!}
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="Nome do produto" name="nome" type="text" class="validate" required>
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s4">
          <input name="slug" type="text" class="validate" required>
          <label for="last_name">Slug</label>
        </div>
        <div class="input-field col s4">
          <input name="icon" type="text" placeholder="copie e cole o nome do icone aqui" class="validate" required>
          <label for="last_name">Icon</label>
          <span class="helper-text" data-error="wrong" data-success="right">
          <a href="https://materializecss.com/icons.html" target="_blank">Visualizar Icons</a>
          </span>
        </div>
      </div>
      <button class="btn waves-effect waves-light green" type="submit">Cadastrar Categoria
        <i class="material-icons right">arrow_forward</i>
    </button>
    </form>
  </div>
@endsection
