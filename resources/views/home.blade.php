@extends('layouts.app')

@section('content')
<div class="home-container-fluid">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 info-covid-box d-flex align-items-center justify-content-center ">
        <a href="http://www.viaggiaresicuri.it/">
          <h5>Scopri le informazioni più recenti sulla nostra risposta all'emergenza COVID-19</h5>
        </a>
      </div>
    </div>
  </div>
      <header class="container">

        <div class="row">
          <form class="col-md-12 col-lg-12 form-container">
            <div class="input-container">
              <input type="text" class="where-togo" placeholder="Dove vuoi andare? ">
            
            </div>
            <div class="input-second-container">
                <input type="text" class="date" placeholder="Check-in - Check-out">
            </div>
            <div class="input-third-container">
              <input type="text" class="booked" placeholder="2 adulti - 0 bambini ">
          </div>
          <div class="input-fourth-container">
             <button class="btn-search">
              
              Cerca
            </button>
          </div>
       </form>

        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center header-text">
            <h4>Non sai dove andare? Nessun problema!</h4>
            <a href="">
              <button>
                <span>Sono flessibile</span>
              </button>
            </a>
            
          </div>
        </div>
      </header>
   
</div>



@endsection

@section('prova-text')

<div class="container explore-cities">
  <div class="row">
    <div class="col-12">
      <h1>Esplora i dintorni</h1>
    </div>
  </div>

  <div class="row">
    @foreach ($visibleApartments as  $apartment)

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 card" >
    
        <a href="{{ route('apartment.show', $apartment)}}">
          <img src="{{ $apartment->img }}" alt="{{ $apartment->title}}">
        </a>
       
    
    </div>
    
      
    @endforeach
   
    
  </div>
  

</div>
@endsection

@section('ciccio')
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
                        <img src="{{ $apartment->img }}" alt="{{ $apartment->title}}">
                      </a>
                      
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

 
 .info-covid-box{
   height: 70px;
   background-color: rgb(88, 85, 85);
 }
 /* .home-container-fluid{
   
    height: 1000px;
 } */
  .home-container-fluid{
    width:100%;
    height: 1000px;
    background: url(../img/airbnb-original.jpeg) no-repeat center;
    background-size:cover;
    
   
  }
.header-text h4{
  font-size:30px;
  font-weight: bold;
}
.header-text{
  padding-top: 200px;
}
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
  .form-container{
  display: flex;
  background-color:#f5f5f5;
  border-radius: 100px;
  border: 1px solid white;
  cursor: pointer;
}
input:focus{
outline: none;
}
.explore-cities{

color:black;
}
.form-container input, .form-container button  {

  height:50px;
}
.form-container button {
width: 180px;
border:none;
}

input.{
cursor: pointer;
}
.input-container input{
 width: 300px; 

 border:none;
 border-right: 1px solid black;
 background: url(../img/bed.png) no-repeat;
 padding-left: 35px;

 background-size: 25px 25px;  
 background-position: 3px 10px;


}
.input-second-container input{
  width: 260px;
  background: url(../img/calendario.png) no-repeat;
  padding-left: 35px;

  background-size: 25px 25px;  

  background-position: 3px 10px;
  border:none;
  border-right: 1px solid black;
}
.input-third-container input{
  width:350px;
  background: url(../img/utente.png) no-repeat;
  padding-left: 35px;

  background-size: 25px 25px;  

  background-position: 3px 10px;
  border:none;
  border-right: 1px solid black;
}

header .header-text button{
  width:250px;
  height:60px;
  border-radius:100px;
  background-color: white;
  color:rgb(250, 90, 189);
  font-size: 20px;
  font-weight:800;
}

input:hover{
background-color:#e9e0e0;
}
.cities-container img{


width:200px;
}

.img-box{
padding-bottom: 15px;
}
.text-box{
padding: 15px;
}
.cities-container{
display: flex;
align-items: center;
}
.section-struttura{
  display: flex;
  flex-direction: row;
  color:black;
}

@media all and (max-width: 992px){
form{
display: flex;
flex-direction:column;
align-items:center;
  }
  input{
    border:none;
  }
}
.card img{
  width:100%;
}
.card{
  padding: 15px;
}
</style>

