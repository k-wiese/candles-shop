<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CaA | @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        @livewireStyles
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('img/site.webmanifest')}}">
    </head>
    <body class="bg-color">

    @livewire('navbar')

    @yield('content')

    <div class="container text-md-center text-sm-center px-4">
        <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-info">&copy; 2022 Candles and Art</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
      
          <ul class="nav col-md-4 justify-content-center ">
            <li class="nav-item"><a href="{{  (url('/'))  }}" class="nav-link px-2 text-info">Home</a></li>
            <li class="nav-item"><a href="{{  (url('/shop'))  }}" class="nav-link px-2 text-info">Shop</a></li>
            <li class="nav-item"><a href="{{  (url('/contact'))  }}" class="nav-link px-2 text-info">Contact</a></li>
          </ul>
        </footer>
      </div>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    @livewireScripts
    </body>
</html>
