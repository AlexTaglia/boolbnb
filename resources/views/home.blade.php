@extends('layouts.app')

@section('content')
<div class="prova-bg">
<div class="home-container-fluid">

      <header class="container">
        
        <div class="row">
          <div class="col-12 text-center search-box">
           <input type="text" placeholder="Dove vuoi andare?">

           <a href="{{ route('search')}}"><button><i class="fas fa-search"></i></button></a>
           
          </div>
       </div>     

     {{-- <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center header-text">
         <h4>Non sai dove andare? Nessun problema!</h4>
         <a href="">
           <button>
             <span>Sono flessibile</span>
           </button>
         </a>
         
       </div>
     </div> --}}
       
      </header>
   
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
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
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

  input{
    width: 500px;
    height:50px;
    background-color: white;
    background: url(../img/bed.png) no-repeat;
    padding-left: 45px;
    background-size: 25px 25px;  
    background-position: 12px 10px;
    border-radius:100px;
    
  }
  input[type="text"]{
 
 background-color : white; 
 
 }
 h1{
   color:black;
 }
 .search-box{
   padding-top: 200px;
 }
  .search-box button{
     height:50px;
     width:50px;
     border-radius: 50%;
     background-color: rgb(255,90,96);
     color:white;
     border:none;
    
  }
.nav li a{
  color:white;
}
.hover:hover{
  border-bottom: 1px solid black;
  opacity: 0.7;
  font-size: 17px;
  font-weight:bold;
}
 
  
  i{
    font-size: 20px;
  }
  .info-covid-box{
    height: 50px;
    background-color: rgb(88, 85, 85);
    color:grey;
  }
  
  
   .home-container-fluid{
     height: 80vh;
     background: url(../img/airbnb-original.jpeg) no-repeat;
     background-position: bottom;
     background-size:cover;
     
    
   }
 .header-text h4{
   font-size:30px;
   font-weight: bold;
 }
 .header-text{
   padding-top: 50px;
 }


   .buttons{
       display: flex;
       justify-content: center;
   }
 
 input:focus{
 outline: none;
 }
 .explore-cities{
 
 color:black;
 }
 
 a h6{
  color:rgb(187, 178, 178) ;
}

a:hover, a:visited, a:link, a:active
{
  text-decoration: none!important;

-webkit-box-shadow: none!important;
box-shadow: none!important;
}
 header .header-text button{
   width:250px;
   height:60px;
   border-radius:100px;
   background-color: white;
   color: rgb(255,90,96);
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
 
 .card img{
   width:100%;
 }
 .card{
   padding: 15px;
 }
 a h5{
   color:rgb(187, 178, 178) ;
 }
 
 a:hover, a:visited, a:link, a:active
 {
   text-decoration: none!important;
 -webkit-box-shadow: none!important;
 box-shadow: none!important;
 }
  input{
   border:none;
 }
 
 @media all and (max-width: 992px){
 form{
 display: flex;
 flex-direction:column;
 align-items:center;
   }
  .search-box input{
   width:250px;
  }
 }
 
 </style>
 

