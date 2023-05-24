@extends('layouts/app')

@section('content')

<div class="container mt-5">
    <form action="{{route('admin.technologies.store')}}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Nome Tecnologia</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Inserisci il nome della tecnologia" value="" required>
        </div>
     
        <button class="btn btn-primary mt-3" type="submit">Salva</button>

      </form>
</div>

@endsection