@extends('layouts.master')

@section('title-bar', 'Categories')

@section('custom-css')
     <style type="text/css">
      .menu{
        height: 470px;
        width: 100%;
        background: #BA2D0B;
        padding-top: 2rem;
        font-size: 6rem;
        color: white;
        position: relative;
      }
      .ico{
        position: absolute;
        left: 35%;
        top: 15%;
      }

      .ico img{
        width: 50%;
      }

      .menu-name{
        position: absolute;
        font-size: 1.7rem;
        width: 100%;
        text-align: center;
        left: 0;
        top: 73%;
      }

      .menu:hover{
        animation: shrink .3s ease;
        animation-fill-mode: forwards;
      }

     

      @keyframes shrink{
        from{
          transform: scale(1);
        }
        to{
          transform: scale(.95);
        }
      }

      @media (max-width: 600px){
        .ico{
          left: 17%;
        }

        .ico img{
          width: 75%;
        }

        .menu{
          height: 250px;
        }
      }
    </style>
@endsection

@section('content')
	
  
	<main role="main" style="padding-top: 5rem">
      <div class="container-fluid" style="padding: 0">
          <div class="row no-gutters">
            <div class="col-6 animated fadeInDown">
              <a href="{{ route('cat.food', ['seller_id' => $seller_id->user_id]) }}">
                <div class="menu">
                  <div class="ico"><img src="{{ asset('images/icons/food.png') }}"></div>
                  <div class="menu-name">Food</div>
                </div>
              </a>
            </div>

             <div class="col-6 animated fadeInRight">
              <a href="{{ route('cat.beverage', ['seller_id' => $seller_id->user_id]) }}">
               <div class="menu" style="background: #73BA9B;">
                  <div class="ico"><img src="{{ asset('images/icons/beverage.png') }}"></div>
                  <div class="menu-name">Beverage</div>
                </div>
              </a>
            </div>

            <div class="col-6 animated fadeInLeft">
              <a href="{{ route('cat.dessert', ['seller_id' => $seller_id->user_id]) }}">
                <div class="menu" style="background: #6cb2eb">
                  <div class="ico"><img src="{{ asset('images/icons/dessert.png') }}"></div>
                  <div class="menu-name">Dessert</div>
                </div>
              </a>
            </div>

             <div class="col-6 animated fadeInUp">
              <a href="{{ route('cat.snack', ['seller_id' => $seller_id->user_id]) }}">
               <div class="menu" style="background: #6574cd;">
                  <div class="ico"><img src="{{ asset('images/icons/snack.png') }}"></div>
                  <div class="menu-name">Snacks</div>
                </div>
              </a>
            </div>

          </div>

        </div>

    </main>


@endsection