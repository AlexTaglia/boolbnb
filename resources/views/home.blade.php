@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        @foreach ($user->apartment as $apartment)
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $apartment->user_id}}
                        {{ $apartment->title}}
                    </div>

                    <div class="card-body">
                        {{ $apartment->n_beedroom}}
                        {{ $apartment->n_beds}}
                        {{ $apartment->n_bathrooms}}
                        {{ $apartment->square_meters}}
                        {{ $apartment->adress}}
                        <a href="{{ route('apartment.show', $apartment)}}">
                            <img class="img-fluid" src=" {{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
                        </a>
                        {{ $apartment->price_per_night}}      
                    </div>

                    <div>
                        <form action="{{ route('apartment.destroy', $apartment) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </div>
                    <div>
                        
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
