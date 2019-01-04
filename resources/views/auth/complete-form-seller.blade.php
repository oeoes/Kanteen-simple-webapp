@extends('layouts.form-layout')

@section('title-bar', 'Kanteen -- Masuk')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
                <form class="login100-form validate-form" action="{{ route('daftar.seller.complete') }}" method="POST">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-70">
                        Hi {{ auth()->user()->nama_depan }} <br>
                        <small>Complete Your Seller Information</small>
                    </span>

                    <div class="wrap-input100 validate-input m-t-40 m-b-35" data-validate = "Enter username">
                        <input class="input100" type="text" name="nama_warung" required>
                        <span class="focus-input100" data-placeholder="Nama Warung"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-t-40 m-b-35" data-validate = "Enter username">
                        <textarea name="deskripsi" class="input100" cols="30" rows="15"></textarea>
                        <span class="focus-input100" data-placeholder="Deskripsi Warung Anda"></span>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

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



