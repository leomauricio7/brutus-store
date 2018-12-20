@extends('admin.templates.template')
@section('title', $title)
@section('content')
<blockquote>
    <h5>
        <b>Categorias Cadastrados</b>
    </h5>
</blockquote>
@if (Session::has('success'))
    <div class="card-panel green darken-1"><span style="color: #FFF;">{{ Session::get('success') }}<span></div>
@elseif(Session::has('error'))
    <div class="card-panel red darken-1"><span style="color: #FFF;">{{ Session::get('error') }}</span></div>
@endif
<hr>
<a href="{{ route('admin.categorias.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Nova categoria</a>
<table class="highlight centered">
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
            <td><img class="responsive-img" width="50px" src="{{ url("storage/categorias/{$categoria->icon}") }}" alt="{{ $categoria->icon }}"></td>
            <td>{{ $categoria->created_at }}</td>
            <td><a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
            <td><a href="{{ route('admin.categorias.destroy', $categoria->id) }}" class="btn-floating red"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $categorias->links() !!}
@endsection
