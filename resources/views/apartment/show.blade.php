@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
           
                <div class="card">
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
                        <img class="img-fluid" src=" {{ $apartment->img}}" alt="{{ $apartment->title}}">
                        {{ $apartment->price_per_night}}             
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection