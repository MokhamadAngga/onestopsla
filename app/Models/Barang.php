<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = ['id'];

    public function getPeminjamanMobil()
    {
        return $this->hasMany(PeminjamanMobil::class, 'barang_id');
    }

    public function getPeminjamanRuang()
    {
        return $this->hasMany(PeminjamanRuang::class, 'barang_id');
    }

    public function getPeminjamanRumah()
    {
        return $this->hasMany(PeminjamanRumah::class, 'barang_id');
    }

    public function getKomplain()
    {
        return $this->hasOne(Komplain::class, 'barang_id');
    }
}
