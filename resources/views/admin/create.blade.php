@extends('layouts/app')

@section('content')

<div class="container mt-5">
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Nome progetto</label>
          <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Inserisci il nome del tuo progetto" value="" required>
        </div>

        @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <div class="form-group mt-3">
          <label for="img">Immagine</label>
          <input type="file" name="img" class="form-control @error ('img') is-invalid @enderror" id="img" placeholder="Inserisci un'immagine" value="">
        </div>

        @error('img')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <div class="form-group mt-3">
          <label for="description">Descrizione</label>
          <input type="text" name="description" class="form-control @error ('description') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Descrivi il tuo progetto" value="" required>
        </div>

        @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <div class="form-group mt-3">
          <label for="type_id">Tipologia</label>
          <select name="type_id" id="type_id" class="form-select">
            <option value="">Nessun tipo</option>

            @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach

          </select> 
        </div>


      <div class="form-group mt-3 checkbox-container">
        @foreach ($technologies as $technology)
          <label for="{{$technology->id}}">{{$technology->name}}</label>
          <input id="{{$technology->id}}" type="checkbox" name="technologies[]" value="{{$technology->id}}" @checked(in_array($technology->id, old('technologies', [])))>
        @endforeach
      </div>
    
       
        
        <div class="form-group mt-3">
            <label for="github_link">Link di Github</label>
            <input type="text" name="github_link" class="form-control @error ('github_link') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Allega qui il link di Github" value="" required>
        </div>

        @error('github_link')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <button class="btn btn-primary mt-3" type="submit">Salva</button>

      </form>
</div>

@endsection