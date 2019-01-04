@extends('layouts.form-layout')

@section('title-bar', 'Kanteen -- Masuk')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
                <form class="login100-form validate-form" action="{{ route('daftar.user.complete') }}" method="POST">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-70">
                        Hi {{ auth()->user()->nama_depan }} <br>
                        <small>Complete Your Information</small>
                    </span>

                    <div class="wrap-input100 validate-input m-t-40 m-b-35" data-validate = "Enter username">
                        <input class="input100" type="text" name="nim" required>
                        <span class="focus-input100" data-placeholder="NIM"></span>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="wrap-input100 validate-input m-b-35" data-validate="Enter password">
                        <input class="input100" type="text" name="fakultas" required>
                        <span class="focus-input100" data-placeholder="Fakultas"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-35" data-validate="Enter password">
                        <input class="input100" type="text" name="jurusan" required>
                        <span class="focus-input100" data-placeholder="Jurusan"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-35" data-validate="Enter password">
                        <input class="input100" type="text" name="alamat" required>
                        <span class="focus-input100" data-placeholder="Alamat"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Lengkapi
                        </button>
                    </div>

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
