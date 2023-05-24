@extends('layouts/app')

@section('content')


<div class="container mt-5">
    <form action="{{route('admin.projects.update', $project->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <label for="title">Nome progetto</label>
          <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Inserisci il nome del tuo progetto" value="{{old('name') ? : $project->name}}">
          @error('name')

          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-group mt-3">
          <label for="description">Descrizione</label>
          <input type="text" name="description" class="form-control @error ('description') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Descrivi il tuo progetto" value="{{old('description') ? : $project->description}}">
          @error('description')

          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-group mt-3">
            <label for="type_id">Tipologia</label>
            <select name="type_id" id="type_id" class="form-select">
              <option value="">Nessun tipo</option>
  
              @foreach ($types as $type)
                  <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
              @endforeach
  
            </select> 
        </div>

        <div class="form-group mt-3">
            <label for="languages">Linguaggi di programmazione</label>
            <input type="text" name="languages" class="form-control @error ('languages') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Inserisci i linguaggi che hai utilizzato" value="{{old('languages') ? : $project->languages}}">
            @error('languages')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group mt-3">
            <label for="github_link">Link di Github</label>
            <input type="text" name="github_link" class="form-control @error ('github_link') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Allega qui il link di Github" value="{{old('github_link') ? : $project->github_link}}">
            @error('github_link')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div id="edit-buttons-container">
            <button class="btn btn-primary mt-3" type="submit">Salva</button>
    
            <button type="button" class="btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-trash" style="color: #cb2a2a;"></i>
            </button>
        </div>

      </form>

        
        
        <div class="modal-footer">
            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Vuoi davvero eliminare definitivamente questo progetto?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annulla</button>
                                <button type="submit" class="btn btn-danger">Conferma</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
</div>


@endsection