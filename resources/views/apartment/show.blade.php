@extends('layouts.app')

@section('content')
<div class="container bg-show">

    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class=" justify-content-between p-3">
                
                <h1 class="p-2">{{ $apartment->title}}</h1>
                <div class=" d-flex justify-content-between apartment-container-img">
                <div class="row img-map">
                    <div class="col-6">
                    <img class="img-fluid" src="{{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
                        <!-- <img class="img-fluid" src="{{ $apartment->img }}" alt="{{ $apartment->title}}"> -->
                    </div>
             
                    <div class="col-6">
                        <map-component :apartment="{{ $apartment }}"></map-component>
                    </div>
                </div>
            </div>            
            <h3>Descrizione</h3>
                        <div class='row'>
                            <p>{{ $apartment->description}}</p>
                        </div>   
                        
                        <hr>
                        <div>
                            <ul> Sponsor:
                                @foreach($apartment->sponsor as $sponsor)
                                <li>
                                    {{$sponsor->name}}
                                </li>
                                @endforeach
                            </ul>   
                        </div> 
                        
                        
                        <div class="row cont-description">
                            <h3  class="p-4 col-md-12">Descrizione Appartamento</h3>
                            <div class="col-md-6">
                                <ul>
                        <li>
                            <i class="bi bi-house-fill"></i>  N.di stanze: {{ $apartment->n_beedroom}}
                        </li>
                        <li>
                            <i class="bi bi-layout-sidebar-reverse"></i> N.di letti: {{ $apartment->n_beds}}
                        </li>
                        <li>
                           <i class="bi bi-vr"></i>  Numero di Bagni: {{ $apartment->n_bathrooms}}
                        </li>
                        <li>
                            <i class="bi bi-app-indicator"></i> Metri quadrati: {{ $apartment->square_meters}}
                        </li>
                    </ul>
                 </div>
             
                <div class="col-md-6">
                    <ul>
                        <li>
                            <i class="bi bi-geo-alt"></i> Indirizzo: {{ $apartment->address}}
                        </li>
                        <li>
                           <i class="bi bi-moon-stars-fill"></i>  Prezzo a notte: {{ $apartment->price_per_night}} 
                        </li>
                    </ul>
                </div>
            </div>     
            <div class='row cont-description'>
                <h3 class="p-4 col-md-12">Servizi</h3>
                <div  class="col-md-6">
                    <ul>
                        @foreach ($apartment->service as $service)
                        <li>
                            {{$service->name}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>   
            <div>
                @foreach ($apartment->message as $messag )
                <div>
                    <div> {{$messag->sender_name}} -> {{$messag->email}}</div>
                    
                    <p> {{$messag->text}} <a href="#"><i class="bi bi-skip-end"> Rispondi</i></a> </p>
                    
                    <hr>
                </div>
                @endforeach
            </div>
            <div>Aggiungi sponsorizzazione:
                @foreach($sponsors as $sponsor)
                <div>
                    <a href="{{ route('payment.process', [$sponsor->id, $apartment->id])}}">
                        <span>
                            {{$sponsor->name}} - 
                        </span>
                        <span>
                            € {{$sponsor->price}} - 
                        </span>
                        <span>
                            gg {{$sponsor->duration}}
                        </span>
                    </a>    
                </div>
                @endforeach
            </div>

        </div>
        
    </div>
</div>
@endsection