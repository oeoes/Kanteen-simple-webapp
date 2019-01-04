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
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <!-- Custom styles for this template -->
    @yield('custom-css')
    <style>
      body{
        font-family: 'Quicksand', sans-serif;
        background-blend-mode: screen;
      }
      .warning{
        position: relative
      }
      .warning-box{
        position: absolute;
        top: 80px;
        left: 0;
        width: 100%;
      }
      .warning-box li{
        font-size: 15px;
      }
    </style>
    
  </head>

  <body>
    <header>
      
    <!-- Flash Message -->
    @if(Session::has('message'))
      <div class="alert alert-success" style="position: fixed; z-index: 10000;">
        {{ Session::get('message') }}
      </div>
    @endif
 
    </header>
    
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
  </body>

</html>
