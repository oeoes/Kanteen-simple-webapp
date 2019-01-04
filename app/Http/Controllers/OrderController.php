<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Transaction;
use App\User;

// Handle every single request of item's order
class OrderController extends Controller
{
    // Taking orders from cart (inside session)
    // then insert it to orders table
    public function submitOrder()
    {
        $orders = session()->all();

        // Take item's names from cart session
        $arrOrder = $orders['items'];
        $tempOrder = [];

        // Convert array 2D to sinngle array
        foreach ($arrOrder as $or)
        {
            $tempOrder[] = implode(",", $or);
        }
        
        $strOrder = implode(", ", $tempOrder);

        $buyer = User::where('id', request('user_id'))->first();
        
        Order::create([
            'user_id' => request('user_id'),
            'seller_id' => request('seller_id'),
            'buyer' => $buyer->nama_depan." ".$buyer->nama_belakang,
            'items' => $strOrder,
            'total' => request('total'),
            'pesan' => request('pesan')
        ]);
        
        // Pulling or deleting items from cart
        session()->pull('items');
        session()->pull('id');
        session()->pull('harga');

        session()->flash('message', 'Order sudah disubmit, mohon menunggu');
        return back();
        
    }

    // Change status from default=queue to 'cook'
    public function cook($id)
    {
        $order = Order::find($id);

        $order->status = "cooking";
        $order->save();

        return back();
    }

    // Change status from cook to finish
    public function finish($id)
    {
        $order = Order::find($id);

        $order->status = "finish";
        $order->save();

        // save to transactions table after orders have been completed
        Transaction::create([
            'user_id' => $order->user_id,
            'seller_id' => $order->seller_id,
            'order_id' => $order->id
        ]);
        
        session()->flash('message', 'Cooking Finish');
        return back();
    }

    // Refuse order
    public function tolakPesanan($id)
    {
        $item = Order::find($id);

        $item->status = "cancle";
        $item->save();

        session()->flash('message', 'Anda Menolak Pesanan :(');
        return back();
    }
}
