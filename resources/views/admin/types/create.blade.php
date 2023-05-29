@extends('layouts/app')

@section('content')

<div class="container mt-5">
    <form action="{{route('admin.types.store')}}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Nome Tipologia</label>
          <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Inserisci il nome della tipologia" value="" required>
        </div>

        @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <div class="form-group mt-3">
          <label for="description">Descrizione</label>
          <input type="text" name="description" class="form-control @error ('description') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Descrivi la tipologia" value="" required>
        </div>

        @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <button class="btn btn-primary mt-3" type="submit">Salva</button>

      </form>
</div>

@endsection