@extends('layouts.app')


@section('content')

<div class="container" id="bg-create">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5 pt-2">
        
                <form class="mt-5" action="{{route('apartment.store')}}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <input class="form-control" type="text" name="title" id="title" maxlength="255" required autocomplete="title" autofocus>
                        <label class="lable-control" for="title">Titolo</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="number" name="n_beedroom" id="n_beedroom" required autofocus>
                        <label class="lable-control" for="n_beedroom">Numero di Stanze</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="number" name="n_beds" id="n_beds" required autocomplete="n_beds" autofocus>
                        <label class="lable-control" for="n_beds">Numero di Letti</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="number" name="n_bathrooms" id="n_bathrooms" required autocomplete="n_bathrooms" autofocus>
                        <label class="lable-control" for="n_bathrooms">Numero di Bagni</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="number" name="square_meters" id="square_meters" required autocomplete="square_meters" autofocus>
                        <label class="lable-control" for="square_meters">Metri Quadri</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="text" name="address" id="address" required autocomplete="address" autofocus>
                        <label class="lable-control" for="address">Indirizzo</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="text" name="lat" id="lat" required autocomplete="lat" autofocus>
                        <label class="lable-control" for="lat">Latitudine</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="text" name="long" id="long" required autocomplete="long" autofocus>
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
                        <input class="form-control-file form-control" type="file" name="img" id="img">
                        <label class="lable-control" for="img"></label>
                    </div>
        
                    <div class="form-check mb-4">
                        <input name="visible" type="checkbox" class="" id="visible">
                        <label class="form-check-label" for="visible" checked="true">Visible</label>
                    </div>
        
                    <div class="form-group mb-4">
                        <input class="form-control" type="number" name="price_per_night" id="price_per_night" required autocomplete="price_per_night" autofocus>
                        <label class="lable-control" for="price_per_night">Prezzo</label>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="description">Descrizione</label>
                        <input class="form-control" type="text" name="description" id="description" value="{{ old('description') }}">
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
</div>

@endsection