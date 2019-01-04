@extends('layouts.master')

@section('title-bar', 'Home')

@section('custom-css')
	<style type="text/css">
		.kategori{
			padding: 1rem;
			width: 100%;
			height: 60px;
			color: black;
			font-size: 4rem;
			margin-top: 3rem;
		}
		.back{
			font-size: 40px;
			color: #888;
			padding-bottom: 10px;
			cursor: pointer
		}
	</style>
@endsection

@section('content')

	@switch(Route::currentRouteName())
		@case('cat.food')
			<div class="kategori">
				<i onclick="window.history.back()" class="fa fa-arrow-left back"></i> Food
			</div>
			@include('products-page.food')
			@break
		@case('cat.beverage')
		<div class="kategori">
				<i onclick="window.history.back()" class="fa fa-arrow-left back"></i> Beverage
			</div>
			@include('products-page.beverage')
			@break
		@case('cat.dessert')
		<div class="kategori">
				<i onclick="window.history.back()" class="fa fa-arrow-left back"></i> Dessert
			</div>
			@include('products-page.dessert')
			@break
		@case('cat.snack')
		<div class="kategori">
				<i onclick="window.history.back()" class="fa fa-arrow-left back"></i> Snack
			</div>
			@include('products-page.snacks')
			@break
	@endswitch
@endsection