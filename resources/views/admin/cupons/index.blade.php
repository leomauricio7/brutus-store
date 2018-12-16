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
            <th>Produto</th>
            <th>Desconto %</th>
            <th>Validade</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>001</td>
            <td>GHKGHVH887878</td>
            <td>Canivete</td>
            <td>6%</td>
            <td>20/01/2019</td>
            <td>10/12/2018</td>
        </tr>
        <tr>
            <td>001</td>
            <td>GHKGHVH887878</td>
            <td>Canivete</td>
            <td>6%</td>
            <td>20/01/2019</td>
            <td>10/12/2018</td>
        </tr>
        <tr>
            <td>001</td>
            <td>GHKGHVH887878</td>
            <td>Canivete</td>
            <td>6%</td>
            <td>20/01/2019</td>
            <td>10/12/2018</td>
        </tr>
    </tbody>
    </table>
@endsection
