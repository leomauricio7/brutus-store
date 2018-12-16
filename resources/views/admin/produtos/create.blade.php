@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Cadastro de Produto</h5>
</blockquote>
<hr>
<div class="row">
    <form method="post" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Nome do produto" name="name" type="text" class="validate">
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s6">
          <input name="valor" type="text" class="validate">
          <label for="last_name">Valor R$</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
          <label for="textarea1">Descrição</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="Peso" name="peso" type="text" class="validate">
          <label for="first_name">Peso KG</label>
        </div>
        <div class="input-field col s4">
          <input placeholder="Largura" name="largura" type="number" class="validate">
          <label for="first_name">Largura</label>
        </div>
        <div class="input-field col s4">
          <input placeholder="Comprimento" name="comprimento" type="number" class="validate">
          <label for="first_name">Comprimento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
            <select name="ativo">
                <option value="" disabled selected>Selecione</option>
                <option value="1">Sim</option>
                <option value="2">Não</option>
            </select>
            <label>Ativo</label>
        </div>
        <div class="input-field col s4">
          <input placeholder="" name="quantidade" type="number" class="validate">
          <label for="first_name">Quantidade</label>
        </div>
        <div class="input-field col s4">
            <select name="categoria_id">
                <option value="" disabled selected>Selecione</option>
                <option value="1">Canivete</option>
                <option value="2">Alicate</option>
                <option value="3">Moto Serra</option>
            </select>
            <label>Categoria</label>
        </div>
      </div>
      <div class="file-field input-field">
        <div class="btn">
            <span>Imagens</span>
            <input type="file" multiple>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" name="img" type="text" placeholder="imagens do produtos">
        </div>
      </div>
      <button class="btn waves-effect waves-light green" type="submit">Cadastrar Produto
        <i class="material-icons right">arrow_forward</i>
    </button>
    </form>
  </div>
@endsection
