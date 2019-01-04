<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['seller_id', 'nama_produk', 'kategori', 'harga', 'gambar', 'stok'];

    public static function food($seller_id)
    {
        return static::where(['seller_id' => $seller_id, 'kategori' => 'food'])->get();
    }

    public static function beverage($seller_id)
    {
        return static::where(['kategori' => 'beverage', 'seller_id' => $seller_id])->get();
    }

    public static function snack($seller_id)
    {
        return static::where(['kategori' => 'snack', 'seller_id' => $seller_id])->get();
    }

    public static function dessert($seller_id)
    {
        return static::where(['kategori' => 'dessert', 'seller_id' => $seller_id])->get();
    }

    // Count total price items inside session
    public static function total()
    {
        static $total=0;

        if(session()->has('harga'))
        {
            $cart = session()->all();

            for($i=0; $i < count($cart['harga']); $i++)
            {
                $total += $cart['harga'][$i][0];
            }
        }

        return $total;
    }

}
