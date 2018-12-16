@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Produto Cadastrados</h5>
</blockquote>
<hr>
<a href="{{ route('admin.produtos.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Novo Produto</a>
<table lass="highlight">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Valor R$</th>
            <th>Quantidade</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>$0.87</td>
        <td>$0.87</td>
        </tr>
        <tr>
        <td>Alan</td>
        <td>Jellybean</td>
        <td>$3.76</td>
        <td>$0.87</td>
        </tr>
        <tr>
        <td>Jonathan</td>
        <td>Lollipop</td>
        <td>$7.00</td>
        <td>$0.87</td>
        </tr>
    </tbody>
    </table>
@endsection
