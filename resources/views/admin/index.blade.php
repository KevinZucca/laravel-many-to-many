@extends('layouts/app')

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col"></th>
            <th scope="col">Nome progetto</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Link a Github</th>
            <th scope="col">Linguaggi utilizzati</th>
            <th scope="col">Tipologia</th>
            <th scope="col">Dettagli</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $singleProject)
            <tr>
              <th scope="row">{{$singleProject->id}}</th>
              <td>
                {{$singleProject->name}}
              </td>
              <td>
                {{$singleProject->description}}
              </td>
              <td>
                {{$singleProject->github_link}}
              </td>
              <td>
                {{$singleProject->languages}}
              </td>
              <td>
                {{$singleProject->name}}
              </td>
              <td>
                <a href="{{route('admin.projects.show', $singleProject->id)}}"><i class="fa-regular fa-file"></i></a>
              </td>
            </tr>
            @endforeach
        
        </tbody>
      </table>


        <a href="{{route('admin.projects.create')}}">Aggiungi un nuovo progetto</a> 
</div>
@endsection