<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umur extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_d_umur";
    protected $primaryKey = 'deu_iddemografi_umur';

}
