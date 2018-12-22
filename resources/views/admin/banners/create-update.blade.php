@extends('admin.templates.template')
@section('title', $title)
@section('content')
<blockquote>
      <h5>
        <b>{{ isset($banner) ? "Banner: $banner->i" : 'Cadastro de Banner' }}</b>
      </h5>
</blockquote>
@if(isset($errors) && count($errors) > 0)
  <div class="card-panel red darken-1">
    @foreach($errors->all() as $error)
      <p style="color: #FFF;">{{ $error }} </p>
    @endforeach
  </div>
@endif
<hr>
<div class="row">
    @if(isset($banner))
        {!! Form::model($banner, ['route' => ['admin.banners.update', $banner->id], 'class' => 'col s12', 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'admin.banners.store', 'class' => 'col s12', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
    @endif
      <div class="row">
        <div class="input-field file-field col s12">
          <div class="btn">
              {!! Form::file('image', null) !!}
              {!! Form::label('image', 'File') !!}
          </div>
          <div class="file-path-wrapper">
              {!! Form::text('label', null, ['class' => 'file-path validate', 'placeholder' => 'Icon']) !!}
          </div>
        </div>
      </div>
      {!! Form::submit('Salvar', ['class'=>'waves-effect waves-light btn']) !!}
    {!! Form::close() !!}
  </div>
@endsection
