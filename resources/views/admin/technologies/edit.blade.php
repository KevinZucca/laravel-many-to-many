@extends('layouts/app')

@section('content')


<div class="container mt-5">
    <form action="{{route('admin.technologies.update', $technology->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <label for="title">Nome tecnologia</label>
          <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Inserisci il nome della tecnologia" value="{{old('name') ? : $technology->name}}">
          @error('name')

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
            <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="POST">
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