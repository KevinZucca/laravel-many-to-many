@extends('layouts/app')

@section('content')

  <div class="container text-center mt-5">
      <div class="container project-details">
        <img id="project-image" src="{{asset('storage/' . $project->img)}}" alt="{{$project->img ? 'project-img' : ''}}">
        <h1>{{$project->name}}</h1>
        <h5>Tipo di progetto: {{$project->type->name ?? 'nessun tipo'}}</h5>
        <p>{{$project->description}}</p>
        <em>Tecnologie utilizzate:  
          <strong> 
            @foreach ($project->technologies as $technology)
              {{$technology->name}}
            @endforeach
          </strong> 
        </em>
        <a href="{{route('admin.projects.edit', $project->id)}}">Modifica progetto</a>
    </div>
    <a href="{{route('admin.projects.index')}}">Ritorna ai progetti</a>
  </div>


@endsection