<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Kanteen</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        @if(Route::currentRouteName() == 'home')
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('seller') }}">Seller</a>
            </li>
            @if(Auth::check())
            @if(Auth::user()->role == 'seller')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.home') }}">Dapur</a>
                </li>
            @elseif (Auth::user()->role == 'visitor')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('status.order') }}">Status</a>
                </li>
            @endif
            <li class="dropdown show">
                <a href="" class="btn btn-secondary bg-dark dropdown-toggle" role="button" id="dropbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->nama_depan }}</a>
                <div class="dropdown-menu" aria-labelled="dropbutton">
                    <a href="{{ route('keluar') }}" class="dropdown-item"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
            </li>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('masuk') }}">Masuk</a>
            </li>
            @endif
        @elseif (Route::currentRouteName() == 'status.order')
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('seller') }}">Seller <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::check())
            @if(Auth::user()->role == 'seller')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.home') }}">Dapur</a>
                </li>
            @elseif (Auth::user()->role == 'visitor')
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('status.order') }}">Status</a>
                </li>
            @endif
            <li class="dropdown show">
                <a href="" class="btn btn-secondary bg-dark dropdown-toggle" role="button" id="dropbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->nama_depan }}</a>
                <div class="dropdown-menu" aria-labelled="dropbutton">
                    <a href="{{ route('keluar') }}" class="dropdown-item"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
            </li>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('masuk') }}">Masuk</a>
            </li>
            @endif
        @else
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('seller') }}">Seller <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::check())
            @if(Auth::user()->role == 'seller')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.home') }}">Dapur</a>
                </li>
            @elseif (Auth::user()->role == 'visitor')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('status.order') }}">Status</a>
                </li>
            @endif
            <li class="dropdown show">
                <a href="" class="btn btn-secondary bg-dark dropdown-toggle" role="button" id="dropbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->nama_depan }}</a>
                <div class="dropdown-menu" aria-labelled="dropbutton">
                    <a href="{{ route('keluar') }}" class="dropdown-item"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
            </li>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('masuk') }}">Masuk</a>
            </li>
            @endif
        @endif
        <div class="mycart-mobile" data-toggle="modal" data-target="#cart-shop" class="float-right" style="color: white; font-size: 1.5rem; cursor: pointer;">
            @if(Auth::check())
            <a class="cart-ico"><i class="fa fa-shopping-cart">
                @if(Session::has('items'))
                    <small class="amount-items"> {{ count($cart['items']) }}</small>
                @endif
            </i></a>
            @endif
        </div>
        </ul>
    </div>
    <div class="mycart" data-toggle="modal" data-target="#cart-shop" class="float-right" style="color: white; font-size: 1.5rem; cursor: pointer;">
        @if(Auth::check())
        <a class="cart-ico"><i class="fa fa-shopping-cart">
            @if(Session::has('items'))
            <small class="amount-items"> {{ count($cart['items']) }}</small>
            @endif
        </i></a>
        @endif
    </div>
</nav>