@extends('layouts.master-dashboard')

@section('title-bar', 'Dashboard')

@section('custom-css')
	<style type="text/css">
		.form-add-product{
			margin: 0 auto;
			width: 70%;
		}
		.myalert{
			position: fixed;
			top: 10px;
			left: 25%;
			width: 50%
		}
	</style>
@endsection

@section('content')
	@if(Session::has('message'))
	<div id="alert">
		<div class="alert alert-success animated fadeInDown myalert">
			<div class="h3 text-center">{{ session()->get('message') }}</div>
		</div>
	</div>
		
	@endif
	<div class="album py-5">
	    <div class="container">
	      <div class="row">
	      	@switch(Route::currentRouteName())
		      	@case('dashboard.home')
		      		@include('dashboard.products')
		      		@break
		      	@case('products')
		      		@include('dashboard.products')
		      		@break
		      	@case('orders')
		      		@include('dashboard.orders')
		      		@break
		      	@case('add.product')
		      		@include('dashboard.add')
		      		@break
		    @endswitch
	       
	      </div>
	    </div>
	</div>
	
@endsection