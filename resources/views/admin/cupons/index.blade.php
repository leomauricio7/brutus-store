@extends('admin.templates.template')
@section('title',$title)
@section('content')
<blockquote>
    <h5>
        <b>Cupons Cadastrados</b>
    </h5>
</blockquote>
@if (Session::has('success'))
    <div class="card-panel green darken-1"><span style="color: #FFF;">{{ Session::get('success') }}<span></div>
@elseif(Session::has('error'))
    <div class="card-panel red darken-1"><span style="color: #FFF;">{{ Session::get('error') }}</span></div>
@endif

<hr>
<a href="{{ route('admin.cupons.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Novo Cupom</a>
<table lass="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Localizador</th>
            <th>Validade</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    @foreach ($cupons as $cupon)
        <tr>
            <td>{{ $cupon->id }}</td>
            <td>{{ $cupon->nome }}</td>
            <td>{{ $cupon->localizador }}</td>
            <td>{{ $cupon->dthr_validade }}</td>
            <td><a href="{{ route('admin.cupons.edit', $cupon->id) }}"class="btn-floating orange"><i class="material-icons">edit</i></a></td>
            <td><a href="{{ route('admin.cupons.destroy', $cupon->id) }}" class="btn-floating red"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $cupons->links() }}
@endsection
