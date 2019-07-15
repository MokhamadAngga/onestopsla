<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class peminjamanRuang extends Model
{
    protected $table='peminjaman_ruang';
    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBarang ()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function getTanggalKembaliAttribute($val)
    {
        return Carbon::parse($val);
    }

    public function getTanggalPinjamAttribute($val)
    {
        return Carbon::parse($val);
    }
}
