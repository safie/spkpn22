<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahTerbiar extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_e_tanah_terbiar";
    protected $primaryKey = 'tat_idtanah_terbiar';
}
