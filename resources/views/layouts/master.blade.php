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
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/master.css') }}">

    <!-- Custom styles for this template -->
    @yield('custom-css')
    <style>
      body{
        font-family: 'Quicksand', sans-serif;
        background: url('{{ asset('images/background/bcg.png') }}');
        background-blend-mode: screen;
      } 
      .myalert{
        position: fixed;
        top: 25px;
        left: 25%;
        width: 50%;
        z-index: 10000;
      }
      .cart-ico{
        position: relative;
        margin-right: 2rem
      }
      .amount-items{
        position: absolute;
        padding: 3px;
        background: red;
        top: -4px;
        right: -36px;
        font-size: 14px;
        width: 32px;
        min-height: 18px;
        text-align: center;
        border-radius: 6px;
        font-weight: bold;
        animation: bigger .8s ease infinite;
      }

      @keyframes bigger{
        0%{
          transform: scale(1)
        }
        50%{
          transform: scale(.8)
        }
        100%{
          transform: scale(1)
        }
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
      
      @media (max-width: 768px){
        .blank-page{
          font-size: 25px
        }
        .alert{
          width: 90%
        }
        .myalert{
          left: 5%
        }
      }
    </style>
    
  </head>

  <body>
    <header>
      
    <!-- Flash Message -->
    @if(Session::has('message'))
      <div id="alert">
        <div class="alert alert-success animated fadeInDown myalert">
          <div class="h3 text-center">{{ session()->get('message') }}</div>
        </div>
      </div>
    @endif
    
    <!-- Navigation Bar -->
    @include('layouts.navbar')

    <!-- Pop up untuk shopping cart -->
    @include('layouts.cart-popup')
    
    </header>
    
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
    <script>
        window.sr = ScrollReveal({ reset: true });

        // Custom Settings

        sr.reveal('.seller-list', {
        scale: .8,
        duration: 2000
        });

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
