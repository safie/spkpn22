<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahUsaha extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_e_tanah_diusahakan";
    protected $primaryKey = 'tdu_idtanah_diusahakan';
}
