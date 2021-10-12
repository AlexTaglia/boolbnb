@extends('layouts.app')


@section('content')
<div class="container" id="bg-create">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form class="mt-5" action="{{route('apartment.update', $apartment)}}" method='post' enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="form-group mb-4">
                    <input class="form-control" type="text" name="title" id="title" maxlength="255" value="{{ $apartment->title }}" required >
                    <label class="lable-control" for="title">Titolo</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="n_beedroom" id="n_beedroom" value="{{ $apartment->n_beedroom }}" required >
                    <label class="lable-control" for="n_beedroom">Numero di Stanze</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="n_beds" id="n_beds" value="{{ $apartment->n_beds }}" required >
                    <label class="lable-control" for="n_beds">Numero di Letti</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="n_bathrooms" id="n_bathrooms" value="{{ $apartment->n_bathrooms }}" required >
                    <label class="lable-control" for="n_bathrooms">Numero di Bagni</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="square_meters" id="square_meters" value="{{ $apartment->square_meters }}" required >
                    <label class="lable-control" for="square_meters">Metri Quadri</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="text" name="address" id="address" value="{{ $apartment->address }}" required >
                    <label class="lable-control" for="address">Indirizzo</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="lat" id="lat" value="{{ $apartment->lat }}" required >
                    <label class="lable-control" for="lat">Latitudine</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="long" id="long" value="{{ $apartment->long }}" required >
                    <label class="lable-control" for="long">Longitudine</label>
                </div>
    
                <p>Aggiungi i Servizi:</p>
                <div class="form-group row mb-4">
                    @foreach($services as $service)
                        <div class="col-3">
                            <input name="services[]" type="checkbox" value="{{ $service->id }}">
                            <label>{{$service->name}}</label>
                        </div>
                    @endforeach

                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="text" name="img" id="img" value="{{ $apartment->img }}" required >
                    <label class="lable-control" for="img">Immagine</label>
                </div>
    
                <div class="form-check mb-4">
                    <input name="visible" type="checkbox" class="" id="visible"  value="{{ $apartment->visible }}" >
                    <label class="form-check-label" for="visible">Visible</label>
                </div>
    
                <div class="form-group mb-4">
                    <input class="form-control" type="number" name="price_per_night" id="price_per_night" value="{{ $apartment->price_per_night }}" required >
                    <label class="lable-control" for="price_per_night">Prezzo</label>
                </div>
                
                <div class="form-group mb-4">
                    <label for="description">Descrizione</label>
                    <input class="form-control" rows="3" type="text" name="description" id="description" value="{{ $apartment->description }}">
                </div>
    
                <div class="form-group pb-4">
                    <button type="submit" value="Salva" class="btn btn-outline-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection