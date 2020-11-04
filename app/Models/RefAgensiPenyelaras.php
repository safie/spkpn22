<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefAgensiPenyelaras extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_ref_agensi_penyelaras";
}
