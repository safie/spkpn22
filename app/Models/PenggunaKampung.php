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
}
