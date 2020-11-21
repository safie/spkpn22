<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SusunAtur extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_c_konsep_susun_atur";
    protected $primaryKey = 'ksa_idkonsep';

    public function kampung()
    {
        return $this->hasOne('App\Models\Kampung', 'kam_idkampung', 'ksa_idkampung');
    }
}
