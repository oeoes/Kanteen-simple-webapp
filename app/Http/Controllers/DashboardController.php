<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class DashboardController extends Controller
{
    // Memfilter halaman dashboard hanya untuk authenticated dan role=seller
    public function __construct()
    {
        $this->middleware(['isconfirmed', 'isSeller']);
    }

    // Menampilkan produk berdasarkan seller login
    public function index()
    {
        $product = Product::where('seller_id', auth()->user()->id)->get();
    	return view('dashboard.index')->with('product', $product);
    }

    // Menampilkan order yang masuk berdasarkan seller tertentu
    public function myOrder()
    {
        $order = Order::where('seller_id', auth()->user()->id)
        ->where('status', '!=', 'finish')
        ->where('status', '!=', 'cancle')->get();
        
        return view('dashboard.index')->with('order', $order);
    }

    public function addProduct()
    {
    	return view('dashboard.index');
    }

    public function storeProduct()
    {
       if(request()->hasFile('gambar'))
       {
           $gambar = request()->file('gambar');
           $nama = time().'.'.$gambar->getClientOriginalExtension();
           $path = public_path('/images/products');

           $gambar->move($path, $nama);

           Product::create([
               'seller_id' => auth()->user()->id,
               'nama_produk' => request('nama_produk'),
               'kategori' => request('kategori'),
               'harga' => request('harga'),
               'gambar' => $nama,
               'stok' => request('stok')
           ]);

           session()->flash('message', 'Produk ditambahkan');
           return back();
       }
       session()->flash('message', 'Failed to Upload');
       return back();
    }

    public function deleteProduct($id_produk)
    {
        $item = Product::find($id_produk);
        $gambar = public_path().'/images/products/'.$item->gambar;

        // Delete gambar produk berkaitan
        if(\File::exists($gambar))
        {
            \File::delete($gambar);
        }
        $item->delete();

        session()->flash('message', 'Produk telah dihapus.');
        return back();
    }

    public function updateProduct($id)
    {
        $pr = Product::find($id);

        $pr->nama_produk = request('nama_produk');
        $pr->kategori = request('kategori');
        $pr->harga = request('harga');
        $pr->stok = request('stok');

        $pr->save();
        session()->flash('message', 'Produk berhasil diperbarui');
        return back();
    }
}
