<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- TomTom -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm">
            <div class="container">
             
                <a href="{{route('home')}}" class="d-flex">
                    <div class="container-logo">
                        <img class="logo" src="../images/finalmente-png.png" alt="picture logo BoolBnB" >

                    </div>
                    <h4 class="text-nav">BoolBnB</h4>
               </a> 
              
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="global-icon">
                            <i class="fas fa-globe"></i>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('apartment.create') }}">{{ __('Diventa un host') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="auth-text">{{ Auth::user()->name }}</span>
                                    
                                    <img class="img-user" src="{{ Auth::user()->img }}" alt="picture of {{ Auth::user()->name }}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main>
            @yield('content')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>
    
    <!-- TomTom -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js"></script>

</body>
</html>
<style>
     .text-nav{
    color:#094b65;
    font-weight:800;
    font-size: 25px;
    padding-left:10px;
    padding-top: 15px;
}

.container-logo img{
    width: 100%;
    height: 40px;
}

.global-icon{
    margin-top: 10px;
}
nav{
    color:#094b65;
}
.nav-item:hover{
    color:white;
    font-size: 16px;
}
a{
    text-decoration: beige;
}
.auth-text{
    color:#094b65;
}
a{
    color:#094b65;
}


</style>
