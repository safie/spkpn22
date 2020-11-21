<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_d_pekerjaan";
    protected $primaryKey = 'dep_iddemografi_pekerjaan';

}
