@extends('layouts.app')

@section('content')
<div class="home-container-fluid">
      <div class="container">

        <div class="row">
          <form class="col-12 form-container">
            <div class="input-container">
              <input type="text" class="where-togo" placeholder="Dove vuoi andare? ">
            
            </div>
            <div class="input-second-container">
                <input type="text" class="date" placeholder="Check-in - Check-out">
            </div>
            <div class="input-third-container">
              <input type="text" class="booked" placeholder="2 adulti - 0 bambini - 0 camera">
          </div>
          <div class="input-fourth-container">
             <button class="btn-search">
              
              Cerca
            </button>
          </div>
       </form>

        </div>
      </div>
   
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
    <div class="col-3">
       
      <div class="cities-container">
          <div  class="img-box">
          <img src="./img/venezia.jpeg" alt="">
        </div>

        <div class="text-box">
           <h4>Venezia</h4>
           <h5>6 ore in auto</h5>
        </div>  

       </div>
      
      

    </div>
     
    <div class="col-3">
       
      <div class="cities-container">
         <div  class="img-box">
          <img src="./img/venezia.jpeg" alt="">
        </div>

        <div class="text-box">
           <h4>Venezia</h4>
           <h5>6 ore in auto</h5>
        </div>  

       </div>
      
      

    </div>

    <div class="col-3">
       
      <div class="cities-container">
        <div  class="img-box">
          <img src="./img/image10.jpeg" alt="">
        </div>

        <div class="text-box">
          <h4>Amalfi</h4>
          <h5>4 ore in auto</h5>
        </div>  
      </div>
      

    </div>

    <div class="col-3">
       
      <div class="cities-container">
        <div  class="img-box">
          <img src="./img/image7.jpeg" alt="">
        </div>

        <div class="text-box">
          <h4>Positano</h4>
          <h5>5 ore in auto</h5>
        </div>  
      </div>
      
    </div>


    <div class="col-3">
      <div class="cities-container">
        <div  class="img-box">
          <img src="./img/firenze.jpeg" alt="">
        </div>

        <div class="text-box">
          <h4>Firenze</h4>
          <h5>5 ore in auto</h5>
        </div>  
      </div>

    </div>
         
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
                          <img class="img-fluid" src=" {{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
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
  color:white;
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

</style>
