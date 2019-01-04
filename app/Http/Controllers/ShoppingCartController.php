<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // Menyimpan item/produk yang dipilih visitor dalam cart menggunakan session
    public function keepProduct($id_produk, $nama_produk, $harga, $seller)
    {
        /*
        * from request instance
        * $item = request()->session()->put('item', 'roy');
        */

        /*
        * Melalui global helper
        * $item = session(['item' => 'rusdiana']);
        */

        // Values disimpan dalam session array items, id, dan harga
        request()->session()->push('items', [$nama_produk]);
        request()->session()->push('id', [$id_produk]);
        request()->session()->push('harga', [$harga]);
        session(['seller' => $seller]);
        return back();
    }

    // Hapus semua item dalam cart/session
    public function deleteItem($id)
    {
        session()->pull('items', [$id]);
        session()->pull('id', [$id]);
        session()->pull('harga', [$id]);

        return back();
    }
}
