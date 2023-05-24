@extends('layouts/app')

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Dettagli</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
            <tr>
              <th scope="row">{{$technology->id}}</th>
              <td>
                {{$technology->name}}
              </td> 
       
              <td>
                <a href="{{route('admin.technologies.show', $technology->id)}}"><i class="fa-regular fa-file"></i></a>
              </td>
            </tr>
            @endforeach
        
        </tbody>
      </table>


        <a href="{{route('admin.technologies.create', $technology)}}">Aggiungi una nuova tecnologia</a> 
</div>
@endsection