<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaKampung extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_pengguna_kampung";
    protected $primaryKey = 'usk_idpengguna_kampung';

    public function kampung()
    {
        return $this->hasOne('App\Models\Kampung', 'kam_idkampung', 'usk_idkampung');
    }
    public function scopePengerak($query)
    {
        return $query->where('usk_idtahap_pengguna', '=', 'PENGERAK');
    }
    public function scopeKetuaKg($query)
    {
        return $query->where('usk_idtahap_pengguna', '=', 'KETUA_KOMUNITI');
    }
    public function scopePenghulu($query)
    {
        return $query->where('usk_idtahap_pengguna', '=', 'PENGHULU');
    }
}
