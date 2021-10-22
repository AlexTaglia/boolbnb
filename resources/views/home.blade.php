@extends('layouts.app')

@section('content')

<header id="header">
  
</header>
<div class="container-bg">
  <div class="body-cont">
      <h2 id="text"><span>It's a time for a new</span><br>Adventure</h2>
      <img src="../images/bird1.png"  id="bird1">
      <img src="../images/bird2.png"  id="bird2">
      <img src="../images/forest.png"  id="forest">
      <a href="{{route('search')}}" id="btn">Explore</a>
      <img src="../images/rocks.png"  id="rocks">
      <img src="../images/water.png"  id="water">
  </div>
  <div class="sec">
    
    <div class="container explore-cities mb-4">
      <div class="row">
        <div class="col-12">
          <h1>In evidenza</h1>
        </div>
      </div>
      <div class="row">
        {{-- mettere i margini --}}
        @foreach ($visibleApartments as $apartment)

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 card-home" >
          <a href="{{ route('apartment.show', $apartment->apartment_id)}}">
            <div class="cont-card-home">
              
              <img  src="{{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
            </div>
          </a>
      
        </div>
        @endforeach
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Ispirazione per viaggi futuri</h1>
        </div>
      </div>
      <div class="row ">
        @foreach ($allApartments as $apartment)
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">

            <div class="card mb-3 ">

              <div class="card-header">
                <h4>
                  {{ $apartment->title}}
                </h4> 
              </div>

               <div class="card-image">
                <a href="{{ route('apartment.show', $apartment)}}">
                  <img  src="{{ asset('storage/' . $apartment->img) }}" alt="{{ $apartment->title}}">
                </a>
                     
               </div>
              <div class="card-body">
                <h5>
                  <i class="bi bi-house-fill"></i>  N.di stanze: <strong>{{ $apartment->n_beedroom}}</strong> 
                </h5> 
                <h5>
                  <i class="bi bi-layout-sidebar-reverse"></i> Camera da letto: <strong>{{ $apartment->n_beds}}</strong> 
                </h5> 

                <h5>
                  <i class="bi bi-vr"></i> Numero di Bagni: <strong>{{ $apartment->n_bathrooms}}</strong>
                </h5>
                <h5>
                  <i class="bi bi-app-indicator"></i> Metri quadrati: <strong>{{ $apartment->square_meters}}</strong>
                </h5>
                <h5>
                  <i class="bi bi-geo-alt"></i> Indirizzo: <strong>{{ $apartment->address}}</strong>
                </h5>
                <h5>
                <i class="bi bi-moon-stars-fill"></i>  Prezzo a notte: <strong>  € {{ $apartment->price_per_night}} </strong>
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
  </div>
</div>

@endsection

<script>
  
  document.addEventListener('scroll', function(){

    var value = window.scrollY;

    text.style.top = 30 + value * -0.5 + '%';
    bird1.style.top = value * -1.5 + 'px';
    bird1.style.left = value * 2 + 'px';
    bird2.style.top = value * -1.5 + 'px';
    bird2.style.left = value * -5 + 'px';
    btn.style.marginTop = value * 1.5 + 'px';
    rocks.style.top = value * -0.12 + 'px';
    forest.style.top = value * 0.25 + 'px';
    header.style.top = value * 0.5 + 'px'


  })
</script>

<style>
  .card-header{
    height:70px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px!important;
    margin-bottom: 5px!important;
  }
 
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
  .cont-card-home{
    height: 150px;
    margin-bottom: 30px;
  }
  .cont-card-home img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 15px;
  }
  .card-image{
    height: 200px;
  }
  .card-image img{
    height: 100%;
    border-radius: 15px;
  }
  .card-body{
    height: 250px;
  }
 
  input[type="text"]{
 
  background-color : white; 
 
 }
 h1{
   color:black;
 }
 .search-box{
   padding-top: 250px;
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
 

