@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Categorias Cadastrados</h5>
</blockquote>
<hr>
<a href="{{ route('admin.categorias.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Nova categoria</a>
<table lass="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Slug</th>
            <th>Icon</th>
            <th>Criado em</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nome }}</td>
            <td>{{ $categoria->slug }}</td>
            <td><i class="small material-icons">{{ $categoria->icon }}</i></td>
            <td>{{ $categoria->created_at }}</td>
            <td><a class="waves-effect waves-light btn orange"><i class="material-icons">edit</i> Editar</a></td>
            <td><a href="{{ route('admin.categorias.destroy', $categoria->id) }}" class="waves-effect waves-light btn red"><i class="material-icons">delete</i> Remover</a></td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
