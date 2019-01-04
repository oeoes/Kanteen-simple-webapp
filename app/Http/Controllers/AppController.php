<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('isconfirmed');
    }

    public function home()
    {
    	return view('home');
    }

    public function categories()
    {
    	return view('categories');
    }

    // View food collection
    public function food($seller_id)
    {
        $food = Product::food($seller_id);
    	return view('products')->with('food', $food);
    }

    // View beverage collection
    public function beverage($seller_id)
    {
        $beverage = Product::beverage($seller_id);
    	return view('products')->with('beverage', $beverage);
    }

    // View dessert collection
    public function dessert($seller_id)
    {
        $dessert = Product::dessert($seller_id);
    	return view('products')->with('dessert', $dessert);
    }

    // View snack collection
    public function snack($seller_id)
    {
        $snack = Product::snack($seller_id);
    	return view('products')->with('snack', $snack);
    }

    // View Order status
    public function statusOrder()
    {
        $myorder = Order::where('user_id', auth()->user()->id)->get();
        return view('order.status-order')->with(['myorder' => json_decode($myorder)]);
    }
}
