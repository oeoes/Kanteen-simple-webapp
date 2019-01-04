<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $fillable = ['user_id', 'seller_id', 'items', 'total', 'pesan', 'buyer'];

    public function hasOrder()
    {
        return $this->belongsTo(User::class);
    }
}
