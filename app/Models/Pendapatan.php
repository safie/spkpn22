<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_d_pendapatan_kasar";
    protected $primaryKey = 'dpk_iddemografi_pendapatan_kasar';

}
