<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_d_demografi";
    protected $primaryKey = 'deb_iddemografi';
}
