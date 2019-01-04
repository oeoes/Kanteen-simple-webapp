

@if(Route::currentRouteName() == 'orders')
	<a href="{{ route('products') }}"><div class="menu-li"><img src="{{ asset('images/icons/products.png') }}"></div></a>
	<a href="{{ route('orders') }}"><div class="menu-li aktiv"><img src="{{ asset('images/icons/orders.png') }}"></div></a>
	<a href="{{ route('add.product') }}"><div class="menu-li"><img src="{{ asset('images/icons/add.png') }}"></div></a>
@elseif(Route::currentRouteName() == 'add.product')
	<a href="{{ route('products') }}"><div class="menu-li"><img src="{{ asset('images/icons/products.png') }}"></div></a>
	<a href="{{ route('orders') }}"><div class="menu-li"><img src="{{ asset('images/icons/orders.png') }}"></div></a>
	<a href="{{ route('add.product') }}"><div class="menu-li aktiv"><img src="{{ asset('images/icons/add.png') }}"></div></a>
@else
	<a href="{{ route('products') }}"><div class="menu-li aktiv"><img src="{{ asset('images/icons/products.png') }}"></div></a>
	<a href="{{ route('orders') }}"><div class="menu-li"><img src="{{ asset('images/icons/orders.png') }}"></div></a>
	<a href="{{ route('add.product') }}"><div class="menu-li"><img src="{{ asset('images/icons/add.png') }}"></div></a>
@endif