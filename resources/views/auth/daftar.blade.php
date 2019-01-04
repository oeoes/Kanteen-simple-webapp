@extends('layouts.form-layout')

@section('title-bar', 'Kanteen -- Masuk')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
            @if(Route::currentRouteName() == 'daftar.user.page')
                <span class="login100-form-title p-b-70 warning">
                    Hi, Visitor!

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
                <form class="login100-form validate-form" action="{{ route('daftar.user.auth') }}" method="POST">
            @else
                <span class="login100-form-title p-b-70 warning">
                    Hi, Seller!

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
                <form class="login100-form validate-form" action="{{ route('daftar.seller.auth') }}" method="POST">
            @endif
                    {{ csrf_field() }}
                    
                    <span class="login100-form-avatar">
                        <img src="{{ asset('images/icons/kan_teen.png') }}" alt="AVATAR">
                    </span>

                    <div class="wrap-input100 validate-input m-b-35 m-t-30" data-validate = "Enter username">
                        <input class="input100" type="text" name="nama_depan" required>
                        <span class="focus-input100" data-placeholder="Nama Depan"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-35" data-validate = "Enter username">
                        <input class="input100" type="text" name="nama_belakang" required>
                        <span class="focus-input100" data-placeholder="Nama Belakang"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-35" data-validate = "Enter username">
                        <input class="input100" type="email" name="email" required>
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-35" data-validate = "Enter username">
                        <input class="input100" type="text" name="phone" required>
                        <span class="focus-input100" data-placeholder="Phone"></span>
                    </div>

                    @if(Route::currentRouteName() == 'daftar.user.page')
                        <input type="hidden" name="role" value="visitor">
                    @else
                        <input type="hidden" name="role" value="seller">
                    @endif

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Daftar
                        </button>
                    </div>

                    <ul class="login-more p-t-190">
                        <li class="m-b-8">
                            <span class="txt1">
                                Sudah punya akun?
                            </span>
                            <a href="{{ route('masuk') }}" class="txt2">
                                Masuk
                            </a>
                        </li>
                    </ul>
                    @if(count($errors))
                        @foreach($errors as $er)
                            {{ $er }}
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection