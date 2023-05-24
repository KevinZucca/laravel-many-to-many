@extends('layouts/app')

@section('content')

  <div class="container text-center mt-5">
      <div class="container project-details">
        <h1>Nome: {{$type->name}}</h1>
        <p>{{$type->description}}</p>
        <a href="{{route('admin.types.edit', $type)}}">Modifica tipologia</a>
    </div>
    <a href="{{route('admin.types.index')}}">Ritorna alle tipologie</a>
  </div>


@endsection