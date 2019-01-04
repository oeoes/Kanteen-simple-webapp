<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('kan_teen')->group(function(){
	Route::get('/', 'AppController@home')->name('home');

	Route::prefix('seller')->group(function(){
		Route::get('/', 'SellerController@sellerPage')->name('seller');
		Route::get('/see-seller/{seller_id}/categories', 'SellerController@seeSeller')->name('see.seller');
	});

	Route::get('/categories', 'AppController@categories')->name('categories');

	Route::get('/categories/food/{seller_id}', 'AppController@food')->name('cat.food');
	Route::get('/categories/beverage/{seller_id}', 'AppController@beverage')->name('cat.beverage');
	Route::get('/categories/dessert{seller_id}', 'AppController@dessert')->name('cat.dessert');
	Route::get('/categories/snack/{seller_id}', 'AppController@snack')->name('cat.snack');
	Route::get('/status-order', 'AppController@statusOrder')->name('status.order');

	Route::prefix('auth')->group(function(){
		Route::get('/daftar/user', 'SessionController@daftarUserPage')->name('daftar.user.page');
		Route::post('/daftar/user', 'SessionController@daftarUserAuth')->name('daftar.user.auth');
		Route::get('/daftar/user/complete', 'SessionController@daftarUserCompletePage')->name('daftar.user.complete.page');
		Route::post('/daftar/user/complete', 'SessionController@daftarUserComplete')->name('daftar.user.complete');

		Route::get('/daftar/seller', 'SessionController@daftarSellerPage')->name('daftar.seller.page');
		Route::post('/daftar/seller', 'SessionController@daftarSellerAuth')->name('daftar.seller.auth');
		Route::get('/daftar/seller/complete', 'SessionController@daftarSellerCompletePage')->name('daftar.seller.complete.page');
		Route::post('/daftar/seller/complete', 'SessionController@daftarSellerComplete')->name('daftar.seller.complete');
		Route::get('/keluar', 'SessionController@keluar')->name('keluar');
		Route::get('/masuk', 'SessionController@masuk')->name('masuk');
		Route::post('/masuk', 'SessionController@masukAuth')->name('masuk.auth');
	});

	Route::prefix('cart')->group(function(){
		Route::get('/add/{id_produk}/{nama_produk}/{harga}/{seller}', 'ShoppingCartController@keepProduct')->name('keep.product');
		Route::get('/view', 'ShoppingCartController@viewCart')->name('view.cart');
		Route::get('/delete/item/{id}', 'ShoppingCartController@deleteItem')->name('delete.item');
	});

	Route::prefix('dapur')->group(function(){
		Route::get('/', 'DashboardController@index')->name('dashboard.home');
		Route::get('/products', 'DashboardController@index')->name('products');
		Route::get('/orders', 'DashboardController@myOrder')->name('orders');
		Route::get('/add', 'DashboardController@addProduct')->name('add.product');
		Route::post('/store', 'DashboardController@storeProduct')->name('store.product');
		Route::get('/delete/{id_produk}', 'DashboardController@deleteProduct')->name('delete.product');
		Route::post('/update/{id}', 'DashboardController@updateProduct')->name('update.product');
	});

	Route::prefix('order')->group(function(){
		Route::post('/submit', 'OrderController@submitOrder')->name('submit.order');
		Route::get('/cook/{id}', 'OrderController@cook')->name('cook');
		Route::get('/finish/{id}', 'OrderController@finish')->name('finish');
		Route::get('/tolak/{id}', 'OrderController@tolakPesanan')->name('tolak.pesanan');
	});
});