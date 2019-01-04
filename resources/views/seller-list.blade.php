@extends('layouts.master')

@section('title-bar', 'Seller')

@section('custom-css')
<style>
    .wadah{
        width:100%;
        padding: 1rem;
        background: #dedede;
    }
    a{
        color: black
    }
    a:hover, img{
        color: grey;
        text-decoration: none;
    }
</style>
@endsection

@section('content')

    <div class="container-fluid" style="margin-top: 6rem">
        <div class="row">
            @if(count($seller))
                @foreach ($seller as $s)
                    <div class="col-md-6 seller-list" style="margin-bottom: 1rem">
                        <a href="{{ route('see.seller', ['seller_id' => $s->user_id]) }}">
                            <div class="wadah">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('svg/student.svg') }}" alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="h1">{{$s->nama_warung}}</div>
                                        <p>{{ $s->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="blank-page">
                        Belum Ada Seller <br> <i class="fa fa-frown"></i>
                    </div>
                </div>
                <div class="col-3"></div>
            @endif
        </div>
    </div>      

@endsection