@extends('layouts.form-layout')

@section('title-bar', 'Kanteen -- Masuk')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
                <form class="login100-form validate-form" action="{{ route('masuk.auth') }}" method="POST">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-70 warning">
                        Welcome

                        @if(count($errors))
                        <div class="alert alert-danger warning-box animated shake">
                            <h4>Ouch!</h3>
                            <hr>
                            @foreach($errors->all() as $error)
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                        </div>
                        @endif
                    </span>

                    <span class="login100-form-avatar">
                        <img src="{{ asset('images/icons/kan_teen.png') }}" alt="AVATAR">
                    </span>

                    <div class="wrap-input100 validate-input m-t-10 m-b-35" data-validate = "Enter username">
                        <input class="input100" type="email" name="email" required>
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Masuk
                        </button>
                    </div>

                    <ul class="login-more p-t-50">
                        <li class="m-b-8">
                            <span class="txt1">
                                Daftar sebagai
                            </span>

                            <a href="{{ route('daftar.user.page') }}" class="txt2">
                                User
                            </a>
                            atau
                            <a href="{{ route('daftar.seller.page') }}" class="txt2">
                                Seller?
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
