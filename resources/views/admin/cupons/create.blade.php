@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Cadastro de Cupom</h5>
</blockquote>
<hr>
<div class="row">
    <form method="post" class="col s12">
      <div class="row">
        <div class="input-field col s3">
          <input placeholder="Nome do cupom" name="name" type="text" class="validate">
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s3">
          <input name="Descon %" type="number" class="validate">
          <label for="last_name">Desconto</label>
        </div>
        <div class="input-field col s3">
          <input type="text" class="datepicker">
          <label for="last_name">Data de Validade</label>
        </div>
        <div class="input-field col s3">
            <select name="produto_id">
                <option value="" disabled selected>Selecione</option>
                <option value="1">Canivete</option>
                <option value="2">Serrote</option>
            </select>
            <label>Produto</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light green" type="submit">Cadastrar Cumpom
        <i class="material-icons right">arrow_forward</i>
    </button>
    </form>
  </div>
@endsection
