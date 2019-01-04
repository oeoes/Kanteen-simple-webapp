@extends('layouts.master')

@section('title-bar', 'Status Order')

@section('custom-css')
    <style>
        .status-box{
            width: 100%;
            position: relative;
            height: 300px;
        }
        .items{
            overflow-y: auto;
            height: 70px;
        }
        .status-header{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            color: white;
            font-size: 1rem
        }
        .card{
            border: none;
            overflow: hidden
        }
        .harga{
            width: 100%;
            font-size: 40px;
            margin-top: 2rem
        }
        .counter{
            font-size: 3rem;
            padding-left: 1rem
        }
    </style>
@endsection

@section('content')

    <!-- <div class="jumbotron jumbotron-fluid" style="margin-top: 6rem; background: white">
        <div class="container text-center">
            <div class="display-4">Your Order Status</div>
        </div>
    </div> -->
    <div class="container" style="margin-top: 7rem">
        <div class="row">
        @if(count($myorder))
            @foreach ($myorder as $my => $ord)
            <div class="col-md-4" style="margin-bottom: 2rem">
                <div class="card shadow-sm">
                    <div class="status-box">
                        @if ($ord->status == "queue")
                            <div style="background: grey" class="status-header text-center">{{ ucwords($ord->status) }}</div>
                        @elseif ($ord->status == "cooking")
                            <div style="background: #f6993f" class="status-header text-center">{{ ucwords($ord->status) }}</div>
                        @elseif ($ord->status == "finish")
                            <div style="background: #38c172" class="status-header text-center">{{ ucwords($ord->status) }}</div>
                        @elseif ($ord->status == "cancle")
                            <div style="background: #e3342f" class="status-header text-center">Dibatalkan</div>
                        @endif
                        <div class="row" style="margin-top: 4rem">
                            <div class="col-3 counter text-center">{{ $my+1 }}</div>
                            <div class="col-9">
                                <div class="h3">Items : </div>
                                <div class="items">
                                    {{ $ord->items }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="harga text-center">Rp {{ $ord->total }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="blank-page">
                Order sekarang <br> <i class="fa fa-smile"></i> <br> <a style="width: 50%" href="{{ route('seller') }}" class="btn btn-primary">Okay!</a>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
        @endif
    </div>

@endsection