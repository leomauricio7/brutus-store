@extends('admin.templates.template')
@section('title', $title)
@section('content')
<blockquote>
    <h5>
        <b>Banners Cadastrados</b>
    </h5>
</blockquote>
@if (Session::has('success'))
    <div class="card-panel green darken-1"><span style="color: #FFF;">{{ Session::get('success') }}<span></div>
@elseif(Session::has('error'))
    <div class="card-panel red darken-1"><span style="color: #FFF;">{{ Session::get('error') }}</span></div>
@endif
<hr>
<a href="{{ route('admin.banners.create')}}" class="waves-effect waves-blue btn green"><i class="material-icons left">add_circle</i>Novo Banner</a>
<table class="highlight centered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Banner</th>
            <th>Criado em</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    @foreach($banners as $banner)
        <tr>
            <td>{{ $banner->id }}</td>
            <td><img class="responsive-img" width="50px" src="{{ url("storage/banners/{$banner->image}") }}" alt="{{ $banner->image }}"></td>
            <td>{{ $banner->created_at }}</td>
            <!--<td><a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn-floating orange"><i class="material-icons">edit</i></a></td>-->
            <td><a href="{{ route('admin.banners.destroy', $banner->id) }}" class="btn-floating red"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $banners->links() !!}
@endsection
