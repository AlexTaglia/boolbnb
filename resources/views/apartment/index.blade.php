@extends('layouts.app')

@section('content')

<div class="container index">
  <h2>I miei appartmenti:</h2>
  <div class="mb-2">
    <a href="{{ route('apartment.create') }}">
      <button class="btn">
        <i class="bi bi-plus-circle"></i>
        <span>Aggiungi appartamento</span>
      </button>
    </a>
  </div>

  <table class="table">

    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Immagine</th>
        <th scope="col">Titolo</th>
        <th scope="col">Stanze</th>
        <th scope="col">Letti</th>
        <th scope="col">Bagni</th>
        <th scope="col">Metri quadrati</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Prezzo per notte</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($user->apartment as $apartment)
      <tr>
        <th scope="row">{{ $apartment->id}}</th>
        <td>
          <img class="img-fluid" src=" {{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
        </td>
        <td>{{ $apartment->title}}</td>
        <td>{{ $apartment->n_beedroom}}</td>
        <td>{{ $apartment->n_beds}}</td>
        <td>{{ $apartment->n_bathrooms}}</td>
        <td>{{ $apartment->square_meters}}</td>
        <td>{{ $apartment->address}}</td>
        <td>{{ $apartment->price_per_night}}</td>
        <td>
          <div class="buttons d-flex">
            <!-- Show -->
            <a href="{{ route('apartment.show', $apartment) }}">
                <button class="btn">
                    <i class="bi bi-zoom-in"></i>
                </button>
            </a>

            <!-- Edit -->
            <a href="{{ route('apartment.edit', $apartment) }}">
            <button  class="btn">
                <i class="bi bi-pencil-square"></i>
            </button>
            </a>
            
            <!-- delete -->
            <form action="{{ route('apartment.destroy', $apartment) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">
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
@endsection
