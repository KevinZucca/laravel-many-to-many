@extends('layouts/app')

@section('content')

<div class="container mt-5">
    <form action="{{route('admin.types.store')}}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Nome Tipologia</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Inserisci il nome della tipologia" value="" required>
        </div>

        <div class="form-group mt-3">
          <label for="description">Descrizione</label>
          <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Descrivi la tipologia" value="" required>
        </div>

        <button class="btn btn-primary mt-3" type="submit">Salva</button>

      </form>
</div>

@endsection