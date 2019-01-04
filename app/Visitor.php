<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['user_id', 'nim', 'fakultas', 'jurusan', 'alamat'];
}
