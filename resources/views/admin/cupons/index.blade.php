@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Cupons Cadastrados</h5>
</blockquote>


<hr>
<a href="{{ route('admin.cupons.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Novo Cupom</a>
<table lass="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Localizador</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    @foreach ($cupons as $cupom)
        <tr>
            <td>{{ $cupom->id }}</td>
            <td>{{ $cupom->nome }}</td>
            <td>{{ $cupom->localizador }}</td>
            <td><a class="waves-effect waves-light btn orange"><i class="material-icons">edit</i> Editar</a></td>
            <td><a href="{{ route('admin.cupon.destroy', $cupom->id) }}" class="waves-effect waves-light btn red"><i class="material-icons">delete</i> Remover</a></td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
