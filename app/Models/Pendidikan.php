<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_d_tahap_pendidikan";
    protected $primaryKey = 'dtp_iddemografi_tahap_pendidikan';

}
