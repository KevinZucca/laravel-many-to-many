@extends('layouts/app')

@section('content')


<div class="container mt-5">
    <form action="{{route('admin.types.update', $type)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <label for="title">Nome Tipologia</label>
          <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="formGroupExampleInput" placeholder=" " value="{{old('name') ? : $type->name}}">
          @error('name')

          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-group mt-3">
          <label for="description">Descrizione</label>
          <input type="text" name="description" class="form-control @error ('description') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Descrivi il tuo progetto" value="{{old('description') ? : $type->description}}">
          @error('description')

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
            <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Vuoi davvero eliminare definitivamente questa tipologia?</h5>
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