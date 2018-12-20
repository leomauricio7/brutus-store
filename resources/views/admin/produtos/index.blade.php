@extends('admin.templates.template')
@section('title',$title)
@section('content')
<blockquote>
    <h5>
        <b>Produto Cadastrados</b>
    </h5>
</blockquote>
@if (Session::has('success'))
    <div class="card-panel green darken-1"><span style="color: #FFF;">{{ Session::get('success') }}<span></div>
@elseif(Session::has('error'))
    <div class="card-panel red darken-1"><span style="color: #FFF;">{{ Session::get('error') }}</span></div>
@endif
<hr>
<a href="{{ route('admin.produtos.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Novo Produto</a>
<table lass="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Valor R$</th>
            <th>Quantidade</th>
            <th>Ativo</th>
            <th>Image</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>R${{ $produto->valor }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>{{ $produto->ativo }}</td>
                <td><img class="responsive-img" width="50px" src="{{ url("storage/produtos/{$produto->image}") }}" alt="{{ $produto->image }}"></td>
                <td><a href="{{ route('admin.produtos.edit', $produto->id) }}"class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                <td><a href="{{ route('admin.produtos.destroy', $produto->id) }}" class="btn-floating red"><i class="material-icons">delete</i></a></td>
            </tr>
            <tr>
        @endforeach
    </tbody>
</table>
{!! $produtos->links() !!}
@endsection
