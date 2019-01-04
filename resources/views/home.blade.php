@extends('layouts.master')

@section('title-bar', 'Home')

@section('custom-css')
    <link href="{{ asset('css/home/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/content.css') }}" rel="stylesheet">
@endsection

@section('content')

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="{{ asset('images/slides/1.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{ asset('images/slides/2.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{ asset('images/slides/3.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="jumbotron jumbotron-fluid">
      	<div class="container">
      		<div class="text-center wanted-text">
      			Most Wanted Items
      		</div>
      	</div>
      </div>

      <div class="album py-5">
        <div class="container">

          <div class="row no-gutters">
            @for($i=0; $i < 6; $i++)
              <div class="col-md-4">
                <div style="height: auto;" class="card wanted">
                  <div class="wanted-box"><div class="wanted-ico"><i class="fa fa-cart-plus"></i></div></div>
                  <img style="height: 200px" class="card-img-top" src="http://localhost:8000/images/wanted/{{ $i+1 }}.jpg">
                </div>
              </div>
            @endfor
            
          </div>
        </div>
      </div>

    </main>

@endsection