<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahMoto extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_b_sejarah_moto";
    protected $primaryKey = 'sej_idsejarah_moto';

    public function kampung()
    {
        return $this->hasOne('App\Models\Kampung', 'kam_idkampung', 'sej_idkampung');
    }
}
