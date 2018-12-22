@extends('admin.templates.template')
@section('title',$title)
@section('content')
<blockquote>
    <h5>
        <b>Pedidos</b>
    </h5>
</blockquote>
<hr>
<table lass="highlight">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Valor R$</th>
            <th>Quantidade</th>
            <th>Data</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pedidos as $pedido)      
            <tr>
                <td>Alvin</td>
                <td>Eclair</td>
                <td>$0.87</td>
                <td>$0.87</td>
                <td>$0.87</td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection
