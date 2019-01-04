<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Seller extends Model
{
    protected $fillable =['user_id', 'nama_warung', 'deskripsi'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
