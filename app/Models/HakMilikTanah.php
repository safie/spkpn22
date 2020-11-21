<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakMilikTanah extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_e_jenis_tanah";
    protected $primaryKey = 'jet_idjenis_tanah';

}
