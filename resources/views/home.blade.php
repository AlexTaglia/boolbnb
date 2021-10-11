@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
    <div class="container-fluid">
     
      
      <img src="{{asset('img/airbnb.png')}}" alt="picture">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contatti</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chi siamo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             News
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
      </form>
      <button type="button" class="btn btn-outline-danger">Accedi</button>
    </div>
  </nav>
<div class="container">
    <div class="row justify-content-center">


        @foreach ($allApartments as $apartment)
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-header">
                    
                      <h3>
                        {{ $apartment->title}}
                     </h3> 
                    </div>

                    <div class="card-body">
                        <a href="{{ route('apartment.show', $apartment)}}">
                            <img class="img-fluid" src=" {{ $apartment->img}}" alt="{{ $apartment->title}}">
                        </a>
                        {{-- <h5>
                            {{ $apartment->n_beedroom}} 
                        </h5> --}}
                        
                       <h5>
                        {{ $apartment->n_beds}} camera da letto
                      </h5> 

                      <h5>
                        {{ $apartment->n_bathrooms}} bagno
                      </h5>
                       <h5>
                        {{ $apartment->square_meters}} mq
                       </h5>
                       <h5>
                        Indirizzo: {{ $apartment->address}}
                       </h5>
                        
                        <h5>
                            Prezzo a notte:
                            <strong>
                                € {{ $apartment->price_per_night}}     
                            </strong>
                            
                        </h5>
                        
                    </div>

                    <div class="buttons">
                        <a href="{{ route('apartment.show', $apartment) }}">
                            <button class="btn btn-warning">
                                <i class="bi bi-zoom-in"></i>
                            </button>
                        </a>
    
                        <a href="{{ route('apartment.edit', $apartment) }}">
                        <button  class="btn btn-success">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        </a>
                        
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
        <div>
            {!! $allApartments->links()!!}
        </div>
    </div>

</div>
@endsection
<style>
    nav img{
        width:150px;
    }
    nav{
        margin-bottom: 30px;
    }
    .buttons{
        display: flex;
        justify-content: center;
    }
    .container{
       
    }
</style>
