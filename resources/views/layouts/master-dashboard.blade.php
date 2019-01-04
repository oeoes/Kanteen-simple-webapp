<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('logo/bootstrap-solid.svg') }}">

    <title>@yield('title-bar')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <style>
        .home{
          position: fixed;
          bottom: 10px;
          left: 10px;
          cursor: pointer;
          background: white;
          border-radius: 100%;
          font-size: 37px;
          height: 60px;
          width: 60px;
          text-align: center;
        }
        a{
          color: green
        }
        .blank-page{
          background: rgba(255,255,255, .3);
          text-align: center;
          border-radius: 10px;
          padding: 2rem;
          min-height: 200px;
          border: 3px dashed rgba(128, 128, 128, .5);
          font-size: 55px;
          color: rgba(0,0,0,.3);
        }
    </style>
    @yield('custom-css')
    
  </head>

  <body>
    <header>
        <div class="wrap-nav">
          <a href="{{ route('home') }}" class="home shadow-lg animated zoomIn"><i class="fa fa-home"></i></a>
            <div class="wrap-ul">
              @include('layouts.menu-dashboard')
            </div>
        </div>  
    </header>
    
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
    <script>
        window.sr = ScrollReveal({ reset: true });

        // Custom Settings

        sr.reveal('.product-list', {
        scale: .8,
        duration: 2000
        });

        // ---------------------------
        alert = document.getElementById("alert");

        function dissapear()
        {
          alert.style.opacity += "0"
        }

        setTimeout(dissapear, 3500)
    </script>
  </body>

</html>
