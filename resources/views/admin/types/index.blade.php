@extends('layouts/app')

@section('content')

    <div class="container">
        <h1>Tipologie</h1>

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nome Tipologia</th>
                <th scope="col">Descrizione</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($types as $singleType)
                <tr>
                    <td>
                        {{$singleType->name}}
                    </td>
                    <td>
                        {{$singleType->description}}
                    </td>
                    <td>
                        <a href="{{route('admin.types.show', $singleType)}}">Mostra</a>
                    </td>
                </tr>
                @endforeach
            
            </tbody>
          </table>

          <a href="{{route('admin.types.create')}}">Crea una nuova tipologia</a>
    </div>

@endsection