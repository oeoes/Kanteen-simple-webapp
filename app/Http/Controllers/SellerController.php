<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Product;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isconfirmed', 'auth']);
    }
    public function sellerPage()
    {
        $seller = Seller::all();
        
        return view('seller-list')->with('seller', $seller);
    }

    // Menampilkan seller tertentu berdasarkan id
    public function seeSeller($seller_id)
    {
        $sid = Seller::where('user_id', $seller_id)->first();
        return view('categories')->with('seller_id', $sid);
    }
}
