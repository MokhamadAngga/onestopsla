<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    protected $table = 'komplain';
    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBarang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
