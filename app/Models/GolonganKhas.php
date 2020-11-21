<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganKhas extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_d_golongan_khas";
    protected $primaryKey = 'dgk_iddemografi_golongan_khas';
}
