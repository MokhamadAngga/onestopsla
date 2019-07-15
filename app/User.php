<?php

namespace App;

use App\Models\Komplain;
use App\Models\PeminjamanMobil;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public function getPeminjamanMobil()
    {
        return $this->hasMany(PeminjamanMobil::class, 'user_id');
    }

    public function getPeminjamanRuang()
    {
        return $this->hasMany(PeminjamanRuang::class, 'user_id');
    }

    public function getPeminjamanRumah()
    {
        return $this->hasMany(PeminjamanRumah::class, 'user_id');
    }

    public function getKomplain()
    {
        return $this->hasMany(Komplain::user,'user_id');
    }
}
