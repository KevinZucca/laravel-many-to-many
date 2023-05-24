@extends('layouts/app')

@section('content')

  <div class="container text-center mt-5">
      <div class="container project-details">
        <h1>{{$technology->name}}</h1>
   
        <a href="{{route('admin.technologies.edit', $technology->id)}}">Modifica Tecnologia</a>
    </div>
    <a href="{{route('admin.technologies.index')}}">Ritorna alle tecnologie</a>
  </div>


@endsection