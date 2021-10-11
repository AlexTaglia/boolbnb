@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">
           
                <div class="card">
                    <div class="card-header">
                        <div>
                            titolo: {{ $apartment->title}}
                        </div>
                    </div>

                    <div class="card-body">
                        <img class="img-fluid" src=" {{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
                        <div>
                            N.di stanze: {{ $apartment->n_beedroom}}
                        </div>
                        <div>
                            N.di letti: {{ $apartment->n_beds}}
                        </div>
                        <div>
                            Numero di Bagni: {{ $apartment->n_bathrooms}}
                        </div>
                        <div>
                            Metri quadrati: {{ $apartment->square_meters}}
                        </div>

                        <div>
                            indirizzo: {{ $apartment->address}}
                        </div>
                                              
                        
                        <div>
                            Prezzo a notte:{{ $apartment->price_per_night}} 
                        </div>
                        <div>
                            <ul> Servizi:
                                @foreach ($apartment->service as $service)
                                <li>
                                    {{$service->name}}
                                </li>
                                @endforeach
                            </ul>
                        </div> 
                        <div>
                            <ul> Messaggi:
                                @foreach($apartment->message as $message)
                                <li>
                                    {{$message->text}}
                                </li>
                                @endforeach
                            </ul>   
                        </div>     
                        <div>
                            <ul> Sponsor:
                                @foreach($apartment->sponsor as $sponsor)
                                <li>
                                    {{$sponsor->name}}
                                </li>
                                @endforeach
                            </ul>   
                        </div>           
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection