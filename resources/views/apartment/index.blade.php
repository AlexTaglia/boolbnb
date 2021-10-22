@extends('layouts.app')

@section('content')
<div class="bg-cont">

  <div class="container bg-index">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row justify-content-between p-4">
  
          <h2>I miei appartamenti:</h2>
          <div class="mb-2">
            <a href="{{ route('apartment.create') }}">
              <button class="btn-index">
                <i class="bi bi-arrow-right-square">Add Appartment</i>
              </button>
            </a>
          </div>
        </div>
      
        <table class="table">
      
          <thead>
            <tr>
              <th scope="col">Immagine</th>
              <th scope="col">Titolo</th>
              <th class="d-none d-md-table-cell" scope="col">Stanze</th>
              <th class="d-none d-md-table-cell" scope="col">Letti</th>
              <th class="d-none d-md-table-cell" scope="col">Bagni</th>
              <th class="d-none d-lg-table-cell" scope="col">Metri quadrati</th>
              <th class="d-none d-md-table-cell" scope="col">Indirizzo</th>
              <th class="d-none d-md-table-cell" scope="col">Prezzo /notte</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
      
          <tbody>
          @foreach ($user->apartment as $apartment)
            <tr class="cont-table">
              
              <td>
                <!-- <img class="img-fluid" src=" {{ $apartment->img }}" alt="{{ $apartment->title}}"> -->
                <img class="img-fluid" src=" {{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">

              </td>
              <td>{{ $apartment->title}}</td>
              <td class="d-none d-md-table-cell">{{ $apartment->n_beedroom}}</td>
              <td class="d-none d-md-table-cell">{{ $apartment->n_beds}}</td>
              <td class="d-none d-md-table-cell">{{ $apartment->n_bathrooms}}</td>
              <td class="d-none d-lg-table-cell">{{ $apartment->square_meters}}</td>
              <td class="d-none d-md-table-cell">{{ $apartment->address}}</td>
              <td class="d-none d-md-table-cell">{{ $apartment->price_per_night}}</td>
              <td>
                <div class="buttons d-flex">
                  <!-- Show -->
                  <a href="{{ route('apartment.show', $apartment) }}">
                      <button class="btn btn-success">
                          <i class="bi bi-zoom-in"></i>
                      </button>
                  </a>
      
                  <!-- Edit -->
                  <a href="{{ route('apartment.edit', $apartment) }}">
                    <button  class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                  </a>
                  
                  <!-- delete -->
                  <form action="{{ route('apartment.destroy', $apartment) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                          <i class="bi bi-trash"></i>
                      </button>
                  </form>
      
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
      
        </table>
  
      </div>
  
    </div>
  
  </div>
</div>
@endsection
