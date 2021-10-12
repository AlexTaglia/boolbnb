@extends('layouts.app')


@section('content')
<div class="container">
    <div class="mt-5 pt-2">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{route('apartment.store')}}" method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="title">Titolo:</label>
                <input class="form-control" type="text" name="title" id="title" maxlength="255" value="{{ old('title') }}">
            </div>

            <div class="form-group mb-4">
                <label for="n_beedroom">Numero di stanze:</label>
                <input class="form-control" type="number" name="n_beedroom" id="n_beedroom" value="{{ old('n_beedroom') }}">
            </div>

            <div class="form-group mb-4">
                <label for="n_beds">Numero di letti:</label>
                <input class="form-control" type="number" name="n_beds" id="n_beds" value="{{ old('n_beds') }}">
            </div>

            <div class="form-group mb-4">
                <label for="n_bathrooms">Numero di bagni:</label>
                <input class="form-control" type="number" name="n_bathrooms" id="n_bathrooms" value="{{ old('n_bathrooms') }}">
            </div>

            <div class="form-group mb-4">
                <label for="square_meters">Metri quadrati:</label>
                <input class="form-control" type="number" name="square_meters" id="square_meters" value="{{ old('square_meters') }}">
            </div>

            <div class="form-group mb-4">
                <label for="address">Indirizzo</label>
                <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
            </div>

            <div class="form-group mb-4">
                <label for="lat">Latitudine</label>
                <input class="form-control" type="text" name="lat" id="lat" value="{{ old('lat') }}">
            </div>

            <div class="form-group mb-4">
                <label for="long">Longitudine</label>
                <input class="form-control" type="text" name="long" id="long" value="{{ old('long') }}">
            </div>

            <p>aggiungi i servizi:</p>
            <div class="form-group row mb-4">
                @foreach($services as $service)
                    <div class="col-3">
                        <input name="services[]" type="checkbox" value="{{ $service->id }}">
                        <label>{{$service->name}}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group mb-4">
                <label for="img">Immagine:</label>
                <input class="form-control-file" type="file" name="img" id="img">
            </div>

            <div class="form-check mb-4">
                <input name="visible" type="checkbox" class="" id="visible">
                <label class="form-check-label" for="visible" checked="true">Visible</label>
            </div>

            <div class="form-group mb-4">
                <label for="price_per_night">Prezzo</label>
                <input class="form-control" type="number" name="price_per_night" id="price_per_night" value="{{ old('price_per_night') }}">
            </div>

            <div class="form-group mb-4">
                <label for="description">Descrizione</label>
                <input class="form-control" type="text" name="description" id="description" value="{{ old('description') }}">
            </div>

            <div class="form-group pb-4">
                <input type="submit" value="Salva">
            </div>


        </form>

    </div>
</div>

@endsection