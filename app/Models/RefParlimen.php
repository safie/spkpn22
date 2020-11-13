<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefParlimen extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_ref_parlimen";
    protected $primaryKey = 'par_kodparlimen';
}
