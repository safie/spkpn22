<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_pengguna";
    protected $primaryKey = 'usr_id';

    public function penggunaKampung()
    {
        return $this->hasOne('App\Models\PenggunaKampung', 'usk_id', 'usr_id');
    }

}
